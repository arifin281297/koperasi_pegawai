    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar" style="background-color: dimgrey;">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link" href="<?= urlencode(base64_encode(site_url('dashboard'))) ?>" style="background-color: dimgrey; color: white;">
                    <i class="bi bi-grid" style="color: white;"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <?php if ($this->session->userdata('level') == 1) { ?>
                <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#components" data-bs-toggle="collapse" href="#" style="color: white; background-color: dimgrey;">
                        <i class="bi bi-app-indicator" style="color: white;"></i><span>Customer</span><i class="bi bi-chevron-down ms-auto" style="color: white;"></i>
                    </a>
                    <ul id="components" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                        <li>
                            <a href="<?= urlencode(base64_encode(site_url('Customers'))) ?>" style="color: white;">
                                <i class="bi bi-circle"></i><span>Data Customer</span>
                            </a>
                        </li>
                    </ul>
                </li>
            <?php } ?>
            <li class="nav-item">
                <a class="nav-link" href="<?= urlencode(base64_encode(site_url('Item'))) ?>" style="background-color: dimgrey; color: white;">
                    <i class="bi bi-bag-plus" style="color: white;"></i>
                    <span>Item</span>
                </a>
            </li><!-- End Dashboard Nav -->
            <li class="nav-item">
                <a class="nav-link" href="<?= urlencode(base64_encode(site_url('Identitas'))) ?>" style="background-color: dimgrey; color: white;">
                    <i class="bi bi-card-checklist" style="color: white;"></i>
                    <span>Identitas</span>
                </a>
            </li><!-- End Dashboard Nav -->


            <li>
                <hr class="dropdown-divider">
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="<?= urlencode(base64_encode(site_url('auth/logout'))) ?>" style="background-color: dimgrey;">
                    <i class="bi bi-box-arrow-right" style="color: white;"></i>
                    <span style="color: white;">Sign-Out</span>
                </a>
            </li><!-- End Blank Page Nav -->

        </ul>

    </aside><!-- End Sidebar-->