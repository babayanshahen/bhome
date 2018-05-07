<?php 
class Statement_model extends CI_Model {
	public $table = "statements";

	public function getStatementTotalRows($where)
	{
		return $this->db->from($this->table)
			->where($where)
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

	public function getStatementRecords($table=false,$limit=false,$start=false,$where=array()){

		$this->db->limit($limit,$start);
		$statements = $this->db
					->from("$table")
					->where($where)
					->order_by('time', 'DESC')
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
			$statement->user_params = $this->db->from("users")
										->where(
											array(
												'id' => $statement->user_id
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

	public function getStatements($id=false)
	{
		return $this->db
					->from("$this->table")
					->where(
						array(
							'id' => (int)$id
						)
					)
					->get()
					->row();

	}

	public function getStatementWithAll($id=false)
	{
		$items = $this->db
					->from("$this->table")
					->where(
						array(
							'id' => (int)$id
						)
					)
					->get()
					->row();

			$items->state = $this->db->from("states")
										->where(
											array(
												'value' => $items->state
											)
										)
										->get()
										->row();
			$items->type_build = $this->db->from("type_builds")
										->where(
											array(
												'type_build' => $items->type_build
											)
										)
										->get()
										->row();
			$items->kind_build = $this->db->from("kind_builds")
										->where(
											array(
												'kind_build' => $items->type_build
											)
										)
										->get()
										->row();
			$items->user_params = $this->db->from("users")
										->where(
											array(
												'id' => $items->user_id
											)
										)
										->get()
										->row();
			return $items;

	}

	public function filterStatements($where=false,$limit=false,$start=false)
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

		if((int)$where['size_room'] != 0 )
		{
			if((int)$where['size_room'] > 6)
			{
				$filter["size_room ="] = '7';
			}else{
				$filter["size_room"] = $where['size_room'];

			}
		}

		if((int)$where['floor'] != 0 )
		{
			if((int)$where['floor'] > 6)
			{
				$filter["floor ="] = '7';
			}else{
				$filter["floor"] = $where['floor'];

			}
		}

		if((int)$where['size_floor'] != 0 )
		{
			if((int)$where['size_floor'] > 6)
			{
				$filter["size_floor = "] = '7';
			}else{
				$filter["size_floor"] = $where['size_floor'];

			}
		}

		if((int)$where['valute'] != 0 )
		{
			$filter["valute"] = $where['valute'];
		}

		if(isset($filter)){
			$this->db->limit($limit,$start);
			$statements = $this->db
							->from('statements')
							->where($filter)
							->order_by('time', 'DESC')
							->get()
							->result();
		}else{
			$this->db->limit($limit,$start);
			$statements = $this->db
							->from('statements')
							->get()
							->result();
		}
		// out($this->db->last_query());
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
				$statement->user_params = $this->db->from("users")
										->where(
											array(
												'id' => $statement->user_id
											)
										)
										->get()
										->row();


			}
			return $statements;

	}

	public function countNewstatements($where=false)
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

		if((int)$where['size_room'] != 0 )
		{
			if((int)$where['size_room'] > 6)
			{
				$filter["size_room ="] = '7';
			}else{
				$filter["size_room"] = $where['size_room'];

			}
		}

		if((int)$where['floor'] != 0 )
		{
			if((int)$where['floor'] > 6)
			{
				$filter["floor ="] = '7';
			}else{
				$filter["floor"] = $where['floor'];

			}
		}

		if((int)$where['size_floor'] != 0 )
		{
			if((int)$where['size_floor'] > 6)
			{
				$filter["size_floor = "] = '7';
			}else{
				$filter["size_floor"] = $where['size_floor'];

			}
		}

		if(isset($filter))
		{
			$statements = $this->db
							->from('statements')
							->where($filter)
							->get()
							->num_rows();
		}else{
			$statements = $this->db
							->from('statements')
							->get()
							->num_rows();
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
			if(isset($statement->id) && !empty($statement->id)){
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
			}
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

	public function setMainImage($id,$data)
	{
		$statement = $this->db->from($this->table)
			->where(
					array(
						'id' => $id
					)
				)
			->get()
			->row();
		if(is_null($statement->main_image))
		{
			$this->db->where('id', $id);
			$this->db->update($this->table, $data);
		}
	}

	// public function getMainImage($id)
	// {
	// 	return $this->db->from($this->table)
	// 		->where(
	// 				array(
	// 					'id' => $id
	// 				)
	// 			)
	// 		->get()
	// 		->row()->main_image;
	// }

	public function changeMainImage($id,$data)
	{
		$statement = $this->db->from($this->table)
			->where(
					array(
						'id' => $id
					)
				)
			->get()
			->row();
			$this->db->where('id', $id);
			return $this->db->update($this->table, $data);
	}

	public function deleteStatement($statementId=false)
	{
		if($statementId)
		{
			if($this->isUserStatement($statementId))
			{
				$this->db->where(array('id' => $statementId) );
				$this->db->delete($this->table,array(),1);
				$this->deleteUserStatementImages($statementId);
			}
		}else{
			die("id  error");
		}
	}

	/*Chech  user statement or no*/
	private function isUserStatement($statementId=false)
	{
		if($statementId)
		{
			$userStatements = $this->db
				->from($this->table)
				->where(
					array(
						'user_id' => thisUserId()
					)
				)
				->get()
				->result();

			$currentStatements = array();
			foreach ($userStatements as $userStatement) {
				array_push($currentStatements, $userStatement->id);
			}

			 return in_array($statementId, $currentStatements)  ? true : false ;
		}

	}

	public function updateStatementTime($statemetnId=false)
	{
		if($statemetnId){
			$this->db->where('id', $statemetnId);
			$this->db->update(
							$this->table,array(
											'time' => time() 
										) 
						);
			return $this->db->affected_rows();
		}
	}

	private function deleteUserStatementImages($StatementId=false)
	{
		if($StatementId)
		{
			// get all file names
			$files = glob(FCPATH."assets/statements-img/user-".thisUserId() ."/".$StatementId.'/*');
			foreach($files as $file){ // iterate files
				if(is_file($file))
				unlink($file); // delete file
			}
			rmdir(FCPATH."assets/statements-img/user-".thisUserId() ."/".$StatementId);
		}
	}

}