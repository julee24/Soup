<?php 
$del = $_GET['deleteDiary'];
session_start();
$id = $_SESSION['id'];
$connect = mysqli_connect("localhost","root","yewwey1105","newdb") or die ("Can't access DB");
$sql= "DELETE FROM diary where id='$id'and writetime='$del'";
$confirm = mysqli_query($connect, $sql);
if($confirm) 
{
    echo    
        "
            <script>
                alert('일기가 삭제되었습니다.');
                location.href = \"studylog.php\";
            </script>
        ";
} else {
    echo "
            <script type=\"text/javascript\">
                alert(\"삭제를 실패했습니다.\");
                history.back();
            </script>
        ";
} 

?>