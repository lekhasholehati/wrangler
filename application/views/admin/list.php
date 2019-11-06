    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Administrator</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title mr-4">Form Tambah Administrator</h3>
                            </div>

                            <div class="card-body">
                                <?= form_open_multipart('page/administrator_tambah')?>
                                    <?= form_label('Kode Admin', 'kode_admin'); ?>
                                    <?= form_input('kode_admin', $kode_admin, 'id="kode_admin" class="form-control" required readonly'); ?>
                                    <?= form_label('Nama Admin', 'nama_admin'); ?>
                                    <?= form_input('nama_admin', '', 'id="nama_admin" class="form-control" placeholder="Masukan Nama Admin" required'); ?>
                                    <?= form_label('Username', 'username'); ?>
                                    <?= form_input('username', '', 'id="username" class="form-control" placeholder="Masukan Username" required'); ?>
                                    <?= form_label('Password', 'password'); ?>
                                    <?= form_password('password', '', 'id="password" class="form-control" placeholder="Masukan Password" required'); ?>
                                    
                                    <div class="input-group mt-4">
                                        <div class="custom-file">
                                            <?= form_upload('foto', '', 'class="custom-file-input"'); ?>
                                            <?= form_label('Choose File', 'foto', 'class="custom-file-label"'); ?>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-sm mt-4 float-right"><i class="nav-icons fas fa-paper-plane"></i> Simpan</button>
                                <?= form_close() ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title mr-4">List Administrator</h3>
                            </div>

                            <div class="card-body">
                                <div class="table-responsive{-sm|-md|-lg|-xl}">
                                    <table id="example1" class="table table-bordered table-striped table-sm">
                                        <thead>
                                            <tr>
                                                <th class="text-center">No</th>
                                                <th class="text-center">Kode Admin</th>
                                                <th class="text-center">Nama Admin</th>
                                                <th class="text-center">Username</th>
                                                <th class="text-center">Foto</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1; foreach($administrator as $admin) :?>
                                                <tr>
                                                    <td class="text-center"><?= $no ?>.</td>
                                                    <td class="text-center"><?= $admin['kode_admin'] ?></td>
                                                    <td class="text-center"><?= $admin['nama_admin'] ?></td>
                                                    <td class="text-center"><?= $admin['username'] ?></td>
                                                    <td class="text-center">
                                                        <img src="<?=base_url()?>_assets/img/foto_profile/<?= $admin['foto'] ?>" alt="foto.png" class="img-fluid img-circle" style="height:8%; width:65px;"></td>
                                                    <td class="text-center"> 
                                                        <a href="javascript:void(0)" class="btn btn-warning btn-sm modal_edit_admin" data-toggle="modal" data-kode_admin="<?= $admin['kode_admin'] ?>" data-nama_admin="<?= $admin['nama_admin'] ?>" data-username="<?= $admin['username'] ?>"> <i class="nav-icon fas fa-edit"></i> Edit </a>
                                                        <a href="<?=base_url()?>page/administrator_hapus/<?= $admin['id_admin'] ?>" class="btn btn-danger btn-sm"> <i class="nav-icon fas fa-trash"></i> Hapus </a>
                                                    </td>
                                                </tr>
                                            <?php $no++; endforeach ;?>
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
    <div class="modal fade" id="edit_admin">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Admin</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <?= form_open_multipart('page/administrator_edit');?>
                <div class="modal-body">
                    <?= form_label('Kode Admin', 'edit_kode_admin'); ?>
                    <?= form_input('edit_kode_admin', '', 'id="edit_kode_admin" class="form-control" required readonly'); ?>
                    <?= form_label('Nama Admin', 'edit_nama_admin'); ?>
                    <?= form_input('edit_nama_admin', '', 'id="edit_nama_admin" class="form-control" placeholder="Masukan Nama Admin" required'); ?>
                    <?= form_label('Username', 'edit_username'); ?>
                    <?= form_input('edit_username', '', 'id="edit_username" class="form-control" placeholder="Masukan Username" required'); ?>
                    <?= form_label('Password', 'edit_password'); ?>
                    <?= form_password('edit_password', '', 'id="edit_password" class="form-control" placeholder="Masukan Password"'); ?>
                    <div class="input-group mt-4">
                        <div class="custom-file">
                            <?= form_upload('edit_foto', '', 'class="custom-file-input"'); ?>
                            <?= form_label('Choose File', 'edit_foto', 'class="custom-file-label"'); ?>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                <button type="submit" class="btn btn-primary"> <i class="nav-icons fas fa-paper-plane"></i> Simpan</button>
                </div>
            <?= form_close(); ?>
          </div>
        </div>
    </div>