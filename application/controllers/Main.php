<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	public function index()
	{
		$this->load->model('statement_model');
		$this->load->model("statement_images_model");
		
		$statements = $this->statement_model->getStatementRecords('statements');
		// $statemnet_images = $this->statement_images_model->getImages();
		
		$data = array(
					'statements'	=> $statements
				);

		$this->load->template('main_view',$data);
	}
	public function showNewStatement($id=false)
	{
		if($id)
		{
			$this->load->model('statement_model');
			$result = $this->statement_model->getStatementWithAll($id);
			// out($result);

			echo json_encode(
				$this->load->view('items/statement-details-modal',array(
																	"statement_id"		=>	(int)$result->id,
																	"statement"			=>	$result,
																	"statement_user_id"	=> $result->user_id
																),true
				)
			);

		}
		// $data =array('a' => 1);
		// echo json_encode($data);
	}

	public function getStatementImages($id)
	{
		echo json_encode($this->statement_images_model->getImages($id));
	}

	public function getNewStatements($per_page=false,$page=false,$currentPage=false)
	{
			$this->load->model('statement_model');
			$this->load->library('pagination');

			$per_page = 12;
			$filter = $this->input->post();
			$results  = $this->statement_model->filterStatements($filter,$per_page,$page);
			$countNewstatements  = $this->statement_model->countNewstatements($filter);

			$resultContent = '';
			if($results){
				foreach ($results as $result)
				{
					$modal = $this->load->view('items/statement-details-modal',array(
																					"statement_id"	=>	(int)$result->id,
																					"statement"		=>	$result
																				),true
					);
					$resultContent = 	"<div class='col-6 col-sm-3'>".
											"<div class='card mb-4'>".
												"<div class='view overlay'>";
					if (is_file( (FCPATH.'assets/statements-img/user-'.$result->user_id.'/'.$result->id.'/'.$result->main_image.'.jpg') )) {

						$resultContent .= "<img class='img-fluid' src='".base_url('assets/statements-img/user-').$result->user_id.'/'.$result->id.'/'.$result->main_image.".jpg' alt='".$result->name."'>";

					}else{

						$resultContent	.= "<img class='img-fluid' src='".base_url('assets/statements-img/default-image/default').".png'>";

					}
					$resultContent	.=	"<div class='mask rgba-white-slight' data-toggle='modal' data-target='#exampleModal-".(int)$result->id."'>".
													
													"</div>".
												"</div>".
												"<div class='card-body'>".
												"<h4 class='card-title p2-color'>".cutString($result->name , 15,' ...')."</h4>".
												"<p class='card-text'>".cutString($result->description,15,' ...')."</p>".
												"<button type='button' class='btn bt-color1 btn-md' data-toggle='modal' data-target='#exampleModal-".$result->id."'>Read more</button>".
											"</div>".
											"</div>".
										"</div>".$this->load->view('items/statement-details-modal',array(
																				"statement_id"		=>	(int)$result->id,
																				"statement"			=>	$result,
																				"statement_user_id"	=> $result->user_id
																				),true
					);
					$result->content 		= $resultContent;
					$result->pagination 	= $countNewstatements ;
					$result->currentPage 	= $currentPage;
				}
			}
			echo json_encode($results);
		
	}
}
