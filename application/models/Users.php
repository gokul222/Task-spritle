<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
class Users extends CI_Model  
{  
	

	function __construct(){
		parent::__construct();
	}

	public function insert($data)
	{
    	$this->db->insert('users',$data);
    	return true;
	}
	public function login_check($email,$pwd)
	{
		$query = $this->db->get_where('users', array('email' => $email,'pwd'=>$pwd))->result_array();
		return $query;

	}
	public function comment_insert($data)
	{
    	$this->db->insert('comments',$data);
    	return true;
	}
	public function comment_insert_user($data)
	{
    	$this->db->insert('user_activity',$data);
    	return true;
	}
	public function comment_get()
	{
		$query = $this->db->get('comments')->result_array();
		return $query;

	}

}