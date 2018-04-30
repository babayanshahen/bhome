<?php
if(isset($postItem))
{
	$postItems = array (
		'postItem'=>$postItem
	);

}else{
	$postItems = array ();
}
if(isset($userStatement) && $userStatement)
{
	$userStatement = true;

}else{
	$userStatement = false;
}
 
$this->load->view('items/carusel',array('topItems' => $topItems));
$this->load->view('items/side-bar',$postItems);
$this->load->view('items/statement',
	array(
		'statements'	=> 	$statements,
		'userStatement'	=> 	$userStatement,
		'userDetails'	=>	isset($userDetails) ? $userDetails : false
	)
);