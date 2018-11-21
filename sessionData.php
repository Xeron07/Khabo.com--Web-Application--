<?php
session_start();

if(isset($_GET['val']))
{
    $val=$_GET['val'];
    if(isset($_SESSION[$val]))
    {

            echo 1;


    }
    else
    {
        echo 0;
    }
}
else
{
    echo 0;
}

?>