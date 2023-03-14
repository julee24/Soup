<?php
session_start();
$address=$_POST['address'];
$title=$_POST['title'];
$content=$_POST['content'];
$id = $_SESSION['id'];
$con = mysqli_connect("localhost","root","yewwey1105","newdb") or die ("Can't access DB");
$query = "SELECT * FROM users WHERE id='$id';";
$result = mysqli_query($con,$query);
$array = mysqli_fetch_array($result);
$g_name = $array["name"];
$nameFrom  = $g_name;    
$mailFrom = $address; 
$nameTo  = "스프";    
$mailTo = "yewon1105@sookmyung.ac.kr" ;
$subject = $title;    
$content = $content;    
$charset = "UTF-8";
$nameFrom   = "=?$charset?B?".base64_encode($nameFrom)."?=";
$nameTo   = "=?$charset?B?".base64_encode($nameTo)."?=";
$subject = "=?$charset?B?".base64_encode($subject)."?=";
$header  = "Content-Type: text/html; charset=utf-8\r\n";
$header .= "MIME-Version: 1.0\r\n";
$header .= "Return-Path: <". $mailFrom .">\r\n";
$header .= "From: ". $nameFrom ." <". $mailFrom .">\r\n";
$header .= "Reply-To: <". $mailFrom .">\r\n";
$mailResult = mail($mailTo, $subject, $content, $header, $mailFrom);
if($mailResult) {
    echo "발송완료";
}else{
    echo "발송X";
}
?>