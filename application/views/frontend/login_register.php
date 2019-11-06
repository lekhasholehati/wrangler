<div class="sn-breadcrumb-area bg-breadcrumb-1 section-padding-sm" data-white-overlay="7">
	<div class="container">
		<div class="sf-breadcrumb">
			<ul>
				<li><a href="index.html">Home</a></li>
				<li>Login/Register</li>
			</ul>
		</div>
	</div>
</div>
<div class="flash-data" data-flashdata="<?= $this->session->flashdata('simpan'); ?>">
<div class="flash-error" data-flasherror="<?= $this->session->flashdata('gagal'); ?>">
<main class="page-content">
	<div class="my-account-area section-padding-lg">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="login-form-wrapper">
						<?=form_open('user/login', 'class="sf-form sf-form-boxed"');?>
							<div class="sf-form-inner">
								<div class="single-input">
									<label for="login-form-email">email address *</label>
									<input type="email" name="email" id="login-form-email">
								</div>
								<div class="single-input">
									<label for="login-form-password">Password *</label>
									<input type="password" name="password" id="login-form-password">
								</div>
								<div class="single-input">
									<button type="submit" class="sf-button sf-button-dark mr-3">
										<span>Login</span>
									</button>
								</div>
							</div>
						<?=form_close();?>
					</div>
				</div>

				<div class="col-lg-6">
					<div class="register-form-wrapper">
						<?=form_open_multipart('user/register', 'class="sf-form sf-form-boxed"')?>
							<div class="sf-form-inner">
								<div class="single-input">
									<label for="register-form-email">Email address</label>
									<input type="email" name="register-email" id="register-form-email">
								</div>
								<div class="single-input">
									<label for="register-form-name">Name</label>
									<input type="text" name="register-name" id="register-form-name">
								</div>
								<div class="single-input">
									<label for="register-form-password">Password</label>
									<input type="password" name="register-password" id="register-form-password">
								</div>
								<div class="single-input">
									<label for="register-form-no_hp">No Hp</label>
									<input type="text" name="register-no_hp" id="register-form-no_hp">
								</div>
								<div class="single-input">
									<label for="register-form-alamat">Alamat</label>
									<textarea class="form-control" name="register-alamat" id="register-form-alamat" cols="30" rows="3" style="resize:none"></textarea>
								</div>
								<div class="single-input">
									<label for="register-form-picture">Picture Profile</label>
									<input type="file" name="register-picture" id="register-form-picture" class="form-control">
								</div>
								<div class="single-input">
									<button type="submit" name="register" class="sf-button sf-button-dark">
										<span>Register</span>
									</button>
								</div>
							</div>
						<?=form_close()?>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>