<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AllTeamsController extends CI_Controller {

    
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
           $user=$this->session->userdata("uID");
           $tID=$this->findCurrentLoggedinUserTeamIDs($user);
           $data['tID']= $tID;
           $data['userID']=$user;
           $data['teamTypes']=  $this->returnTypes();
           $this->load->view('ci_simplicity/allTeams',$data);
        }
        
        public function findCurrentLoggedinUserTeamIDs($currentUser){
             $this->load->model('dbModel');
             $teamIDlist=$this->dbModel->getCurrentLoggedUserCteatedTeamIDs($currentUser);
             return $teamIDlist;
        }
        
        public function returnTypes(){
            $data=array(
                'dev'=>'Developer',
                'des'=>'UI Designer',
                'qa'=>'QA',
                'use'=>'Other'
            );
            
            return $data;
        }
           
}