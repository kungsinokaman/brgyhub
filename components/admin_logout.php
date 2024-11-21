<?php

   include 'connect.php';

   setcookie('head_id', '', time() - 1, '/');

   header('location:../index.php');

?>