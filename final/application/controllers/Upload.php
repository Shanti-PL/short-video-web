<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Upload extends CI_Controller
{
	private $upload_path = "./uploads";

	function __construct()
	{
		parent::__construct();
	}

    public function index()
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
					$this->load->view('file',array('error' => ' ')); //if user already logined show upload page
				}
			}else{
				redirect('login'); //if user already logined direct user to home page
			}
		}else{
			$this->load->view('file',array('error' => ' ')); //if user already logined show login page
		}
		$this->load->view('template/footer');
	}
	
    public function do_upload()
	{
		if ( ! empty($_FILES)) 
		{
			$this->load->model('file_model');
			$config["upload_path"]   = $this->upload_path;
			$config["allowed_types"] = "gif|jpg|png";
			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload("file")) {
				echo "failed to upload file(s)";
			}else{
				$this->file_model->upload($this->upload->data('file_name'), $this->upload->data('full_path'),$this->session->userdata('username'));
			}
		}
	}

	public function remove()
	{
		$file = $this->input->post("file");
		if ($file && file_exists($this->upload_path . "/" . $file)) {
			unlink($this->upload_path . "/" . $file);
		}
	}

	public function list_files()
	{
		$this->load->helper("file");
		$files = get_filenames($this->upload_path);
		// we need name and size for dropzone mockfile
		foreach ($files as &$file) {
			$file = array(
				'name' => $file,
				'size' => filesize($this->upload_path . "/" . $file)
			);
		}

		header("Content-type: text/json");
		header("Content-type: application/json");
		echo json_encode($files);
	}

}



