<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Main extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->helper('url');

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
        // $this->load->view('header');
        $pID = $this->input->get('pID');
        //$pID = 'COS';
        $data['projID'] = $pID;
        $data['useUV'] = $this->getUsers($pID, 'user');
        $data['useGV'] = $this->getGroups($pID, 'user');
        $data['devUV'] = $this->getUsers($pID, 'dev');
        $data['devGV'] = $this->getGroups($pID, 'dev');
        $data['desUV'] = $this->getUsers($pID, 'des');
        $data['desGV'] = $this->getGroups($pID, 'des');
        $data['qaUV'] = $this->getUsers($pID, 'qa');
        $data['qaGV'] = $this->getGroups($pID, 'qa');
       // $data['array1'] = $this->getAllTeams_();
        // $data['array2'] = $this->getUserNAmes($pos);

        $data['devA'] = $this->getUserNAmes('dev');
        $data['desA'] = $this->getUserNAmes('des');
        $data['qaA'] = $this->getUserNAmes('qa');
        $data['useA'] = $this->getUserNAmes('use');

        $data['devG'] = $this->getAllTeamsArray('dev');
        $data['desG'] = $this->getAllTeamsArray('des');
        $data['qaG'] = $this->getAllTeamsArray('qa');
        $data['useG'] = $this->getAllTeamsArray('use');

        $this->load->view('ci_simplicity/addPeople', $data);
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

    public function getAllTeamsArray($type) {
        $pro = array();
        $this->load->model('dbModel');
        $proj = $this->dbModel->getAllTeams($type);
        foreach ($proj as $row) {
            $pro[] = $row->tName;
        }
        $array2 = implode("','", $pro);
        return $array2;
    }

    public function update() {

        $devUsers[] = array();
        $useUsers[] = array();
        $devGroups[] = array();
        $useGroups[] = array();
        if (isset($_POST['update'])) {
            $devU = $_POST['devU'];
            $useU = $_POST['useU'];
            $devG = $_POST['devG'];
            $useG = $_POST['useG'];

            $desG = $_POST['desG'];
            $qaG = $_POST['qaG'];
            $desU = $_POST['desU'];
            $qaU = $_POST['qaU'];

            $projID = $_POST['project'];


            $devUsers = explode(',', $devU);
            $useUsers = explode(',', $useU);
            $devGroups = explode(',', $devG);
            $useGroups = explode(',', $useG);

            $desingGroup = explode(',', $desG);
            $desingUser = explode(',', $desU);

            $qaGroup = explode(',', $qaG);
            $qaUser = explode(',', $qaU);

            $this->dropUsers($id);


            $this->insertTeams($devGroups, 'dev', $projID);
            $this->insertUsers($devUsers, 'dev', $projID);
            $this->insertTeams($useGroups, 'user', $projID);
            $this->insertUsers($useUsers, 'user', $projID);

            $this->insertTeams($desingGroup, 'des', $projID);
            $this->insertUsers($desingUser, 'des', $projID);

            $this->insertTeams($qaGroup, 'qa', $projID);
            $this->insertUsers($qaUser, 'qa', $projID);

            redirect('ProjectFundAllocationController?pID=' . $projID);
        }
    }

    public function insertTeams($array, $type, $pid) {
        $this->load->model('dbModel');
        for ($i = 0; $i < sizeof($array); $i++) {
            $data = array(
                'projectID' => $pid,
                'teams' => $array[$i],
                'type' => $type
            );
            $this->dbModel->insertMembertTeam($data);
        }
    }

    public function insertUsers($array, $type, $pid) {
        $this->load->model('dbModel');
        for ($i = 0; $i < sizeof($array); $i++) {
            $data = array(
                'users' => $array[$i],
                'projectID' => $pid,
                'type' => $type
            );
            $this->dbModel->insertMembertUser($data);
        }
    }

    public function getUsers($id, $type) {
        $this->load->model('dbModel');
        $a = $this->dbModel->getMembersUser($id, $type);
        return $a;
    }

    public function getGroups($id, $type) {
        $this->load->model('dbModel');
        $a = $this->dbModel->getMembersTeam($id, $type);
        return $a;
    }

    function dropUsers($id) {
        $this->load->model('dbModel');
        $this->dbModel->dropUsers($id);
        $this->dbModel->dropTeams($id);
    }

}

