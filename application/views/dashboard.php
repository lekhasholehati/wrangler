<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-info"><i class="fion ion-bag"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Product</span>
                            <span class="info-box-number"><?=$data['product']?></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-warning"><i class="fas fa-shopping-basket"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Order</span>
                            <span class="info-box-number"><?=$data['order']?></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-primary"><i class="fas fa-users"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">User</span>
                            <span class="info-box-number"><?=$data['user']?></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="alert alert-info alert-dismissible">
                        <h5>Welcome!</h5>
                            Hello <?=$this->session->userdata('nama_admin')?>, Happy Work!
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>