<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ChangeIssueProgerssController extends CI_Controller {

    
    
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

            $data['projects']=  $this->genarateData();
            $data['tableData']="";
            $this->load->view('ci_simplicity/ChangeIssueProgress',$data);
            //$this->load->view('ci_simplicity/BackLog',$data);
	}
        
        public function genarateData(){
            $data="";
            $this->load->model('User');
            $this->load->model('Project');
            $query=$this->Project->getProjectList($this->session->userdata("uID"));//(User::$Username);
            if ($query->num_rows() > 0){
                $data.="<div  align='left'><h3>Select the project to view and update issue status</h3><br><select id='usersProject' name='usersProject' >";
                foreach ( $query->result() as $row) {
                    $data.='<option value="'.$row->key.'">'.$row->name.'</option>';
                }
                $data.="</select>&nbsp;&nbsp;&nbsp;&nbsp;
                        
                            <button data-toggle='modal'  type='submit' name='view' class='btn btn-primary'>View Project</button>
                        </div>";
            }
            else {
                    $data="<center><h3>You don't have any projects created.</h3></center>";    
            }            
            return $data;                             
        }
        
        function genarateTable(){
            $this->load->model('Project');
            $key= $_POST['usersProject'];
            $query=$this->Project->getIssues($key);
            if ($query->num_rows() > 0){
                $data['tableData']="<center><h3>".$this->Project->getProjectName($key)."</h3>";//"kkk</h3>";
                
                $data['tableData'].="<table class='table table-striped'>";
                            //$data['tableData'].="<h3>".$row->projectID."</h3>";
                $data['tableData'].="<tr>";
                $data['tableData'].="<th width='200px' >Issue Type</th>";
                $data['tableData'].="<th width='500px'>Summary</th>";
                $data['tableData'].="<th width='100px' style='text-align: center'>Priority</th>";
                $data['tableData'].="<th width='180px'>Current Status</th>";
                $data['tableData'].="<th width='150px' style='text-align: center'>New Status</th>";
                $data['tableData'].="<th width='150px' style='text-align: center'>Update Issue</th>";
                $data['tableData'].="</tr>";
                foreach ($query->result() as $row)
                {
                   //SELECT `Issue_type`,`Summary`,`priorty`,`status` FROM `issues`
                    $data['tableData'].="<form name='issues' method='post' action='"
                            .base_url()."index.php/ChangeIssueProgerssController/updateIssue' >";
                    $data['tableData'].="<input type='hidden' name='iid' value='".$row->issue_id."'/>";
                    $data['tableData'].="<input type='hidden' name='usersProject' value='".$key."'/>";
                    $data['tableData'].="<tr>";
                    $data['tableData'].="<td>".$row->Issue_type."</td>";
                    $data['tableData'].="<td>".$row->Summary."</td>";
                    $data['tableData'].="<td><center>".$row->priorty."</center></td>";
                    $data['tableData'].="<td>";
                    if($row->status==1)
                            $data['tableData'].="Not Started</td>";
                    elseif($row->status==2)
                            $data['tableData'].="In Progress</td>";
                    elseif($row->status==3)
                            $data['tableData'].="Completed</td>";
                    elseif($row->status==4)
                            $data['tableData'].="Suspended</td>";
                    $data['tableData'].="</td>";
                    $data['tableData'].="<td><center>
                                        <select name='newStatus' id='newStatus'>
                                                <option value='1'>Not Started</option>
                                                <option value='2'>In Progress</option>
                                                <option value='3'>Completed</option>
                                                <option value='4'>Suspended</option>
                                        </select></center>		
                                        </td>";
                    $data['tableData'].="<td><center><input name='updateStatus' type='submit' value='Update'></center></td>";
                    $data['tableData'].="</tr>";
                    $data['tableData'].="</form>";
                 }
               $data['tableData'].="</table></center><br><br>";
            }
            else {
                    $data['tableData']="<center><h3>This project doesn't have any issues created.</h3></center>";    
            }
               
               $data['projects']=  $this->genarateData();
               
               $this->load->view('ci_simplicity/ChangeIssueProgress',$data);
        }
        
        public function updateIssue(){
            $this->load->model('Project');
            $this->Project->updateIssueStatus($_POST['iid'],$_POST['newStatus']);
            $this->genarateTable();
        }
        
}
