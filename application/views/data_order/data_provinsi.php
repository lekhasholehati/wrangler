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
            <div class="row">
                <div class="col-lg">
                    <div class="card">
                      <?=form_open('order/cek_ongkir')?>
                        <div class="card-body">
                          <label>Dikirim Dari</label>
                          <select name="kirim_dari" class="form-control" required readonly>
                            <?php foreach($data_provinsi as $provinsi) : ?>
                              <option value="<?= $provinsi['city_id'] ?>" <?php echo $selected = ($provinsi['city_id'] == "54") ? 'selected' : '' ;?>> <?=$provinsi['city_name']?></option>
                            <?php endforeach;?>
                          </select>
                          <label>Ke Provinsi</label>
                          <select name="ke_provinsi" class="form-control" required>
                            <?php foreach($data_provinsi as $provinsi) : ?>
                              <option value="<?= $provinsi['city_id'] ?>"> <?=$provinsi['city_name']?></option>
                            <?php endforeach;?>
                          </select>
                          <label>Expedisi</label>
                          <select name="expedisi" class="form-control" readonly required>
                              <option value="jne"> JNE </option>
                          </select>
                          <button type="submit"> Send </button>
                        </div>
                      <?=form_close()?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>