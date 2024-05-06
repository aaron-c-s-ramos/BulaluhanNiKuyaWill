<?php
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function fix_name($data)
{
    return ucfirst(strtolower($data));
}
