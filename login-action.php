<?php
ini_set('display_errors', '0');
$id=$_POST['login-id'];
$password=$_POST['login-password'];
$auto=trim($_POST['auto-login']);

$con = mysqli_connect("localhost","root","yewwey1105","newdb") or die ("Can't access DB");
$query = "SELECT * FROM users WHERE id='$id';";
$result = mysqli_query($con,$query);

$num = mysqli_num_rows($result);
if(!$num){
    echo "<script>alert('유효하지 않은 아이디나 비밀번호입니다.')</script>";
    echo "<script>history.back();</script>";
    exit;
}
else {
    $array = mysqli_fetch_array($result);
    $g_pwd = $array["password"];
    if (password_verify($password, $g_pwd)) {

        session_start();

        $_SESSION['id'] = $array["id"];
        $_SESSION['is_logged'] = 'YES';
        if ($auto=="y") {
            setcookie("c_id",$id,(time()+3600*24*30),"/"); // 한달간 자동로그인 유지
        }
        mysqli_close($con);

        /* 페이지 이동 */
        echo    
        "
            <script>
                location.href = \"index.php\";
            </script>
        ";
    } else {
        $_SESSION['is_logged'] = 'NO';
        echo "
            <script type=\"text/javascript\">
                alert(\"비밀번호가 일치하지 않습니다.\");
                history.back();
            </script>
        ";
        exit();
    }
    // 사용자가 입력한 비밀번호와 DB에 저장된 비밀번호가 일치하지 않는다면
    // if($password != $g_pwd){
    //     echo "
    //         <script type=\"text/javascript\">
    //             alert(\"비밀번호가 일치하지 않습니다.\");
    //             history.back();
    //         </script>
    //     ";
    // exit;}
    //  else{ // 비밀번호가 일치한다면
    //     // 세션 변수 생성
    //     // $_SESSION["세션변수명"] = 저장할 값;
    //     session_start();
    //     $_SESSION[ 'id' ] = $array["id"];
    //     $_SESSION['is_logged'] = 'YES';

    //     mysqli_close($con);

    //     /* 페이지 이동 */
        // echo    
        // "
        //     <script>
        //         location.href = \"index.php\";
        //         alert('{$_SESSION[ 'is_logged' ] }');
        //     </script>
        // ";
    // };
};?>