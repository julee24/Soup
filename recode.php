<?php
session_start();;
$id = $_SESSION['id'];
$hour=$_POST['hours'];
$minute=$_POST['minutes'];
$second=$_POST['seconds'];
$time = "$hour:$minute:$second"; //string
// $today = date("Y/m/d");

$con = mysqli_connect("localhost","root","yewwey1105","newdb") or die ("Can't access DB");
$query = "insert into study(id,studytime) values('".$id."','".$time."')";
$result = mysqli_query($con,$query);
if($result) {
    //하루에 한번만 해야하면 여기에 session 변수
    echo    
        "
            <script>
                alert('공부시간이 저장되었습니다.');
                location.href = \"writestudy.php\";
            </script>
        ";
} else {
    echo "
            <script type=\"text/javascript\">
                alert(\"저장을 실패했습니다.\");
                history.back();
            </script>
        ";
}
?>