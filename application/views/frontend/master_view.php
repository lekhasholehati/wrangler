<!doctype html>
<html class="no-js" lang="zxx">

<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Wrangler</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="shortcut icon" href="<?=base_url()?>_assets/img/logo_wrangler.png" type="image/x-icon">
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,400i,500,600,700" rel="stylesheet">
	<link rel="stylesheet" href="<?=base_url()?>_assets/frontend/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?=base_url()?>_assets/frontend/css/plugins.css">
	<link rel="stylesheet" href="<?=base_url()?>_assets/frontend/style.css">
	<link rel="stylesheet" href="<?=base_url()?>_assets/frontend/css/custom.css">
</head>

<body>
	<div id="wrapper" class="wrapper">
		<?php $this->load->view($header)?>
		<?php $this->load->view($content)?>
		<?php $this->load->view($footer)?>
	</div>

	<script src="<?=base_url()?>_assets/frontend/js/vendor/modernizr-3.6.0.min.js"></script>
	<script src="<?=base_url()?>_assets/frontend/js/vendor/jquery-3.3.1.min.js"></script>
	<script src="<?=base_url()?>_assets/frontend/js/popper.min.js"></script>
	<script src="<?=base_url()?>_assets/frontend/js/bootstrap.min.js"></script>
	<script src="<?=base_url()?>_assets/frontend/js/plugins.js"></script>
	<script src="<?=base_url()?>_assets/frontend/js/main.js"></script>
	<script src="<?= base_url(); ?>_assets/swal/sweetalert2.all.min.js"></script>
	<script>
		$(document).ready(function(){
			get_cart();

			$('.cart').on('click', function() {
				var data = '<?=$this->session->userdata('email')?>';
				if (data != "") {
					kode_barang  = $(this).data('kode_barang') ;
					image  		 = $(this).data('image') ;
					warna  		 = $(this).data('warna') ;
					nama_product = $(this).data('nama_product');
					harga 		 = $(this).data('harga');
					deskripsi 	 = $(this).data('deskripsi');
					kategori 	 = $(this).data('kategori');

					html_image   	= `<a href="<?=base_url()?>_assets/img/product/`+image+`"> <img src="<?=base_url()?>_assets/img/product/`+image+`" alt="product image"></a>`;
					html_warna 	 	= `<li>`+warna.toUpperCase()+`</li>`;
					html_kategori   = `<li><a href="javascript:void(0)">`+kategori+`</a></li>`;

					$.ajax({
						url 	: '<?=base_url()?>user/get_stock',
						type	: 'post',
						data	: {	kode_barang: kode_barang },
						success	: function(data) {
							var array = $.parseJSON(data);
							var checked = "";
							var html_stock = "";
							$.each( array, function( key, value ) {
								html_stock += `<li><span>`+value.total+`</span></li>`;
							});
							$('#stock').empty(); $('#stock').append(html_stock);
							
						}
					});

					$('[name="kode_barang"]').val(kode_barang);
					$('#img_product').empty(); $('#img_product').append(html_image);
					$('#warna').empty(); $('#warna').append(html_warna);
					$('#kategori').empty(); $('#kategori').append(html_kategori);
					$('#nama_product').html(nama_product); $('#harga').html("Rp. "+harga); $('#deskripsi').html(deskripsi);
					$('#modal_cart').modal('show');
				} else {
					Swal.fire({	title: 'Oopss..', text: 'Please Login/Register Your Account', type: 'error'});
				}
			});

			$('#submit_cart').on('click', function() {
				var data = '<?=$this->session->userdata('email')?>';

				if (data != "") {
					kode_barang = $('[name="kode_barang"]').val();
					qty 		= $('#qty').val();
					size		= $('#size').find('.checked').children().html();
					$.ajax({
						url 	: '<?=base_url()?>user/add_cart',
						type	: 'post',
						data	: {	kode_barang: kode_barang, qty : qty, size : size},
						success	: function(data) {
							get_cart();
							Swal.fire({	title: 'Add Cart', text: 'Berhasil', type: 'success'});
						}
					});
				} else {
					Swal.fire({	title: 'Oopss..', text: 'Please Login/Register Your Account', type: 'error'});
				}
			});

			function get_cart() {
				$('#shopping_cart').empty();
				var email = '<?=$this->session->userdata('email')?>'
				$.ajax({
					url 	: '<?=base_url()?>user/get_cart',
					type	: 'post',
					data	: {	email: email },
					success	: function(data) {
						var array = $.parseJSON(data);
						// console.log(array);
						var html = "";
						var total = 0;
						$.each( array, function( key, value ) {
							html += `<li>
										<a href="<?=base_url()?>_assets/img/product/`+value.image+`" class="minicart-product-image">
											<img src="<?=base_url()?>_assets/img/product/`+value.image+`" alt="cart products">
										</a>
										<div class="minicart-product-details">
											<h6>`+value.nama+`</h6>
											<span>`+value.harga+` x `+value.qty+`</span>
										</div>
										<button class="close" id="delete_cart" data-kode_cart="`+value.kode_cart+`">
											<i class="ti ti-close"></i>
										</button>
									</li>`;
							total += parseInt(value.harga) * parseInt(value.qty);
						});

						var	number_string = total.toString(),
							sisa 	= number_string.length % 3,
							rupiah 	= number_string.substr(0, sisa),
							ribuan 	= number_string.substr(sisa).match(/\d{3}/g);
								
						if (ribuan) {
							separator = sisa ? '.' : '';
							rupiah += separator + ribuan.join('.');
						}

						$('#total').html('Rp. '+rupiah);
						$('#shopping_cart').append(html);
						$('#total_cart').html(" ("+array.length+")");
					}
				});
			}

			$('li').on('click', '#delete_cart', function () {
				var kode_cart = $(this).data('kode_cart');
					$.ajax({
						url 	: '<?=base_url()?>user/delete_cart',
						type	: 'post',
						data	: { kode_cart : kode_cart },
						success : function(callback) {
							get_cart();
							Swal.fire({
								title: 'You',
								text: 'Success Delete Cart',
								type: 'success'
							});

						}
					});
			})


			$('#shipping_address').on('change', function() {
				var shipping_address = $(this).val();
					provinsi		 = $(this).data('provinsi');
					kota		 	 = $(this).data('kota');
					type		 	 = $(this).data('type');
					expedisi 		 = $("select[name='expedisi']").val();

					$.ajax({
					url 	: '<?=base_url()?>user/get_cost',
					type	: 'post',
					data	: {	shipping_address: shipping_address, expedisi : expedisi },
					success	: function(data) {
						var array = $.parseJSON(data);
							subtotal = $('#subtotal').html();
							total = parseInt(array.cost) + parseInt(subtotal);

							var	number_string = total.toString(),
							sisa 	= number_string.length % 3,
							rupiah 	= number_string.substr(0, sisa),
							ribuan 	= number_string.substr(sisa).match(/\d{3}/g);
								
							if (ribuan) {
								separator = sisa ? '.' : '';
								rupiah += separator + ribuan.join('.');
							}
						$('#input_provinsi').val(array.provinsi);
						$('#input_kota').val(array.kota);
						$('#input_type').val(array.type);
						$('#input_cost').val(array.cost);
						$('#view_cost').html('Rp. '+array.cost);
						$('#input_etd').val(array.estimate);
						$('#view_etd').html(array.estimate+" Days");
						$('#total_checkout').html('Rp . '+rupiah);
						$('#input_total_checkout').val(total);
						$('#process').removeAttr('disabled');
					}
				});
			});

			const flashdata = $('.flash-data').data('flashdata');
			const flasherror = $('.flash-error').data('flasherror');
			if(flashdata) {
				Swal.fire({
					title: 'Data',
					text: flashdata,
					type: 'success'
				});
			}
			if(flasherror) {
				Swal.fire({
					title: 'Opss..',
					text: flasherror,
					type: 'error'
				});
			}
		});
	</script>
</body>

</html>