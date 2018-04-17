<section class="view intro-2 custom-gradient">
	<div class="full-bg-img">
		<div class="container flex-center">
			<div class="row flex-center">
				<div class="col-md-10 col-lg-6 text-center text-md-left margins">
					<div class="white-text">
						<h1 class="h1-responsive font-weight-bold mt-sm-5 wow fadeInLeft" data-wow-delay="0.3s">Make purchases with our app </h1>
						<hr class="hr-light wow fadeInLeft" data-wow-delay="0.3s">
						<h6 class="wow fadeInLeft" data-wow-delay="0.3s">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem repellendus quasi fuga nesciunt dolorum nulla magnam veniam sapiente, fugiat! Commodi sequi non animi ea dolor molestiae iste.
						</h6>
						<br>
					</div>
				</div>
				<!-- header-filter -->
				<div class="col-md-6 col-lg-6 clearfix d-md-flex d-none wow fadeInRight justify-content-center" data-wow-delay="0.3s">
					<div class="container" style="opacity: 0.85; background-color: white;">
						<p class="h4 text-center py-4  p-0-b p2-color ">Հայտարարության տեսակը</p>
						<form role="form" action="<?php echo base_url('statements')?>" method="POST">
							<div class="btn-group checkbox" data-toggle="buttons" style="display: grid;grid-template-columns: 16em 16em;">
									<label class="btn btn-default form-check-label">
										<input class="form-check-input" type="radio" name="individual-or-agency" autocomplete="off" style="display: none;" value="individual"> Անհատական
									</label>
									
									<label class="btn btn-default form-check-label">
										<input class="form-check-input" type="radio" name="individual-or-agency" autocomplete="off"  style="display: none;" value="agency"> Գործակալություն
									</label>
							</div>
							<hr>
							<div class="btn-group checkbox" data-toggle="buttons" style="display: grid;grid-template-columns: 16em 16em;">
									<label class="btn btn-default form-check-label">
										<input class="form-check-input" type="radio" name="sale-or-rent" autocomplete="off" style="display: none;" value="sale"> Վաճառք
									</label>
									
									<label class="btn btn-default form-check-label">
										<input class="form-check-input" type="radio" name="sale-or-rent" autocomplete="off"  style="display: none;" value="rent"> Վարձակալություն
									</label>
							</div>
							<hr>
							<p class="h4 py-4 p2-color text-center ">Գին</p>
							<div class="form-row  checkbox text-center">
								<div class="col-md-4">
									<input type="number" name="price-from" class="form-control" placeholder="Սկսած" name="price">
								</div>
								<div class="col-md-4">
									<input type="number" name="price-to" class="form-control" placeholder="Վերջացրած">
								</div>
								<div class="col-md-4">
									<select class="form-control" name="valute" style="margin-top: -2px">
										<option value=''>Արժույթ</option>
										<option value='1'> USD</option>
										<option value='2'> AMD</option>
										<option value='3'> EURO</option>
									</select>
								</div>
							</div>
							<p class="h4 py-4 p2-color text-center ">Մակերես</p>
							<div class="form-row  checkbox text-center">
								<div class="col">
									<input type="number" name="area-from" class="form-control" placeholder="sksac">
								</div>
								<div class="col">
									<input type="number" name="area-to" class="form-control" placeholder="verjacrac">
								</div>
							</div>
							<p class="h4 py-4 p2-color text-center">Տարածաշրջան</p>
							<div class="form-row  checkbox text-center">
								<?php echo drawRegion('state','target-change',false) ?>
							</div>
							<div class="form-group">
								<button type="submit" class="btn bt-color1 btn-block">pntrel</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>