<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index()
	{
		$this->load->model('statement_model');
		$this->load->model('users_model');
		$data = array(
						"statements" =>	$this->statement_model->getMyStatements(thisUserId()),
						"user" => $this->users_model->getUser( UserDetails()->email )
					);

		$this->load->dashboard('dashboard',$data);
	}

	public function upload($id=false)
	{
		if( !UserDetails() )
		{
			redirect('main');
		}

		$this->load->model('statement_model');
		$this->load->model('users_model');

		if($id){
			$res =$this->statement_model->getStatement($id);
			if( isset($res->user_id) && ( (int)$res->user_id === (int)thisUserId() ) )
			{
				$data= array(
							'EditStatementResult' => $this->statement_model->getStatement($id),
							'action' => base_url('dashboard/updateItem'),
							"user" => $this->users_model->getUser( UserDetails()->email )
						);

				// $this->updateItem($id,$this->statement_model->getStatement($id));

			}else{
				die("Error permission");
			}

			$this->load->dashboard('upload',$data);
			return;
		}

		$emptyState =  new stdClass();
		$emptyState->id = '';
		$emptyState->name = '';
		$emptyState->description = '';
		$emptyState->main_image = '';
		$emptyState->individual = '';
		$emptyState->agency = '';
		$emptyState->area = '';
		$emptyState->sale = '';
		$emptyState->rent = '';
		$emptyState->price = '';
		$emptyState->state = '';
		$emptyState->kind_build = '';
		$emptyState->kind_build = '';
		$emptyState->address = '';
		$emptyState->type_build = '';
		$emptyState->floor = '';
		$emptyState->size_room = '';
		$emptyState->size_floor = '';
		$emptyState->valute = '';
		$emptyState->mobile_number_1 = '';
		$emptyState->mobile_number_2 = '';
		$emptyState->mobile_number_3 = '';

		$data= array(
						'EditStatementResult' => $emptyState,
						'action' => base_url('dashboard/uploadIitem'),
						"user" => $this->users_model->getUser( UserDetails()->email )
					);
		
		$this->load->dashboard('upload',$data);
	}

	public function updateImage()
	{
		out($_FILES);
		out($_POST);
	}

	public function updateItem($id=null,$vars=null)
	{
		// $res = (boolean) $this->input->post('update');
		$this->load->model('statement_model');
		$id = $this->input->post('id');

			out( $this->input->post('update'),'dump');
			// out($_FILES);
			die();
		if( (boolean) $this->input->post('update') )
		{
			$files = $_FILES;

			$path  = FCPATH.'assets/statements-img/user-'.thisUserId().'/'.$id;

		}


		$vars = array(
			'state' 		=> $this->input->post('state'),
			'name' => $this->input->post('name'),
			'address' => $this->input->post('address'),
			'kind_build' => $this->input->post('kind_build'),
			'type_build' => $this->input->post('type_build'),
			'size_room' => $this->input->post('size_room'),
			'area' => $this->input->post('size_room'),
			'floor' => empty($this->input->post("floor")) ? null : $this->input->post("floor"),
			'size_floor' =>  empty($this->input->post("size_floor")) ? null : $this->input->post("size_floor"),
			'price' =>  $this->input->post('price'),
			'valute' =>  $this->input->post('valute'),
			'description' => $this->input->post('description'),
			'mobile_number_1' => $this->input->post('mobile_number_1'),
			'mobile_number_2' => $this->input->post('mobile_number_2'),
			'mobile_number_3' => $this->input->post('mobile_number_3')
		);

		if( $this->input->post("sale-or-rent") == "sale" ){
			$vars["sale"] ='true';
			$vars["rent"] ='false';
		}elseif($this->input->post("sale-or-rent") == "rent"){
			$vars["rent"] ='true' ;
			$vars["sale"] = 'false';
		}

		if( $this->input->post("individual-or-agency") == "individual" ){
			$vars["individual"] ='true';
			$vars["agency"] ='false';
		}elseif($this->input->post("individual-or-agency") == "agency"){
			$vars["agency"] ='true' ;
			$vars["individual"] = 'false';
		}

		if($this->statement_model->updateStatement($id,$vars)){
				$this->session->set_userdata('add_update_success', 
		        	"<div class='alert alert-success fade in alert-dismissible' style='margin-top:18px;'>
		    			<a href='#' class='close' data-dismiss='alert' aria-label='close' title='close'>×</a>
		    			<strong>Շնորհակալություն </strong>  Ձեր  հայտարարությունը թարմացված է
					</div><script>window.setTimeout(function() {
					    $('.alert').fadeTo(500, 0).slideUp(500, function(){
					        $(this).remove(); 
					    });
					}, 4000);</script>"
				);
				redirect("dashboard/upload/$id");

		}
				die();
	}

	public function uploadIitem()
	{
		$this->load->model("statement_model");
    	$this->load->model("statement_images_model");
		$this->load->library('upload');

		if(empty($_FILES)){
			redirect('dashboard');
		}

		$dataInfo = array();
		$files = $_FILES;
		$cpt = count($_FILES['pro-image']['name'])-1;
		$insertItemData = array(
								"user_id"			=> 	thisUserId(),
								"name"				=> 	$this->input->post("name"),
								"description"		=> 	$this->input->post("description"),
								// "main_image"		=>	,
								"individual"		=>	$this->input->post("individual-or-agency") == 'individual' ? 'true' : "false",
								"agency"			=>	$this->input->post("individual-or-agency") == 'agency' ? 'true' : "false",
								"area"				=>	$this->input->post("name"),
								"sale"				=>	$this->input->post("sale-or-rent") == 'sale' ? 'true' : "false",
								"rent"				=>	$this->input->post("sale-or-rent") == 'rent' ? 'true' : "false",
								"price"				=>	$this->input->post("price"),
								"state"				=>	$this->input->post("state"),
								"kind_build"		=>	$this->input->post("kind_build"),
								"address"			=>	$this->input->post("address"),
								"type_build"		=>	$this->input->post("type_build"),
								"size_room"			=>	empty($this->input->post("size_room")) ? null : $this->input->post("size_room"),
								"floor"				=>	empty($this->input->post("floor")) ? null : $this->input->post("floor"),
								"size_floor"		=>	empty($this->input->post("size_floor")) ? null : $this->input->post("size_floor"),
								"valute"			=>	$this->input->post("valute"),
								"mobile_number_1"	=>	$this->input->post("mobile_number_1"),
								"mobile_number_2"	=>	$this->input->post("mobile_number_2"),
								"mobile_number_3"	=>	$this->input->post("mobile_number_3")
							);

		$statemnetIsdertId = $this->statement_model->insertNewStatement($insertItemData);


		for($i=0; $i<$cpt; $i++)
		{
			$_FILES['pro-image']['name']= $files['pro-image']['name'][$i];
			$_FILES['pro-image']['type']= $files['pro-image']['type'][$i];
			$_FILES['pro-image']['tmp_name']= $files['pro-image']['tmp_name'][$i];
			$_FILES['pro-image']['error']= $files['pro-image']['error'][$i];
			$_FILES['pro-image']['size']= $files['pro-image']['size'][$i];    

	        $this->upload->initialize( $this->set_upload_options($statemnetIsdertId) );
	        $this->upload->do_upload('pro-image');

	        $dataInfo = $this->upload->data();


	    	$insertItems = array(
	    						"statement_id" 	=>	$statemnetIsdertId,
	    						// "src" 			=>	thisUserId().'_st_'.($i+1) ,
	    						"key" 			=>	 $dataInfo['raw_name']
	    					);

	    	$this->statement_images_model->insert($insertItems);

	        $this->session->set_userdata('add_statement_success', 
	        	"<div class='alert alert-success fade in alert-dismissible' style='margin-top:18px;'>
	    			<a href='#' class='close' data-dismiss='alert' aria-label='close' title='close'>×</a>
	    			<strong>Շնորհակալություն </strong>  Ձեր  հայտարարությունը ավելացված է մեր կայքում
				</div><script>window.setTimeout(function() {
				    $('.alert').fadeTo(500, 0).slideUp(500, function(){
				        $(this).remove(); 
				    });
				}, 4000);</script>");
	        // out($dataInfo['raw_name'];
	        // die();
	    }

	    
	    redirect('dashboard/upload');
	}

	private function set_upload_options($statementId=false)
	{   
		$path  = FCPATH.'assets/statements-img/user-'.thisUserId().'/'.$statementId;
		echo $path;
		
	    if (!file_exists($path)) {
		    mkdir($path, 0777, true);
		}

	    $config['upload_path'] 		= $path;
	    $config['allowed_types'] 	= 'jpg';
    	$config['overwrite']    	= FALSE;
    	$config['encrypt_name'] = TRUE;
	    return $config;
	}

	private  function is_dir_empty($dir)
	{
		$files = array ();
		if ( $handle = opendir ( $dir ) ) {
			while ( false !== ( $file = readdir ( $handle ) ) ) {
				if ( $file != "." && $file != ".." )
					$files[] = $file;
					if(count($files) >= 1)
					break;
			}
			closedir ( $handle );
		}
		return ( count ( $files ) > 0 ) ? FALSE : TRUE;
	}

	private function giveImageFormat($format=false)
	{
		if(isset($format) && !empty($format) && $format )
		{
			return '.'.explode('/', $format)[1];
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('user');
		redirect('');
	}

	public function settings()
	{
		$this->load->model('users_model');

		$data = array(
			"user" => $this->users_model->getUser( UserDetails()->email )
		);

		$this->load->dashboard('settings',$data);
	}

	public function updateUserParams()
	{
		$this->load->model('users_model');
		$this->load->library('upload');

		$old_password = $this->input->post('password');
		$new_password = $this->input->post('new_password');
		$c_new_password = $this->input->post('c_new_password');

        $full_name = $this->input->post('full_name');

        $vars['full_name'] = $full_name;
        if( !empty($old_password) ){
	        if( md5($old_password) == UserDetails()->password  && !empty($new_password) && !empty($c_new_password) ){


		        if( $new_password === $c_new_password )
		        {
					$vars['password'] = md5($new_password);
		        }else{
		        	die('password not match');
		        }


	        }else{
	        	die('old password not mutch or empty');
	        }
        }

        $this->upload->initialize( $this->set_upload_option_avatar() );

        if($this->upload->do_upload('upload-avatar-image'))
        {
	        $vars['avatar'] = 'avatar_user_'.thisUserId();
        }

		$this->users_model->updateUser($vars);
		redirect('dashboard/settings');
	}

	private function set_upload_option_avatar()
	{   
		$path  = FCPATH.'assets/statements-img/user-'.thisUserId().'/avatar';

		if(!is_dir($path))
		{
	      mkdir($path);
	    }
	    
	    $config['upload_path'] 		= $path;
	    $config['allowed_types'] 	= 'jpg';
    	// $config['max_size']     	= '2000000';
    	$config['overwrite']    	= TRUE;
    	$config['file_name'] 		= 'avatar_user_'.thisUserId();
   //  	$config['width'] = '204px';
 		// $config['height'] = '204px';

	    return $config;
	}

	public function deleteImage($key=false,$first=false,$second=false)
	{
		$this->load->model("statement_images_model");
		$file = FCPATH."assets/statements-img/user-".$second."/".$first."/".$key.".jpg";
		unlink($file);
		$this->statement_images_model->deleteItem($key,$first,$second);
		// $files = glob($path.'*'); // get all file names
		// 	foreach($files as $file){ // iterate files
		// 		if(is_file($file))
		// 		unlink($file); // delete file
		// 		//echo $file.'file deleted';
		// 	} 
	}
}
