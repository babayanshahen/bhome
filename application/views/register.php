<link href="<?php echo base_url('assets/css/register.css')?>" rel="stylesheet">
<section class="view intro-2 custom-gradient">
	<div class="container reg-anim">
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
	<div class="modal-wrap">
		<div class="modal-header"><span class="is-active"></span><span></span><span></span></div>
		<div class="modal-bodies">
			<form  autocomplete="off" method="POST" action="<?php echo base_url('register/do_registration')?>">
				<div class="modal-body modal-body-step-1 is-showing">
					<div class="title">Մուտքագրեք անուն ազգանուն կամ կազմակերպության անվանում</div>
					<div class="description">Նվազագույն նիշերի քանակը - 3 </div>	
					<input type="text" name="full_name" required placeholder="Արթուր Գևորգյան   ( BestHome )" />
					<?php echo form_error('full_name','<span class="help-block">','</span>'); ?>
					<div class="text-center">
						<div class="button" id="next-step-one">առաջ</div>
					</div>
				</div>
				<div class="modal-body modal-body-step-2">
					<div class="title">Մուտքագրեք Էլեկտրոնային հասցե</div>
					<div class="description">մւոտքագրեք Ձեր գործող Էլեկտրոնային հասցեն</div>	
					<input type="email" name="email" placeholder="Besthomearmenia@gmail.com" required />
					<?php echo form_error('email','<span class="help-block">','</span>'); ?>
					<div class="text-center fade-in">
						<div class="button" id="next-step-two">առաջ</div>
					</div>
				</div>
				<div class="modal-body modal-body-step-3">
					<div class="title">Մուտքագրեք գաղտնաբառ</div>	
					<div class="description"> Տառատեսակը - լատինատառ <br> Նվազագույն նիշերի քանակը - 6 </div>	
					<input type="password" name="password" placeholder="Մուտքագրեք գաղտնաբառ"  required />
					<?php echo form_error('password','<span class="help-block">','</span>'); ?>
					<input type="password" name="conf_password" placeholder="կրկնել գաղտնաբառը"  required />
					<?php echo form_error('conf_password','<span class="help-block">','</span>'); ?>
					<div class="text-center">
						<input type="submit" class="button" name="regisSubmit" value="Ստեղծել իմ անձնական Էջը">
					</div>
				</div>
			</form>
		</div>
	</div>
	</div>
</section>
<script>
		// alert( $(".modal-body-step-1").hasClass( "is-showing" ) );

		$("#next-step-one").css('background','#8D9AFF');
		$("#next-step-two").css('background','#8D9AFF');
		$("input[type=submit]").css('background','#8D9AFF');

		$('input[name=full_name]').on('keyup' , function(event){
			if( $(".modal-body-step-1").hasClass( "is-showing" ) ){
				_fullNameValue = $("input[name=full_name]").val();
				if( _fullNameValue.length >= 3){
					$("#next-step-one").css('background','#424f95');

						$('.button').click(function(){
								$( "#next-step-two").unbind( "click" )
						  		var $btn = $(this),
									$step = $btn.parents('.modal-body'),
									stepIndex = $step.index(),
									$pag = $('.modal-header span').eq(stepIndex);

							if(stepIndex === 0 || stepIndex === 1) { step1($step, $pag); }
							else { step3($step, $pag); }
					  
						});
				}else{
					$( ".button").unbind( "click" );
					$("#next-step-one").css('background','#8D9AFF');
				}
			}

		})

		$('input[name=email]').on('keyup' , function(event){
			if( $(".modal-body-step-2").hasClass( "is-showing" ) ){
				_emailAddress = $("input[name=email]").val();

				var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;

		    	if( pattern.test(_emailAddress)  ){
		    		$("input[type=email]").css('border','2px solid #424f95');
					$("#next-step-two").css('background','#424f95');
					$('#next-step-two').click(function(){
						var buttonSave = $("input[type=submit]");
						buttonAction(buttonSave,'disable');
				  	var $btn = $(this),
						$step = $btn.parents('.modal-body'),
						stepIndex = $step.index(),
						$pag = $('.modal-header span').eq(stepIndex);

					if(stepIndex === 0 || stepIndex === 1) { step1($step, $pag); }
					else { step3($step, $pag); }
				  
					});
		    	}else{
					$( ".button").unbind( "click" );
		    		var inputEmail = $("input[type=email]");
					var nextButton = $("#next-step-two");

					buttonAction(nextButton,'disable');
					setInputStyle(inputEmail);
		    	}
			}
		})

		$('input[name=password]').on('keyup' , function(){
			if( $(".modal-body-step-3").hasClass( "is-showing" ) ){
				var password 			= $("input[name=password]");
				var confirmPassword 	= $("input[name=conf_password]");
				var saveButton 			= $("input[type=submit]");

				checkingInputs(password,confirmPassword,saveButton);
			}
		})
		$('input[name=conf_password]').on('keyup' , function(){
			if( $(".modal-body-step-3").hasClass( "is-showing" ) ){
				var password 			= $("input[name=password]");
				var confirmPassword 	= $("input[name=conf_password]");
				var saveButton 		= $("input[type=submit]");

				checkingInputs(password,confirmPassword,saveButton);
			}
		})

		function buttonAction(button,action){
			switch(action) {
				case 'enable':
					button.prop('disabled', false);
				    button.css('background','#424f95');
			        break;
			    case 'disable':
					button.prop('disabled', true);
				    button.css('background','#8D9AFF');
			        break;
			}
		}

		function checkingInputs(password,confirmPassword,saveButton){
			if( password.val().length != 0 && confirmPassword.val().length != 0 ){
					if( password.val() === confirmPassword.val() ){
						if( password.val().length >= 6){
					
							buttonAction(saveButton,'enable');
						}else{
							buttonAction(saveButton,'disable');
						}
					}else{
						buttonAction(saveButton,'disable');
					}
				}else{
					buttonAction(saveButton,'disable');
				}
		}

		function setInputStyle(input){
			input.css('border','2px solid red');
		}

function step1($step, $pag){
	console.log('step1');
	// animate the step out
	$step.addClass('animate-out');
  
	// animate the step in
	setTimeout(function(){
    $step.removeClass('animate-out is-showing')
         .next().addClass('animate-in');
    $pag.removeClass('is-active')
          .next().addClass('is-active');
  }, 600);
  
  // after the animation, adjust the classes
  setTimeout(function(){
    $step.next().removeClass('animate-in')
          .addClass('is-showing');
    
  }, 1200);
}


function step3($step, $pag){
console.log('3');

  // animate the step out
  $step.parents('.modal-wrap').addClass('animate-up');

  setTimeout(function(){
    $('.rerun-button').css('display', 'inline-block');
  }, 300);
}

$('.rerun-button').click(function(){
 $('.modal-wrap').removeClass('animate-up')
                  .find('.modal-body')
                  .first().addClass('is-showing')
                  .siblings().removeClass('is-showing');

  $('.modal-header span').first().addClass('is-active')
                          .siblings().removeClass('is-active');
 $(this).hide();
});

</script>