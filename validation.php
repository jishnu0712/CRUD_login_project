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
        return  true;
    }
    return false;
}
?>