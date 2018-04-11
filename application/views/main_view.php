<?php 
$this->load->view('items/section');

if(false)
{
	$this->load->view('items/carusel',	array(
											"topItems"	=>	$topItems
										)
					);
	$this->load->view('items/side-bar');
	$this->load->view('items/statement', array(
												'statements'	=> $statements
											) 
					);
}
