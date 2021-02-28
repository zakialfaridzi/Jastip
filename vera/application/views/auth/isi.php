<body style="background-color: #666666;">

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">

				<form class="login100-form validate-form" method="post" action="<?= base_url('auth/cekLogin') ?>">


					<span class="login100-form-title p-b-43">
						<?= $head ?> to continue
					</span>

					<?= $this->session->flashdata('pesan') ?>


					<div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="username">
						<span class="focus-input100"></span>
						<span class="label-input100">Username</span>
					</div>


					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="pass">
						<span class="focus-input100"></span>
						<span class="label-input100">Password</span>
					</div>

					<div class="flex-sb-m w-full p-t-3 p-b-32">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
							<label class="label-checkbox100" for="ckb1">
								Remember me
							</label>
						</div>

						<div>
							<a href="#" class="txt1">
								Forgot Password?
							</a>
						</div>
					</div>


					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>
					</div>

					<div class="text-center p-t-46 p-b-20">
						<span class="txt2">
							dont have an account ?
						</span>
					</div>

					<div class="login100-form-social flex-c-m">

						<div class="container-login100-form-btn">
							<a href="<?= base_url('auth/register') ?>" class="login100-btn">
								Register
							</a>
						</div>



					</div>
				</form>

				<div class="login100-more" style="background-image: url('<?= base_url('assets_auth/') ?>images/bg-01.jpg');">
				</div>
			</div>
		</div>
	</div>
