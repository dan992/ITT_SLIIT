<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class createTeamController extends CI_Controller {

    
	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');

		$this->_init();
                
	}

	private function _init()
	{ $this->load->model('User');
        if ($this->session->userdata("loggedIn"))
            $this->output->set_template('template02');
        else {
            redirect('LoginController');
        }
       
        }
        
       	public function index()
	{
           // $this->load->view('header');
            //$user="";
            
             $type=$this->input->get('type');
            $data['array2']=  $this->getUserNAmes($type);
            $data['type']=$type;
             $data['tableData'] = "";
       
        $this->load->model('dbModel');
        $companyName = $this->dbModel->getCurrentLoggedUserCompany($this->session->userdata("uID")); 
        $query= $this->dbModel->getRegisteredUsers($companyName,$type);
        if (sizeof($query)> 0) {
            foreach ($query as $row) {
                $data['tableData'].= "<tr>";
                
                $data['tableData'].= "<td>" . $row->firstName." ".$row->lastName."</td>";
                $data['tableData'].= "</tr>";
            }
        } else {
            $data['tableData'] = "<td>You don't have registered users.</td>";
        }
         
            
           
	    $this->load->view('ci_simplicity/createTeam',$data);
	}
    
            
       public function getUserNAmes($pro) {
        $us = array();
        $this->load->model('dbModel');
        $usj = $this->dbModel->getUsersListArray($pro);

        foreach ($usj as $row) {
            $us[] = $row->firstName . " " . $row->lastName;
        }
        $array1 = implode("','", $us);
        return $array1;
    }
      
        public function cancel(){
            //where to redirict. 
        }
        public function createTeam(){
            $this->load->model('dbModel');
            $user=$this->session->userdata("uID");//current logged in user who create the team;
            $devUsers[]=array();
                   
            if(isset($_POST['create'])){
               //$tID=$_POST['tID'];
               $tname= $_POST['tName'];
               $description=$_POST['description'];
               $devU=$_POST['devU'];
               $type=$_POST['tType'];
               $devUsers=  explode(',', $devU);
               $newTID= $this->dbModel->getTeamID()+1;
               $this->insertUserTeams($newTID,$devUsers);
              
              $this->dbModel->insertTeam($tname,$description,$user,$type);
              redirect('AllTeamsController');
            }
        }
        
        
        public function insertUserTeams($tID,$array){
            $this->load->model('dbModel');
            
            for($i=0;$i<sizeof($array);$i++){
                $results = $this->dbModel->findUsersID($array[$i]);
                $data= array(
                    'tID'=>$tID,
                    'profileNO'=>$results);
                 $this->dbModel->insertTeamMembers($data);
            }
           
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

