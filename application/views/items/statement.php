<link rel="stylesheet" href="<?php  echo base_url('assets/css/sor.css')?>">
<div class="col-md-8">
	<div class="row" id="content-all-statement">
		<?php foreach ($statements as $statement): ?>
		<div class="col-6 col-sm-3">
			<div class="card mb-4">
				<div class="view overlay">
					<?php if( $statement->main_image ): ?>
					<img class="img-fluid" src="<?php echo base_url('assets/statements-img/user-'.$statement->user_id.'/'.$statement->id.'/'.$statement->main_image.'.jpg')?>" alt="<?php echo $statement->name.' '.$statement->description ?>">
					<?php else: ?>
					<img class="img-fluid" src="<?php echo base_url('assets/statements-img/default-image/default').".jpg"?>" alt="Card image cap">
					<?php endif; ?>
					<!-- <a href="#!"> -->
					<div class="mask rgba-white-slight" data-toggle="modal" data-target="#exampleModal-<?php echo (int)$statement->id?>">
						
					</div>
					<!-- </a> -->
				</div>
				<div class="card-body">
					<h4 class="card-title p2-color"><?php echo cutString($statement->name,15) ?></h4>
					<p class="card-text"><?php echo cutString($statement->description,20," ...Ավելին") ?></p>
					<button type="button" class="btn bt-color btn-md" data-toggle="modal" data-target="#exampleModal-<?php echo (int)$statement->id?>">
					Read more
					</button>
				</div>
			</div>
		</div>
		<?php
			$this->load->view('items/statement-details-modal',array(
																			"statement_id"	=>	(int)$statement->id,
																			"statement_user_id"	=>	(int)$statement->user_id,
																			"statement"		=>	$statement
																	)
			);
		?>
		<?php endforeach ?>
	</div>
	<!--Pagination -->
	<?php echo $this->pagination->create_links();?>
</div>
</div>
</div>