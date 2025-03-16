<main id="main" class="main">

    <div class="pagetitle">
        <h1><?= $title ?></h1>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="box box-default">
                        <div class="box-header with-border">
                            <div class="box-tools pull-right">
                                <button class="btn btn-box-tool" id='btnRefresh'><i class="bi bi-arrow-clockwise"></i>&nbsp; Refresh</button>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="grid" style="margin-top:0px; margin-bottom:5px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Data Item</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body modal1">
                        <div class="form-group row">
                            <label for="nama_item" class="col-sm-3 col-form-label">Nama Item</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="nama_item" maxlength='50' />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="uom" class="col-sm-3 col-form-label">UOM</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="uom" maxlength='50' />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="harga_beli" class="col-sm-3 col-form-label">Harga Beli</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="harga_beli" maxlength='50' />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="harga_jual" class="col-sm-3 col-form-label">Harga Jual</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="harga_jual" maxlength='50' />
                            </div>
                        </div>
                        <br>
                        <hr>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" id='btnClose' data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" id='btnSave'>Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <script>
            var AppD = {
                attachEvents: function() {
                    var o = this;
                    o.dom.$grid.on('click', '#excel', o.eventHandlers.onClickBtnExcel.bind(o));
                    o.dom.$grid.on('click', '#add_new', o.eventHandlers.onClickBtnAddNew.bind(o));
                    o.dom.$grid.on('click', '.k-grid-Update', o.eventHandlers.onClickBtnUpdate.bind(o));
                    o.dom.$grid.on('click', '.k-grid-Delete', o.eventHandlers.onClickBtnDelete.bind(o));
                    o.dom.$grid.on('keyup', o.eventHandlers.onLiveSearchCustomer.bind(o));
                    o.dom.$btnSave.on('click', o.eventHandlers.onClickBtnSave.bind(o));
                    o.dom.$btnRefresh.on('click', o.eventHandlers.onClickBtnRefresh.bind(o));
                },
                cacheDom: function() {
                    var o = this;
                    o.dom.inputs = {};
                    o.dom.inputs.$nama_item = $("#nama_item");
                    o.dom.inputs.$uom = $("#uom");
                    o.dom.inputs.$harga_beli = $("#harga_beli");
                    o.dom.inputs.$harga_jual = $("#harga_jual");


                    o.dom.$exampleModal = $("#exampleModal");
                    o.dom.$grid = $("#grid");
                    o.dom.$btnRefresh = $("#btnRefresh");
                    o.dom.$btnSave = $("#btnSave");
                },
                data: {
                    id_item: '',
                    labelJudul: ''
                },
                dom: {},
                eventHandlers: {
                    onLiveSearchCustomer: function(e) {
                        var o = this;

                        var grid = o.dom.$grid.data('kendoGrid');
                        var search = o.dom.$live_searchCustomer.val();
                        var filter = {
                            filters: [{
                                field: "nama_item",
                                operator: "contains",
                                value: search
                            }]
                        };


                        if (search === '') {
                            grid.dataSource.filter({});
                        } else {
                            grid.dataSource.filter(filter);
                        }
                    },
                    onClickBtnExcel: function() {
                        var o = this;
                        o.dom.$grid.data('kendoGrid').saveAsExcel();
                    },
                    onClickBtnAddNew: function() {
                        var o = this;

                        $(".modal1").data("kendoWindow").open();
                        $('body').css('padding-right', '');
                        o.data.labelJudul = 'Add Form Data Item';
                        $(".modal1").data("kendoWindow").setOptions({
                            title: o.data.labelJudul
                        });
                        o.fn.clear.call(o);
                        setTimeout(function() {
                            o.dom.inputs.$nama_item.focus();
                        }, 1000);
                    },
                    onClickBtnUpdate: function(e) {
                        var o = this;
                        var di = o.dom.$grid.data('kendoGrid').dataItem(e.target.closest('tr'));
                        o.data.id_item = di.id_item;
                        o.dom.inputs.$nama_item.val(di.nama_item);
                        o.dom.inputs.$uom.val(di.uom);
                        o.dom.inputs.$harga_beli.val(di.harga_beli);
                        o.dom.inputs.$harga_jual.val(di.harga_jual);


                        $(".modal1").data("kendoWindow").open();
                        $('body').css('padding-right', '');
                        o.data.labelJudul = 'Update Form Data Item';
                        $(".modal1").data("kendoWindow").setOptions({
                            title: o.data.labelJudul
                        });
                        setTimeout(function() {
                            o.dom.inputs.$nama_item.focus();
                        }, 1000);
                    },
                    onClickBtnDelete: function(e) {
                        var o = this;
                        swal({
                            title: 'Delete?',
                            text: "Are you sure to delete this data?",
                            type: 'warning',
                            showCancelButton: true,
                            confirmButtonText: 'Yes'
                        }).then(function() {
                            var di = o.dom.$grid.data('kendoGrid').dataItem(e.target.closest('tr'));

                            $.ajax({
                                method: 'post',
                                url: '<?= site_url() ?>/Item/DEL',
                                dataType: 'text',
                                data: {
                                    id_item: di.id_item
                                }
                            }).done(function(data, textStatus, jqXHR) {
                                if (data !== 'success') {
                                    swal('Error', data, 'error');
                                    console.log(jqXHR);
                                    return;
                                }
                                swal({
                                    title: 'Success',
                                    text: 'Data deleted',
                                    type: 'success',
                                    timer: 1000,
                                    showConfirmButton: false
                                });
                            }).fail(function(jqXHR, textStatus, errorThrown) {
                                swal('Error', errorThrown + (jqXHR.responseText !== '' ? ': ' + jqXHR.responseText : ''), 'error');
                                console.log(jqXHR);
                            }).always(function(data_or_jqXHR, textStatus, jqXHR_or_errorThrown) {
                                o.dom.$grid.data('kendoGrid').dataSource.read();
                            });
                        });
                    },
                    onClickBtnRefresh: function(e) {
                        var o = this;
                        o.dom.$grid.data('kendoGrid').dataSource.read();
                    },
                    onClickBtnSave: function(e) {
                        var o = this;
                        var data = o.fn.getData.call(o);
                        var msgs = o.fn.validate(data);
                        if (msgs.length === 0) {
                            $.ajax({
                                method: 'post',
                                url: '<?= site_url() ?>/Item/INS',
                                dataType: 'text',
                                data: data
                            }).done(function(data, textStatus, jqXHR) {
                                if (data !== 'success') {
                                    swal('Error', data, 'error');
                                    console.log(jqXHR);
                                    return;
                                }
                                swal({
                                    title: 'Success',
                                    text: 'Data tersimpan',
                                    type: 'success',
                                    timer: 1000,
                                    showConfirmButton: false
                                });
                                o.dom.$grid.data('kendoGrid').dataSource.read();
                                $(".modal1").data("kendoWindow").close();
                                o.fn.clear.call(o);
                            }).fail(function(jqXHR, textStatus, errorThrown) {
                                swal('Error', errorThrown + (jqXHR.responseText !== '' ? ': ' + jqXHR.responseText : ''), 'error');
                                console.log(jqXHR);
                            }).always(function(data_or_jqXHR, textStatus, jqXHR_or_errorThrown) {
                                o.dom.$grid.data('kendoGrid').dataSource.read();
                            });
                        } else {
                            swal({
                                type: 'warning',
                                title: '',
                                html: msgs.join('<br>')
                            });
                        }
                        e.preventDefault();
                    }
                },
                fn: {
                    getData: function() {
                        var o = this;
                        var data = {};

                        data.id_item = o.data.id_item.trim();

                        data.nama_item = o.dom.inputs.$nama_item.val().trim();
                        data.uom = o.dom.inputs.$uom.val().trim();
                        data.harga_beli = o.dom.inputs.$harga_beli.val().trim();
                        data.harga_jual = o.dom.inputs.$harga_jual.val().trim();

                        return data;
                    },
                    validate: function(data) {
                        var msgs = [];
                        if (data.nama_item === '') msgs.push('Isi Nama');
                        if (data.uom === '') msgs.push('Isi UOM');
                        if (data.harga_beli === '') msgs.push('Isi Harga Beli');
                        if (data.harga_jual === '') msgs.push('Isi Harga Jual');
                        return msgs;
                    },
                    clear: function() {
                        var o = this;

                        o.data.id_item = '';

                        o.dom.inputs.$nama_item.val('');
                        o.dom.inputs.$uom.val('');
                        o.dom.inputs.$harga_beli.val('');
                        o.dom.inputs.$harga_jual.val('');
                        o.data.labelJudul = '';
                        o.dom.$live_searchCustomer.val('');
                    }

                },
                init: function() {
                    var o = this;
                    o.cacheDom();
                    o.attachEvents();
                    o.initElements();
                },
                initElements: function() {
                    var o = this;
                    var scrollPosition = 0;

                    o.dom.$grid.kendoGrid({
                        excel: {
                            fileName: "Data_Item.xlsx",
                            allPages: true,
                            filterable: true
                        },
                        dataSource: {
                            transport: {
                                read: function(options) {
                                    $.ajax({
                                        method: 'post',
                                        url: '<?= site_url() ?>Item/INQ',
                                        dataType: 'text',
                                        data: {
                                            page: options.data.page,
                                            pageSize: options.data.pageSize,
                                            filter: options.data.filter,
                                            sort: options.data.sort,
                                            aggregate: options.data.aggregate
                                        }
                                    }).done(function(data, textStatus, jqXHR) {
                                        try {
                                            var result = JSON.parse(data);
                                        } catch (e) {
                                            swal('Error', 'Error loading grid', 'error');
                                            options.success({
                                                data: []
                                            });
                                            return;
                                        }
                                        options.success(result);
                                    }).fail(function(jqXHR, textStatus, errorThrown) {
                                        swal('Error', errorThrown + (jqXHR.responseText !== '' ? ': ' + jqXHR.responseText : ''), 'error');
                                        console.log(jqXHR);
                                        options.success({
                                            data: []
                                        });
                                    });
                                },
                                parameterMap: function(options, operation) {
                                    if (operation !== "read" && options.models) {
                                        return {
                                            models: kendo.stringify(options.models)
                                        };
                                    }
                                }
                            },
                            schema: {
                                data: "data",
                                total: function(result) {
                                    result = result.total.total_count;
                                    return result;
                                },
                                aggregates: function(response) {
                                    return response.aggregates;
                                },
                                model: {
                                    id: "id_item",
                                    fields: {
                                        id_item: {
                                            type: "string",
                                            editable: false
                                        },
                                        nama_item: {
                                            type: "string",
                                            editable: false
                                        },
                                        uom: {
                                            type: "string",
                                            editable: false
                                        },
                                        harga_beli: {
                                            type: "string",
                                            editable: false
                                        },
                                        harga_jual: {
                                            type: "string",
                                            editable: false
                                        }
                                    }
                                }
                            },
                            serverPaging: true, // Enable server-side pagination
                            serverFiltering: true, // Enable server-side filtering if needed
                            serverSorting: true, // Enable server-side sorting if needed
                            serverAggregates: true,
                            pageSize: 50
                        },
                        noRecords: {
                            template: "<p class='noRecords contohbintang'><br>Tidak ada data yang tersedia di halaman saat ini. Isi <b>Pencarian</b> untuk menampilkan data!</p>"
                        },
                        height: 600,
                        groupable: false,
                        editable: false,
                        scrollable: true,
                        sortable: true,
                        resizable: true,
                        reorderable: true,
                        columnMenu: true,
                        filterable: {
                            extra: false,
                            operators: {
                                string: {
                                    contains: "Mengandung kata",
                                    doesnotcontain: "Tidak mengandung kata",
                                    eq: "Sama dengan",
                                    neq: "Tidak sama dengan",
                                    isempty: "Kosong",
                                    isnotempty: "Tidak kosong"
                                },
                                number: {
                                    eq: "Sama dengan",
                                    neq: "Tidak sama dengan",
                                    gte: "Lebih besar / sama dengan",
                                    gt: "Lebih besar",
                                    lte: "Lebih kecil / sama dengan",
                                    lt: "Lebih kecil",
                                    isnull: "Kosong",
                                    isnotnull: "Tidak Kosong"
                                },
                                date: {
                                    eq: "Sama dengan",
                                    neq: "Tidak sama dengan",
                                    gte: "Setelah / sama dengan",
                                    gt: "Setelah",
                                    lte: "Sebelum / sama dengan",
                                    lt: "Sebelum",
                                    isnull: "Kosong",
                                    isnotnull: "Tidak Kosong"
                                }
                            }
                        },
                        pageable: {
                            messages: {
                                empty: "The grid is empty"
                            },
                            refresh: false,
                            input: true,
                            numeric: true,
                            pageSizes: [50, 100, 200],
                            buttonCount: 5
                        },
                        columns: [{
                                width: 65,
                                filterable: false,
                                sortable: false,
                                headerTemplate: '<input type="checkbox" id="checkAll" style="display: none;" />',
                                template: '<input type="checkbox" class="id_item" />',
                                locked: true
                            },
                            {
                                width: 85,
                                command: [{
                                    name: "Delete",
                                    text: "<i class='bi bi-trash btnDelete' style='font-size:18px;color:#800000;'></i>"
                                }],
                                attributes: {
                                    style: "text-align: center"
                                }
                            },
                            {
                                width: 85,
                                command: [{
                                    name: "Update",
                                    title: "Edit",
                                    text: "<i class='bi bi-pencil-square btnUpdate' style='font-size:18px;color:#737373;'></i>"
                                }],
                                attributes: {
                                    style: "text-align: center"
                                }
                            },
                            {
                                field: "id_item",
                                title: "id",
                                template: "<div class='customClass'> #= (id_item == null) ? ' ' : kendo.toString(id_item, '') # </div>",
                                width: 40,
                                hidden: true
                            },
                            {
                                field: "nama_item",
                                title: "Name",
                                template: "<div class='customClass'> #= (nama_item == null) ? ' ' : kendo.toString(nama_item, '') # </div>",
                                width: 250
                            },
                            {
                                field: "uom",
                                title: "UOM",
                                template: "<div class='customClass'> #= (uom == null) ? ' ' : kendo.toString(uom, '') # </div>",
                                width: 250
                            },
                            {
                                field: "harga_beli",
                                title: "Harga Beli",
                                template: "<div class='customClass'> #= (harga_beli == null) ? ' ' : kendo.toString(harga_beli, '') # </div>",
                                width: 250
                            },
                            {
                                field: "harga_jual",
                                title: "Harga Jual",
                                template: "<div class='customClass'> #= (harga_jual == null) ? ' ' : kendo.toString(harga_jual, '') # </div>",
                                width: 250
                            }
                        ],
                        toolbar: kendo.template($("#template_toolbar").html()),
                        dataBound: function(e) {
                            scrollPosition = this.element.find(".k-grid-content").scrollTop();
                        },
                        dataBinding: function() {
                            this.element.find(".k-grid-content").scrollTop(scrollPosition);
                        }
                    }).data("kendoGrid");

                    o.initAfter();
                },
                initAfter: function() {
                    var o = this;
                    if (o.initAfterCalled) return;
                    o.initAfterCalled = true;

                    o.dom.$live_searchCustomer = $("#live_searchCustomer");




                    $(".modal1").kendoWindow({
                        width: "600px",
                        height: "500px",
                        title: o.data.labelJudul,
                        visible: false,
                        modal: true,
                        actions: ["Close"],
                        open: function() {
                            this.center();
                        }
                    });
                }
            };
            $(function() {
                AppD.init();
            });
        </script>

        <script type="text/x-kendo-template" id="template_toolbar">
            <div class="toolbar">
                <div class="col-sm-6 padding-5" style="padding-left: 0px;">
                
                    <button title="Add" type="button" class="k-button k-button-icontext" id="add_new" >
                        <i class="bi bi-plus"></i>
                    </button> 
                    <span style='color:grey; font-size:15px;' class="btnCheckAll " >|</span>
                    <button title="Export to Excel" type="button" class="k-button k-button-icontext" id="excel">
                        <i class="bi bi-upload"></i><span style="font-size:11px;"> &nbsp; Export</span>
                    </button>
                    

                    <div class="input-group lebar">
                        <span class="input-group-text"><i class="bi bi-search" style="color: black;"></i></span>
                        <input type="text" class="form-control" id="live_searchCustomer" placeholder="Pencarian ..." >
                    </div>
                </div>
	        </div>
        </script>

        <style>
            .k-grouping-header,
            .k-header {
                background-color: dimgrey;
            }

            .k-progressbar .k-state-selected {
                background-color: #008f11;
                border-color: #2f7700;
                position: relative;
                top: -2px;
            }

            .k-widget.k-reset.k-header.k-menu.k-menu-vertical {
                background-color: #ffffff;
            }

            .k-window-titlebar .k-state-hover {
                background-color: #2c3b41;
                border: 0px;
                padding: 0px;
            }

            .k-grid .k-grouping-header {
                color: rgb(7 7 7 / 50%);
                background: #fff;
            }

            .k-grid .k-header .k-button {
                background-color: dimgrey;
                border-color: dimgrey;
            }

            .k-grid .k-header .k-button:hover {
                background-color: #1e282c;
                border-color: #1e282c;
            }

            .toolbarSetting {
                position: absolute;
                right: 0;
                left: auto;
                margin: 38px 0 0;
                min-width: 100px;
                background-color: #2c3b41;
            }

            .dropdown-menu li {
                color: #000;
            }

            .k-window-titlebar .k-window-action {
                width: 25px;
            }

            .k-window-titlebar .k-state-hover {
                background-color: #2c3b41;
                border: 0px;
                padding: 0px;
            }

            .k-progressbar .k-state-selected {
                background-color: #008f11;
                border-color: #2f7700;
                position: relative;
                top: -2px;
            }

            .k-progressbar {
                border-color: #008f11;
            }

            .k-grid-Delete,
            .k-grid-Update,
            .k-grid-Select,
            .k-grid-Duplikat {
                padding: 5px;
            }

            .k-multicheck-wrap .k-item {
                line-height: 20px;
            }

            .k-grid td {
                padding: 6px 1.286em;
            }

            @media (max-width: 767px) {
                .noRecords {
                    color: red;
                    padding: 80px 50px 10px 20px;
                    position: fixed;
                }
            }

            .noRecords {
                color: red;
                padding: 80px 50px 10px 20px;
                position: none;
            }

            .k-item input[type=checkbox],
            input[type=radio] {
                margin: 4px 10px 0px 5px;
            }

            .k-state-active {
                background-color: #ccc;
            }

            .k-widget .k-window {
                padding-top: 38px;
                min-width: 90px;
                min-height: 50px;
                width: 700px;
                display: block;
                top: 283.5px;
                left: 644px;
                z-index: 10003;
                opacity: 1;
                transform: scale(1);
            }

            .lebar {
                position: absolute;
                width: 250px;
                height: auto;
                margin-left: 300px;
                margin-top: -35px;
                right: -550px;
            }

            @media (max-width: 500px) {
                .lebar {
                    position: none;
                    margin-left: 100px;
                    margin-bottom: -40px;
                    margin-top: -37px;
                    right: 30px;
                }
            }

            .k-grid td[role=gridcell]:first-child {
                text-align: center;
            }


            .k-overlay {
                z-index: 99 !important;
            }

            .k-widget.k-window {
                z-index: 100 !important;
                top: 15% !important;
                left: 374.5px !important;
            }
        </style>
    </section>
</main>