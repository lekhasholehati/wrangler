<div class="content-wrapper justify-content-center">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-lg">
                    <h1 class="m-0 text-dark text-center"><?= $title; ?></h1>
                    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>">
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="mb-3">
                                    <a href="<?= base_url('product/addProduct'); ?>" class="btn btn-success btn-sm"><i class="fas fa-plus-circle"></i> Add Product</a>
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-hover mt-4" id="data_tables_show">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Kode Barang</th>
                                                <th>Picture</th>
                                                <th>Product Name</th>
                                                <th>Color</th>
                                                <th>Stock</th>
                                                <th>Description</th>
                                                <th>Created</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; foreach ($data as $d) : ?>
                                                <tr>
                                                    <th scope="row"><?= $i; ?></th>
                                                    <td><?= $d['kode_barang']; ?></td>
                                                    <td>
                                                        <a href="<?= base_url('_assets/img/product/') . $d['image']; ?>" title="">
                                                        <img src="<?= base_url('_assets/img/product/') . $d['image']; ?>" class="img-thumbnail img-circle" style="height: 80px; width: 80px;">
                                                    </a>
                                                    </td>
                                                    <td><?= $d['nama']; ?></td>
                                                    <td><?= $d['warna']; ?></td>
                                                    <td>
                                                        <?php 
                                                            $CI =& get_instance();
                                                            $get_stock = $CI->db->select('size, total')->where('kode_barang', $d['kode_barang'])->get('tbl_stock')->result_array();
                                                            if ($get_stock == NULL) {
                                                                echo 'Stock Habis';
                                                            } else {
                                                                foreach($get_stock as $stock){
                                                                    echo $stock['size'].' ('.$stock['total'].')<br>';
                                                                }
                                                            }
                                                        ?>
                                                    </td>
                                                    <td class="text-justify" style="width: 200px; height:200px"><?= $d['deskripsi']; ?></td>
                                                    <td class="text-center"><?= getNameAdmin($d['created']); ?></td>
                                                    <td class="text-center">
                                                        <a href="<?= base_url(); ?>product/editProduct/<?= $d['kode_barang']; ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>              
                                                        <a href="<?= base_url(); ?>product/deleteProduct/<?= $d['kode_barang']; ?>" class="btn btn-danger btn-sm tombol-hapus"><i class="fas fa-trash-alt"></i></a>
                                                    </td>
                                                </tr>
                                            <?php $i++; endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>