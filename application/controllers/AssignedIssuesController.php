
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AssignedIssuesController extends CI_Controller {

    
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
            //$data['tableData']="";
            //$this->load->model('User');
            $firstName=$this->session->userdata("uID");
            $currentUser=$this->findFirstName($firstName);
            $projectIDs=$this->findCurrentLoggedinUserProjectIDs($currentUser);
           // $this->findProjectList($projectIDs);
           // $this->findIssueList($projectIDs);
            $data['proIDs']= $projectIDs;
            $this->load->view('ci_simplicity/assignedIssues',$data);
	}
        
        public function findFirstName($firstName)
        {
            $this->load->model('dbModel');
            $result=  $this->dbModel->findFistName($firstName);
            return $result;
        }
        
        public function findCurrentLoggedinUserProjectIDs($currentUser){
             $this->load->model('dbModel');
             $projectList=$this->dbModel->getCurrentLoggedinUserProjectIDs($currentUser);
             return $projectList;
        }
        
       
}