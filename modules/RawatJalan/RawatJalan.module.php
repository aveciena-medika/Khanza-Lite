<?php
if(!defined('IS_IN_MODULE')) { die("NO DIRECT FILE ACCESS!"); }

class RawatJalan {
    function index() {
?>
        <?php include('modules/RawatJalan/pasien.php'); ?>
<?php
    }
    function berkas_digital() { // hello function called from modules.php?module=HelloWorld&page=world
?>
        <?php include('modules/RawatJalan/berkas-digital.php'); ?>
<?php
    }
    function status_pulang() { // hello function called from modules.php?module=HelloWorld&page=world
?>
        <?php include('modules/RawatJalan/status.php'); ?>
<?php
    }
}
?>
