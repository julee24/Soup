<?php
session_start();
$id = $_SESSION['id'];
if(isset($_POST['crop_image']))
{
    $data = $_POST['crop_image'];
    $image_array_1 = explode(";", $data);
    $image_array_2 = explode(",", $image_array_1[1]);
    $base64_decode = base64_decode($image_array_2[1]);

    // $path_img = 'upload/'.time().'.png';
    $imagename = ''.time().'.png';
    file_put_contents($imagename, $base64_decode); 
    $image_file = addslashes(file_get_contents($imagename));
    $_SESSION['photo'] = $image_file;
    // $con = mysqli_connect("localhost","root","yewwey1105","newdb") or die ("Can't access DB");
    // $query = "UPDATE users
    //     SET profile='$image_file',
    //     WHERE id = '$id'";
    
    // $result = mysqli_query($con,$query);

}
?>