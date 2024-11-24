<?php
session_start();
if (isset($_REQUEST['submit']))
{
    $name = $_POST['name'];
    $u_name = $_POST['u_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $pass = $_POST['pass'];

    $day = null;
    if (isset($_POST['day']))
    {
        $day = (int)$_POST['day'];
    }

    $month = null;
    if (isset($_POST['month']))
    {
        $month = (int)$_POST['month'];
    }

    $year = null;
    if (isset($_POST['year']))
    {
        $year = (int)$_POST['year'];
    }

    $gender = '';
    if (isset($_POST['gender']))
    {
        $gender = $_POST['gender'];
    }


    function validate_name($name)
    {
        if (empty($name) || strlen($name) < 2 || !ctype_alpha($name[0]))
        {
            return false;
        }

        for ($i = 1; $i < strlen($name); $i++)
        {
            if (!(ctype_alpha($name[$i]) || is_numeric($name[$i]) || $name[$i] == '_')) {
                return false;
            }
        }
        return true;
    }

    $check_f = validate_name($name);
    $check_l = validate_name($u_name);

    $check_phone = false;
    if(!empty($phone) && strlen($phone) == 11)
    {
        for($i = 0; $i < strlen($phone); $i++)
        {
            $check_phone = true;
        }
    }

    $check_pass = false;
    if(!empty($pass))
    {
        $check_pass = true;
    }

    $check_email = false;
    if (!empty($email))
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

    $check_dob = false;
    if (!empty($day) && !empty($month) && !empty($year))
    {
        if ($day >= 1 && $day <= 31 && $month >= 1 && $month <= 12 && $year >= 1930 && $year <= 1958)
        {
            if (checkdate($month, $day, $year))
            {
                $check_dob = true;
            }
        }
    }

    $check_gender = false;
    if (!empty($gender)) {
        $check_gender = true;
    }

    if ($check_f && $check_l && $check_phone && $check_pass && $check_email  && $check_dob && $check_gender)
    {
        $_SESSION['status'] = true;
        $info = ['name' => $name, 'user' => $u_name, 'phone'=> $phone, 'email' => $email, 'pass' => $pass, 'gender' => $gender,  'day' => $day, 'month'=> $month, 'year' => $year];
        $_SESSION['user_info'] = $info;
        header('location: login.html');
    }
    
    else
    {
        header('location: registration_form.html');
    }
}
?>
