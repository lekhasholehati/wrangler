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
                                  <th>Tanggal Order</th>
                                  <th><?php $timestamp = strtotime($data['date_order']); echo date('d/m/Y', $timestamp);?>
                                  </th>
                              </tr>
                              <tr>
                                  <th>Kode Order</th>
                                  <th><?=$data['kode'];?></th>
                              </tr>
                              <tr>
                                  <th>No resi</th>
                                  <th><?=$data['no_resi'];?></th>
                              </tr>
                              <tr>
                                  <th>Tanggal Kirim</th>
                                  <th><?=$data['tgl_kirim'];?></th>
                              </tr>
                              <tr>
                                  <th>Nama Penerima</th>
                                  <th><?=$data['nama_penerima'];?></th>
                              </tr>
                              <tr>
                                <th>No Hp</th>
                                <th><?=$data['no_hp'];?></th>
                              </tr>
                              <tr>
                                <th>Ongkir</th>
                                <th><?=$data['ongkos_kirim'];?></th>
                              </tr>
                              <tr>
                                <th>Total Bayar</th>
                                <th><?=$data['jumlah_bayar'];?></th>
                              </tr>
                              <tr>
                                <th>Transfer</th>
                                <th><?=$data['dari_rekening'];?></th>
                                <?php if ($data['keterangan'] == 0) {
                                  $keterangan = "Belum Ter Verifikasi";
                                } else {
                                  $keterangan = "Ter Verifikasi";
                                }?>
                              </tr>
                              <tr>
                                <th>Status</th>
                                <th><?=$keterangan?> </th>
                              </tr>
                              <tr>
                                <th>Alamat Pengiriman</th>
                                <th><?=$data['alamat_kirim'];?></th>
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
                            <a href="<?=base_url()?>order" class="btn btn-warning">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>