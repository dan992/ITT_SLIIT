<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class SignInController extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->helper('url');

        $this->_init();
    }

    private function _init() {
        $this->output->set_template('template01');
        $this->load->model('User');

       
    }

    public function index() {
        $fNameErr = "";
        $lNameErr = "";
        $urlErr = "";
        $passwordErr = "";
        $compasswordErr = "";
        $companyNameErr = "";
        $data['fNameErr'] = $fNameErr;
        $data['lNameErr'] = $lNameErr;
        $data['urlErr'] = $urlErr;
        $data['passwordErr'] = $passwordErr;
        $data['compasswordErr'] = $compasswordErr;
        $data['companyNameErr'] = $companyNameErr;
        $this->load->view('ci_simplicity/SignIn.php', $data);
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    public function valideAndInsertmember() {
        $statesName1 = FALSE;
        $statesName2 = FALSE;
        $statesUrl = TRUE;
        $pwdStatus = FALSE;
        $companyNameStatus = FALSE;
        $fNameErr = "";
        $lNameErr = "";
        $urlErr = "";
        $passwordErr = "";
        $companyNameErr = "";
        $compasswordErr = "";

        if (isset($_POST['SignIn'])) {
            $signIn_fname = $_POST['signIn_fname'];
            $signIn_lname = $_POST['signIn_lname'];
            $signIn_url = $_POST['signIn_url'];
            $signIn_password = $_POST['signIn_password'];
            $signIn_conpassword = $_POST['signIn_confirmpassword'];
            $signIn_companyName = mysql_real_escape_string($_POST['signIn_companyName']);
            $signIn_newsLetter = $_POST['signIn_newsLetter'];

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $this->load->model('ProfileValidationModel');

                $returnsignIn_fname = $this->ProfileValidationModel->checkName($_POST["signIn_fname"]);
                $returnsignIn_lname = $this->ProfileValidationModel->checkName($_POST["signIn_lname"]);
                $returnsignIn_url = $this->ProfileValidationModel->checkEmail($signIn_url);
                $returnsignIn_password = $this->ProfileValidationModel->checkPassword($signIn_password, $signIn_conpassword);
                $returnsignIn_companyName = $this->ProfileValidationModel->checkCompanyName($_POST['signIn_companyName']);

                if ($returnsignIn_fname == 1) {
                    $fNameErr = "<br/>       <font color='red'> First Name is required.</font>";
                    $statesName1 = FALSE;
                } else if ($returnsignIn_fname == 2) {
                    $fNameErr = " <br/>        <font color='red'>Only letters and white space allowed.</font>";
                    $statesName1 = FALSE;
                } else {
                    $statesName1 = TRUE;
                }

                if ($returnsignIn_lname == 1) {
                    $lNameErr = "<br/>       <font color='red'> Last Name is required.</font>";
                    $statesName2 = FALSE;
                } else if ($returnsignIn_lname == 2) {
                    $lNameErr = " <br/>        <font color='red'>Only letters and white space allowed.</font>";
                    $statesName2 = FALSE;
                } else {
                    $statesName2 = TRUE;
                }

                if ($returnsignIn_url == 0) {
                    $urlErr = " <br/>       <font color='red'>e-mail is required.</font>";
                    $statesUrl = FALSE;
                } elseif ($returnsignIn_url == 1) {
                    $urlErr = " <br/>       <font color='red'>e-mail not a valied one.</font>";
                    $statesUrl = FALSE;
                } else {
                    $statesUrl = TRUE;
                }

                if ($returnsignIn_password == 1) {
                    $passwordErr = " <br/>       <font color='red'>Password is required.</font>";
                    $pwdStatus = FALSE;
                } elseif ($returnsignIn_password == 4) {
                    $passwordErr = " <br/>       <font color='red'>Password is too short.</font>";
                    $pwdStatus = FALSE;
                } elseif ($returnsignIn_password == 3) {
                    $compasswordErr = " <br/>       <font color='red'>Password should be confirmed..</font>";
                    $pwdStatus = FALSE;
                } else {
                    $pwdStatus = TRUE;
                }

                if ($returnsignIn_companyName == 1) {
                    $companyNameErr = " <br/>       <font color='red'>Company Name is required.</font>";
                    $companyNameStatus = FALSE;
                } else {
                    $companyNameStatus = TRUE;
                }


                if ($statesName1 == TRUE && $statesName2 == TRUE && $statesUrl == TRUE && $pwdStatus == TRUE) {
                    $this->session->set_userdata('fName', $signIn_fname);
                    $this->session->set_userdata('lName', $signIn_lname);
                    $this->session->set_userdata('email', $signIn_url);
                    $this->session->set_userdata('password', $signIn_password);
                    $this->session->set_userdata('companyName', $signIn_companyName);

                    $this->load->model('dbModel');
                    $this->dbModel->InsertNewMember($signIn_fname, $signIn_lname, $signIn_url, $signIn_password, $signIn_companyName, $signIn_newsLetter);
                    redirect('addProfileDataController');
                    //$this->load->view('ci_simplicity/createProfile');
                } else {
                    $data['fNameErr'] = $fNameErr;
                    $data['lNameErr'] = $lNameErr;
                    $data['urlErr'] = $urlErr;
                    $data['passwordErr'] = $passwordErr;
                    $data['compasswordErr'] = $compasswordErr;
                    $data['companyNameErr'] = $companyNameErr;
                    $this->load->view('ci_simplicity/SignIn.php', $data);
                }
            }
        }
    }

}
