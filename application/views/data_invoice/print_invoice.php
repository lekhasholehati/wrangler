<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Print Invoice</title>
        <link rel="stylesheet" href="<?=base_url()?>_assets/plugins/fontawesome-free/css/all.min.css">
        <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <link rel="stylesheet" href="<?=base_url()?>_assets/dist/css/adminlte.min.css">
        <link rel="stylesheet" href="<?=base_url()?>_assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    </head>
    <body>
        <div class="content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="card">
                            <h2 class="m-0 text-dark text-center"><?=$title?></h2>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="<?=base_url()?>_assets/plugins/jquery/jquery.min.js"></script>
        <script src="<?=base_url()?>_assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?=base_url()?>_assets/plugins/datatables/jquery.dataTables.js"></script>
        <script src="<?=base_url()?>_assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
        <script src="<?=base_url()?>_assets/dist/js/adminlte.js"></script>
        <script src="<?= base_url(); ?>_assets/swal/sweetalert2.all.min.js"></script>
        <script src="<?=base_url()?>_assets/dist/js/demo.js"></script>
        <script src="<?= base_url('_assets/plugins/tinymce/tinymce.min.js') ?>"></script>
        <script>window.print()</script>
    </body>
</html>
