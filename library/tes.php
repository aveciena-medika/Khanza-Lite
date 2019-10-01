<?php if(isset($_POST['submit'])): ?>
    <?php
    var_dump($_POST);

    ?>
<?php endif ?>
<html>
<head>
    <title>Tes</title>
</head>
<body>
<form action="" method="POST">
    <input type="number" name="no"/>
    <input type="text" name="nama"/>
    <input type="text" name="umur">
    <input type="text" name="pecah">
    <input type="submit" name="submit" value="simpan"/>
</form>
</body>
</html>