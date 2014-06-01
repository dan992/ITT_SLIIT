<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class CreateSprintController extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        //$this->load->helper('database');
        $this->_init();
        $this->load->library('session');
        if ($this->session->userdata('data')) {
            $this->variable = $this->session->userdata('data');
        }
    }

    private function _init() {
        $this->load->model('User');
        if ($this->session->userdata("loggedIn"))
            $this->output->set_template('template02');
        else {
            redirect('LoginController');
        }
       
    }

    public function index() {

        if ((!$this->session->userdata('sNumber')) && (!$this->session->userdata('usersProject'))) {
            //prompt users that there is no session
            $data["sNumber"] = "No session";
            $data["usersProject"] = "No session";
        } else {
            $usersProject = $this->session->userdata('usersProject');
            $sprintNumber = $this->session->userdata('sNumber');

            $data["usersProject"] = $usersProject;
            $data["sNumber"] = $sprintNumber;
        }

        $this->load->model('dbModel');
        $this->load->view('ci_simplicity/createSprint.php', $data);
        $this->load->model('dbModel');
    }

      public function updateSprint(){
       //   $usersProject = "COS";
       //   $sprintNumber =2;
            $usersProject = $this->session->userdata('usersProject');
            $sprintNumber = $this->session->userdata('sNumber');
         if(isset($_POST['assign'])){
            $spUserStory=$_POST['spUserStory'];
            $this->session->set_userdata('ustory',$spUserStory);
            $spUserStory_=$this->session->userdata('ustory');
            
            
            $spProgrammer=$_POST['programmer'];
            $spWeight=$_POST['weight'];
            
            $this->load->model('dbModel');
            $this->dbModel->updateSprint($usersProject,$sprintNumber,$spUserStory,$spProgrammer,$spWeight);
            redirect('createSprintController');
            
        } 
    }
    
    public function doneCreatingSprint(){
            if(isset($_POST['done'])){
            $sprint_date = $_POST['date_range'];
            $usersProject = $this->session->userdata('usersProject');
            $sprintNumber = $this->session->userdata('sNumber');
            $this->load->model('dbModel');
            $this->dbModel->addDatetoSprint($sprint_date,$usersProject,$sprintNumber);
            redirect('viewSprintDetailsController');
        }      
    }
    


}

?>
