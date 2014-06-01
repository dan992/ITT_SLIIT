<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class AddProfileDataController extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->helper('url');

        $this->_init();
    }

    private function _init() {
        $this->output->set_template('template01');
         $this->load->model('User');

        $this->load->js('assets/themes/default/js/jquery-1.9.1.min.js');
        $this->load->js('assets/themes/default/hero_files/bootstrap-transition.js');
        $this->load->js('assets/themes/default/hero_files/bootstrap-collapse.js');
    }

    public function index() {
        $data['img'] = base_url() . '/images/Member.png';
        $data['error'] = '';
        if ((!$this->session->userdata('fName')) && (!$this->session->userdata('lName')) && (!$this->session->userdata('email')) && (!$this->session->userdata('password')) && (!$this->session->userdata('companyName'))) {
            //prompt users that there is no session
            $data["msignIn_url"] = "<b>No session!</b>";
            $data["msignIn_password"] = "<b>No session!</b>";
            $data["mfName"] = "<b>No session!</b>";
            $data["mlName"] = "<b>No session!</b>";
            $data["mcompanyName"] = "<b>No session!</b>";
        } else {
            $userinput_email = $this->session->userdata('email');
            $userinput_password = $this->session->userdata('password');
            $userinput_fname = $this->session->userdata('fName');
            $userinput_lname = $this->session->userdata('lName');
            $userinput_companyName = $this->session->userdata('companyName');

            $data["msignIn_url"] = $userinput_email;
            $data["msignIn_password"] = $userinput_password;
            $data["mfName"] = $userinput_fname;
            $data["mlName"] = $userinput_lname;
            $data["mcompanyName"] = $userinput_companyName;
        }
        $this->load->view("ci_simplicity/createProfile", $data);
    }
    
    public function insertMemberDetails(){
        if(isset($_POST['create'])){
            $cp_email = $_POST['cp_email'];
            $cp_companyName = mysql_real_escape_string($_POST['cp_companyName']);
            //$cp_location = mysql_real_escape_string($_POST['cp_location']);
            //$cp_department = mysql_real_escape_string($_POST['cp_department']);
            $cp_position = mysql_real_escape_string($_POST['cp_position']);
            $cp_homepageURL = mysql_real_escape_string($_POST['cp_homepageURL']);
            $cp_IMinfo = mysql_real_escape_string($_POST['cp_IMinfo']);
            $cp_description = mysql_real_escape_string($_POST['cp_description']);
            $cp_fName = $_POST['cp_fName'];
            $cp_lName = $_POST['cp_lName'];
            $cp_country = mysql_real_escape_string($_POST['cp_country']);
            $cp_addressl1 = mysql_real_escape_string($_POST['cp_addressl1']);
            $cp_addressl2 = mysql_real_escape_string($_POST['cp_addressl2']);
            $cp_addressl3 = mysql_real_escape_string($_POST['cp_addressl3']);
            $cp_city = mysql_real_escape_string($_POST['cp_city']);
            $cp_state = mysql_real_escape_string($_POST['cp_state']);
            $cp_zip = mysql_real_escape_string($_POST['cp_zip']);
            $cp_phone = mysql_real_escape_string($_POST['cp_phone']);
            $cp_taxid = mysql_real_escape_string($_POST['cp_taxid']);
            
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $this->load->model('dbModel');
                $this->dbModel->UpdateMemberDetails($cp_email,$cp_companyName,$cp_position,$cp_homepageURL,$cp_IMinfo,$cp_description,$cp_fName,
        $cp_lName,$cp_country,$cp_addressl1,$cp_addressl2,$cp_addressl3,$cp_city,$cp_state,$cp_zip,$cp_phone,$cp_taxid);
                $this->load->view('ci_simplicity/home');
            }  else {
                $this->load->view('ci_simplicity/welcome');
            }
        }
    }
    
    
    function upload() {
        $config['upload_path'] = "./images/";
        $config['allowed_types'] = 'jpg|gif|png|jpeg';
        $this->load->library('upload', $config);
        

        if (!$this->upload->do_upload()) {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('main_view', $error);
        } elseif ($this->upload->do_upload()) {
            $upload_data = $this->upload->data();
            $data_ary = array(
                'memberImgName' => $upload_data['client_name'],
            );
            $data['error'] = '';
            $data['img'] = base_url() . '/images/' . $upload_data['file_name'];
            
            if ((!$this->session->userdata('fName')) && (!$this->session->userdata('lName')) && (!$this->session->userdata('email')) && (!$this->session->userdata('password')) && (!$this->session->userdata('companyName'))) {
                //prompt users that there is no session
                $data["msignIn_url"] = "<b>No session!</b>";
                $data["msignIn_password"] = "<b>No session!</b>";
                $data["mfName"] = "<b>No session!</b>";
                $data["mlName"] = "<b>No session!</b>";
                $data["mcompanyName"] = "<b>No session!</b>";
            } else {
                $userinput_email = $this->session->userdata('email');
                $userinput_password = $this->session->userdata('password');
                $userinput_fname = $this->session->userdata('fName');
                $userinput_lname = $this->session->userdata('lName');
                $userinput_companyName = $this->session->userdata('companyName');

                $data["msignIn_url"] = $userinput_email;
                $data["msignIn_password"] = $userinput_password;
                $data["mfName"] = $userinput_fname;
                $data["mlName"] = $userinput_lname;
                $data["mcompanyName"] = $userinput_companyName; 
                
                $this->load->database();
                $this->db->where('email', $userinput_email);
                $this->db->update('users',$data_ary);
            }
            $this->load->view('ci_simplicity/createProfile', $data);
        }
    }

}
