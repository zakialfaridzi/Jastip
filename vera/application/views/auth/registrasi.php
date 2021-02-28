<body style="background-color: #666666;">

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" action="<?= base_url('auth/addNewUser') ?>" method="post">
					<span class="login100-form-title p-b-43">
						Please <?= $head ?>
					</span>

					<div class="form-group">
						<label for="exampleFormControlSelect1">Mau jadi apa ?</label>
						<select class="form-control" id="pilih" name="pilih">
							<option value="">--Pilih--</option>
							<option value="Konsumen">Konsumen</option>
							<option value="Vendor">Vendor</option>
							<option value="Admin">Admin</option>

						</select>
					</div>
					<div id="ctn">



						<div class="wrap-input100 validate-input" data-validate="Please Insert Your Username !">
							<input class="input100" type="text" name="username">
							<span class="focus-input100"></span>
							<span class="label-input100">Username</span>
						</div>


						<div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
							<input class="input100" type="text" name="email">
							<span class="focus-input100"></span>
							<span class="label-input100">Email</span>
						</div>


						<div class="wrap-input100 validate-input" data-validate="Password is required">
							<input class="input100" type="password" name="pass">
							<span class="focus-input100"></span>
							<span class="label-input100">Password</span>
						</div>


						<div class="container-login100-form-btn">
							<button class="login100-form-btn">
								Register
							</button>
						</div>





					</div>



					<div class="text-center p-t-46 p-b-20">
						<span class="txt2">
							already have an account ?
						</span>
					</div>

					<div class="login100-form-social flex-c-m">

						<div class="container-login100-form-btn">
							<a href="<?= base_url('auth/') ?>" class="login100-btn">
								Login
							</a>
						</div>



					</div>
				</form>

				<script src="<?= base_url('assets_auth/js/') ?>ajax.js"></script>


				<div class="login100-more" style="background-image: url('<?= base_url('assets_auth/') ?>images/bg-01.jpg');">
				</div>
			</div>
		</div>
	</div>
