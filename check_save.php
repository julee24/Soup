<?php
    session_start();
    $num = $_POST['num'];
    $check = $_POST['checked'];
    $id = $_SESSION['id'];
    $today = date('Y/m/d');
    $con = mysqli_connect('localhost','root','yewwey1105','newdb');
    if($check =='T') {
        mysqli_query($con, "update todolist set checklist='T' where id='$id' and num='$num';");
    } else {
        mysqli_query($con, "update todolist set checklist='F' where id='$id' and num='$num';");
    }
    
?>