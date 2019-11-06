<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-lg">
                    <h1 class="m-0 text-dark text-center"><?= $title; ?></h1>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card">
                      <div class="card-body">
                        <table class="table table-borderless">
                            <tr>
                              <th class="text-center">Tanggal Order</th>
                              <th class="text-center"><?php $timestamp = strtotime($data['date_order']); echo date('d/m/Y', $timestamp);?>
                              </th>
                            </tr>
                            <tr>
                              <th class="text-center">Kode Order</th>
                              <th class="text-center"><?=$data['kode'];?></th>
                            </tr>
                            <tr>
                                <th class="text-center">Nama Penerima</th>
                                <th class="text-center"><?=$data['nama_penerima'];?></th>
                            </tr>
                            <tr>
                                <th class="text-center">No Hp</th>
                                <th class="text-center"><?=$data['no_hp'];?></th>
                            </tr>
                            <tr>
                                <th class="text-center">Alamat Kirim</th>
                                <th class="text-center"><?=$data['alamat_kirim'];?></th>
                            </tr>
                            <tr>
                                <th class="text-center">Ongkos Kirim</th>
                                <th class="text-center"><?=$data['ongkos_kirim'];?></th>
                            </tr>
                        </table>
                        <table class="table table-border">
                            <tr>
                                <th class="text-center">Qty</th>
                                <th class="text-center">Nama</th>
                                <th class="text-center">Kategori</th>
                                <th class="text-center">Harga</th>
                                <th class="text-center">Warna</th>
                                <th class="text-center">Deskripsi</th>
                                <th class="text-center">Foto</th>
                            </tr>
                            <?php $id_cart = json_decode($data['id_cart']) ;?>
                            <?php foreach ($id_cart as $cart) : ?>
                                <?php $kode_barang = getKodeBarang($cart) ; ?>
                                <?php $get_data = $this->db->join('tbl_cart', 'tbl_cart.kode_barang = tbl_product.kode_barang')->get_where('tbl_product', ['tbl_product.kode_barang' => $kode_barang])->row_array(); ?>
                                <tr>
                                    <td class="text-center"><?=$get_data['qty']?></td>
                                    <td class="text-center"><?=ucwords($get_data['nama'])?></td>
                                    <td class="text-center"><?=ucwords($get_data['kategori'])?></td>
                                    <td class="text-center"><?="Rp. ".$get_data['harga']?></td>
                                    <td class="text-center"><?=ucwords($get_data['warna'])?></td>
                                    <td class="text-center"><?=ucwords($get_data['deskripsi'])?></td>
                                    <td class="text-center"><img src="<?=base_url()?>_assets/img/product/<?=$get_data['image']?>" alt="image" class="img-fluid img-circle" style="height:40px;"></td>
                                </tr>
                            <?php endforeach;?>
                        </table>
                        <a href="<?=base_url()?>invoice" class="btn btn-md btn-warning ml-2"> Back</a>
                        <a href="<?=base_url()?>invoice/print_invoice/<?=$data['id_order']?>" target="_blank" class="btn btn-md btn-primary">Print</a>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>