<?php
session_start();
include 'config.php';
define('HOST', $host);
define('USER', $username);
define('PASSWORD', $password);
define('DATABASE', $database);
require 'class/Database.php';
require 'class/Mail.php';
require 'class/Users.php';
require 'class/Time.php';
require 'class/Tickets.php';
require 'class/Department.php';
$database = new Database;
$mail = new Mail;
$users = new Users;
$time = new Time;
$department = new Department;
$tickets = new Tickets;
?>
