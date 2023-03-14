<?php
session_start();
$_SESSION = array();
$_SESSION['is_logged'] = 'NO';
setcookie("c_id", '', time() - 1,'/');
unset($_COOKIE["c_id"]);
session_destroy();

?>
<script>
    location.replace('index.php');
</script>