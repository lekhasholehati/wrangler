<header class="header sticky-header">
	<div class="header-top-area">
		<div class="container">
			<div class="header-top-inner">
				<div class="header-top-left">
					<img src="<?=base_url()?>_assets/img/logo_wrangler.png" alt="logo" class="img-fluid" style="height: 30px;">
				</div>
				<ul class="header-options">
					<li>
						<a href="<?=base_url()?>user/my_account">My account</a>
					</li>
					<li>
						<a href="<?=base_url()?>user/login_register">Login / Reg</a>
					</li>
				</ul>
			</div>
		</div>
	</div>

	<div class="header-bottom-area d-none d-lg-block">
		<div class="container">
			<div class="header-bottom-inner">
				<nav class="sf-navigation">
					<ul>
						<li><a href="<?=base_url()?>">HOME</a></li>
						<li><a href="<?=base_url()?>user/kategori/jacket">JACKET</a></li>
						<li><a href="<?=base_url()?>user/kategori/tshirt">T-SHIRT</a></li>
						<li><a href="<?=base_url()?>user/kategori/shirt">SHIRT</a></li>
						<li><a href="<?=base_url()?>user/kategori/men">MEN</a></li>
						<li><a href="<?=base_url()?>user/kategori/ladies">LADIES</a></li>                                               
						<li><a href="<?=base_url()?>user/kategori/bottom">BOTTOM</a></li>                                               
					</ul>
				</nav>
				<ul class="header-icons">
					<li>
						<button class="header-minicart-trigger"><i class="ti ti-shopping-cart"></i><span id="total_cart"></span></button>
						<div class="minicart header-minicart">
							<ul class="minicart-product-list" id="shopping_cart">
							</ul>
							<p class="minicart-total">SUBTOTAL: <span id="total"></span></p>
							<div class="minicart-button">
								<a href="<?=base_url()?>user/checkout" class="sf-button sf-button-fullwidth sf-button-sm">
									<span>Checkout</span>
								</a>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>
</header>

<!-- <div class="modal fade" id="modal_checkout" tabindex="-1" role="dialog" aria-labelledby="newSubMenuModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<?=form_open('user/add_cart'); ?>
				<div class="modal-header">
					<h5>COST SHIPPING</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="container">
						<div class="row product-details">
							<div class="col-lg-12">
								<div class="product-details-left">
									<label>Shipping Address</label>
									<?php $data_provinsi = get_provinsi(); ?>
									<select name="shipping_address" class="form-control" required>
										<?php foreach($data_provinsi as $provinsi) : ?>
										<option value="<?= $provinsi['city_id'] ?>"> <?=$provinsi['province']." - ".$provinsi['city_name']."(".$provinsi['type'].")"?></option>
										<?php endforeach;?>
									</select>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?=form_close()?>
		</div>
	</div>
</div> -->