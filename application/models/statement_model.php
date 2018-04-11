<?php 
class Statement_model extends CI_Model {
	public $table = "statements";

	public function getStatementTotalRows()
	{
		return $this->db->from($this->table)
			->get()
			->num_rows();

	}

	public function getSearchedStatementTotalRows($word)
	{
		return $this->db
					->from($this->table)
					->like( array('name' => $word) )
					->or_like( array('description' =>  $word) )
					->get()
					->num_rows();

	}

	public function getStatementRecords($table=false,$limit=false,$start=false){

		$this->db->limit($limit,$start);
		$statements = $this->db
					->from("$table")
					->get()
					->result();

		foreach ($statements as $statement ) {
			$statement->images = $this->db
					->from("statement-images")
					->where(
						array(
							'statement_id' => $statement->id
						)
					)
					->get()
					->result();
			$statement->state = $this->db->from("states")
										->where(
											array(
												'value' => (int)$statement->state
											)
										)
										->get()
										->row();
			$statement->type_build = $this->db->from("type_builds")
										->where(
											array(
												'id' => (int)$statement->type_build
											)
										)
										->get()
										->row();
			$statement->kind_build = $this->db->from("kind_builds")
										->where(
											array(
												'id' => (int)$statement->kind_build
											)
										)
										->get()
										->row();

		}
		
		return $statements;
	}

	public function getMyStatements($id=false)
	{
		return $this->db
					->from("$this->table")
					->where(
						array(
							'user_id' => (int)$id
						)
					)
					->get()
					->result();

	}

	public function filterStatements($where=false)
	{

		if($where['state'] != 0 )
		{
			$filter["state"] = $where['state'];
		}
		/*start*/
		if($where['individual'] == 'true')
		{
			$filter["individual"] = $where['individual'];
		}

		if($where['agency'] == 'true')
		{
			$filter["agency"] = $where['agency'];
		}

		if($where['sale'] == 'true')
		{
			$filter["sale"] = $where['sale'];
		}

		if($where['rent'] == 'true')
		{
			$filter["rent"] = $where['rent'];
		}
		/*end*/

		/*start*/
		if((int)$where['price-from'] !=0 )
		{
			$whereText = $where['price-from'];
			$filter["price >="] = " $whereText ";
		}
		if((int)$where['price-to'] !=0 )
		{
			$whereText = $where['price-to'];
			$filter["price <="] = " $whereText ";
		}
		/*end*/

		/*start*/
		if((int)$where['area-from'] !=0 )
		{
			$whereText = $where['area-from'];
			$filter["area >="] = " $whereText ";
		}
		if((int)$where['area-to'] !=0 )
		{
			$whereText = $where['area-to'];
			$filter["area <="] = " $whereText ";
		}
		/*end*/

		if((int)$where['type_build'] != 0 )
		{
			$filter["type_build"] = $where['type_build'];
		}

		if((int)$where['kind_build'] != 0 )
		{
			$filter["kind_build"] = $where['kind_build'];
		}

		if((int)$where['valute'] != 0 )
		{
			$filter["valute"] = $where['valute'];
		}
		if(isset($filter)){
			$statements = $this->db
							->from('statements')
							->where($filter)
							->get()
							->result();
		}else{
			$statements = $this->db
							->from('statements')
							->get()
							->result();
		}

			foreach ($statements as $statement ) {
				$statement->images = $this->db
						->from("statement-images")
						->where(
							array(
								'statement_id' => $statement->id
							)
						)
						->get()
						->result();
				$statement->state = $this->db->from("states")
											->where(
												array(
													'value' => (int)$statement->state
												)
											)
											->get()
											->row();
				$statement->type_build = $this->db->from("type_builds")
											->where(
												array(
													'id' => (int)$statement->type_build
												)
											)
											->get()
											->row();
				$statement->kind_build = $this->db->from("kind_builds")
											->where(
												array(
													'id' => (int)$statement->kind_build
												)
											)
											->get()
											->row();

			}
			return $statements;

	}

	public function insertNewStatement($insertItems)
	{
		$this->db->insert('statements', $insertItems);
		return  $this->db->insert_id();
	}

	public function updateStatement($id,$vars)
	{
		$this->db->where('id', $id);
		return $this->db->update( $this->table, $vars);
	}

	public function getStatement($userId=false)
	{
		if($userId){
			$statement =  $this->db
						->from('statements')
						->where( array('id' => $userId) )
						->get()
			->row();

			$statement->images = $this->db
						->from("statement-images")
						->where(
							array(
								'statement_id' => $statement->id
							)
						)
						->get()
						->result();
						return $statement;
		}else{
				die('userID  is  null');
		}
	}

	public function search($word=false,$limit=false,$start=false)
	{

		$searchStatements = 
				$this->db
					->from('statements')
					->like( array('name' => $word) )
					->or_like( array('description' =>  $word) )
					->limit($start,$limit)
					->get()
					->result();

		foreach ($searchStatements as $searchStatement ) {
			$searchStatement->state = $this->db->from("states")
											->where(
												array(
													'value' => (int)$searchStatement->state
												)
											)
											->get()
											->row();
			$searchStatement->type_build = $this->db->from("type_builds")
								->where(
									array(
										'id' => (int)$searchStatement->type_build
									)
								)
								->get()
								->row();
			$searchStatement->kind_build = $this->db->from("kind_builds")
										->where(
											array(
												'id' => (int)$searchStatement->kind_build
											)
										)
										->get()
										->row();

		}

		return $searchStatements;
		die("permission");
	}

}