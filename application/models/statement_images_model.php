<?php 
class Statement_images_model extends CI_Model {
	public $table = "statement-images";

	public function getImages($id)
	{
		return $this->db
					->from('statement-images')
					->where(
						array(
							'statement_id' => $id
						)
					)
					->get()
					->result();
	}

	public function insert($isnertItems)
	{
		return $this->db->insert($this->table, $isnertItems);
	}

	public function deleteItem($key=false)
	{
		$this->db->delete($this->table, array('key'=>$key),1 );
		
		echo json_encode($this->db->affected_rows() == 1 ? true :false);
		return ;
		// echo $this->db->last_query();
		// $this->db->delete($this->table);
		// out($id);

	}

}