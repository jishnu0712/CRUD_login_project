<?php
function run_query($connection, $sql) {
    return mysqli_query($connection, $sql);
}

function get_number_of_rows($connection, $sql) {
    $data = run_query($connection, $sql);
    return mysqli_num_rows($data);
}