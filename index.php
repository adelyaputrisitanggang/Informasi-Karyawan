<?php
session_start();
include_once('functions.php');
open_page('index');
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="index.php">Beranda</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="karyawan.php">Data Karyawan <span class="sr-only">(current)</span></a>
                </li>
                <?php if(get_session('user')=='admin'){?>
                <li>
                	<a class="nav-link" href="transaksi.php">Data Pegawai<span class="sr-only">(current)</span></a>
                </li>
                <?php }?>
                </ul>
            </div>
            </nav>


<br>
<center>
<h1>Sistem Informasi Kepegawaian</h1>
</center>
    
    
<?php
close_page();
?>