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
                <a class="nav-link" href="infokaryawan.php">Data Karyawan<span class="sr-only">(current)</span></a>
            </li>
        </ul>
    </div>
</nav>

<?php
// retrieve from query params
$id_emp = $_GET['id'];
$database = new mysqli('127.0.0.1', 'root', '', 'karyawan');

$employee_query = "SELECT * from employee where id_emp=" . $id_emp;
$employee_result_set = $database->query($employee_query);
$employee_row = mysqli_fetch_row($employee_result_set);

$department_query = "SELECT * FROM department WHERE id_dept=" . $employee_row[4];
$department_result_set = $database->query($department_query);
$department_row = mysqli_fetch_row($department_result_set);

$company_query = "SELECT * FROM company WHERE id_company=" . $employee_row[5];
$company_result_set = $database->query($company_query);
$company_row = mysqli_fetch_row($company_result_set);
?>

<div class="container">
    <div class="row">
        <div class="col-md-3">
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><b>Nama Karyawan</b></li>
                <li class="list-group-item"><b>Gelar</b></li>
                <li class="list-group-item"><b>Gaji</b></li>
                <li class="list-group-item"><b>Department</b></li>
                <li class="list-group-item"><b>Country</b></li>
            </ul>
        </div>
        <div class="col-md-9">
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><?= $employee_row[1]; ?></li>
                <li class="list-group-item"><?= $employee_row[2]; ?></li>
                <li class="list-group-item"><?= $employee_row[3]; ?></li>
                <li class="list-group-item"><?= $department_row[1]; ?></li>
                <li class="list-group-item"><?= $company_row[1]; ?></li>

            </ul>
        </div>
    </div>
</div>
