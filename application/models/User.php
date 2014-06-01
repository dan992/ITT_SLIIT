<?php

class User extends CI_Model{
    
    public static $Username="";
    public static $LoggedIn=FALSE;

    public function validateLogin($uname,$password){
      
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('email',$uname);
        $query = $this->db->get();
        if ($query->num_rows() > 0)
        {
           $row = $query->row();

           if($row->password==$password){
                $uID=$row->profileNO;
                $this->session->set_userdata('username',$uname);
                $this->session->set_userdata('uID',$uID);
                $this->session->set_userdata('loggedIn',TRUE);
                $this->Username=$uname;
                $this->LoggedIn=TRUE;
                return TRUE;
            }
        }
        return FALSE;
        
//         foreach($query->result_array() as $row)
//                        {
//                            if($row['password']==$password){
//                                $this->session->set_userdata('username',$uname);
//                                $this->session->set_userdata('uID',$row->uid);
//                                $this->session->set_userdata('loggedIn',TRUE);
//                                $this->Username=$uname;
//                                $this->LoggedIn=TRUE;
//                                return TRUE;
//                            }
//                        }
//                    
//        if($query === FALSE) {
//            return FALSE;    
//        }
//        else {
//            foreach($query->result_array() as $row)
//            {
//                if($row['password']==$password){
//                    $this->session->set_userdata('username','pabodha91@gmail.com');//$uname);
//                    echo "<h1>".$uname."</h1>";
//                    $this->session->set_userdata('uid',$row->profileNO);
//                    $this->session->set_userdata('loggedIn',TRUE);
//                    $this->Username=$uname;
//                    $this->LoggedIn=TRUE;
//                    return TRUE;
//                }
//            }
//            
//            return FALSE;  
//            
//        }
    }
    
    public static function getUID($username){
        $this->db->select('profileNO');
        $this->db->from('users');
        $this->db->where('uname',$username);
        $query = $this->db->get();
        if($query === FALSE) {
            return FALSE;;    
        }
        else {
            return $row['uid'];;
        }
    }
    
    public function getAvatar(){
        $sql="SELECT `memberImgName` FROM `users` WHERE `profileNO` =".$this->session->userdata("uID");
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0)
        {
           $row = $query->row();
           if($row->memberImgName!="")
                return base_url()."images/".$row->memberImgName;
        }
        return base_url()."images/Member.png";
    }
    
    public static function getUsername($uid){
        $this->db->select('uname');
        $this->db->from('users');
        $this->db->where('uID',$uid);
        $query = $this->db->get();
        if($query === FALSE) {
            return FALSE;;    
        }
        else {
            return $row['uname'];;
        }
    }

}

?>
