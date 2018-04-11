<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Statements extends CI_Controller {

	public function index($searchRes=false,$search =false,$word=false)
	{
		$this->load->model('statement_model');
		$this->load->model("statement_images_model");
		$this->load->model("top_items_model");
		$this->load->library('pagination');

		$page = $this->uri->segment(3,0);
		$per_page = 12;
		$topItems  = $this->top_items_model->getTopItems();

		$statements = $this->statement_model->getStatementRecords('statements',$per_page,$page);
		
		if($searchRes  && $search)
		{
			$data['topItems'] = $topItems;
			$data['statements'] = $searchRes;
			// $page 		= $this->uri->segment(4,0);

			$this->pagination->initialize($this->set_pagination_param($per_page,$this->statement_model->getSearchedStatementTotalRows($word),base_url('statements/searching/'.$word),4 ) );
			$this->load->template('statements',$data);return ;
			
		}
		$this->pagination->initialize($this->set_pagination_param($per_page,$this->statement_model->getStatementTotalRows(),base_url('statements/index'),3 ) );
		
		$data = array(
					'statements' 		=> $statements,
					'topItems'			=> $topItems
				);

		$this->load->template('statements',$data);
	}

	public function searching()
	{
		$this->load->model('statement_model');
		$this->load->library('pagination');

		$word		= $this->input->post('search');
		$page 		= $this->uri->segment(4,0);
		$per_page 	= 12;

		if( is_null($word) )
		{
			$word = $this->uri->segment(3,0);
		}

		$searchRes 		= $this->statement_model->search($word,$page,$per_page);
		// $this->pagination->initialize( $this->set_pagination_param( $per_page,count($res)) );
		$this->index($searchRes,$search=true,$word);
	}

	private function set_pagination_param($per_page=false,$total_rows=false,$base_url=false,$segment=false)
	{
		$config['base_url'] = $base_url;
		$config['uri_segment'] = $segment;
		$config['per_page'] = $per_page;
		$config['total_rows'] = $total_rows;

		$config['full_tag_open'] = "<nav aria-label='pagination example'>
										<ul class='pagination pagination-circle pg-blue mb-0 justify-content-center'>";

		$config['full_tag_close'] = '</ul></nav>';

		$config['num_tag_open'] = '<li class="page-item">';
		$config['attributes'] = array('class' => 'page-link waves-effect waves-effect');
		$config['num_tag_close'] = '</li>';

		$config["prev_tag_open"] = "<li class='page-item'>";
		$config['attributes'] = array('class' => 'page-link pag-color waves-effect waves-effect');
		$config["prev_link"] = "«";
		$config["prev_tag_close"] = "</li>";

		$config["next_tag_open"] = "<li class='page-item'>";
		$config['attributes'] = array('class' => 'page-link pag-color waves-effect waves-effect');
		$config["next_link"] = "»";
		$config["next_tag_close"] = "</li>";

		$config["cur_tag_open"] = "<li class='page-item'><a class='page-link pag-active waves-effect waves-effect'>";
		$config["cur_tag_close"] = "</a></li>";
		return $config;
	}
}
