<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?=base_url()?>_assets/img/foto_profile/<?=$this->session->userdata('foto')?>" class="img-circle img-fluid elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="javascript:void(0)" class="d-block"><?=$this->session->userdata('nama_admin')?></a>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="<?=base_url()?>page" class="nav-link <?php echo $retVal = ($active == 'dashboard') ? 'active' : '' ;?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p> Dashboard </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?=base_url()?>page/administrator" class="nav-link <?php echo $retVal = ($active == 'admin') ? 'active' : '' ;?>">
                        <i class="nav-icon fas fa-user"></i>
                        <p> Administrator </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?=base_url()?>product" class="nav-link <?php echo $retVal = ($active == 'product') ? 'active' : '' ;?>">
                        <i class="nav-icon fas fa-poll-h"></i>
                        <p> Product Managemnet </p>
                    </a>
                </li>
                 <li class="nav-item">
                    <a href="<?=base_url()?>invoice" class="nav-link <?php echo $retVal = ($active == 'invoice') ? 'active' : '' ;?>">
                        <i class="nav-icon fas fa-book"></i>
                        <p> Data Invoice </p>
                    </a>
                </li>

                 <li class="nav-item">
                    <a href="<?=base_url()?>order" class="nav-link <?php echo $retVal = ($active == 'order') ? 'active' : '' ;?>">
                        <i class="nav-icon fas fa-shopping-basket"></i>
                        <p> Data Order </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?=base_url()?>page/user" class="nav-link <?php echo $retVal = ($active == 'user') ? 'active' : '' ;?>">
                        <i class="nav-icon fas fa-users"></i>
                        <p> Data User </p>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a href="<?=base_url()?>auth/logout" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p> Logout </p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>

<?php $this->load->view($content)?>