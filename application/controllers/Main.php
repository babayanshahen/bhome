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

	public function getStatementImages($id)
	{
		echo json_encode($this->statement_images_model->getImages($id));
	}

	public function getNewStatements(){
			$this->load->model('statement_model');

			$filter = $this->input->post();
			$results  = $this->statement_model->filterStatements($filter);
			if($results){
				foreach ($results as $result)
				{
					$modal = $this->load->view('items/statement-details-modal',array(
																					"statement_id"	=>	(int)$result->id,
																					"statement"		=>	$result
																				),true
					);
					$result->content = 	"<div class='col-6 col-sm-3'>".
											"<div class='card mb-4'>".
												"<div class='view overlay'>".
													"<img class='img-fluid' src='".base_url('assets/statements-img/user-').$result->user_id.'/'.$result->id.'/'.$result->main_image."' alt='".$result->user_id."'>".
													"<div class='mask rgba-white-slight' data-toggle='modal' data-target='#exampleModal-".(int)$result->id."'>".
													
													"</div>".
												"</div>".
												"<div class='card-body'>".
												"<h4 class='card-title p2-color'>".cutString($result->name,7,' ...')."</h4>".
												"<p class='card-text'>".cutString($result->description,15,' ...')."</p>".
												"<button type='button' class='btn bt-color btn-md' data-toggle='modal' data-target='#exampleModal-".$result->id."'>Read more</button>".
											"</div>".
											"</div>".
										"</div>".$this->load->view('items/statement-details-modal',array(
																				"statement_id"	=>	(int)$result->id,
																				"statement"		=>	$result,
																				"statement_user_id"	=> $result->user_id
																				),true
					);
				}
				
			}
			echo json_encode($results);
		
	}
}
