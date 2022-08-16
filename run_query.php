<?php

function get_number_of_rows($connection, $sql) {
    $data = mysqli_query($connection, $sql);
    return mysqli_num_rows($data);
}

function get_assoc_arr($connection, $sql)
{
    $data = mysqli_query($connection, $sql);
    return mysqli_fetch_assoc($data);
}