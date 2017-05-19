<?php 
class Model
{
	protected $db        = '';
	protected $host      = 'localhost';
	protected $dbname    = 'dashboard_appstore';
	protected $username  = 'root';
	protected $password  = 'root';

	public function __construct()
	{
		try{
		    $this->db  = new PDO('mysql:host='.$this->host.';dbname='.$this->dbname, $this->username, $this->password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		}
		catch(PDOException $ex){
		    die(json_encode(array('outcome' => false, 'message' => 'Unable to connect')));
		}
	}
}