<?php
class Top_items_model extends CI_Model {

	public function getTopItems(){
		$topItems =	$this->db->from("top-items")
								->get()
								->result();
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
		}
		return $topItems;
	}
}