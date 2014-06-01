<?php

class Project extends CI_Model{

    public function getProjectList($uID){
        $sql="SELECT `key`,`name` FROM `projects` WHERE `projectLead`=".$this->session->userdata("uID");
        $query = $this->db->query($sql);
        return $query;    
    }
    
    public function getProjectName($key){
        $sql="SELECT `name` FROM `projects` WHERE `key`='".$key."'";
        $query = $this->db->query($sql);
        $row = $query->row();
        return $row->name;    
    }
    
    public function getIssues($projectID){
        $sql="SELECT * FROM `issues` WHERE `project_id`='".$projectID."'";
        $query = $this->db->query($sql);
        return $query;  
    }
    
    public function genarateDashboard($uID){
        $sql="SELECT `projects`.`key`, `projects`.`name`,`projects`.`createdDate`,`projects`.`description`, count(`issues`.`issue_id`) as icount FROM projects, issues where `projects`.`projectLead`=".$uID." and `projects`.`key`=`issues`.`project_id` group by `projects`.`key`" ;
        $query = $this->db->query($sql);
        return $query;
    }
    
    public function updateIssueStatus($issueID,$newStatus){
        //UPDATE `issues` SET `status`=4 WHERE `issue_id`=5
        $sql="UPDATE `issues` SET `status`=".$newStatus." WHERE `issue_id`=".$issueID;
        $query = $this->db->query($sql);
        return $query;  
    }
    public function getProjectSummary($uID){
        //$query="SELECT `key`,`name`,`description`,`createdDate`,`url`,`projectEmail` FROM `projects` WHERE `projectLead`='$uname'";
        $this->db->select('*');
        $this->db->from('project');
        $this->db->where('scrumMaster',$uID);
        $sql="SELECT * FROM `projects` WHERE `projectLead`=".$this->session->userdata("uID")."";
        $query = $this->db->query($sql);
        //$query = $this->db->get();
        return $query;
        
    }
    public function deleteProject($key){
        
        $this->db->where('key', $key);
        $this->db->delete('projects');

        $this->db->where('project_id', $key);
        $this->db->delete('issues');

        $this->db->where('project_id', $key);
        $this->db->delete('sprint');

        $this->db->where('project_id', $key);
        $this->db->delete('version');
        
        $this->db->where('projectID', $key);
        $this->db->delete('teamsinprojects');

                
    }

}

?>
