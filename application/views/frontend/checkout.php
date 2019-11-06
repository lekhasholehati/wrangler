<div class="sn-breadcrumb-area bg-breadcrumb-1 section-padding-sm" data-white-overlay="7">
    <div class="container">
        <div class="sf-breadcrumb">
            <ul>
                <li><a href="index.html">Home</a></li>
                <li>Checkout</li>
            </ul>
        </div>
    </div>
</div>

<main class="page-content">
    <div class="checkout-area bg-white section-padding-lg">
        <div class="container">
            <div class="billing-info">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="order-infobox">
                            <h3 class="small-title">YOUR COST SHIPPING</h3>
                            <label>Shipping Address</label>
                            <?php $data_provinsi = get_provinsi(); ?>
                                <!-- <?php echo json_encode($data_provinsi)?> -->
                                <?=form_open('user/submit_checkout')?>
                            <select name="shipping_address" class="form-control" id="shipping_address" required>
                                <option>-- SELECT SHIPPING ADDRESS --</option>
                                <?php foreach($data_provinsi as $provinsi) : ?>
                                <option value="<?= $provinsi['city_id'] ?>"> <?=$provinsi['province']." - ".$provinsi['city_name']."(".$provinsi['type'].")"?></option>
                                <?php endforeach;?>
                            </select>
                            <label for="">Expedisi</label>
                            <select name="expedisi" class="form-control" disabled>
                                <option value="jne"> JNE </option>
                            </select>
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control" required>
                            <label for="">No Hp</label>
                            <input type="text" name="no_hp" class="form-control" required>
                            <label for="">Complete Address</label>
                            <textarea name="alamat" cols="30" rows="3" style="resize:none" required></textarea>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="order-infobox">
                            <h3 class="small-title">YOUR ORDER</h3>
                            <div class="checkout-table table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="text-left">PRODUCT</th>
                                            <th class="text-right">TOTAL</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <input type="hidden" name="provinsi" id="input_provinsi">
                                        <input type="hidden" name="kota" id="input_kota">
                                        <input type="hidden" name="type" id="input_type">
                                        <?php $total = 0; foreach($data_checkout as $checkout) : ?>
                                            <input type="hidden" name="id_cart[]" value="<?=$checkout['id_cart']?>">
                                            <input type="hidden" name="kode_barang[]" value="<?=$checkout['kode_barang']?>">
                                            <tr>
                                                <td class="text-left"><?=$checkout['nama']?> <span>× <?=$checkout['qty']?></span></td>
                                                <td class="text-right">Rp. <?= $checkout['harga'] * $checkout['qty']?></td>
                                            </tr>
                                            <?php $total = $total + $checkout['harga'] * $checkout['qty'] ; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th class="text-left">CART SUBTOTAL</th>
                                            <td class="text-right">Rp. <span id="subtotal"><?=$total?></span></td>
                                        </tr>
                                        <tr>
                                            <th class="text-left">SHIPPING</th>
                                            <td class="text-right" id="view_cost"></td>
                                            <input type="hidden" name="input_cost" id="input_cost">
                                        </tr>
                                        <tr>
                                            <th class="text-left">ESTIMATE</th>
                                            <td class="text-right" id="view_etd"></td>
                                            <input type="hidden" name="input_etd" id="input_etd">
                                        </tr>
                                        <tr class="total-price">
                                            <th class="text-left">ORDER TOTAL</th>
                                            <td class="text-right" id="total_checkout"></td>
                                            <input type="hidden" name="input_total_checkout" id="input_total_checkout">
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="payment-method">
                                <div class="check-payment">
                                    <h4 class="text-left"> TRANSFER TO BCA : 762384617 a/n WRANGLER</h4>
                                </div>
                            </div>
                            <button class="sf-button sf-button-fullwidth mt-30" type="submit" disabled id="process">
                                <span>Proceed</span>
                            </button>
                                <?=form_close();?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>