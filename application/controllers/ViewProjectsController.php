<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class ViewProjectsController extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->helper('url');
        $this->load->helper('string');

        $this->_init();
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
        $data['tableData'] = "";
        $this->load->model('User');
        $this->load->model('Project');
        $query = $this->Project->getProjectSummary($this->session->userdata("uID")); //(User::$Username);
        //$data['tableData'].=$this->session->userdata("uID")."ssgsgsg";
        //$data['tableData']+= $this->session->userdata("uID")."hkbkkvkvkskcbsabkab";
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data['tableData'].= "<tr>";
                $data['tableData'].= "<td>" . $row->key . "</td>";
                $data['tableData'].= "<td><a href=\"ProjectFundAllocationController?pID=".$row->key."\"> ". $row->name . "</a></td>";
                 $data['tableData'].= "<td><a href='#' onclick=\"deleteProjectFunction('".$row->key."')\" >Delete</a></td>";
                $data['tableData'].= "</tr>";
            }
        } else {
            $data['tableData'] = "<td></td><td>You don't have any projects created.</td>";
        }

        $this->load->view('ci_simplicity/viewProjects', $data);
        //$this->load->view('ci_simplicity/BackLog',$data);
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

    public function redirecthere() {
        redirect('LoginController');
    }
    public function delete(){
       $key= $_POST['pID'];
        $this->load->model('Project');
        $this->Project->deleteProject($key);
        redirect('ViewProjectsController');
    }

}
