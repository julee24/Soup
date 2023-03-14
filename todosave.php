<?php 
    session_start();
    $id = $_SESSION['id'];
    $todo = $_POST["plan"];
    $check = 'F';

    $con = mysqli_connect("localhost","root","yewwey1105","newdb") or die ("Can't access DB");
    $query = "insert into todolist(id,todo,checklist) values('".$id."','".$todo."','".$check."')";
    $result = mysqli_query($con,$query);

    exit(0);
?>