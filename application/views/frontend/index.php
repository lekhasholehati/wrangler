	<section class="hero-section">
		<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
			<div class="carousel-inner">
				<div class="carousel-item active">
					<img src="<?=base_url()?>assets/img/wr2.jpg" class="d-block w-100">
				</div>
				<div class="carousel-item">
					<img src="<?=base_url()?>assets/img/bg.jpg" class="d-block w-100">
				</div>
				<div class="carousel-item">
					<img src="<?=base_url()?>assets/img/bg-2.jpg" class="d-block w-100">
				</div>
			</div>
		</div>
	</section>

	<section class="product-filter-section">
		<div class="container">
			<div class="section-title">
				<h2>PRODUCTS</h2>
			</div>
			<ul class="product-filter-menu text-center">
				<li><a href="<?= base_url('wrangler'); ?>">All Product</a></li>
				<li><a href="<?= base_url('wrangler/jacket'); ?>">Jacket</a></li>
				<li><a href="<?= base_url('wrangler/shirt'); ?>">Shirt</a></li>
				<li><a href="<?= base_url('wrangler/tshirt'); ?>">Tshirt</a></li>
				<li><a href="<?= base_url('wrangler/bottom'); ?>">Bottom</a></li>
				<li><a href="<?= base_url('wrangler/ladies'); ?>"> All Ladies</a></li>
				<li><a href="<?= base_url('wrangler/men'); ?>">All Men</a></li>
			</ul>
			
			<div class="col-lg-3 col-sm-6">
				<div class="row justify-content-center">
					<div class="product-item">
						<div class="pi-pic">
							<img src="<?=base_url()?>assets/img/wrangler/4.jpeg"  class="img-fluid" style="height: 350px;">
							<div class="pi-links">
								<a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
								<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
							</div>
						</div>
						<div class="pi-text">
							<h6>$35,00</h6><br>
							<p>Flamboyant Pink Top </p>
							<div class="text-center mt-2">
							<a href="" class="btn btn-primary btn-block">Buy Now</a>
							</div>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</section>