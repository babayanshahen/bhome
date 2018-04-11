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
						<form role="form" action="<?php base_url('statements')?>" method="POST">
							<div class="form-row  checkbox text-center form-group">
								<div class="col">
									<input type="checkbox" id="anId1">
									<label for="anId1">Անհատական</label>
								</div>
								<div class="col">
									<input type="checkbox" id="anId2">
									<label for="anId2">Գործակալություն</label>
								</div>
							</div>
							<hr>
							<div class="form-row  checkbox text-center">
								<div class="col">
									<input type="checkbox" id="anId3">
									<label for="anId3">Վաճառք</label>
								</div>
								<div class="col">
									<input type="checkbox" id="anId4">
									<label for="anId4">Վարձակալություն</label>
								</div>
							</div>
							<hr>
							<p class="h4 py-4 p2-color text-center ">Գին</p>
							<div class="form-row  checkbox text-center">
								<div class="col">
									<input type="number" class="form-control" placeholder="sksac">
								</div>
								<div class="col">
									<input type="number" class="form-control" placeholder="verjacrac">
								</div>
							</div>
							<p class="h4 py-4 p2-color text-center ">Մակերես</p>
							<div class="form-row  checkbox text-center">
								<div class="col">
									<input type="number" class="form-control" placeholder="sksac">
								</div>
								<div class="col">
									<input type="number" class="form-control" placeholder="verjacrac">
								</div>
							</div>
							<p class="h4 py-4 p2-color text-center">Տարածաշրջան</p>
							<div class="form-row  checkbox text-center">
								<select class="form-control state" name="state">
									<option value="0" selected="selected">Խնդրում ենք ընտրել</option>
									<optgroup label="Երևան">
										<option value="2">Աջափնյակ</option>
										<option value="3">Արաբկիր</option>
										<option value="4">Ավան</option>
										<option value="5">Դավիթաշեն</option>
										<option value="6">Էրեբունի</option>
										<option value="7">Քանաքեռ Զեյթուն</option>
										<option value="8">Կենտրոն</option>
										<option value="9">Մալաթիա Սեբաստիա</option>
										<option value="10">Նոր Նորք</option>
										<option value="11">Նորք Մարաշ</option>
										<option value="12">Նուբարաշեն</option>
										<option value="13">Շենգավիթ</option>
									</optgroup>
									<optgroup label="Արագածոտն">
										<option value="15">Ապարան</option>
										<option value="16">Արագած</option>
										<option value="73">Արուճ</option>
										<option value="17">Աշտարակ</option>
										<option value="92">Կոշ</option>
										<option value="18">Թալին</option>
										<option value="72">Ուջան</option>
									</optgroup>
									<optgroup label="Արարատ">
										<option value="20">Արարատ</option>
										<option value="21">Արտաշատ</option>
										<option value="80">Գեղանիստ</option>
										<option value="22">Մասիս</option>
										<option value="86">Վեդի</option>
									</optgroup>
									<optgroup label="Արմավիր">
										<option value="24">Արմավիր</option>
										<option value="25">Էջմիածին</option>
										<option value="26">Մեծամոր</option>
									</optgroup>
									<optgroup label="Արցախ">
										<option value="29">Ասկերան</option>
										<option value="30">Հադրութ</option>
										<option value="87">Քաշաթաղ</option>
										<option value="31">Լաչին</option>
										<option value="32">Մարտակերտ</option>
										<option value="33">Մարտունի</option>
										<option value="88">Շահումյան</option>
										<option value="34">Շուշի</option>
										<option value="28">Ստեփանակերտ</option>
									</optgroup>
									<optgroup label="Գեղարքունիք">
										<option value="71">Ճամբարակ</option>
										<option value="36">Գավառ</option>
										<option value="37">Մարտունի </option>
										<option value="38">Սևան</option>
										<option value="39">Վարդենիս</option>
									</optgroup>
									<optgroup label="Կոտայք">
										<option value="41">Աբովյան</option>
										<option value="83">Աղվերան</option>
										<option value="79">Արգել</option>
										<option value="81">Առինջ</option>
										<option value="90">Բջնի</option>
										<option value="76">Բյուրեղավան</option>
										<option value="66">Չարենցավան</option>
										<option value="89">Ձորաղբյուր</option>
										<option value="77">Գառնի</option>
										<option value="42">Հրազդան</option>
										<option value="82">Ջրվեժ</option>
										<option value="84">Քանաքեռավան</option>
										<option value="85">Քասախ</option>
										<option value="75">Նոր Հաճըն</option>
										<option value="91">Պտղնի</option>
										<option value="43">Ծաղկաձոր</option>
										<option value="67">Եղվարդ</option>
										<option value="70">Զովունի</option>
									</optgroup>
									<optgroup label="Լոռի">
										<option value="45">Ալավերդի</option>
										<option value="46">Սպիտակ</option>
										<option value="47">Ստեփանավան</option>
										<option value="69">Տաշիր</option>
										<option value="48">Վանաձոր</option>
									</optgroup>
									<optgroup label="Շիրակ">
										<option value="50">Արթիկ</option>
										<option value="51">Գյումրի</option>
										<option value="78">Մարալիկ</option>
									</optgroup>
									<optgroup label="Սյունիք">
										<option value="53">Գորիս</option>
										<option value="74">Քաջարան</option>
										<option value="54">Կապան</option>
										<option value="55">Մեղրի</option>
										<option value="56">Սիսիան</option>
									</optgroup>
									<optgroup label="Տավուշ">
										<option value="59">Բերդ</option>
										<option value="58">Դիլիջան</option>
										<option value="60">Իջևան</option>
										<option value="68">Նոյեմբերյան</option>
									</optgroup>
									<optgroup label="Վայոց Ձոր">
										<option value="65">Ջերմուկ</option>
										<option value="62">Վայք</option>
										<option value="63">Եղեգնաձոր</option>
									</optgroup>
									<option value="64">Հայաստանից դուրս</option>
								</select>
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