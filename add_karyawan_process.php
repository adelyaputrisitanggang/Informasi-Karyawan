<?php

session_start();
include_once('functions.php');

$name = $_POST['name'];
$title = $_POST['title'];
$salary = $_POST['salary'];
$id_dept = $_POST['id_dept'];
$id_company = $_POST['id_company'];

$database = new mysqli('127.0.0.1', 'root', '', 'karyawan');
$query = 'INSERT INTO employee(`id_emp`, `name`, `title`, `salary`, `id_dept`, `id_company`) 
VALUES(?, ?, ?, ?, ?, ?)';
$statement = $database->prepare($query);
$statement->bind_param('ssddd', $name, $title, $salary, $id_dept, $id_company);
$statement->execute();
redirect('karyawan.php');
?>