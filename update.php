<?php
    $name=$_POST['name-update'];
    $password=$_POST['pw-update'];
    $password_verify=$_POST['pw-update2'];
    $email=$_POST['email-update'];
    //비밀번호 일치 확인
    if ($password != $password_verify) {
        echo    
            "
                <script>
                    alert('입력하신 비밀번호가 일치하지 않습니다.');
                    location.href = \"mypage.php\";
                </script>
            ";
    }
    //비밀번호 암호화
    $encrypted_password  = password_hash($password, PASSWORD_DEFAULT);

    session_start();
    $id=$_SESSION['id'];
    $profile =$_SESSION['profile'];
    $con = mysqli_connect("localhost","root","yewwey1105","newdb") or die ("Can't access DB");
    $sql= "SELECT * FROM users where id='$id'";            
    $result = mysqli_query($con,$sql);
    $array = mysqli_fetch_array($result);
    $originalProfile = $array['profile'];
    
    if($profile == $originalProfile || !$profile) {
        if(!$password) {
        $query = "UPDATE users
        SET name='$name',
            email='$email'
        WHERE id = '$id'";
        }
        else {
        $query = "UPDATE users
        SET name='$name',
            password='$encrypted_password',
            email='$email'
        WHERE id = '$id'";
        }
    } else {
        if(!$password) {
        $query = "UPDATE users
        SET name='$name',
            email='$email',
            profile='$profile'
        WHERE id = '$id'";
        }
        else {
        $query = "UPDATE users
        SET name='$name',
            password='$encrypted_password',
            email='$email',
            profile='$profile'
        WHERE id = '$id'";
        }
    }
    
    $result = mysqli_query($con,$query);
    if($result) {
        $_SESSION['confirm'] = 'NO';
        echo    
            "
                <script>
                    alert('수정이 완료되었습니다.');
                    location.href = \"index.php\";
                </script>
            ";
    } else {
        echo "
                <script type=\"text/javascript\">
                    alert(\"수정을 실패했습니다.\");
                    history.back();
                </script>
            ";
    }
?>