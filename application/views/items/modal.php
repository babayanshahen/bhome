<!-- login-modal -->
<div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header text-center">
				<h4 class="modal-title w-100 font-weight-bold p2-color">Sign in</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form  method="POST" id="login">

				<div class="modal-body mx-3">
					<div class="md-form mb-5">
						<i class="fa fa-envelope prefix p2-color"></i>
						<input type="email" name="email" id="defaultForm-email" class="form-control validate">
						<label data-error=""  data-success="" for="defaultForm-email">Your email</label>
					</div>
					<div class="md-form mb-5">
						<i class="fa fa-lock prefix p2-color"></i>
						<input type="password" name="password" id="defaultForm-password" class="form-control validate">
						<label data-error="" data-success="" for="defaultForm-password">Your password</label>
					</div>
				</div>
				<div class="modal-footer d-flex justify-content-center">
					<button class="btn btn-block bt-color1" id="login-button">
						<div style="display: none" id="spinner">
							<i class="fa fa-spinner fa-spin" style="font-size:20px" ></i>
						</div>
						<div id="load-message">
							Login
						</div>
					</button>
				</div>
			</form>
		</div>
	</div>
</div>
<script>
$("#login").submit(function(event) {
    event.preventDefault();
    var email = $("#defaultForm-email").val();
    var password = $("#defaultForm-password").val();
    $.ajax({ 
        url: baseUrl+"register/tryLogin",
        data: {
        	'_email': email, 
    		'_password': password,
        },
        type: "POST",
        success: function(data) {
        	var data  = JSON.parse(data);
        	if(data != null  && data.length != "" && data.result ){
				$('#spinner').show();
				$('#load-message').hide();
			let imageUrl = baseUrl+'assets/img/login/success.gif';

				window.setTimeout(function() {
					$("#login-button").css("background-color","green");
					$(".modal-body.mx-3").html('<img src="' + imageUrl + '" style="display:block;width:189px;margin:0 auto">');
				}, 500);
				
				window.setTimeout(function() {
					window.location.replace(baseUrl+'dashboard');
                }, 3000	);
        	}else{
        		$("#defaultForm-password").val('');
				$('#spinner').hide();
				$('#load-message').show();
				$('.modal-content').css("animation","shake 0.5s");
				$("#login-button").css("background-color","red");
        	}
        }
    });
});
</script>