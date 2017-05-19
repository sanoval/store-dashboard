<?php

class M_master extends Model
{
	public function getlist($wh) {
		$sql = "SELECT * FROM menu WHERE deleted = 0 AND ".$wh;
		$query = $this->db->query($sql);
		return $query;
	}
}