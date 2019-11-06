<div class="content-wrapper">
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
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg">
                    <div class="card">
                        <div class="card-body">
                          <a href="<?=base_url()?>order/print_order" type="button" class="btn btn-primary btn-sm float-right mb-2" target="_blank"><i class="fas fa-print"></i> Print Laporan </a>
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
                                  <th>No Resi</th>
                                  <th>Action</th>
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
                                  <td>
                                    <a href="<?= base_url(); ?>order/detailOrder/<?= $d['id_order']; ?>" class="btn btn-xs btn-success"><i class="fas fa-eye"></i></a>
                                    <!-- <a href="<?= base_url(); ?>order/deleteResi/<?= $d['id_order']; ?>" class="btn btn-xs btn-danger tombol-hapus"><i class="fas fa-trash"></i></a> -->
                                    <!-- <?=$button_print?> -->
                                    <?php $get_data_resi = $this->db->get_where('tbl_resi', ['kode_order' => $d['kode_order']])->num_rows()?>
                                    <?php if ($get_data_resi > 0) : ?>
                                      <button type="button" class="btn btn-warning btn-xs" disabled>Input Resi</button>
                                    <?php else : ?>
                                      <a href="javascript:void(0)" data-email="<?=$d['email']?>" data-kode_order="<?=$d['kode_order']?>" class="btn btn-xs btn-warning input_resi show_input_resi" data-toggle="modal">Input Resi</a>
                                    <?php endif;?>
                                  </td>
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
</div>


<!-- Modal -->
<div class="modal fade" id="modal_input_resi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Input Resi Pengiriman</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?=form_open('order/resi'); ?>
      <div class="modal-body">
        <input type="hidden" name="kode_order" id="input_resi_kode_order">
        <input type="hidden" id="input_resi_email" name="email">
        <input type="hidden" value="jne" name="jasa_kirim">
        <div class="form-group">
          <label>Jasa Kirim</label>
          <select class="form-control" disabled required>
            <option value="jne" selected> JNE </option>
          </select>
        </div>
        <div class="form-group">
          <label>No Resi</label>
          <input type="text" name="no_resi" class="form-control" maxlength="25">
        </div>
        <div class="form-group">
          <label>Dikirim Pada</label>
          <input type="date" name="tgl_kirim" class="form-control">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
      <?=form_close()?>
    </div>
  </div>
</div>