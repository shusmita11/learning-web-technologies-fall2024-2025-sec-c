<?php
    session_start();
    require_once('../model/userModel.php');
    if(isset($_REQUEST['submit']))
    {
        
        $first_name = trim($_POST['first_name']);
        $last_name = trim($_POST['last_name']);
        $email = trim($_REQUEST['email']);
        $phone = trim($_REQUEST['phone']);
        $nid = trim($_REQUEST['nid']);
        $pass = trim($REQUEST['password']);
        $dob = $REQUEST(['dob']);
        $gender = '';
        if (isset($_POST['gender']))
        {
            $gender = $_POST['gender'];
        }
        $address = trim($REQUEST(['address']));
        $med_history = trim($REQUEST(['med_history']));
        $emergency_contact = trim($REQUEST(['emergency_contact']));

        function validate_name($name)
        {
            if(empty($name) || strlen($name) < 2 || !ctype_alpha($name[0]))
            {
                return false;
            }

            for($i = 1; $i < strlen($name); $i++)
            {
                if(!(ctype_alpha($name[$i])))
                {
                    return false;
                }
            }
            return true;
        }

    $check_first_name = validate_name($first_name);
    $check_last_name = validate_name($last_name);

    $check_email = false;
    if(!empty($email))
    {
        $arr = explode(".", $email);
        if (count($arr) == 2)
        {
            if ($arr[1] == "com" || $arr[1] == "edu")
            {
                $arr2 = explode("@", $arr[0]);
                if (ctype_alpha($arr2[0][0]))
                {
                    if (count($arr2) == 2)
                    {
                        $check_email = true;
                    }
                }
            }
        }
    }

    $check_phone = false;
    if(strlen($phone) == 11 && is_numeric($phone))
    {
        $check_phone = true;
    }

    $check_nid = false;
    if(strlen($nid) == 10 || strlen($nid) == 17)
    {
        if(is_numeric($nid))
        {
            $check_nid = true;
        }
        
    }

    $check_pass = false;
    if(str($pass))
    {
        $check_pass = true;
    }




        //////////////////////////////////////////////////////////
        if($username == null || empty($password) || empty($email)){
            echo "Null username/password/email!";

        }else {
            $status = addUser($username, $password, $email);
            if($status){
                header('location: ../view/login.php');
            }else{
                header('location: ../view/sign_up.html');
            }
        }
    }else{
        header('location: ../view/reg.php');
    }


?>