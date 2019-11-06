<div class="sn-breadcrumb-area bg-breadcrumb-1 section-padding-sm" data-white-overlay="7">
    <div class="container">
        <div class="sf-breadcrumb">
            <ul>
                <li><a href="index.html">Home</a></li>
                <li>Confirm Payment</li>
            </ul>
        </div>
    </div>
</div>

<main class="page-content">
    <div class="checkout-area bg-white section-padding-lg">
        <div class="container">
            <div class="billing-info">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="order-infobox">
                            <h3 class="small-title">CONFIRM YOUR PAYMENT</h3>
                            <?=form_open_multipart('user/submit_payment')?>
                                <label>Kode Order</label>
                                <input type="text" name="kode_order" value="<?=$data_pembayaran['kode_order']?>" class="form-control" required readonly>
                                <label>Email</label>
                                <input type="email" name="email" value="<?=$data_pembayaran['email']?>" class="form-control" required  readonly>
                                <label for="">Total Order</label>
                                <input type="text" name="jumlah_bayar" value="<?=$data_pembayaran['jumlah_bayar']?>" class="form-control" required  readonly>
                                <label for="">Transfer To</label>
                                <input type="text" name="transfer_to" value="<?=$data_pembayaran['ke_rekening']?>" class="form-control" required  readonly>
                                <label for="">Bank</label>
                                <input type="text" name="user_bank" class="form-control" required>
                                <label for="">Rekening Number</label>
                                <input type="text" name="user_rekening" class="form-control" required>
                                <label for="">Rekening Name</label>
                                <input type="text" name="rekening_name" class="form-control" required>
                                <label for="">Upload File</label>
                                <!-- <input type="file" name="file" class="form-control" required> -->
                                <input type="file" name="files" class="form-control" required>
                                <button type="submit" class="btn btn-info btn-md mt-3 float-right"> Upload </button>
                            <?=form_close()?>
                                <a href="<?=base_url()?>user/my_account" class="btn btn-warning btn-md mt-3 float-left"> Back </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>