<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Load_more extends CI_Controller {

 function index()
 {
    $this->load->view('template/header'); 
    	if (!$this->session->userdata('logged_in'))//check if user already login
		{	
			if (get_cookie('remember')) { // check if user activate the "remember me" feature  
				$username = get_cookie('username'); //get the username from cookie
				$password = get_cookie('password'); //get the username from cookie
				if ( $this->user_model->login($username, $password) )//check username and password correct
				{
					$user_data = array('username' => $username,'logged_in' => true );
					$this->session->set_userdata($user_data); //set user status to login in session
					$this->load->view('load_more',array('error' => ' ')); //if user already logined show upload page
				}
			}else{
				redirect('login'); //if user already logined direct user to home page
			}
		}else{
			$this->load->view('load_more',array('error' => ' ')); //if user already logined show login page
		}
		$this->load->view('template/footer');

 }

 function fetch()
 {
        $output = '';
        $this->load->model('load_more_model');
        $data = $this->load_more_model->fetch_data($this->input->post('limit'), $this->input->post('start'));
        if($data->num_rows() > 0)
        {
        foreach($data->result() as $row)
        {
            $output .= '
            <div class="post_data">
            <h3 class="text-danger">'.$row->post_title.'</h3>
            <p>'.$row->post_description.'</p>
            </div>
            ';
        }
        }
        echo $output;
    }

}