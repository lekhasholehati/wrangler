<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-lg">
                    <h1 class="m-0 text-dark text-center"><?= $title;?></h1>
                </div>
            </div>
        </div>
    </div>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('simpan'); ?>"></div>
    <div class="flash-error" data-flasherror="<?= $this->session->flashdata('gagal'); ?>"></div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                              <table class="table table-hover" id="data_tables_show">
                                <thead>
                                  <tr class="text-center">
                                    <th>#</th>
                                    <th>Kode Order</th>
                                    <th>Order</th>
                                    <th>Date</th>
                                    <th>Total Order</th>
                                    <th>Status Pembayaran</th>
                                    <th>Verifikasi Pembayaran</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php $i = 1; foreach ($data as $d) : ?>
                                    <tr class="text-center">
                                      <th scope="row"><?= $i; ?></th>
                                      <td><?= $d['kode']; ?></td>
                                      <td>
                                        <ul>
                                          <?php $convert_data = json_decode($d['id_cart'], TRUE); ?>
                                            <?php foreach($convert_data as $id_cart) : ?>
                                              <li><?= ucwords(getName(getKodeBarang($id_cart)))?></li>
                                            <?php endforeach;?>
                                        </ul>
                                      </td>
                                      <td><?=$d['date_order']?></td>
                                      <td>Rp. <?=$d['total_harga']?></td>
                                      <td>
                                        <?php if ($d['status_pembayaran'] == NULL ) {
                                            echo 'Belum Transfer';
                                        } else if($d['status_pembayaran'] == "Berhasil") {
                                            echo $d['status_pembayaran'];
                                        } else {
                                            echo "Sudah Transfer";
                                        }?>
                                      </td>
                                      <td>
                                        <?php if ($d['keterangan'] != 0) : ?>
                                          <button class="btn btn-warning mt-1 btn-sm"><i class="fas fa-check"> Ter Verifikasi </i></button>
                                        <?php elseif($d['status_pembayaran'] == "Sudah Transfer") : ?>
                                          <a href="<?= base_url(); ?>invoice/verifikasi/<?= $d['kode']; ?>" class="btn btn-sm btn-info mt-1"><i class="fas fa-check"> Verifikasi </i></a>
                                        <?php else : ?>
                                          <button class="btn btn-primary mt-1 btn-sm" disabled><i class="fas fa-check"> Verifikasi </i></button>
                                        <?php endif;?>
                                      </td>
                                      <td>
                                        <a href="<?= base_url(); ?>invoice/detailInvoice/<?= $d['id_order']; ?>" class="btn btn-sm btn-primary mt-1"><i class="fas fa-print"> Invoice</i></a>
                                        <a href="<?= base_url(); ?>invoice/detailPembayaran/<?= $d['id_order']; ?>" class="btn btn-sm btn-success mt-1"><i class="fas fa-eye"> Pembayaran</i></a>
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