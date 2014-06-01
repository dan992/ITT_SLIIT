<?php

class dbModel extends CI_Model {

    function getFullProjectDetails($key) {
        // //$this->load->library('database');
        $this->db->select('*');
        $this->db->from('projects');
        $this->db->where('key', $key);
        $query = $this->db->get();
        return $query;
    }

    function InsertNewProject($key, $name, $projectLead, $defaultAssignee, $description, $notifyScheme, $permissionScheme, $date, $url) {
        // //$this->load->library('database');
        $data = array('key' => $key,
            'name' => $name,
            'projectLead' => $projectLead,
            'defaultAssignee' => $defaultAssignee,
            'description' => $description,
            'notifactionSchema' => $notifyScheme,
            'permrssionSchema' => $permissionScheme,
            'createdDate' => $date,
            'url' => $url
        );
        $this->db->insert('projects', $data);
    }

    function updateProject($key, $name, $projectLead, $defaultAssignee, $description, $notifyScheme, $permissionScheme) {
        // //$this->load->library('database');
        $data_ = array(
            'name' => $name,
            'projectLead' => $projectLead,
            'defaultAssignee' => $defaultAssignee,
            'description' => $description,
            'notifactionSchema' => $notifyScheme,
            'permrssionSchema' => $permissionScheme,
        );
        $this->db->where('key', $key);
        $this->db->update('projects', $data_);
    }

       function getUsersList() {       
        $this->db->select('*');
        $this->db->from('users');
        $query = $this->db->get();
        return $result = $query->result();
    }


     function getUsersListArray($pro) {
        //  //$this->load->library('database');
        $this->db->select('*');
        $this->db->from('users');
       $this->db->where('position', $pro);
        $query = $this->db->get();
        return $result = $query->result();
    }
    function getUserNameById($id) {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('profileNO', $id);
        $query = $this->db->get();
        $result = $query->result();
        $data = '';
        foreach ($result as $row) {
            $data = $row->firstName . " " . $row->lastName;
        }

        return $data;
    }

    function getProjectList() {
        //$this->load->library('database');
        $this->db->select('*');
        $this->db->from('projects');
        $query = $this->db->get();
        return $result = $query->result();
    }

    function getAllTeams($type) {
//    $result=mysql_query("SELECT DISTINCT `teamName` FROM  `projectteams`") ;
//    return $result;
        $this->db->select('*');
        $this->db->from('team');
        $this->db->where('tType',$type);
        $query = $this->db->get();
        return $result = $query->result();
    }

    function updateProjectEmail($email, $key) {
        $data = array(
            'projectEmail' => $email
        );
        $this->db->where('key', $key);
        $this->db->update('projects', $data);
    }

    function setProjectMembers($key, $users, $teams) {

        $this->db->where_in('projectID', $key);
        $this->db->delete('usersinproject');

        $this->db->where_in('projectID', $key);
        $this->db->delete('teamsinprojects');

        $data1 = array('projectID' => $key,
            'teams' => $teams
        );
        $data2 = array('users' => $users,
            'projectID' => $key
        );

        $this->db->insert_string('teamsinprojects', $data1);
        $this->db->insert_string('usersinproject', $data2);
    }

    function getTeams($key) { //****************************************************
        $id = "";
        ////$this->load->library('database');
        $this->db->select('*');
        $this->db->from('teamsinprojects');
        $this->db->where('projectID', $key);
        $query = $this->db->get();


        if ($query === FALSE) {
            $id = "";
        } else {
            while ($query->num_rows() > 0) {
                foreach ($query->result_array() as $row) {
                    $id = $row['teamID'];
                }
            }
        }
        return $id;
    }

    function getUsers($key) {
        $id = "";
        //$this->load->library('database');
        $this->db->select('*');
        $this->db->from('usersinproject');
        $this->db->where('projectID', $key);
        $query = $this->db->get();


        if ($query === FALSE) {
            $id = "";
        } else {
            while ($query->num_rows() > 0) {
                foreach ($query->result_array() as $row) {
                    $id = $row['memberNo'];
                }
            }
        }
        return $id;
    }

    function getProjectIdByName($proName) {
        //$this->load->library('database');
        $this->db->select('*');
        $this->db->from('projects');
        $this->db->where('name', $proName);
        $query = $this->db->get();

        while ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $projectID = $row['key'];
            }
        }

        return $projectID;
    }

    function getIssues($projectId) {
        $this->db->select('*');
        $this->db->from('issues');
        $this->db->where('project_id', $projectId);
        $query = $this->db->get();

        return $query->result();
    }

    function getToDoList($projectId) {
        $toDo = array();
        $result = $this->getIssues($projectId);
        foreach ($result as $row) {
            if ($row->status == 1) {
                $toDo[] = $row->issue_id;
            }
        }
        return $toDo;
    }

    function getInProcessList($projectId) {
        $data = array();
        $result = $this->getIssues($projectId);
        foreach ($result as $row) {
            if ($row->status == 2) {
                $data[] = $row->issue_id;
            }
        }

        return $data;
    }

    function inTestingList($projectId) {
        $data = array();
        $result = $this->getIssues($projectId);
        foreach ($result as $row) {
            if ($row->status == 3) {
                $data[] = $row->issue_id;
            }
        }

        return $data;
    }

    function getDoneList($projectId) {
        $data = array();
        $result = $this->getIssues($projectId);
        foreach ($result as $row) {
            if ($row->status == 4) {
                $data[] = $row->issue_id;
            }
        }

        return $data;
    }

    function getIssuesAccordingToId($issueId) {
        $this->db->select('*');
        $this->db->from('issues');
        $this->db->where('issue_id', $issueId);
        $query = $this->db->get();
        $result = $query->result();
        $issues = '';
        foreach ($result as $row) {
            $issues = $row->Summary;
        }
        return $issues;
    }

    function insertIssues($pro_project_name, $pro_Issue_type, $pro_Summary, $pro_priorty, $pro_due_date, $componen, $pro_affect_vir, $pro_description, $pro_original_estimate, $pro_remaning_estimate, $pro_status) {

        //$this->load->library('database');
        $data = array('project_id' => $pro_project_name,
            'Issue_type' => $pro_Issue_type,
            'Summary' => $pro_Summary,
            'priorty' => $pro_priorty,
            'due_date' => $pro_due_date,
            'component' => $componen,
            'affect_vir' => $pro_affect_vir,
            'description' => $pro_description,
            'original_estimate' => $pro_original_estimate,
            'remaningEstimate' => $pro_remaning_estimate,
            'status' => $pro_status
        );
        $this->db->insert('issues', $data);
    }

    function updateIssue($issueId, $status) {

        $data = array(
            'status' => $status
        );

        $this->db->where('issue_id', $issueId);
        $this->db->update_batch('ssues', $date);
    }

    function getIssueType($issueId) {
        $this->db->select('*');
        $this->db->from('issues');
        $this->db->where('issue_id', $issueId);
        $query = $this->db->get();
        $result = $query->result();
        $issuesType = '';
        foreach ($result as $row) {
            $issuesType = $row->Issue_type;
        }
        return $issuesType;
    }

    function getPriorty($issueId) {
        $this->db->select('*');
        $this->db->from('issues');
        $this->db->where('issue_id', $issueId);
        $query = $this->db->get();
        $result = $query->result();
        $issuespriorty = '';
        foreach ($result as $row) {
            $issuespriorty = $row->priorty;
        }
        return $issuespriorty;
    }

    function getComponent($issueId) {
        $this->db->select('*');
        $this->db->from('issues');
        $this->db->where('issue_id', $issueId);
        $query = $this->db->get();
        $result = $query->result();
        $data = '';
        foreach ($result as $row) {
            $data = $row->component;
        }
        return $data;
    }

    function getAffectVir($issueId) {
        $this->db->select('*');
        $this->db->from('issues');
        $this->db->where('issue_id', $issueId);
        $query = $this->db->get();
        $result = $query->result();
        $data = '';
        foreach ($result as $row) {
            $data = $row->affect_vir;
        }
        return $data;
    }

    function getDescription($issueId) {
        $this->db->select('*');
        $this->db->from('issues');
        $this->db->where('issue_id', $issueId);
        $query = $this->db->get();
        $result = $query->result();
        $data = '';
        foreach ($result as $row) {
            $data = $row->description;
        }

        return $data;
    }

    function getOriginalEstimate($issueId) {
        $this->db->select('*');
        $this->db->from('issues');
        $this->db->where('issue_id', $issueId);
        $query = $this->db->get();
        $result = $query->result();
        $data = '';
        foreach ($result as $row) {
            $data = $row->original_estimate;
        }

        return $data;
    }

    function getRemaningEstimate($issueId) {
        $this->db->select('*');
        $this->db->from('issues');
        $this->db->where('issue_id', $issueId);
        $query = $this->db->get();
        $result = $query->result();
        $data = '';
        foreach ($result as $row) {
            $data = $row->remaningEstimate;
        }

        return $data;
    }

    function getDueDate($issueId) {
        $this->db->select('*');
        $this->db->from('issues');
        $this->db->where('issue_id', $issueId);
        $query = $this->db->get();
        $result = $query->result();
        $data = '';
        foreach ($result as $row) {
            $data = $row->due_date;
        }

        return $data;
    }

    function getProjectNameByID($proID) {

        $this->db->select('*');
        $this->db->from('projects');
        $this->db->where('key', $proID);
        $query = $this->db->get();
        $result = $query->result();
        $data = '';
        foreach ($result as $row) {
            $data = $row->name;
        }

        return $data;
    }

    function getIssuesProject($issueId) {

        //$this->load->library('database');
        $this->db->select('*');
        $this->db->from('issues');
        $this->db->where('issue_id', $issueId);
        $query = $this->db->get();
        while ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $data = $row['project_id'];
            }
        }
        return $this->getProjectNameByID($data);
    }

    function getProjectListToArray() {
        $projectlistArray = array();
        $result = $this->getProjectList();

        while ($result->num_rows() > 0) {
            foreach ($result->result_array() as $row) {
                $projectlistArray["'{$row['key']}'"] = $row['name'];
            }
        }

        return $projectlistArray;
    }

    function udateIssues($issueId, $project, $issue, $summary, $priorty, $dueDate, $components, $affects, $des, $estimate, $remaning) {
        //$this->load->library('database');

        $data = array(
            'project_id' => $project,
            'Issue_type' => $issue,
            'Summary' => $summary,
            'priorty' => $priorty,
            'due_date' => $dueDate,
            'component' => $components,
            'affect_vir' => $affects,
            'description' => $des,
            'original_estimate' => $estimate,
            'remaningEstimate' => $remaning
        );

        echo $issueId;
        $this->db->where('issue_id', $issueId);
        $this->db->update('issues', $data);
    }

    function createVersion($project, $version, $des) {

        //$this->load->library('database');
        $data = array(
            'project_id' => $project,
            'name' => $version,
            'description' => $des
        );
        $this->db->insert('version', $data);
    }

    function findScrumMastersProjects($user) {
        $projectlistArray = array();

        //$this->load->library('database');
        $this->db->select('*');
        $this->db->from('projects');
        $this->db->where('projectLead', $user);
        $query = $this->db->get();
        $results = $query->result();
        foreach ($results as $row) {
            $projectlistArray[$row->key] = $row->name;
        }

        return $projectlistArray;
    }

    function getissueIdAccordingToProject($project) {

        //$this->load->library('database');
        $this->db->select('*');
        $this->db->from('issues');
        $this->db->where('project_id', $project);
        $query = $this->db->get();
        while ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $issueId = $row['issue_id'];
            }
        }

        return $issueId;
    }

    function getVersionIDByProjectID($project) {
        $version = array();
        //$this->load->library('database');
        $this->db->select('*');
        $this->db->from('version');
        $this->db->where('project_id', $project);
        $query = $this->db->get();
        
       
        return $result=$query->result();
    }

    function getProjectIDAccordingToIssue($issue) {
        $this->db->select('*');
        $this->db->from('issues');
        $this->db->where('issue_id', $issue);
        $query = $this->db->get();
        $result = $query->result();
        $data = '';
        foreach ($result as $row) {
            $data = $row->project_id;
        }

        return $data;
    }

    function insertMembertTeam($data) {
        $this->db->insert('teamsinprojects', $data);
    }

    function insertMembertUser($data) {
        $this->db->insert('usersinproject', $data);
    }

    function getMembersTeam($pid, $type) {
        $this->db->select('*');
        $this->db->from('teamsinprojects');
        $this->db->where('type', $type);
        $this->db->where('projectID', $pid);
        $query = $this->db->get();

        $result = $query->result();
        $data = '';
        foreach ($result as $row) {
            $data = $row->teams . "," . $data;
        }

        return $data;
    }

    function getMembersUser($pid, $type) {
        $this->db->select('*');
        $this->db->from('usersinproject');
        $this->db->where('type', $type);
        $this->db->where('projectID', $pid);
        $query = $this->db->get();

        $result = $query->result();
        $data = '';
        foreach ($result as $row) {
            $data = $row->users . "," . $data;
        }

        return $data;
    }

    function dropUsers($id) {
        $this->db->where('projectID', $id);
        $this->db->delete('usersinproject');
    }

    function dropTeams($id) {
        $this->db->where('projectID', $id);
        $this->db->delete('teamsinprojects');
    }

    function deleteIssue($id) {
        $this->db->where('issue_id', $id);
        $this->db->delete('issues');
    }
    
    function getPirority($id){
        $this->db->select('*');
        $this->db->from('issues');
        $this->db->where('issue_id', $id);
        $query = $this->db->get();

        $result = $query->result();
        $data = '';
        foreach ($result as $row) {
            $data = $row->priorty ;
        }

        return $data;
    }
    function getVersionData($pID){
         $this->db->select('*');
        $this->db->from('version');
        $this->db->where('project_id', $pID);
        $query = $this->db->get();
        return $result=$query->result();
    }
    
    function getCurrentUserProjectIDs($id) {//Eesha
        $projectlistArray = array();
        $this->db->distinct();
        $this->db->select('*');
        $this->db->from('projects');
        $this->db->where('projectLead', $id);
        $this->db->or_where('defaultAssignee',$id);
        $query = $this->db->get();
        $results = $query->result();
        foreach ($results as $row) {
            $projectlistArray[] = $row->key;
        }

        return $projectlistArray;
    }
    

//Pabodha Stuff

    function InsertNewMember($signIn_fname, $signIn_lname, $signIn_url, $signIn_password, $signIn_companyName, $signIn_newsLetter) {

        $data = array('firstName' => $signIn_fname,
            'lastName' => $signIn_lname,
            'email' => $signIn_url,
            'password' => $signIn_password,
            'companyName' => $signIn_companyName,
            'newsLetter' => $signIn_newsLetter,
        );
        $this->db->insert('users', $data);
    }

   function UpdateMemberDetails($cp_email,$cp_companyName,$cp_position,$cp_homepageURL,$cp_IMinfo,$cp_description,$cp_fName,
        $cp_lName,$cp_country,$cp_addressl1,$cp_addressl2,$cp_addressl3,$cp_city,$cp_state,$cp_zip,$cp_phone,$cp_taxid){   

    $data = array('firstName' => $cp_fName,
        'lastName' => $cp_lName,
        'companyName' => $cp_companyName,
        'position' => $cp_position,
        'homepageURL' => $cp_homepageURL,
        'imInfo' => $cp_IMinfo,
        'aboutMe' => $cp_description,
        'country' => $cp_country,
        'addressLineOne' => $cp_addressl1,
        'addressLineTwo' => $cp_addressl2,
        'addressLineThree' => $cp_addressl3,
        'city' => $cp_city,
        'state' => $cp_state,
        'zipCode' => $cp_zip,
        'phoneNo' => $cp_phone,
        'taxID' => $cp_taxid
    );
    $this->db->where('email', $cp_email);
    $this->db->update('users',$data);
}

//End of Pabodha

    function getAllUsers() {//Eesha
        $this->db->select('firstName');
        $this->db->from('users');
        $query = $this->db->get();
        return $result = $query->result();
    }

    function findUsersID($array) {//Eesha
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('firstName', $array);
        $query = $this->db->get();
        $result = $query->result();
        $uID = '';
        foreach ($result as $row) {
            $uID = $row->profileNO;
        }
        return $uID;
    }

    function insertTeam($tName, $description, $user,$type) {//Eesha
        $data = array(
            'tName' => $tName,
            'description' => &$description,
            'profileNO' => $user,
                'tType'=>$type
                );

        $this->db->insert('team', $data);
    }

    function getTeamID() {//Eesha
        $this->db->select_max('tID');
        $this->db->from('team');
        $query = $this->db->get();
        $result = $query->result();
        $tID = '';
        foreach ($result as $row) {
            $tID = $row->tID;
        }
        return $tID;
    }

    function insertTeamMembers($data) {//Eesha
        $this->db->insert('team_users', $data);
    }

    function findFistName($profileNO) {//Eesha
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('profileNO', $profileNO);
        $query = $this->db->get();
        $result = $query->result();
        $data = '';
        foreach ($result as $row) {
            $data = $row->firstName;
        }
        return $data;
    }

    function getCurrentLoggedinUserProjectIDs($firstName) {//Eesha
        $projectlistArray = array();
        $this->db->distinct();
        $this->db->select('*');
        $this->db->from('sprint');
        $this->db->where('programmer', $firstName);
        $query = $this->db->get();
        $results = $query->result();
        foreach ($results as $row) {
            $projectlistArray[] = $row->issue_id;
        }

        return $projectlistArray;
    }
  function getCurrentLoggedUserCteatedTeamIDs($user)//Eesha
    {
        $teamsArray=array();
        $this->db->distinct();
        $this->db->select('tID');
        $this->db->from('team');
        $this->db->where('profileNO',$user);
        
        $query=  $this->db->get();
        $results=$query->result();
		foreach ( $results as $row ) {
                   $teamsArray[]= $row->tID ;
                }
                    
	return $teamsArray;
    }
    
    function getCurrentUserCteatedTeamIDs($user,$type)//Eesha
    {
        $teamsArray=array();
        $this->db->distinct();
        $this->db->select('tID');
        $this->db->from('team');
        $this->db->where('profileNO',$user);
        $this->db->where('tType',$type);
        $query=  $this->db->get();
        $results=$query->result();
		foreach ( $results as $row ) {
                   $teamsArray[]= $row->tID ;
                }
                    
	return $teamsArray;
    }
    function getTeamData($tID)//Eesha
    {
        $this->db->select('*');
        $this->db->from('team');
        $this->db->where('tID',$tID);
        $query=  $this->db->get();
        $results=$query->result();
		
        return $results;
    }
    function getIssueList($isID) {//Eesha
        $this->db->select('*');
        $this->db->from('sprint');
        $this->db->where('issue_id', $isID);
        $query = $this->db->get();
        $results = $query->result();

        return $results;
    }
    
    
    function insertIntoSprint($issueid_, $projectID_, $sprintNo) {
        $this->db->select('Summary');
        $this->db->select('priorty');
        $this->db->from('issues');
        $this->db->where('issue_id', $issueid_);
        $query = $this->db->get();
        $result = $query->result();

        foreach ($result as $row) {
            $data = array(
                'issue_id' => $issueid_,
                'summary' => $row->Summary,
                'status' => $row->priorty,
                'project_id' => $projectID_,
                'sprint_number' => $sprintNo
            );
            $this->db->insert('sprint', $data);
        }
    }

    function selectProjectKey($projectName) {
        
        $this->db->select('key');
        $this->db->from('projects');
        $this->db->where('name',$projectName);
        $query1 = $this->db->get();
        $result1 = $query1->result();
        
        $key='';
        foreach ($result1 as $row) {
            $key = $row->key;
        }
        
        return $key;
        
    }
        
        function sprintNumber($projectName) {
        $keyValue = $this->selectProjectKey($projectName);
        $this->db->select_max('sprint_number');
        $this->db->from('sprint');
        $this->db->where('project_id', $keyValue);
        $query = $this->db->get();
        $result = $query->result();
        $one = 0;
        //$value=0;

        foreach ($result as $row) {
            $one = $row->sprint_number;
        }

        if ($one <= 0) {
            return 1;
        } else {
            return++$one;
        }
    }
   
    
    function getSprintData($projectID_,$sprintNumber){
        $this->db->select('*');
        $this->db->from('sprint');
        $this->db->where('project_id',$projectID_);
        $this->db->where('sprint_number',$sprintNumber);
        $query=  $this->db->get();
        $results=$query->result();
		
        return $results;
    }
    
    
    function getUsersListforSprint($projectID_) {
        //  //$this->load->library('database');
        $this->db->select('*');
        $this->db->from('usersinproject');
        $this->db->where('projectID',$projectID_);
        $query = $this->db->get();
        return $result = $query->result();
    }

    function updateSprint($usersProject,$sprintNumber,$spUserStory,$spProgrammer,$spWeight){
       $data = array(
          'programmer' => $spProgrammer,
          'weight' => $spWeight
       ); 
       
       $this->db->where('summary', $spUserStory);
       $this->db->where('sprint_number', $sprintNumber);
       $this->db->where('project_id', $usersProject);
       $this->db->update('sprint',$data);
    }
    
    function addDatetoSprint($sprint_date,$usersProject,$sprintNumber){
        $data = array(
            'date_range' =>$sprint_date
        );
       $this->db->where('sprint_number', $sprintNumber);
       $this->db->where('project_id', $usersProject);
       $this->db->update('sprint',$data);
    }
    function displaySprintData($usersProject){
        $this->db->select('*');
        $this->db->from('sprint');
        $this->db->where('project_id', $usersProject);
        $query = $this->db->get();
        return $result = $query->result();
    }
      function getCurrentLoggedUserCompany($user)//Eesha
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('profileNO',$user);
        $query=  $this->db->get();
        $result=$query->result();
        $data='';
        foreach ($result as $row){
            $data=$row->companyName;
        }
        return $data;
        
    }
     function getRegisteredUsers($companyName,$type)//Eesha
     {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('companyName',$companyName);
        $this->db->where('position',$type);
        $query=  $this->db->get();
        $results=$query->result();
		
        return $results; 
     }

}

?>
