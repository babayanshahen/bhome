<br><br><br>
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-2"></div>
		<div class="col-sm-8">
			<p class="h3 text-center py-3 p-color">Տոպ հայտարարություններ</p>
			<br>
			<div id="carouselExamples" class="carousel slide" data-ride="carousel" data-interval="9000">
				<div class="carousel-inner row w-100 mx-auto" role="listbox">

				<?php foreach ($topItems as $value => $topItem ): ?>
					<?php //out($topItem->item_details->id) ?>
					<div class="carousel-item col-md-3 <?php echo ($value == 0) ? 'active'  : ''  ?>" onclick="getTopStatementModal('<?php echo $topItem->item_details->id ?>')">
							<div class="card mb-4">
								<?php 
									$url = base_url('assets/statements-img/user-'.$topItem->item_details->user_id.'/'.$topItem->item_details->id.'/'.$topItem->item_details->main_image.'.jpg') 
								?>
								<div class="view overlay" style="background-image: url('<?php echo $url ?>');height: 150px;background-size: cover;">
									<!-- <div class="mask rgba-white-slight" ></div> -->
								</div>
								
							</div>
					</div>
				<?php endforeach; ?>
				</div>
				<a class="carousel-control-prev" href="#carouselExamples" role="button" data-slide="prev">
					<i class="fa fa-chevron-left fa-lg text-muted"></i>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next text-faded" href="#carouselExamples" role="button" data-slide="next">
					<i class="fa fa-chevron-right fa-lg text-muted"></i>
					<span class="sr-only">Next</span>
				</a>
			</div>
			
			
		</div>

		<div class="col-sm-2"></div>
	</div>
	<br>
	<hr>
</div>