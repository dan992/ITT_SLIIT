<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ViewRegisteredUserController extends CI_Controller {

    
	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');

		$this->_init();
                
	}

	private function _init()
	{
            $this->load->model('User');
            //if ($this->session->userdata("loggedIn"))
            $this->output->set_template('template01');
          //  else {
          //  redirect('LoginController');
        
           // }     	
	}

	public function index()
	{
        $data['tableData'] = "";
        $this->load->model('User');
        $this->load->model('dbModel');
        $companyName = $this->dbModel->getCurrentLoggedUserCompany($this->session->userdata("uID")); 
        $query= $this->dbModel->getRegisteredUsers($companyName);
        if (sizeof($query)> 0) {
            foreach ($query as $row) {
                $data['tableData'].= "<tr>";
                
                $data['tableData'].= "<td>" . $row->firstName." ".$row->lastName."</td>";
                $data['tableData'].= "</tr>";
            }
        } else {
            $data['tableData'] = "<td>You don't have registered users.</td>";
        }
           $this->load->view('ci_simplicity/viewRegisteredUser',$data);
        }
        
        
       function CheckLogin() { 

        if (isset($_POST['username'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $this->load->model('User');

            if ($this->User->validateLogin($username, $password)) {
                redirect('Main');
            } else {
                $this->load->view('ci_simplicity/loginError');
            }
        }
        
        
    }
}