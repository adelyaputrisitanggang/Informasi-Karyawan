<?php
session_start();
include_once('functions.php');
if (!isset($_SESSION['is_logged_in'])) {
    redirect('login.php');
}
open_page('Tambah Karyawan');
?>
<form action="add_karyawan_process.php" method="post">
    <table border="1">
        <tr>
            <td>Nama Pegawai</td>
            <td>:</td>
            <td><input type="text" name="name"></td>
        </tr>
        <tr>
            <td>Gelar</td>
            <td>:</td>
            <td><input type="text" name="title"></td>
        </tr>
        <tr>
            <td>Gaji</td>
            <td>:</td>
            <td><input type="text" name="salary"></td>
        </tr>
        <tr>
            <td>Department</td>
            <td>:</td>
            <td><input type="text" name="id_dept"></td>
        </tr>
        <tr>
            <td>Company</td>
            <td>:</td>
            <td><input type="text" name="id_company"></td>
        </tr>
        <tr><td colspan="3" align="center"><input type="submit" name="action"
                                   value="save"></td></tr>
    </table>
</form>
<?php
close_page();
?>