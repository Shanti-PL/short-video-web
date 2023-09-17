<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('encryption');
		$this->load->library('session');
		$this->load->helper('captcha');
		
	}

	public function index()
	{
		//capture part
		$vals = array(
			'word'          => 'Random word',
			'img_path'      => './captcha/',
			'img_url'       => base_url().'captcha/',
			'img_width'     => '150',
			'img_height'    => 30,
			'expiration'    => 7200,
			'word_length'   => 8,
			'font_size'     => 16,
			'img_id'        => 'Imageid',
        	'pool'          => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',
			
			// White background and border, black text and red grid
			'colors'        => array(
					'background' => array(255, 255, 255),
					'border' => array(255, 255, 255),
					'text' => array(0, 0, 0),
					'grid' => array(255, 40, 40)
					)
			);
	
			$cap = create_captcha($vals);
			$captchaword= $cap['word'];
			$this->session->set_userdata('captchaword',$captchaword);

		$data['error']= "";
		$data['captcha_image'] = $cap['image'];
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->view('template/header');
		$this->load->model('user_model');	 
		if (!$this->session->userdata('logged_in'))//check if user already login
		{	
			if (get_cookie('remember')) { // check if user activate the "remember me" feature  
				$username = get_cookie('username'); //get the username from cookie
				$password = get_cookie('password'); //get the password from cookie
				if ( $this->user_model->login($username, $password) )//check username and password correct
				{
					$user_data = array(
						'username' => $username,
						'logged_in' => true 	//create session variable
					);
					$this->session->set_userdata($user_data); //set user status to login in session
					$this->load->view('homepage',$data); //if user already logined show main page
				}
			}else{
				$this->load->view('login', $data);	//if username password incorrect, show error msg and ask user to login
			}
		}else{
			$this->load->view('homepage'); //if user already logined show main page
		}
		$this->load->view('template/footer');
	}


	public function check_login()
	{		

		$this->load->model('user_model');		//load user model
		$data['error']= "<div class=\"alert alert-danger\" role=\"alert\"> Incorrect username or passwrod!! </div> ";
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->view('template/header'); 
		//get capture information
		$captcha=$this->input->post('captcha');
		$captcha_answer=$this->session->userdata('captchaword');
		$captcha_response = trim($this->input->post('g-recaptcha-response'));
		$username = $this->input->post('username'); //getting username from login form
		$password = $this->encryption->decrypt($this->input->post('password')); //getting password from login form and decryption it
		$remember = $this->input->post('remember'); //getting remember checkbox from login form
		if(!$this->session->userdata('logged_in') && $captcha_response != ''){	//Check if user already login
			if ( $this->user_model->login($username, $password) )//check username and password
			{
				$keySecret = '6Lf4Er4aAAAAAB4yIMERzUOu5Dym79zhsTQP-EjX';

				$check = array(
					'secret'		=>	$keySecret,
					'response'		=>	$this->input->post('g-recaptcha-response')
				);

				$startProcess = curl_init();

				curl_setopt($startProcess, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");

				curl_setopt($startProcess, CURLOPT_POST, true);

				curl_setopt($startProcess, CURLOPT_POSTFIELDS, http_build_query($check));

				curl_setopt($startProcess, CURLOPT_SSL_VERIFYPEER, false);

				curl_setopt($startProcess, CURLOPT_RETURNTRANSFER, true);

				$receiveData = curl_exec($startProcess);

				$finalResponse = json_decode($receiveData, true);

				$user_data = array(
					'username' => $username,
					'logged_in' => true 	//create session variable
				);

				if($finalResponse['success'] && $captcha==$captcha_answer){
					if($remember) { // if remember me is activated create cookie
						set_cookie("username", $username, '300'); //set cookie username
						set_cookie("password", $password, '300'); //set cookie password
						set_cookie("remember", $remember, '300'); //set cookie remember
					}

					$this->session->set_userdata($user_data); //set user status to login in session
					redirect('login'); // direct user home page
				}else{
					redirect('login'); // if the reCAPTCHA failed, direct user home page
				}
			}else
			{
				$this->load->view('login', $data);	//if username password incorrect, show error msg and ask user to login
			}
		}else{
			{
				redirect('login'); //if user already logined direct user to home page
			}
		$this->load->view('template/footer');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('logged_in'); //delete login status
		redirect('login'); // redirect user back to login
	}
}
?>