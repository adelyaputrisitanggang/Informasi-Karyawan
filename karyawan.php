<?php

require_once('functions.php');
session_start();
open_page('Karyawan');
$database = new mysqli('127.0.0.1', 'root', '', 'karyawan');
$employee_query = "SELECT * FROM employee";
$employee_result_set = $database->query($employee_query);
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.php">Beranda</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <?php if (get_session('user') == 'admin') { ?>

            <?php } ?>
        </ul>
    </div>
</nav>
<br />
<br />
<center>
    <h1>Daftar Karyawan</h1>
    <?php
    if (get_session('user') == 'admin') {
        echo '<a href="add_karyawan.php" class="btn btn-outline-success my-2 my-sm-0" role="button" aria-pressed="true">Tambah karyawan</a>';
        echo '<br/>';
    } ?>

    <?php
    echo '<br/>';
    echo '<div class="container">';
    echo ('<table class="table">');
    echo ('<tr>');
    echo ('<td><b>#</b></td>');
    echo ('<td><b>Nama Pegawai</b></td>');
    echo ('<td><b>Gelar</b></td>');
    echo ('<td><b>Gaji</b></td>');
    echo ('<td><b>Department</b></td>');
    echo ('<td><b>Company</b></td>');

    echo ('<td colspan=2><b>Action</b></td>');
    echo ('</tr>');
    while ($employee_row = $employee_result_set->fetch_assoc()) {
        $department_query = "SELECT * FROM department WHERE id_dept=" . $employee_row['id_dept'];
        $department_result_set = $database->query($department_query);
        $department_row = mysqli_fetch_row($department_result_set);

        echo ('<tr>');
        echo ('<td>' .
            $employee_row['id_emp'] . '</td>');
        echo ('<td>' . $employee_row['name'] . '</td>');
        echo ('<td>' . $employee_row['title'] . '</td>');
        echo ('<td>' . $employee_row['salary'] . '</td>');
        echo ('<td>' . $department_row[1] . '</td>');
        echo ('<td>' . $employee_row['id_company'] . '</td>');
        echo ('<td colspan=2> <a href="detail.php?id='
            . $employee_row['id_emp'] . '">Detail Karyawan' . '</td>');
        echo ('</tr>');


        echo ('</tr>');
    }
    echo ('</table>');
    echo ('</div>');
    ?>

</center>
<?php
$database->close();
close_page();
?>