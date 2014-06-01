<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ProjectStatusController extends CI_Controller {

    
    
	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');

		$this->_init();
                
	}

	private function _init()
	{
            if($this->session->userdata("loggedIn"))
                $this->output->set_template('template02');
            else {
                redirect('LoginController');
            }
	}

	public function index()
	{

            $this->load->model('User');
            $data['projects']=  $this->genarateData();
            $data['tableData']="";
            $this->load->view('ci_simplicity/viewProjectStatus',$data);
	}
        
        public function genarateData(){
            $data="";
            $this->load->model('User');
            $this->load->model('Project');
            $query=$this->Project->getProjectList($this->session->userdata("uID"));//(User::$Username);
            if ($query->num_rows() > 0){
                $data.="<div  align='left'><h3>Select the project to view the current status</h3><br><select id='usersProject' name='usersProject' >";
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
            $data['tableData']="";
            $query=$this->Project->getIssues($key);
            if ($query->num_rows() > 0){
                $data['tableData'].="<center><h3>".$this->Project->getProjectName($key)."</h3>";
                $data['tableData'].="<table class='chart'>
                                        <tr>
                                            <td width='80px'>Issue ID</td>
                                            <td width='100px'></td>
                                            <td width='100px'></td>
                                            <td width='100px'></td>
                                            <td width='100px'></td>
                                            <td width='20px'></td>
                                        </tr>";

                foreach ($query->result() as $row)
                {
                    if($row->status==1)
                        $data['tableData'].=$this->bar1($row->issue_id);
                    elseif($row->status==2)
                        $data['tableData'].=$this->bar2($row->issue_id);
                    elseif($row->status==3)
                        $data['tableData'].=$this->bar3($row->issue_id);
                    elseif($row->status==4)
                        $data['tableData'].=$this->bar4($row->issue_id);
                 }
               $data['tableData'].="<tr>
                                        <td></td>
                                        <td>Not Started</td>
                                        <td>Started</td>
                                        <td>Testing</td>
                                        <td>Completed</td>
                                    </tr>
                                    </table>";
            }
            else {
                    $data['tableData']="<center><h3>This project doesn't have any issues created.</h3></center>";    
            }
               
               $data['projects']=  $this->genarateData();
               
               $this->load->view('ci_simplicity/viewProjectStatus',$data);
        }
        
        function bar1($name){
            $data= "<tr>
                        <td>".$name."</td>
                        <td id='bar1'></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>";
            return $data;
        }
        
        function bar2($name){
            $data= "<tr>
                        <td>".$name."</td>
                        <td id='bar2'></td>
                        <td id='bar2'></td>
                        <td></td>
                        <td></td>
                    </tr>";
            return $data;
        }
        
        function bar3($name){
            $data= "<tr>
                        <td>".$name."</td>
                        <td id='bar3'></td>
                        <td id='bar3'></td>
                        <td id='bar3'></td>
                        <td></td>
                    </tr>";
            return $data;
        }
        
        function bar4($name){
            $data= "<tr>
                        <td>".$name."</td>
                        <td id='bar4'></td>
                        <td id='bar4'></td>
                        <td id='bar4'></td>
                        <td id='bar4'></td>
                    </tr>";
            return $data;
        }
       
        
}
