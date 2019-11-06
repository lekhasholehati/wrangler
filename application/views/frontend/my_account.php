<div class="sn-breadcrumb-area bg-breadcrumb-1 section-padding-sm" data-white-overlay="7">
	<div class="container">
		<div class="sf-breadcrumb">
			<ul>
				<li><a href="<?=base_url()?>">Home</a></li>
				<li>My Account</li>
			</ul>
		</div>
	</div>
</div>
<div class="flash-data" data-flashdata="<?= $this->session->flashdata('simpan'); ?>">
<div class="flash-error" data-flasherror="<?= $this->session->flashdata('gagal'); ?>">
<main class="page-content">
	<div class="account-page-area section-padding-lg">
		<div class="container">
			<div class="row">

				<div class="col-lg-3">
					<ul class="nav myaccount-tab-trigger" id="account-page-tab" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" id="account-dashboard-tab" data-toggle="tab" href="#account-dashboard" role="tab" aria-controls="account-dashboard" aria-selected="true">Dashboard</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="account-orders-tab" data-toggle="tab" href="#account-orders" role="tab" aria-controls="account-orders" aria-selected="false">Orders</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="account-address-tab" data-toggle="tab" href="#account-address" role="tab" aria-controls="account-address" aria-selected="false">Addresses</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="account-details-tab" data-toggle="tab" href="#account-details" role="tab" aria-controls="account-details" aria-selected="false">Account Details</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="account-logout-tab"  href="<?=base_url()?>user/logout" role="tab"  aria-selected="false">Logout</a>
						</li>
					</ul>
				</div>

				<div class="col-lg-9">
					<div class="tab-content myaccount-tab-content" id="account-page-tab-content">
						<div class="tab-pane fade show active" id="account-dashboard" role="tabpanel" aria-labelledby="account-dashboard-tab">
							<div class="myaccount-dashboard">
								<p>Hello <b><?=$this->session->userdata('nama')?></b></p>
								<p>From your account dashboard you can view your recent orders, manage your shipping and billing addresses and <a href="">edit your password and account details</a>.</p>
							</div>
						</div>
						<div class="tab-pane fade" id="account-orders" role="tabpanel" aria-labelledby="account-orders-tab">
							<div class="myaccount-orders">
								<h4 class="small-title">MY ORDERS</h4>
								<div class="table-responsive">
									<table class="table table-bordered table-hover">
										<tbody>
											<tr>			
												<th>NO</th>
												<th>KODE ORDER</th>
												<th>DATE</th>
												<th>STATUS/NO RESI</th>
												<th>TOTAL</th>
												<th></th>
											</tr>
											<?php $no = 1; foreach ($data_order as $order) : ?>
											<tr>		
												<td><?=$no;?>. </td>
												<td><?=$order['kode_order']?></td>
												<td><?=$order['date_order']?></td>
												<td><?=$order['status']?></td>
												<td><?=$order['total_harga']?></td>
												<td>
													<a href="<?=base_url()?>user/confirm_payment/<?=$order['kode_order']?>" class="sf-button sf-button-sm" ><span>Confirm Payment</span></a>
												</td>
											</tr>
											<?php $no++; endforeach; ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="account-address" role="tabpanel" aria-labelledby="account-address-tab">
							<div class="myaccount-address">
								<p>The following addresses will be used on the checkout page by default.</p>
								<div class="row">
									<div class="col">
										<h4 class="small-title">SHIPPING ADDRESS</h4>
										<address>
											<?=$this->session->userdata('alamat')?>
										</address>
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="account-details" role="tabpanel" aria-labelledby="account-details-tab">
							<div class="myaccount-details">
								<?=form_open_multipart('user/update_account', 'class="sf-form"')?>
									<input type="hidden" name="id_user" value="<?=$this->session->userdata('id_user')?>">
									<div class="sf-form-inner">
										<div class="single-input single-input-half">
											<label for="account-details-firstname">Name</label>
											<input type="text" id="account-details-firstname" name="nama" value="<?=$this->session->userdata('nama')?>">
										</div>
										<div class="single-input single-input-half">
											<label for="account-details-email">Email*</label>
											<input type="email" id="account-details-email" name="email" value="<?=$this->session->userdata('email')?>" readonly>
										</div>
										<div class="single-input">
											<label for="account-details-password">Password (leave blank to leave unchanged)</label>
											<input type="password" id="account-details-password" name="password">
										</div>
										<div class="single-input">
											<label for="account-details-alamat">Address</label>
											<textarea name="alamat" id="account-details-alamat" cols="30" rows="4" style="resize:none"><?=$this->session->userdata('alamat')?></textarea>
										</div>
										<div class="single-input single-input-half">
											<label for="account-details-no_hp">No Hp</label>
											<input type="text" id="account-details-no_hp" name="no_hp" value="<?=$this->session->userdata('no_hp')?>">
										</div>
										<div class="single-input single-input-half">
											<label for="account-details-picture_profile">Picture Profile (leave blank to leave unchanged)</label>
											<input type="file" id="account-details-picture_profile" name="picture_profile" class="form-control">
										</div>
										<div class="single-input">
											<img src="<?=base_url()?>_assets/img/foto_profile/<?=$this->session->userdata('image')?>" alt="picture-profile">
										</div>
										<div class="single-input">
											<button class="sf-button sf-button-dark" type="submit"><span>SAVE CHANGES</span></button>
										</div>
									</div>
								<?=form_close()?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>