<div class="flash-data" data-flashdata="<?= $this->session->flashdata('simpan'); ?>">
<div class="flash-error" data-flasherror="<?= $this->session->flashdata('gagal'); ?>">
<?php if ($title == 'ALL PRODUCT') : ?>
	<div class="hero-area slider-navigation-1">
		<div class="bg-grey d-flex">
			<div class="hero-item-inner">
				<div class="hero-image">
					<img src="<?=base_url()?>_assets/img/slider.jpg" alt="hero image" class="img-fluid">
				</div>
			</div>
		</div>
		<div class="bg-grey d-flex">
			<div class="hero-item-inner">
				<div class="hero-image">
					<img src="<?=base_url()?>_assets/img/slider-2.jpg" alt="hero image" class="img-fluid">
				</div>
			</div>
		</div>
		<div class="bg-grey d-flex">
			<div class="hero-item-inner">
				<div class="hero-image">
					<img src="<?=base_url()?>_assets/img/slider-3.jpg" alt="hero image" class="img-fluid">
				</div>
			</div>
		</div>
	</div>
<?php endif;?>
	<main class="page-content">
		<div class="sf-section new-arrival-area section-padding-lg bg-white">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-6">
						<div class="section-title text-center">
							<h3><?=strtoupper($title)?></h3>
						</div>
					</div>
				</div>
				<?php if ($data_produk == NULL ) : ?>
					<h3 class="text-center">Empty</h3>
				<?php else : ?>
					<div class="row products-wrapper products-slider-active slider-navigation-1">
						<?php foreach ($data_produk as $produk) : ?>
							<div class="col-12">
								<div class="product-item">
									<div class="product-item-topside">
										<div class="product-item-images">
											<img src="<?=base_url()?>_assets/img/product/<?=$produk['image']?>" alt="product image">
										</div>
										<ul class="product-item-actions">
											<li class="trigger-add-to-cart"><a href="javascript:void(0)" class="cart" data-toggle="modal" data-kode_barang="<?=$produk['kode_barang']?>" data-nama_product="<?=$produk['nama']?>" data-harga="<?=$produk['harga']?>" data-deskripsi="<?=$produk['deskripsi']?>" data-image="<?=$produk['image']?>" data-warna="<?=$produk['warna']?>" data-kategori="<?=$produk['kategori']?>"><i class="ti ti-shopping-cart"></i></a></li>
										</ul>
									</div>
									<div class="product-item-bottomside">
										<h6><a href="product-details.html"><?=$produk['nama']?></a></h6>
										<span class="pricebox">Rp . <?=$produk['harga']?></span>
									</div>
								</div>	
							</div>
						<?php endforeach;?>
					</div>
				<?php endif;?>
			</div>
		</div>
	</main>
	<div class="quick-view-modal">
		<span class="body-overlay"></span>
		<div class="quick-view-modal-inner">
			<div class="container">
				<div class="row product-details">
					<div class="col-lg-5">
						<div class="product-details-left">
							<div class="product-details-images slider-navigation-2">
								<a href="img/product/large-size/product-image-1.jpg">
									<img src="img/product/thumbnail-size/product-image-1.jpg" alt="product image">
								</a>
								<a href="img/product/large-size/product-image-2.jpg">
									<img src="img/product/thumbnail-size/product-image-2.jpg" alt="product image">
								</a>
								<a href="img/product/large-size/product-image-3.jpg">
									<img src="img/product/thumbnail-size/product-image-3.jpg" alt="product image">
								</a>
								<a href="img/product/large-size/product-image-4.jpg">
									<img src="img/product/thumbnail-size/product-image-4.jpg" alt="product image">
								</a>
							</div>
							<div class="product-details-thumbs slider-navigation-2">										
								<img src="img/product/small-size/product-image-1.jpg" alt="product image thumb">
								<img src="img/product/small-size/product-image-2.jpg" alt="product image thumb">
								<img src="img/product/small-size/product-image-3.jpg" alt="product image thumb">
								<img src="img/product/small-size/product-image-4.jpg" alt="product image thumb">
							</div>
						</div>
					</div>
					<div class="col-lg-7">
						<div class="product-details-right">
							<h5 class="product-title">Full Body Shapewear</h5>
							
							<div class="ratting-stock-availbility">
								<div class="ratting-box">
									<span class="active"><i class="ti ti-star"></i></span>
									<span class="active"><i class="ti ti-star"></i></span>
									<span class="active"><i class="ti ti-star"></i></span>
									<span class="active"><i class="ti ti-star"></i></span>
									<span><i class="ti ti-star"></i></span>
								</div>
								<span class="stock-available">In stock</span>
							</div>
							
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla. adipiscing cursus eu, suscipit id nulla.</p>
							
							<span class="pricebox"><del>$60.00</del> $50.00</span>

							<div class="product-details-quantity">
								<div class="quantity-select">
									<input type="text" value="1">
								</div>
								<a href="#" class="sf-button sf-button-sm">
									<span>ADD TO CART</span>
								</a>
							</div>

							<div class="product-details-color">
								<span>Color :</span>
								<ul>
									<li class="red"><span></span></li>
									<li class="green checked"><span></span></li>
									<li class="blue"><span></span></li>
									<li class="purple"><span></span></li>
								</ul>
							</div>

							<div class="product-details-size">
								<span>Size :</span>
								<ul>
									<li class="checked"><span>S</span></li>
									<li><span>M</span></li>
									<li><span>L</span></li>
									<li><span>XL</span></li>
									<li><span>XXL</span></li>
								</ul>
							</div>

							<div class="product-details-categories">
								<span>Categories :</span>
								<ul>
									<li><a href="shop.html">Accessories</a></li>
									<li><a href="shop.html">Kids</a></li>
									<li><a href="shop.html">Women</a></li>
								</ul>
							</div>

							<div class="product-details-tags">
								<span>Tags :</span>
								<ul>
									<li><a href="shop.html">Electronic</a></li>
									<li><a href="shop.html">Television</a></li>
								</ul>
							</div>

							<div class="product-details-socialshare">
								<span>Share :</span>
								<ul>
									<li><a href="#"><i class="ti ti-facebook"></i></a></li>
									<li><a href="#"><i class="ti ti-twitter"></i></a></li>
									<li><a href="#"><i class="ti ti-google"></i></a></li>
									<li><a href="#"><i class="ti ti-linkedin"></i></a></li>
									<li><a href="#"><i class="ti ti-instagram"></i></a></li>
								</ul>
							</div> 
						</div>
					</div>
				</div>
			</div>
			<button class="close-quickview-modal"><i class="ti ti-close"></i></button>
		</div>
	</div>

	<div class="modal fade" id="modal_cart" tabindex="-1" role="dialog" aria-labelledby="newSubMenuModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<?=form_open('user/add_cart'); ?>
					<div class="modal-body">
						<div class="container">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
							<div class="row product-details">
								<div class="col-lg-5">
									<div class="product-details-left">
										<div class="product-details-images slider-navigation-2" id="img_product">
										</div>
									</div>
								</div>
								<div class="col-lg-7">
									<div class="product-details-right">
										<input type="hidden" name="kode_barang">
										<h5 class="product-title" id="nama_product"></h5>
										
										<p id="deskripsi"></p>
										
										<span class="pricebox" id="harga"></span>

										<div class="product-details-quantity">
											<div class="quantity-select">
												<input type="number" id="qty" value="1">
											</div>
											<a href="javascript:void(0)" class="sf-button sf-button-sm" id="submit_cart">
												<span>ADD TO CART</span>
											</a>
										</div>

										<div class="product-details-color">
											<span>Color :</span>
											<ul id="warna">
											</ul>
										</div>

										<div class="product-details-size">
											<span>Size :</span>
											<ul id="size">
												<li class="checked"><span>ALL SIZE</span></li>
												<li><span>S</span></li>
												<li><span>M</span></li>
												<li><span>L</span></li>
												<li><span>XL</span></li>
												<li><span>XXL</span></li>
											</ul>
											<span>Stock : </span>
											<ul id="stock">
											</ul>
										</div>

										<div class="product-details-categories">
											<span>Categories :</span>
											<ul id='kategori'>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?=form_close()?>
			</div>
		</div>
	</div>