<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Administrator</title>
        <link rel="shortcut icon" href="<?=base_url()?>_assets/img/logo_wrangler.png" type="image/x-icon">
        <link rel="stylesheet" href="<?=base_url()?>_assets/plugins/fontawesome-free/css/all.min.css">
        <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <link rel="stylesheet" href="<?=base_url()?>_assets/dist/css/adminlte.min.css">
        <link rel="stylesheet" href="<?=base_url()?>_assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    </head>
    <body class="hold-transition sidebar-mini">
        <div class="wrapper">
            <?php $this->load->view($navbar)?>
            <?php $this->load->view($sidebar)?>
            <?php $this->load->view($footer)?>
        </div>

        <script src="<?=base_url()?>_assets/plugins/jquery/jquery.min.js"></script>
        <script src="<?=base_url()?>_assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?=base_url()?>_assets/plugins/datatables/jquery.dataTables.js"></script>
        <script src="<?=base_url()?>_assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
        <script src="<?=base_url()?>_assets/dist/js/adminlte.js"></script>
        <script src="<?= base_url(); ?>_assets/swal/sweetalert2.all.min.js"></script>

        <!-- <script src="<?=base_url()?>_assets/plugins/chart.js/Chart.min.js"></script> -->
        <script src="<?=base_url()?>_assets/dist/js/demo.js"></script>
        <script src="<?= base_url('_assets/plugins/tinymce/tinymce.min.js') ?>"></script>
        <script src="<?= base_url('_assets/plugins/dataTables/datatables.min.js') ?>"></script>
        <!-- <script src="<?=base_url()?>_assets/dist/js/pages/dashboard3.js"></script> -->
        <script>
            $(document).ready(function(){ 
                $('.modal_edit_admin').on('click', function() {
                    $('#edit_admin').modal('show');
                        kode_admin = $(this).data('kode_admin');
                        nama_admin = $(this).data('nama_admin');
                        username   = $(this).data('username');

                        $('#edit_kode_admin').val(kode_admin);
                        $('#edit_nama_admin').val(nama_admin);
                        $('#edit_username').val(username);
                });

                $('.input_resi').on('click', function(){
                    $('#modal_input_resi').modal('show');

                    var $this = $(this);
                        email = $this.data('email');
                        kode_order = $this.data('kode_order');
                        console.log(email)

                    $('#input_resi_kode_order').val(kode_order);
                    $('#input_resi_email').val(email);
                });

                $('#data_tables_show').DataTable();
                tinymce.init({
                    selector:'.deskripsi',
                    theme: 'modern',
                    height: 200
                });
            });

            const flashdata = $('.flash-data').data('flashdata');
            if(flashdata){
                Swal.fire({
                    title: 'Data',
                    text: flashdata,
                    type: 'success'
                });
            }

            $('.tombol-hapus').on('click', function(e){

                e.preventDefault();
                const href = $(this).attr('href');

                Swal.fire({
                    title: 'Apakah anda yakin',
                    text: "Data akan dihapus",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmBttonText: 'Hapus Data!'
                }).then((result) => {
                    if(result.value) {
                        document.location.href = href;
                    }
                })
            });
        </script>
    </body>
</html>
