<?php
class Auth_model extends CI_model
{

	public function addUser($data)
	{
		$this->db->insert('user', $data);
	}

	public function addAktor($tabel, $data)
	{
		$this->db->insert($tabel, $data);
	}

	public function cekUname($name)
	{
		return $this->db->query("SELECT count(username) jml from user where username = '$name'")->row_array();
	}
}
