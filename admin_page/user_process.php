<?php
session_start();
$_SESSION['Login'] = 1;
header("location: userPage.php");
