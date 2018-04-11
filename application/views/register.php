		<link href="<?php echo base_url('assets/css/register.css')?>" rel="stylesheet">
		<!-- <link href="<>css/style.css" rel="stylesheet"> -->
		<section class="view intro-2 custom-gradient">
			<div class="container flex-center">
				<div class='container full-reg' style="background-color: white; opacity: 0.95; ">
					<form class="reg-form" autocomplete="off" method="POST" action="<?php echo base_url('register/do_registration')?>">
						<p class="name text-center mb-4">Registration</p>
						<!-- Material input text -->
						<div class="md-form">
							<i class="fa fa-envelope prefix ic-color"></i>
							<input type="email" name="email" id="materialFormRegisterEmail" class="form-control" required />
							<?php echo form_error('email','<span class="help-block">','</span>'); ?>
							<label for="materialFormRegisterEmail">Email</label>
						</div>
						<div class="md-form">
							<i class="fa fa-lock prefix ic-color1"></i>
							<input type="password" name="password" id="materialFormRegisterPass" class="form-control" required />
							<?php echo form_error('password','<span class="help-block">','</span>'); ?>
							<label for="materialFormRegisterPass">Password</label>
						</div>
						<div class="md-form">
							<i class="fa fa-lock prefix ic-color"></i>
							<input type="password" name="conf_password" id="materialFormRegister-C-Pass" class="form-control" required />
							<?php echo form_error('conf_password','<span class="help-block">','</span>'); ?>
							<label for="materialFormRegister-C-Pass">Confirm password</label>
						</div>
						<div class="md-form">
							<i class="fa fa-user prefix ic-color1"></i>
							<input type="text" name="full_name" id="materialFormRegisterFirstName" class="form-control" required />
							<?php echo form_error('full_name','<span class="help-block">','</span>'); ?>
							<label for="materialFormRegisterFirstName">Full name</label>
						</div>
						<!-- Material input email -->
						<!-- <div class="md-form">
							<i class="fa fa-user prefix ic-color"></i>
							<input type="text" name="last-name" id="materialFormRegisterLastNme" class="form-control" />
							<label for="materialFormRegisterLastNme">Last name</label>
						</div> -->
						<!-- Material input email -->
						<!-- <div class="md-form">
							<i class="fa fa-calendar prefix ic-color1"></i>
							<input type="number" name="date" id="materialFormRegisterDate" class="form-control" />
							<label for="materialFormRegisterDate">Input Date</label>
						</div> -->
						<!-- <div class="md-form">
							<div class="container-fluid">
								<div class="row">
									<div class="col-sm-6 text-center set-height">
										<input type="radio" name="gender" hidden>
										<i class="fa fa-male prefix"></i>
									</div>
									<div class="col-sm-6 text-center set-height">
										<i class="fa fa-female prefix"></i>
									</div>
								</div>
							</div>
						</div> -->
						<!-- <div class="md-form">
							<i class="fa fa-globe ic-color prefix "></i>
							<div class="form-row  checkbox text-center">
									<?php drawRegion('state'); ?>
							</div>
						</div> -->
						<div class="md-form">
							<div class="container-fluid">
								<div class="row">
									<div class="col-sm-6 text-center set-height">
										<input type="radio" value="individual" name="type-of" hidden />
										<h3 id="individual-click">Individual</h3>
									</div>
									<div class="col-sm-6 text-center set-height">
										<input type="radio" value="organisation" name="type-of" hidden />
										<h3 id="organization-click">Organisation</h3>
									</div>
								</div>
							</div>
						</div>
						<div class="container btn-buttons">
							<div class="row">
								<div class="col-sm-6 text-center">
									<button class="btn btn-primary butt">Back</button>
								</div>
								<div class="col-sm-6 text-center">
									<button type="submit" class="btn btn-primary butt" name="regisSubmit" type="submit" value="Submit" >Confirm</button>
									 <!-- <input type="submit" name="regisSubmit" class="btn-primary" value="Submit"/> -->
								</div>
							</div>
						</div>
					</form>
					<!-- Material form register -->
				</div>
			</div>
		</div>
	</div>
</section>
<!-- <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/mdb.min.js"></script>
<script type="text/javascript" src="js/popper.min.js"></script>
<script type="text/javascript" src="js/myjs.js"></script>
 -->