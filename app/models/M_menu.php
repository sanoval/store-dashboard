<?php 
class M_menu extends Model 
{
	var $table = 'menu';
	var $column_order = array('name','link','parent_id','class','deleted',null); //set column field database for datatable orderable
	var $order = array('id' => 'desc'); // default order 

	private function _get_datatables_query()
	{
		
		$sql_query = "SELECT * FROM ".$this->table;

		$i = 0;
		
		if(isset($_POST['order'])) // here order processing
		{
			$order_by = " ORDER BY ".$this->column_order[$_POST['order']['0']['column']]." ".$_POST['order']['0']['dir'];
		} 
		else if(isset($this->order))
		{
			$order = $this->order;
			$order_by = " ORDER BY ".key($order)." ".$order[key($order)];
		}

		return $sql_query.$order_by;
	}

	public function get_datatables()
	{
		$sql = $this->_get_datatables_query();
		if($_POST['length'] != -1)
		$limit = " LIMIT ".$_POST['start'].", ".$_POST['length'];
		$sql .= $limit;
		$stmt = $this->db->prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
		// return $sql;
	}

	public function count_filtered()
	{
		$sql = $this->_get_datatables_query();
		$stmt = $this->db->prepare($sql);
		$stmt->execute();
		return $stmt->rowCount();
	}

	public function count_all()
	{
		$stmt = $this->db->prepare("SELECT * FROM ".$this->table);
		$stmt->execute();
		return $stmt->rowCount();
	}

	public function delete($id) {
		$stmt = $this->db->prepare("DELETE FROM ".$this->table." WHERE id=:id");
		$stmt->bindValue(':id', $id, PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->rowCount();
	}
}