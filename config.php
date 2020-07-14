<?php
  $host       = $_SERVER['RDS_HOSTNAME'];
  $username   = $_SERVER['RDS_USERNAME'];
  $password   = $_SERVER['RDS_PASSWORD'];;
  $dsn        = "mysql:host=$host;dbname=tasks";
  $options    = array(
                  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
                );
?>