<?php 
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data); // <script> code</script> => &lt &gt
        return $data;
    }
?>