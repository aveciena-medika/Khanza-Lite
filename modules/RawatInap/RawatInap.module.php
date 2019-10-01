<?php if (!defined('IS_IN_MODULE')) die("NO DIRECT FILE ACCESS!");

class RawatInap
{
    function index()
    {
        include('menu/pasien.php');
    }

    function berkas_digital()
    { // hello function called from modules.php?module=HelloWorld&page=world
        include('modules/RawatJalan/berkas-digital.php');
    }

    function status_pulang()
    { // hello function called from modules.php?module=HelloWorld&page=world
        include('modules/RawatJalan/status.php');
    }
}

?>
