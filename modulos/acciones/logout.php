<?php
/**
 * Created by PhpStorm.
 * User: danilo
 * Date: 27/12/2016
 * Time: 05:26 PM
 */
include ('../../config/setup.php');
session_destroy();

var_dump($_POST);
header("location:".$_POST['url-prev']);