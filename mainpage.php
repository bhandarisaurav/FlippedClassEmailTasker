<?php
/**
 * Created by PhpStorm.
 * User: saura
 * Date: 12/27/2018
 * Time: 3:41 PM
 */
session_start();
if (!isset($_SESSION['user'])) {
    echo "<SCRIPT type='text/javascript'>
                alert('Log In First');
                window.location.replace('index.php')
              </SCRIPT>";
    exit();
}
include_once("index.html"); ?>
