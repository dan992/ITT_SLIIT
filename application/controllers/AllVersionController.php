
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AllVersionController extends CI_Controller {

    
	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');

		$this->_init();
                
	}

	private function _init()
	{
            
            $this->load->model('User');
        if ($this->session->userdata("loggedIn"))
            $this->output->set_template('template02');
        else {
            redirect('LoginController');
        }
       
               	
	}

	public function index()
	{
            
           $user=$this->session->userdata("uID");
            $projectIDs=$this->findCurrentLoggedinUserProjectIDs($user);
            $data['proIDs']= $projectIDs;
            
            
            $this->load->view('ci_simplicity/allVersion',$data);
	}
            public function getScrumMastersProjects($user) {
            $this->load->model('dbModel');
            $projects = $this->dbModel->findScrumMastersProjects($user);
            return $projects;
        }
          public function findCurrentLoggedinUserProjectIDs($currentUser){
             $this->load->model('dbModel');
             $projectList=$this->dbModel->getCurrentUserProjectIDs($currentUser);
             return $projectList;
        }
      
       
}