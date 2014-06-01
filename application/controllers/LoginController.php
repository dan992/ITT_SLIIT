<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class LoginController extends CI_Controller {

    
	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');

		$this->_init();
                
	}

	private function _init()
	{
            if($this->session->userdata("loggedIn")){
                $this->session->set_userdata("loggedIn",FALSE);
                $this->session->sess_destroy();
            }
            $this->output->set_template('template01');
	}

	public function index()
	{
            //$data;
            $data['error']="";
            $this->load->view('ci_simplicity/home',$data  );
            //$this->load->view('ci_simplicity/BackLog',$data);
	}

        function  CheckLogin(){

            if(isset($_POST['username'])){
                $username= $_POST['username'];
                $password=$_POST['password'];

                $this->load->model('User');
                
                if ($this->User->validateLogin($username,$password)){
                    redirect('DashboardController');
                }
                else {    
                    $data['error']="<div>
                                  <p style='color: red'>Username or password does not match.</p>
			    </div>";
                    $this->load->view('ci_simplicity/home',$data);
                }
            }
//            else {       
//                    $this->load->view('ci_simplicity/loginError');
//            }
        }
        
        public function redirecthere(){
            redirect('LoginController');
        }
}
