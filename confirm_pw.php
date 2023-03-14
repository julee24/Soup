<?php
    session_start();
    $password=$_POST['con_pw'];
    $id = $_SESSION['id'];
    $con = mysqli_connect("localhost","root","yewwey1105","newdb") or die ("Can't access DB");
    $query = "SELECT * FROM users WHERE id='$id';";
    $result = mysqli_query($con,$query);
    $array = mysqli_fetch_array($result);
    $g_pwd = $array['password'];
    if (password_verify($password, $g_pwd)) {
        $_SESSION['confirm'] = 'OK';
        echo"<script>
            alert('비밀번호가 맞습니다.');
            location.href = \"mypage.php\";
        </script>";
    } else {
        $_SESSION['confirm'] = 'NO';
        echo "<script>
            alert('비밀번호가 틀렸습니다.');
            location.href = \"mypage.php\";
        </script>";
    }
?>