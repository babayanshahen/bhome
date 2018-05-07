<style>
.closebtn {
    position: absolute;
    top: 1px;
    right: 17px;
    color: black;
    font-size: 30px;
    cursor: pointer;
    color: white;
    display: none;
    transition: 0.4s;

}

.tz-gallery .row > div {
    margin-bottom: 5px;
}

.tz-gallery .lightbox:before {
    position: absolute;
    top: 50%;
    left: 50%;
    margin-top: -13px;
    margin-left: -13px;
    opacity: 0;
    color: #fff;
    font-size: 26px;
    font-family: 'Glyphicons Halflings';
    content: '\e003';
    pointer-events: none;
    z-index: 9000;
    transition: 0.4s;
}


.tz-gallery .lightbox:after {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    opacity: 0;
    background-color: rgba(46, 132, 206, 0.7);
    content: '';
}

.tz-gallery .lightbox:hover:after,
.tz-gallery .lightbox:hover:before {
    opacity: 1;
}

.baguetteBox-button {
    background-color: transparent !important;
}

.image-header{
	color: white;
	background-color: #424f95;
	height: 40px;
    margin-bottom: 5px;
}
.image-header p {
	padding: 5px;
}

#expandedImg {
	padding: 0 15px 0px 15px;
}

.tz-gallery .image-header p{
	/*margin-left: 10px;*/
	margin-top: 5px;
	font-size:20px
}

#row-keyword > div{
	height:  55px;
	background-color: #424f95 !important; 
	border:2px solid white;
	color: white;
}

.tz-gallery{
	margin-left: 0;
}

.testing{
	width: 112px;
    height: 112px;
    background-position: center;
    background-size: cover;
    margin: 0 5px 5px 0; 
   /* margin-left: 5px; 
    margin-top: 3px; */
}
.container-fluid.image-gallery-custom{
	padding: 0 0 0 15px;
}
#row-keyword > div{
	text-align: center;	
}

/*@media(max-width: 768px) {
    body {
        padding: 0;
    }
}*/
</style>
<div class="container-fluid">
	<div class="row" id="statement-main-page">
		<div class="col-md-8">
			<div class="tz-gallery">
				<div class="image-header">
					<p>
						<?php echo cutString($statement->name,77,' ...') ?>
					</p>
					<!-- <span onclick="closeImage()" class="closebtn">&times;</span> -->
				</div>
			</div>
				<div class="container-fluid image-gallery-custom">
					<div class="row" id="statement-image-content" >
						<?php drawImage($statement->id,$statement->user_id) ?>
					</div>
				</div>
				<div id="main-image" data-statement-id="<?php echo $statement->id  ?>"></div>
		</div>
		<div class="col-md-4">
			<a href="<?php echo base_url("statements/userStatement/$statement->user_id") ?>">
				<button  class="btn bt-color1 button-info p-0 no-cursor">
					<?php if (is_file( (FCPATH.'assets/statements-img/user-'.$statement->user_id.'/'.'avatar/'.$statement->user_params->avatar) )): ?>
					<img class="rounded-circle img-resp" src="<?php echo base_url('assets/statements-img/user-'.$statement->user_id.'/'.'avatar/'.$statement->user_params->avatar) ?>" alt="$statement->user_params->full_name" title="<?php echo  $statement->user_params->full_name ?>">
					<?php else: ?>
					<img class="rounded-circle img-resp" src="<?php echo base_url('assets/img/profile/profile-avatar.png') ?>" alt="$statement->user_params->full_name" title="<?php echo  $statement->user_params->full_name ?>">

					<?php endif ?>
					<span class="ml-1 mr-2 p-0 no-cursor">
						<?php echo $statement->user_params->full_name ?>
					</span>
				</button>
			</a>
			<button class="btn bt-color1 button-back float-right" id="go-back" onmouseover='onOver()' onmouseout='onOut()'> X </button>
			<h3 class="modal-title p2-color"><?php echo $statement->name ?></h3>
			<div class="row statement-description">
				<div class="col-md-12">
					<?php echo $statement->description ;?>
				</div>
			</div>
			<div class="row" id="row-keyword">
				<?php drawKeywords($statement); ?>
			</div>
		</div>
	</div>
</div>
<script>
	// oldContent = $("#statement-image-content").html();
	$("#main-image").ready(function(){
		var _statement_id = $("#main-image").attr('data-statement-id');
		$.ajax({
			url: baseUrl+"main/getMainImageUrl/"+_statement_id,
            success: function(image){
            	var image = JSON.parse(image);
            	// console.log(image.link)
            	$("#main-image").css('background-image','url(' + image.link + ')');
            	$("#main-image").css('background-repeat','no-repeat');
            	$("#main-image").css('background-size','contain');
            	$("#main-image").css('width','100%');
            	$("#main-image").css('height','100%');
            	$("#main-image").css('margin-top','8px');
            }
        });
	})

	function myFunction(imgs) {
		// $("#statement-image-content > img").fadeIn(5000);
		// $(".closebtn").show();
	}
	
	function showImageLargeFormat(link){
       	$("#main-image").css('background-image','url(' + link + ')');
		// $("#statement-image-content").html("<img src='" + imgs.src + "' id='expandedImg' width='100%'  height='100%' />");
	}

	// function closeImage(){
	// 	$(".closebtn").hide();
	// 	$("#statement-image-content").html(window.oldContent);
	// }
	function onOver(){
		$("#statement-main-page").css('opacity','0.5');
	}

	function onOut(){
		$("#statement-main-page").css('opacity','1');
	}
</script>
