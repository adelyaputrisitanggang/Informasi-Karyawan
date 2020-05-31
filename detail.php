<?php

session_start();
include_once('functions.php');
open_page('Detail');
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="index.php">Beranda</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="karyawan.php">Data Karyawan<span class="sr-only">(current)</span></a>
                </li>
               
                </ul>
        </div>
</nav>


<?php
// retrieve posted form data
$id_emp= $_GET['id'];
$database = new mysqli('127.0.0.1', 'root', '', 'karyawan');
$query = 'select * from employee where id_emp=?';
$statement = $database->prepare($query);
$statement->bind_param('i', $id_emp);
$statement->execute();
$result_set = $statement->get_result();
$row = $result_set->fetch_assoc();

echo('<div class="container">');
echo('<div class="row">');
echo('<div class="col-md-3">');
echo('<ul class="list-group list-group-flush">');
echo('<li class="list-group-item"><b>Nama Karyawan</b></li>');
echo('<li class="list-group-item"><b>Gelar</b></li>');
echo('<li class="list-group-item"><b>Gaji</b></li>');
echo('<li class="list-group-item"><b>Department</b></li>');
echo('<li class="list-group-item"><b>Country</b></li>');

echo('</ul>');
echo('</div>');
echo('<div class="col-md-9">');
echo('<ul class="list-group list-group-flush">');
echo ('<li class="list-group-item"> '.$row['name'] . '</li>');
echo ('<li class="list-group-item"> '.$row['title'] . '</li>');
echo ('<li class="list-group-item"> '.$row['salary'] . '</li>');
echo ('<li class="list-group-item"> '.$row['id_dept'] . '</li>');
echo ('<li class="list-group-item"> '.$row['id_company'] . '</li>');
echo ('<li class="list-group-item"> '.$row['name_dept'] . '</li>');


echo('</ul>');
echo('</div>');
echo('</div>');
echo('</div>');
?>