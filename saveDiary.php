<?php
session_start();
$id = $_SESSION['id'];
$content=$_POST['content'];
$time = $_POST['time'];
// $today = date("Y/m/d");
$photo = $_SESSION['photo'];
if($photo) {
    
    // $data = $_POST['addPicture'];
    // $image_array_1 = explode(";", $data);
    // $image_array_2 = explode(",", $image_array_1[1]);
    // $base64_decode = base64_decode($image_array_2[1]);

    // // $path_img = 'upload/'.time().'.png';
    // $imagename = ''.time().'.png';
    // file_put_contents($imagename, $base64_decode); 
    // $image_file = addslashes(file_get_contents($imagename));
    if($content) {
        $query = "insert into diary(id,text,photo,savetime) values('".$id."','".$content."','".$photo."','".$time."')";
    } else {
        $query = "insert into diary(id,photo,savetime) values('".$id."','".$photo."','".$time."')";
    }
    
} else {
    if($content) {
        $query = "insert into diary(id,text,savetime) values('".$id."','".$content."','".$time."')";
    }
    else {
        $query = "insert into diary(id,savetime) values('".$id."','".$time."')";
    }
    
}
$con = mysqli_connect("localhost","root","yewwey1105","newdb") or die ("Can't access DB");
$result = mysqli_query($con,$query);
if($result) {
    //하루에 한번만 해야하면 여기에 session 변수
    echo    
        "
            <script>
                location.href = \"studylog.php\";
            </script>
        ";
} else {
    echo "
            <script type=\"text/javascript\">
                alert(\"일기 저장을 실패했습니다.\");
                history.back();
            </script>
        ";
}
?>