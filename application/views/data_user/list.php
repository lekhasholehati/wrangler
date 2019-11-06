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
                        <div class="card-body">
                          <div class="table-responsive">
                            <table class="table table-hover" id="data_tables_show" >
                              <thead>
                                <tr class="text-center">
                                  <th>#</th>
                                  <th>Email</th>
                                  <th>Name</th>
                                  <th>Alamat</th>
                                  <th>No Hp</th>
                                  <th>Image</th>
                                </tr>
                              </thead>
                              <tbody>
                              <?php $i = 1; foreach ($data as $d) : ?>
                                <tr class="text-center">
                                  <th scope="row"><?= $i; ?></th>
                                  <td><?= $d['email']; ?></td>
                                  <td><?= $d['nama']; ?></td>
                                  <td><?= $d['alamat']; ?></td>
                                  <td><?= $d['no_hp']; ?></td>
                                  <td><img src="<?=base_url()?>_assets/img/foto_profile/<?=$d['image']?>" style="width:45%; height:auto" alt="foto_profile.png" class="img-fluid img-square"></td>
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