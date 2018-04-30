<nav class="side-menu">
	<ul class="nav">
		<li >
			<a href="<?php echo base_url('statements') ?>"><span class="fa fa-dashboard"></span> Դեպի գլխավոր Էջ</a>
		</li>
		<li class="<?php echo ($this->uri->segment(2) == 'upload') ? 'active' : ''  ?>">
			<a href="<?php echo base_url('dashboard/upload') ?>"><span class="fa fa-plus"></span> Նոր հայտարարություն</a>
		</li>
		<li class="<?php echo $this->uri->segment(2) == 'index' ? 'active': ''  ?> " >
			<a href="<?php echo base_url('dashboard/index') ?>"><span class="fa fa-user"></span> Իմ հայտարարություններ</a>
		</li>
		<li class="<?php echo $this->uri->segment(2) == 'settings' ? 'active': ''  ?> ">
			<a href="<?php echo base_url('dashboard/settings') ?>"><span class="fa fa-cog"></span> Կարգավորումներ</a>
		</li>
		<li >
			<a href="<?php echo base_url('dashboard/logout') ?>"><span class="fa fa-sign-out"></span> Դուրս Գալ</a>
		</li>
	</ul>
</nav>