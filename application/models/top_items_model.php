<?php
class Top_items_model extends CI_Model {

	public function getTopItems(){
		$topItems =	$this->db->from("top-items")
								->get()
								->result();

			// $statement = $this->db
			// 			->from("statements")
			// 			->where(array('id' => $topItem->statemnet_id))
			// 			->get()
			// 			->row();

		foreach ($topItems as $topItem)
		{
			$topItem->item_details = $this->db->from("statements")
											->where(
													array(
														'id' => $topItem->statemnet_id
													)
												)
											->get()
											->row();

			$topItem->item_details->state = $this->db->from("states")
										->where(
											array(
												'value' => $topItem->item_details->state
											)
										)
										->get()
										->row();
			$topItem->item_details->type_build = $this->db->from("type_builds")
										->where(
											array(
												'type_build' => $topItem->item_details->type_build
											)
										)
										->get()
										->row();
			$topItem->item_details->kind_build = $this->db->from("kind_builds")
										->where(
											array(
												'kind_build' => $topItem->item_details->type_build
											)
										)
										->get()
										->row();
		}

		// out($topItems);
		// die();

		return $topItems;
	}
}