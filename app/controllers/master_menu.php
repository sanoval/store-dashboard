<?php 
class Master_menu extends Controller
{

	public function __construct() {
		$this->M_menu = $this->model('M_menu');
	}

	public function index()
	{
		$this->view('master_menu');
	}

	public function ajax_list()
	{
		$list = $this->M_menu->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $r) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $r->name;
			$row[] = $r->link;
			$row[] = $r->parent_id;
			$row[] = $r->class;
			$row[] = ($r->deleted==0?'Aktif':'Nonaktif');

			//add html for action
			$row[] = '<button type="button" class="btn btn-xs btn-danger" title="Hapus" onclick="deleteThis('."'".$r->id."'".')"><i class="fa fa-trash"></i> Delete</button></div>';

			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->M_menu->count_all(),
						"recordsFiltered" => $this->M_menu->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function delete($id) {
		$result = $this->M_menu->delete($id);
		if ($result > 0) {
			echo json_encode(array('status'=>'ok'));
		} else {
			echo json_encode(array('status'=>'failed'));
		}
	}
}