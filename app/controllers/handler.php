<?php 
class Handler extends Controller
{
	protected $master;

	public function __construct() {
		$this->master = $this->model('M_master');
	}

	public function index() {
		$this->view('index');
	}

    /**
     *
     */
    public function getmenu() {
		$menu = "";
		$level1 = $this->master->getlist("parent_id = 0")->fetchAll(PDO::FETCH_OBJ);
		//menu level 1
		foreach ( $level1 as $i) {
			$level2 = $this->master->getlist("parent_id = ".$i->id);
			if ($level2->rowCount() >= 1) {
				$menu .= '<li class="treeview"><a href="javascript:void(0)"><i class="fa '.$i->class.'"></i> <span>'.$i->name.'</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a><ul class="treeview-menu">';
			    //menu level 2
			    foreach ( $level2->fetchAll(PDO::FETCH_OBJ) as $j) {
			    	$level3 = $this->master->getlist("parent_id = ".$j->id);
			    	if ($level3->rowCount() >= 1) {
				    	$menu .= '<li class="treeview"><a href="javascript:void(0)"><i class="fa '.$j->class.'"></i> <span>'.$j->name.'</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a><ul class="treeview-menu">';
			    		foreach ( $level3->fetchAll(PDO::FETCH_OBJ) as $k) {
			    			$menu .= '<li onclick="oppage(\''.$k->link.'\')"><a href="javascript:void(0)"><i class="fa '.$k->class.'"></i> '.$k->name.'</a></li>';
			    		}
			    		$menu .= '</li>';
			    	} else {
			    		$menu .= '<li onclick="oppage(\''.$j->link.'\')"><a href="javascript:void(0)"><i class="fa '.$j->class.'"></i> '.$j->name.'</a></li>';
			    	}
			    }
			    $menu .= '</li>';
			} else {
				$menu .= '<li onclick="oppage(\''.$i->link.'\')"><a href="javascript:void(0)"><i class="fa '.$i->class.'"></i> '.$i->name.'</a></li>';
			}
		}
		echo $menu;
	}

	public function getpage($page = "") {
		if ($page == "" ) {
			$this->view('home');
		} else {
			$this->view($page);
		}
	}
}