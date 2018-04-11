<?php $this->load->view('items/modal'); ?>
<?php if ( $this->uri->segment(0) != null): ?>
<footer class="page-footer font-small foot-back pt-4 mt-4">
	<div class="container-fluid text-center text-md-left">
		<div class="row">
			<div class="col-md-6">
				<h5 class="text-uppercase">Footer Content</h5>
				<p>Here you can use rows and columns here to organize your footer content.</p>
			</div>
			<div class="col-md-6">
				<h5 class="text-uppercase">Links</h5>
				<ul class="list-unstyled">
					<li><a href="#!">Link 1</a></li>
					<li><a href="#!">Link 2</a></li>
					<li><a href="#!">Link 3</a></li>
					<li><a href="#!">Link 4</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="footer-copyright py-3 text-center">
		<div class="container-fluid">
			MADE BY ARTUR GEVORGYAN
		</div>
	</div>
</footer>
<?php endif ?>
<!-- scripts -->
<script type="text/javascript" src="<?php  echo base_url('assets/js/popper.min.js')?>"></script>
<script type="text/javascript" src="<?php  echo base_url('assets/js/bootstrap.min.js')?>"></script>
<script type="text/javascript" src="<?php  echo base_url('assets/js/mdb.min.js')?>"></script>
<script type="text/javascript" src="<?php  echo base_url('assets/js/myjs.js')?>"></script>
<script type="text/javascript" src="<?php  echo base_url('assets/js/carusel.js')?>"></script>
<script src='http://bhome.art/assets/js/jssor.slider-27.1.0.min.js' type='text/javascript'></script>
					<script type='text/javascript' src='http://bhome.art/assets/js/sor.js'></script>
<script>
	$( ".target-change" ).change(function() {
		let state =  $("select[name=state]").val();

		// let individualValue =  $("#anId5").prop('checked');
		// let agencyValue =  $("#anId6").prop('checked');

		var individualValue =  false;
		var agencyValue =  false;

		// alert('ind before '+ $("#anId5").prop('checked'));
		if( $("#anId5").prop('checked'))
		{
			// if(agencyValue){
			// 	agencyValue = false;
			// 	$("label[for=anId6]  span").removeClass('checked');
			// }
			// $("#anId6").prop('checked',false);
				agencyValue =  false;
				individualValue = true;

				// $("#anId6").prop('checked',false);
				$("label[for=anId5]  span").addClass('checked');
				$("label[for=anId6]  span").removeClass('checked');

			// alert("individualValue "+$("#anId5").prop('checked'))
			// [value='Hot Fuzz']
			// individualValue =false;
			// $("#anId6 , .chk-span").removeClass('checked');
			// $("#anId5").prop('checked',true);
			// $("#anId6").prop('checked',false);
			// alert('ind in '+ $("#anId5").prop('checked'));

		}

		if( $("#anId6").prop('checked') )
		{
			alert("agency")
			// alert(individualValue);
			// if(individualValue){
				// $("#anId5").prop('checked',false);
				agencyValue =  true;
				individualValue = false;

				// $("#anId5").prop('checked',false);
				$("label[for=anId5]  span").removeClass('checked');
				$("label[for=anId6]  span").addClass('checked');
			// }
			// alert("agency "+agencyValue)
			// $("label[for=anId5]  span").removeClass('checked');
			// if(individualValue){
			// 	$("#anId5").prop('checked',false);
			// }
						// $("#anId6").prop('checked',true);
			// $("#anId5").prop('checked',false);
		}

		
		let sale =  $("#anId7").prop('checked');
		let rent =  $("#anId8").prop('checked');

		let priceFrom =  $("input[name=price-from]").val();
		let priceTo =  $("input[name=price-to]").val();

		let areaFrom =  $("input[name=area-from]").val();
		let areaTo =  $("input[name=area-to]").val();
		
		let kind_build =  $("select[name=kind_build]").val();
		let type_build =  $("select[name=type_build]").val();

		let size_room =  $("select[name=size_room]").val();
		let floor =  $("select[name=floor]").val();
		let size_floor =  $("select[name=size_floor]").val();
		let valute =  $("select[name=valute]").val();

		// alert(individualValue+'  '+agencyValue);
        $.ajax({
		    type: "POST",
            url: baseUrl+"main/getNewStatements",
		    dataType: 'json',
	        data: {
	            'state': state,
	            'individual': individualValue,
	            'agency': agencyValue,
	            'sale': sale,
	            'rent': rent,
	            'price-from': priceFrom,
	            'price-to': priceTo,
	            'area-from': areaFrom,
	            'area-to': areaTo,
	            'type_build': type_build,
	            'kind_build': kind_build,
	            'size_room': size_room,
	            'floor': floor,
	            'size_floor': size_floor,
	            'valute': valute
	        },
		    // processData: false,
	        success: function(statements) {
	        	if(statements == ""){
	        	}

	            $("#content-all-statement").html('');
	            $.each(statements, function(index, value) {
	                $("#content-all-statement").append(
	                    value.content
	                )

	            });
	        },
	        error: function(jqXhr, textStatus, errorThrown) {
	            alert(errorThrown);
	        },
	       	onload: function(){
	        alert(45);
	        }
        });
	});
	$("#organization-click").click(function() {
		$('input:radio[value=organisation]').prop('checked', true);
	});
	$( "#individual-click" ).click(function() {
		$('input:radio[value=individual]').prop('checked', true);
	});
</script>
</body>
</html>