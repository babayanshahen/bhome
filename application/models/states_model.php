<?php 
class States_model extends CI_Model {
	public function getStatements(){
		return $this->db
					->from('states')
					->get()
					->result();
	}
}