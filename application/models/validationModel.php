<?php

class validationModel extends CI_Model{
private function test_input($data){
     $data = trim($data);
     $data = stripslashes($data);
     $data = htmlspecialchars($data);
     return $data;
}
// check if name only contains letters and whitespace
function checkName($name){
        $statesName=1;
        if (empty($name))
         {
            $statesName=1;
         }
   else
     {
     $nameReturn = $this->test_input($name);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$nameReturn ))
       {      
       $statesName=2;
       }
     else {
         $statesName=0;
       }
     }
     return $statesName;
}

function checkKey($key){
    $statesKey=1;
if(empty($key))
  {   
    $statesKey=1;
  }
 else {
     $statesKey=2;
     $key= $this->test_input($key);
     if(strlen($key) != 3){
         $statesKey=3;
     }
     else {
         //if key is correct         
          $this->load->model('dbModel');
         $result=  $this->dbModel->getFullProjectDetails($key);
         if($result->num_rows()>0){
              $statesKey=4;            
         }
        else {
            $statesKey=0;
           }
     }
     }
     return $statesKey;
}

function checkURL($url){
    
     $statesUrl=0;
    if (empty($url))
     {
       $urlErr = "";
     }
   else
     {
     $website = $this->test_input($url);
     // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
     if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website))
       {    
         $statesUrl=1;
       }
    else {
        //if url is correct
        $statesUrl=0;
       }
     }
     
     return $statesUrl;
}

function checkProjectLead($projectLead){
    
    $statesProjectLead=1;
     if(empty($projectLead)){        
         $statesProjectLead=1;
     }
    else {
        ///if project lead is assigne
        $statesProjectLead=0;
     }
} 
}
?>
