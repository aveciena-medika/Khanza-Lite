<?php
if(!defined('IS_IN_MODULE')) die("NO DIRECT FILE ACCESS!");

class Farmasi {
    function index() {
?>
<div class="body">
    <div class="content">
      <?php include('modules/Farmasi/dashboard.php'); ?>
    </div>
</div>
<?php
    }
    function data_obat() {
?>
<div class="body">
    <div class="content">
    </div>
</div>
<?php
    }
}
?>
