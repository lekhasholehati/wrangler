<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Print Laporan</title>
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
                                <div class="table-responsive">
                                    <table class="table table-hover" id="data_tables_show" >
                                    <thead>
                                        <tr class="text-center">
                                        <th>#</th>
                                        <th>Kode order</th>
                                        <th>Date Order</th>
                                        <th>Name</th>
                                        <th>No Hp</th>
                                        <th>Shipping Address</th>
                                        <th>Total Order</th>
                                        <th>Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($data as $d) : ?>
                                        <?php 
                                        $cek_data = $this->db->get_where('tbl_resi', ['kode_order' => $d['kode_order']])->num_rows();
                                        if($cek_data > 0){
                                            $button_print = '<a href="" class="btn btn-primary btn-xs print_order"><i class="fas fa-print"></i></a>';
                                        }else{
                                            $button_print = '<button type="button" class="btn btn-primary btn-xs print_order" disabled><i class="fas fa-print"></i></button>';
                                        }
                                        ?>
                                        <tr class="text-center">
                                        <th scope="row"><?= $i; ?></th>
                                        <td><?= $d['kode_order']; ?></td>
                                        <td><?= $d['date_order']; ?></td>
                                        <td><?= $d['nama_penerima']; ?></td>
                                        <td><?= $d['no_hp']; ?></td>
                                        <td><?= $d['alamat_kirim']; ?></td>
                                        <td><?= $d['total_harga']; ?></td>
                                        <td><?= $d['status'];?></td>
                                        </tr>
                                    <?php $i++ ?>
                                    <?php endforeach; ?>
                                    </tbody>
                                    </table>
                                </div>
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
