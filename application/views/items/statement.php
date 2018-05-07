<div class="col-md-8">
		<?php if ($userDetails): ?>
			<button type="button" class="btn bt-color1 button-info p-0 no-cursor" style="margin-left: 0">
						<?php if (is_file( (FCPATH.'assets/statements-img/user-'.$userDetails->id.'/'.'avatar/'.$userDetails->avatar) )): ?>
						<img class="rounded-circle img-resp" src="<?php echo base_url('assets/statements-img/user-'.$userDetails->id.'/'.'avatar/'.$userDetails->avatar) ?>" alt="<?php echo  $userDetails->full_name?> " title="<?php echo  $userDetails->full_name ?>">
						<?php else: ?>
						<img class="rounded-circle img-resp" src="<?php echo base_url('assets/img/profile/profile-avatar.png') ?>" alt="$userDetails->full_name" title="<?php echo  $userDetails->full_name ?>">

						<?php endif ?>
						<span class="ml-1 mr-2 no-cursor">
							<?php echo $userDetails->full_name ?>
						</span>
					</button>
					Բոլոր հայտարարաությունները
		<?php endif ?>
	<div class="row" id="content-all-statement">
		<?php foreach ($statements as $statement): ?>
		<div class="col-6 col-sm-3">
			<div class="card mb-4">
				<?php if( is_file( (FCPATH.'assets/statements-img/user-'.$statement->user_id.'/'.$statement->id.'/'.$statement->main_image.'.jpg') ) ): ?>
					<?php $url = base_url('assets/statements-img/user-'.$statement->user_id.'/'.$statement->id.'/'.$statement->main_image.'.jpg'); ?>
					<div class="view overlay" onclick="showStatement(<?php echo (int)$statement->id?>)" style="background-image: url('<?php echo $url ?>');height: 150px;background-size: cover;" >
					<!-- <img class="img-fluid" src="<?php  ?>" alt="<?php echo $statement->name.' '.$statement->description ?>" > -->
					<?php else: ?>
					<img class="img-fluid" src="<?php echo base_url('assets/statements-img/default-image/default').".png"?>" alt="Card image cap">
					<?php endif; ?>
					<!-- <a href="#!"> -->
					<!-- <div class="mask rgba-white-slight" data-toggle="modal" data-target="#exampleModal-<?php echo (int)$statement->id?>">
						
					</div> -->
					<!-- </a> -->
				</div>
				<div class="card-body">
					<p style="font-size: 20px;height: 35px;overflow: hidden;" class="card-title p2-color" ><?php echo cutString($statement->name,20) ?></p>
						<?php //echo $statement->description ?>
					<button type="button" class="btn bt-color1 btn-md statement-click" onclick='showStatement(<?php echo (int)$statement->id?>)'>Ավելին
					</button>
				</div>
			</div>
		</div>
		<?php
			// $this->load->view('items/statement-details-modal',array(
		// 																"statement_id"	=>	(int)$statement->id,
		// 																"statement_user_id"	=>	(int)$statement->user_id,
		// 																"statement"		=>	$statement
			// 														)
			// );
		?>
		<?php endforeach ?>
	</div>
	<!--Pagination -->
	<?php echo $this->pagination->create_links();?>
</div>
</div>
</div>