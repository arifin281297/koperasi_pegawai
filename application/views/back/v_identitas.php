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


<!-- Modal -->
<form>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="width='50%'">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Data Identitas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal1">
                    <div class="form-group row">
                        <label for="nama_identitas" class="col-sm-3 col-form-label">Nama Identitas</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="nama_identitas" maxlength='50' />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="badan_hukum" class="col-sm-3 col-form-label">Badan Hukum</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="badan_hukum" maxlength='50' />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="npwp" class="col-sm-3 col-form-label">NPWP</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="npwp" maxlength='50' />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="email" maxlength='50' />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="url" class="col-sm-3 col-form-label">url</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="url" maxlength='50' />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="alamat" class="col-sm-3 col-form-label">alamat</label>
                        <div class="col-sm-9">
                        <textarea class="form-control" id="alamat" rows="3" maxlength="250"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tlp" class="col-sm-3 col-form-label">tlp</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="tlp" maxlength='50' />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fax" class="col-sm-3 col-form-label">fax</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="fax" maxlength='50' />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="rekening" class="col-sm-3 col-form-label">rekening</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="rekening" maxlength='50' />
                        </div>
                    </div>
                    <div class="form-group row" id="lampiran_form">
                        <label for="foto" class="col-sm-3 col-form-label">Images</label>
                        <div class="col-sm-9">
                            <input type="file" class="form-control" id="foto" accept="image/*" />
                            <div class="alert alert-info alert-dismissable" style="margin-bottom:0px;margin-top:1px;" id="prev_lampiran">
                                <h5 style="margin-bottom:0px; margin-top:0px;" id="nama_lampiran_file"></h5>
                            </div>
                        </div>
                    </div>
                
                    <button type="button" class="btn btn-secondary" id='btnClose' data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id='btnSave'>Save changes</button>
                </div>
            </div>
        </div>
    </div>
</form>



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
                    o.dom.inputs.$nama_identitas = $("#nama_identitas");
                    o.dom.inputs.$badan_hukum = $("#badan_hukum");
                    o.dom.inputs.$npwp = $("#npwp");
                    o.dom.inputs.$email = $("#email");
                    o.dom.inputs.$url = $("#url");
                    o.dom.inputs.$alamat = $("#alamat");
                    o.dom.inputs.$tlp = $("#tlp");
                    o.dom.inputs.$fax = $("#fax");
                    o.dom.inputs.$rekening = $("#rekening");
                    o.dom.inputs.$foto = $("#foto");

                    o.dom.$exampleModal = $("#exampleModal");
                    o.dom.$form = $("form");
                    o.dom.$grid = $("#grid");
                    o.dom.$btnRefresh = $("#btnRefresh");
                    o.dom.$btnSave = $("#btnSave");
                },
                data: {
                    id_identitas: '',
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
                                field: "nama_identitas",
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

                        if (o.dom.inputs.$foto.val() == '') {
                            $('#prev_lampiran').hide();
                        }

                        $(".modal1").data("kendoWindow").open();
                        $('body').css('padding-right', '');
                        o.data.labelJudul = 'Add Form Data Identitas';
                        $(".modal1").data("kendoWindow").setOptions({
                            title: o.data.labelJudul
                        });
                        o.fn.clear.call(o);
                        setTimeout(function() {
                            o.dom.inputs.$nama_identitas.focus();
                        }, 1000);
                    },
                    onClickBtnUpdate: function(e) {
                        var o = this;
                        var di = o.dom.$grid.data('kendoGrid').dataItem(e.target.closest('tr'));
                        o.data.id_identitas = di.id_identitas;
                        o.dom.inputs.$nama_identitas.val(di.nama_identitas);
                        o.dom.inputs.$badan_hukum.val(di.badan_hukum);
                        o.dom.inputs.$npwp.val(di.npwp);
                        o.dom.inputs.$email.val(di.email);
                        o.dom.inputs.$url.val(di.url);
                        o.dom.inputs.$alamat.val(di.alamat);
                        o.dom.inputs.$tlp.val(di.tlp);
                        o.dom.inputs.$fax.val(di.fax);
                        o.dom.inputs.$rekening.val(di.rekening);


                        if (di.foto !== di.nama_identitas) {
                            $('#prev_lampiran').show();
                            // var str = di.nama_identitas;
                            // var replaceNamaIdentitas = str.replace(/[^a-zA-Z0-9]/g, '');

                            var url = "<?= base_url() ?>public/img/identitas/" + di.foto;
                            $('#nama_lampiran_file').on('click', function(e) {
                                e.preventDefault();
                                window.open(url, 'window', 'settings');
                            });

                            $('#nama_lampiran_file').html("<a href='" + url + "' style='text-decoration: none;'>" + di.foto + "</a>");

                        } else {
                            $('#prev_lampiran').hide();
                            $('#nama_lampiran_file').text(di.foto);
                        }

                        $(".modal1").data("kendoWindow").open();
                        $('body').css('padding-right', '');
                        o.data.labelJudul = 'Update Form Data Identitas';
                        $(".modal1").data("kendoWindow").setOptions({
                            title: o.data.labelJudul
                        });
                        setTimeout(function() {
                            o.dom.inputs.$nama_identitas.focus();
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
                                url: '<?= site_url() ?>/Identitas/DEL',
                                dataType: 'text',
                                data: {
                                    id_identitas: di.id_identitas
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

                        var form_data = new FormData();
                        var image = $('#foto')[0].files[0];
                        form_data.append('foto', image);
                        form_data.append('id_identitas', data.id_identitas);
                        form_data.append('nama_identitas', data.nama_identitas);
                        form_data.append('badan_hukum', data.badan_hukum);
                        form_data.append('npwp', data.npwp);
                        form_data.append('email', data.email);
                        form_data.append('url', data.url);
                        form_data.append('alamat', data.alamat);
                        form_data.append('tlp', data.tlp);
                        form_data.append('fax', data.fax);
                        form_data.append('rekening', data.rekening);


                        if (msgs.length === 0) {
                            $.ajax({
                                method: 'post',
                                url: '<?= site_url() ?>/Identitas/INS',
                                dataType: 'text',
                                data: form_data,
                                processData: false,
                                contentType: false
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

                        data.id_identitas = o.data.id_identitas.trim();

                        data.nama_identitas = o.dom.inputs.$nama_identitas.val().trim();
                        data.badan_hukum = o.dom.inputs.$badan_hukum.val().trim();
                        data.npwp = o.dom.inputs.$npwp.val().trim();
                        data.email = o.dom.inputs.$email.val().trim();
                        data.url = o.dom.inputs.$url.val().trim();
                        data.alamat = o.dom.inputs.$alamat.val().trim();
                        data.tlp = o.dom.inputs.$tlp.val().trim();
                        data.fax = o.dom.inputs.$fax.val().trim();
                        data.rekening = o.dom.inputs.$rekening.val().trim();

                        return data;
                    },
                    validate: function(data) {
                        var msgs = [];
                        if (data.nama_identitas === '') msgs.push('Isi Nama');
                        if (data.badan_hukum === '') msgs.push('Isi badan_hukum');
                        if (data.npwp === '') msgs.push('Isi NPWP')
                        if (data.email === '') msgs.push('Isi Email');
                        
                        return msgs;
                    },
                    clear: function() {
                        var o = this;

                        o.data.id_identitas = '';

                        o.dom.inputs.$nama_identitas.val('');
                        o.dom.inputs.$badan_hukum.val('');
                        o.dom.inputs.$npwp.val('');
                        o.dom.inputs.$email.val('');
                        o.dom.inputs.$url.val('');
                        o.dom.inputs.$alamat.val('');
                        o.dom.inputs.$tlp.val('');
                        o.dom.inputs.$fax.val('');
                        o.dom.inputs.$rekening.val('');
                        o.dom.inputs.$foto.val('');
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
                            fileName: "Data_Identitas.xlsx",
                            allPages: true,
                            filterable: true
                        },
                        dataSource: {
                            transport: {
                                read: function(options) {
                                    $.ajax({
                                        method: 'post',
                                        url: '<?= site_url() ?>Identitas/INQ',
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
                                    id: "id_identitas",
                                    fields: {
                                        id_identitas: {
                                            type: "string",
                                            editable: false
                                        },
                                        nama_identitas: {
                                            type: "string",
                                            editable: false
                                        },
                                        badan_hukum: {
                                            type: "string",
                                            editable: false
                                        },
                                        npwp: {
                                            type: "string",
                                            editable: false
                                        },
                                        email: {
                                            type: "string",
                                            editable: false
                                        },
                                        url: {
                                            type: "string",
                                            editable: false
                                        },
                                        alamat: {
                                            type: "string",
                                            editable: false
                                        },
                                        tlp: {
                                            type: "string",
                                            editable: false
                                        },
                                        fax: {
                                            type: "string",
                                            editable: false
                                        },
                                        rekening: {
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
                                template: '<input type="checkbox" class="id_identitas" />',
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
                                field: "id_identitas",
                                title: "id",
                                template: "<div class='customClass'> #= (id_identitas == null) ? ' ' : kendo.toString(id_identitas, '') # </div>",
                                width: 40,
                                hidden: true
                            },
                            {
                                field: "nama_identitas",
                                title: "Nama Identitas",
                                template: "<div class='customClass'> #= (nama_identitas == null) ? ' ' : kendo.toString(nama_identitas, '') # </div>",
                                width: 250
                            },
                            {
                                field: "badan_hukum",
                                title: "Badan Hukum",
                                template: "<div class='customClass'> #= (badan_hukum == null) ? ' ' : kendo.toString(badan_hukum, '') # </div>",
                                width: 250
                            },
                            {
                                field: "npwp",
                                title: "NPWP",
                                template: "<div class='customClass'> #= (npwp == null) ? ' ' : kendo.toString(npwp, '') # </div>",
                                width: 250
                            },
                            {
                                field: "email",
                                title: "Email",
                                template: "<div class='customClass'> #= (email == null) ? ' ' : kendo.toString(email, '') # </div>",
                                width: 250
                            },
                            {
                                field: "url",
                                title: "url",
                                template: "<div class='customClass'> #= (url == null) ? ' ' : kendo.toString(url, '') # </div>",
                                width: 250
                            },
                            {
                                field: "alamat",
                                title: "alamat",
                                template: "<div class='customClass'> #= (alamat == null) ? ' ' : kendo.toString(alamat, '') # </div>",
                                width: 250
                            },
                            {
                                field: "tlp",
                                title: "tlp",
                                template: "<div class='customClass'> #= (tlp == null) ? ' ' : kendo.toString(tlp, '') # </div>",
                                width: 250
                            },
                            {
                                field: "fax",
                                title: "fax",
                                template: "<div class='customClass'> #= (fax == null) ? ' ' : kendo.toString(fax, '') # </div>",
                                width: 250
                            },
                            {
                                field: "rekening",
                                title: "rekening",
                                template: "<div class='customClass'> #= (rekening == null) ? ' ' : kendo.toString(rekening, '') # </div>",
                                width: 250
                            },
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