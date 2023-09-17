<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class register extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('encryption');
        $this->load->model('register_model');
    }

    function index()
    {
        $this->load->view('template/header');
        $this->load->view('register');
        $this->load->view('template/footer');
    }

    function validation() {
        $this->form_validation->set_rules('username', 'Name', 'required|trim');
        $this->form_validation->set_rules('useremail', 'Email', 'required|trim|valid_email|is_unique[users.useremail]');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if($this->form_validation->run()){
            $verification_key = md5(rand());
            $encrypted_password = $this->encryption->encrypt($this->input->post('password'));
            $data = array(
                'username'  => $this->input->post('username'),
                'password'  => $encrypted_password,
                'useremail' => $this->input->post('useremail'),              
                'verification_key'  => $verification_key
            );
            $id = $this->register_model->insert($data);
            $this->load->view('template/header');
            $this->load->view('register_success');
            $this->load->view('template/footer');
            
            $subject = "Weclome to DingDong";
            $message = "
            You have registared a new account on DingDong. Enjoy yourself on DingDong.
            ";
            $config = array(
                'protocol' => 'smtp',
                'smtp_host' => 'mailhub.eait.uq.edu.au',
                'smtp_port' => 25,
                'mailtype' => 'html',
                'charset' => 'iso-8859-1',
                'wordwrap' => TRUE ,
                'mailtype' => 'html',
                'starttls' => true,
                'newline' => "\r\n"
            );
            $this->email->initialize($config);
            $this->email->from(get_current_user().'@student.uq.edu.au',get_current_user());
            $this->email->to($this->input->post('useremail'));
            $this->email->subject($subject);
            $this->email->message($message);
            $this->email->send();
            
        }else{
            $this->index();
        }
    }
}

?>