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
                          <?= form_open_multipart('product/addProduct'); ?>
                            <div class="form-row">
                              <div class="form-group">
                              <input type="text" name="created" hidden>
                              </div>
                              <div class="form-group col-md-6">
                                <label>Kode Barang</label>
                                <input type="text" name="kode_barang" class="form-control" placeholder="Kode Barang" value="<?= set_value('kode_barang', $kode_produk); ?>" readonly required>
                                <?= form_error('kode_barang', '<small class="text-danger pl-3">', '</small>'); ?>
                              </div>
                               <div class="form-group col-md-6">
                                <label for="kategori"><strong>kategori</strong></label>
                                  <select class="form-control" name="kategori" id="kategori" required="yes">
                                    <option value="">-- Pilih Kategori --</option>
                                    <option value="jacket">Jacket</option>
                                    <option value="shirt">Shirt</option>
                                    <option value="tshirt">Tshirt</option>
                                    <option value="bottom">Bottom</option>
                                    <option value="ladies">All Ladies</option>
                                    <option value="men">All Men</option>
                                    <option value="lainnya">Lainnya</option>
                                  </select>        
                              </div>
                              <div class="form-group col-md-12">
                                <label>Product Name</label>
                                <input type="text" name="nama" class="form-control" placeholder="Product name" value="<?= set_value('nama'); ?>">
                                <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                              </div>
                              <div class="form-group col-md-12 text-center">
                                <label>Stock Size</label>
                              </div>
                                <div class="form-group col-md-2" >
                                  <label class="ml-4">All Size</label>
                                    <input type="text" name="size[]" value="all_size" class="form-control" hidden>
                                    <input type="number" name="stock[]" class="form-control">
                                </div>
                                <div class="form-group col-md-2" >
                                  <label class="ml-4">S</label>
                                    <input type="text" name="size[]" value="s" class="form-control" hidden>
                                    <input type="number" name="stock[]" class="form-control">
                                </div>
                                <div class="form-group col-md-2" >
                                  <label class="ml-4">M</label>
                                    <input type="text" name="size[]" value="m" class="form-control" hidden>
                                    <input type="number" name="stock[]" class="form-control">
                                </div>
                                <div class="form-group col-md-2" >
                                  <label class="ml-4">L</label>
                                    <input type="text" name="size[]" value="l" class="form-control" hidden>
                                    <input type="number" name="stock[]" class="form-control">
                                </div>
                                <div class="form-group col-md-2" >
                                  <label class="ml-4">XL</label>
                                    <input type="text" name="size[]" value="xl" class="form-control" hidden>
                                    <input type="number" name="stock[]" class="form-control">
                                </div>
                                <div class="form-group col-md-2" >
                                  <label class="ml-4">XXL</label>
                                    <input type="text" name="size[]" value="xxl" class="form-control" hidden>
                                    <input type="number" name="stock[]" class="form-control">
                                </div>
                              <div class="form-group col-md-6">
                                <label for="image"><strong>Product Picture</strong></label>
                                  <div class="custom-file">
                                    <input type="file" name="image" class="form-control">
                                    <small class="text-primary pl-3"><em>Upload file with Extension : Png/Jpg/Jpeg, Max:2MB</em></small>
                                  </div>
                                </div>
                                <div class="form-group col-md-6">
                                <label>Harga</label>
                                <input type="text" name="harga" class="form-control" placeholder="ex : 159000" value="<?= set_value('harga'); ?>">
                                <?= form_error('harga', '<small class="text-danger pl-3">', '</small>'); ?>
                              </div>
                              <div class="form-group col-md-12">
                                <label>Warna</label>
                                <input type="text" name="warna" class="form-control" placeholder="warna" value="<?= set_value('warna'); ?>">
                                <?= form_error('warna', '<small class="text-danger pl-3">', '</small>'); ?>
                              </div>
                             <div class="form-group col-md-12">
                                <label for="deskripsi"><strong>Description</strong></label>
                                <textarea class="form-control deskripsi" name="deskripsi" value="<?= set_value('deskripsi'); ?>" style="height: 250px;" placeholder="Masukkan deskripsi product" ></textarea>
                                <?= form_error('deskripsi', '<small class="text-danger pl-3">', '</small>'); ?>
                              </div>
                              <div class="form-group col-md-4">
                                <button type="submit" class="btn btn-primary"><i class="far fa-paper-plane"></i> Add Product</button>
                                <a class="btn btn-warning" href="<?= base_url('product'); ?>" role="button"><i class="fas fa-undo"></i> Back</a>
                              </div>
                            </div>
                          </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>