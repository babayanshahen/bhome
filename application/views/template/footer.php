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
<!-- <script src='http://bhome.art/assets/js/jssor.slider-27.1.0.min.js' type='text/javascript'></script> -->
<!-- <script type='text/javascript' src='http://bhome.art/assets/js/sor.js'></script> -->
<script>
	$( ".target-change" ).change(function() {
		var state =  $("select[name=state]").val();
		var individualValue =  false;
		var agencyValue =  false;

		if( $("#anId5").prop('checked'))
		{
				agencyValue =  false;
				individualValue = true;
				$("label[for=anId5]  span").addClass('checked');
				$("label[for=anId6]  span").removeClass('checked');
		}

		if( $("#anId6").prop('checked') )
		{
				agencyValue =  true;
				individualValue = false;
				$("label[for=anId5]  span").removeClass('checked');
				$("label[for=anId6]  span").addClass('checked');
		}
		var sale =  $("#anId7").prop('checked');
		var rent =  $("#anId8").prop('checked');

		var priceFrom =  $("input[name=price-from]").val();
		var priceTo =  $("input[name=price-to]").val();

		var areaFrom =  $("input[name=area-from]").val();
		var areaTo =  $("input[name=area-to]").val();
		
		var kind_build =  $("select[name=kind_build]").val();
		var type_build =  $("select[name=type_build]").val();

		var size_room =  $("select[name=size_room]").val();
		var floor =  $("select[name=floor]").val();
		var size_floor =  $("select[name=size_floor]").val();
		var valute =  $("select[name=valute]").val();

		var data = {
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
		}

        $.ajax({
		    type: "POST",
            url: baseUrl+"main/getNewStatements",
		    dataType: 'json',
	        data:data,
		    // processData: false,
	        success: function(statements) {
	            $("#content-all-statement").html('');
	            $.each(statements, function(index, value) {
	                $("#content-all-statement").append(
	                    value.content
	                )
	            });

		        $(".pagination.pagination-circle").html('');
		        if(typeof statements[0] != 'undefined'){
			        var _countNewStatements = statements[0].pagination;
			        if(_countNewStatements > 12)
			        {
			        	for (var i = 0; i < (_countNewStatements/12); i++)
			        	{
					        $(".pagination.pagination-circle").append(
					        	"<li class='page-item'><a onclick='getNewStatements("+JSON.stringify(data)+",12," +(12 * i)+ ","+(i + 1)+" ) ' class='page-link pag-color waves-effect waves-effect'>"+(i + 1)+"</a></li>"
							);
			        	}
			        	if( (_countNewStatements/12) > 5 ){
			        		$(".pagination.pagination-circle").append(
					        	"<li class='page-item'><a onclick='alert(4)' class='page-link pag-color waves-effect waves-effect' data-ci-pagination-page='3' rel='next'>»</a></li>"
							);
			        	}
			        }
		        }else{
			        $("#content-all-statement").html('Հայտարարություններ չեն գտնվել');
		        }
	        },
	        error: function(jqXhr, textStatus, errorThrown) {
	            // alert(errorThrown);
	        },
	       	loading: function(){
	        	alert('onload');
	        }
        });
	});

	window.addEventListener("load", function(event) {
    console.log("All resources finished loading!");
  });
	
	function setActive(one,two){
		return (one == two) ? 'pag-active' : 'pag-color';
	}

	function getNewStatements(data,per_page,page,currentPage){
		$.ajax({
		    type: "POST",
            url: baseUrl+"main/getNewStatements/"+per_page+'/'+page+'/'+currentPage,
		    dataType: 'json',
	        data: data,
		    // processData: false,
		    success: function(newStatements){
	            $("#content-all-statement").html('');

	            $.each(newStatements, function(index, value) {
	                $("#content-all-statement").append(
	                    value.content
	                )
	            });
	            $(".pagination.pagination-circle").html('');

		        if(typeof statements[0] != 'undefined'){
		        var _countNewStatements = newStatements[0].pagination;
		        	if(_countNewStatements > 12)
			        {
			        	if( (_countNewStatements/12) > 5 && currentPage != 1){
			        		$(".pagination.pagination-circle").append(
					        	"<li class='page-item'><a onclick='getNewStatements("+JSON.stringify(data)+",12," +(12 * (currentPage-2))+ ","+(currentPage - 1)+" )' class='page-link pag-color waves-effect waves-effect' data-ci-pagination-page='1' rel='prev'>«</a></li>"
							);
			        	}
			        	for (var i = 0; i < (_countNewStatements/12); i++)
			        	{
					        $(".pagination.pagination-circle").append(
					        	"<li class='page-item'><a onclick='getNewStatements("+JSON.stringify(data)+",12," +(12 * i)+ ","+(i + 1)+" ) ' class='page-link "+setActive((i + 1),currentPage)+" waves-effect waves-effect'>"+(i + 1)+"</a></li>"
							);
			        	}
			        	if( (_countNewStatements/12) > 5 ){
			        		$(".pagination.pagination-circle").append(
					        	"<li class='page-item'><a onclick='getNewStatements("+JSON.stringify(data)+",12," +(12 * (currentPage))+ ","+(currentPage + 1)+" )' class='page-link pag-color waves-effect waves-effect' data-ci-pagination-page='3' rel='next'>»</a></li>"
							);
			        	}
			        }
	            }else{
			        $("#content-all-statement").html('Հայտարարություններ չեն գտնվել');
	            }
		    }
	      
        });

	}

	function getTopStatementModal(id){
		$.ajax({
            url: baseUrl+"main/showNewStatement/"+id,
		    dataType: 'json',
	        // data:data,
	        success: function(content) {
	        	$("#carouselExamples").append(content);
	        	// $("#for-trigger-click").trigger('click');
	        }
	           
        });
	}
	$("#organization-click").click(function() {
		$('input:radio[value=organisation]').prop('checked', true);
	});

	$( "#individual-click" ).click(function() {
		$('input:radio[value=individual]').prop('checked', true);
	});
</script>
</body>
</html>