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
                                <th>Nama Penerima</th>
                                <th><?=$data['nama_penerima'];?></th>
                            </tr>
                            <tr>
                                <th>Pembayaran Dari</th>
                                <th><?php echo $retVal = ($data['dari_rekening'] == NULL ) ? '' : $data['dari_rekening'] ;?></th>
                            </tr>
                            <tr>
                                <th>Ke Rekening</th>
                                <th><?php echo $retVal = ($data['ke_rekening'] == NULL ) ? '' : $data['ke_rekening'] ;?></th>
                            </tr>
                            <tr>
                                <th>Foto</th>
                                <td>
                                    <?php $foto = ($data['file'] == NULL) ? 'default.jpg' : $data['file'] ;?>
                                    <img src="<?=base_url()?>_assets/img/bukti_transfer/<?=$foto?>" alt="foto_bukti_transfer" class="img-fluid">
                                </td>
                            </tr>
                        </table>
                        <a href="<?=base_url()?>invoice" class="btn btn-md btn-warning ml-2"> Back</a>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>