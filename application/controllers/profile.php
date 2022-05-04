<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
    function __construct()
    {
        parent:: __construct();
        $this->load->Model('Users');
        session_start();
    }

	public function index()
	{
        $data['comment_all'] =$this->Users->comment_get();
		$this->load->view('header.php');
		$this->load->view('comment.php',$data);
		$this->load->view('footer.php');
	}
    public function add()
    {
        $this->load->view('header.php');
        $this->load->view('profile.php');
        $this->load->view('footer.php');
    }
    public function login()
    {
        $this->load->view('header.php');
        $this->load->view('login.php');
        $this->load->view('footer.php');
    }
    public function logout()
    {
        session_destroy();
        redirect('/index');

    }
    public function login_check()
    {

        $email = $this->input->post('email');
        $pwd = $this->input->post('pwd');
        $login_check =$this->Users->login_check($email,$pwd);

        if (empty($login_check)) {
           redirect('/login/2');
        }
        else
        {
            
            $_SESSION['user_name'] = $login_check[0]['name'];
            $_SESSION['email']=$login_check[0]['email'];
            $_SESSION['user_id']=$login_check[0]['id'];
            redirect('/index');
        }

    }
	public function add_submit_user()
    {
         $name = $this->input->post('user_name');
         $email = $this->input->post('email');
         $pwd = $this->input->post('pwd');
         $data=array('name'=> $name,'email'=>$email,'pwd'=>$pwd);
         $this->Users->insert($data);
         if ($this->Users->insert($data)) {
              redirect('/index', 'refresh');
         }
    }
    public function comment_add ()
    {
         $user_id = $this->input->post('user_id');
         $comment_new = $this->input->post('comment_new');
         $title = $this->input->post('title');
         $data=array('user_id'=> $user_id,'content'=>$comment_new,'title' =>$title,'user_name'=>$_SESSION['user_name']);
         if ($this->Users->comment_insert($data)) {
              redirect('/index', 'refresh');
         }
         
    }
    public function like()
    {
        $comment_id = $this->uri->segment(2);
        $query = $this->db->get_where('comments', array('id' => $comment_id))->result_array();
        $like = $query[0]['like'] + 1;
        
        $this->db->where('id', $comment_id);
        $this->db->update('comments', array('like' => $like));
        redirect('/index', 'refresh');

    }
    public function comment_add_user()
    {
        $comment_id =$this->input->post('comment_id');
        $user_id =$this->input->post('user_id');
        $comment_new =$this->input->post('comment_new');

        $query = $this->db->get_where('comments', array('id' => $comment_id))->result_array();
        $comment = $query[0]['comment'] + 1;
        $this->db->where('id', $comment_id);
        $this->db->update('comments', array('comment' => $comment));

         $data=array('user_id'=> $user_id,'comment_id'=>$comment_id,'Comment_content_user_add' =>$comment_new,'created_date' =>date('Y-m-d H:i:s') );
         if ($this->Users->comment_insert_user($data)) {
              redirect('/index', 'refresh');
         }



    }
}
