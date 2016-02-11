<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Home
 *
 * @author Alina Shakya <a.shakya@andmine.com>
 */
class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];
            $this->load->view('home_view', $data);
        } else {
            redirect('login', 'refresh');
        }
    }

    public function create_user() {
        
    }

    public function logout() {
        $this->session->unset_userdata('logged_in');
        session_destroy();
        redirect('home', 'refresh');
    }

    function search_keyword() {
        $this->load->model('user');
        $keyword = $this->input->post('keyword');
        $data['results'] = $this->user->search($keyword);
        $this->load->view('result_view.php', $data);
    }

    function send_mail() {
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'smtp.mailgun.org',
            'smtp_port' => 25,
            'smtp_user' => 'postmaster@novvi.com.au',
            'smtp_pass' => '57iev2aw-kz6',
            'smtp_timeout' => '4',
            'mailtype' => 'html',
            'charset' => 'iso-8859-1'
        );

   
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");

        $this->email->from('alina.shakya3@gmail.com', 'Anil Labs');
        $data = array(
            'userName' => 'Anil Kumar Panigrahi'
        );
        $this->email->to('alinaandmine@gmail.com');  // replace it with receiver mail id
        $this->email->subject('Hey'); // replace it with relevant subject

        $body = $this->load->view('email_view.php', $data, TRUE);
        $this->email->message($body);
        if ($this->email->send()) {
            echo 'EMail sent';
        } else {
            echo 'Email not sent';
        }
    }

    public function send_mails() {
        $this->load->library('email');

        $this->load->helper('url');

        if (!isset($_POST['e-mail'])) {
            //redirect if no parameter e-mail
            redirect(base_url());
        };

        //load email helper
        $this->load->helper('email');
        //load email library
        $this->load->library('email');

        //read parameters from $_POST using input class
        $email = $this->input->post('e-mail', true);

        // check is email addrress valid or no
        if (valid_email($email)) {
            // compose email
            $this->email->from($email, 'Namesmile');
            $this->email->to($email);
            $this->email->subject('Runnable CodeIgniter Email Example');
            $this->email->message('Hello from Runnable CodeIgniter Email Example App!');

            // try send mail ant if not able print debug
            if (!$this->email->send()) {
                $data['message'] = "Email not sent \n" . $this->email->print_debugger();
                //$this->load->view('header');
                $this->load->view('message', $data);
                //$this->load->view('footer');
            }
            // successfull message
            $data['message'] = "Email was successfully sent to $email";

            //$this->load->view('header');
            $this->load->view('message', $data);
            //$this->load->view('footer');
        } else {

            $data['message'] = "Email address ($email) is not correct. Please <a href=" . base_url() . ">try again</a>";

            //$this->load->view('header');
            $this->load->view('message', $data);
            //$this->load->view('footer');
        }
    }

}
