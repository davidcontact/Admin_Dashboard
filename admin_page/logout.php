<?php
session_start();
session_destroy();
header("location: ../Form/login.php");
