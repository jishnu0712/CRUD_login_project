<?php
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data); // <script> code</script> => &lt &gt
    return $data;
}

function check_email($email)
{
    $email = test_input($email);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        //invalid
        return false;
    }
    return true;
}

function check_phone($phone)
{
    if (!is_numeric($phone)) {
        return false;
    }
    if (strlen($phone) != 10) {
        return false;
    }
    return true;
}

function check_password($password)
{
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number    = preg_match('@[0-9]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);

    if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 4) {
        //pwd error
        return false;
    }
    return true;
}

function check_gender($list) {
    if($list == -1) {
        return false;
    }
    return true;
}
