<?php

class User extends Model
{
	public function getUsers()
	{
		return $this->db->query("SELECT * FROM tbuser");
	}

	public function LoginUser($username, $password)
	{
		$sql   = "SELECT * FROM tbuser WHERE username=? AND password=?";
		$query = $this->db->prepare($sql);
		$query->execute(array($username, $password));
		if($query->rowCount())
		{
			return $query->fetch(PDO::FETCH_OBJ);
		}
		else
		{
			return false;
		}
	}

	public function userCheck($id)
	{
		$sql = "SELECT username FROM tbuser WHERE username=?";
		$query = $this->db->prepare($sql);
		$query->execute(array($id));
		if($query->rowCount())
		{
			return $query->fetch(PDO::FETCH_OBJ);
		}
		else
		{
			return false;
		}
	}

	public function register($username,$password,$name,$email,$nohp,$kel,$alamat)
	{
		$sql = "INSERT INTO tbuser (username,password,nama,email,nomor,IDKelurahan,alamat,level,fotouser)
				VALUES (?,?,?,?,?,?,?,?,?)";
		$query = $this->db->prepare($sql);
		$result = $query->execute(array($username,$password,$name,$email,$nohp,$kel,$alamat,'user',''));
		if($result)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
}