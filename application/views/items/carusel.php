<!-- carusel -->
<div class="container-fluid">
	<p class="h3 text-center py-3 p-color">Տոպ հայտարարություններ</p>
	<hr>
	<br>
	<div id="carouselExamples" class="carousel slide" data-ride="carousel" data-interval="9000">
		<div class="carousel-inner row w-100 mx-auto" role="listbox">
			<?php foreach ($topItems as $topItem): ?>
				<?php //out($topItem->statemnet_id) ?>
				<div class="carousel-item col-md-3 active">
					<img class="img-fluid mx-auto d-block" src="<?php echo base_url('assets/statements-img/user-'.thisUserId().'/'.$topItem->statemnet_id.'/'.$topItem->item_details->main_image.'.jpg')?>" alt="slide 1">
				</div>
			<?php endforeach ?>
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
	<br>
	<hr>
</div>