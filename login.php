<?php
ini_set('display_errors', '0');
$is_logged = 'NO';
session_start();
$_SESSION['confirm'] = 'NO';
$is_logged = $_SESSION['is_logged'];
if(!isset($_SESSION['is_logged'])) {
    session_start();
    $is_logged = $_SESSION['is_logged'];
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF=8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/login.css"/>
        <title>로그인:Study Friends</title>
    </head>
    <body>
        <header class="header">
            <div class="header-content responsive-wrapper">
                <div class="header-logo">
                    <a href="index.php">
                        <!-- <div>
                            <img src="https://assets.codepen.io/285131/untitled-ui-icon.svg" />
                        </div> -->
                        <img src="img/logo1.png" />
                    </a>
                </div>
                <div class="header-navigation">
                    <nav class="header-navigation-links">
                        <ul>
                            <li><a href="study.php">공부하기</a></li>
                            <li>
                                <a href="#">나의 공부</a>
                                <ul class="submenu">
                                    <li><a href="studylog.php">공부 일기</a></li>
                                    <li><a href="planner.php">공부 계획</a></li>
                                </ul>
                            </li>
                            <li><a href="mypage.php">마이페이지</a></li>
                            <li>
                                <a href="#">고객센터</a>
                                <ul class="submenu">
                                    <li><a href="question.php">자주하는 질문(FAQ)</a></li>
                                    <li><a href="myqna.php">1:1 문의</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
                <a href="#" id="menu-button" class="button" >
                    <i class="ph-list-bold"></i>
                    <span>Menu</span>
                </a>
                <div class="menu-wrap">
                    <nav class="menu-nav">
                    <ul>
                        <li><a href="study.php">공부하기</a></li>
                        <li>
                            <a href="#">나의 공부</a>
                            <ul class="submenu">
                            <li><a href="studylog.php">공부 일기</a></li>
                            <li><a href="planner.php">공부 계획</a></li>
                            </ul>
                        </li>
                        <li><a href="mypage.php">마이페이지</a></li>
                        <li>
                            <a href="#">고객센터</a>
                            <ul class="submenu">
                                <li><a href="question.php">자주하는 질문(FAQ)</a></li>
                                <li><a href="myqna.php">1:1 문의</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                </div>
            </div>
        </header>
        <main class="main">
        <?php
            if($is_logged=='YES') {
            ?>
            <script>
                alert("이미 로그인되어있습니다.");
                history.back();
            </script>
            <?php
            } else {
            ?>           
            <div class="responsive-wrapper">
                <div class="horizontal-tabs">
                    <a href="#" id="LoginButton">Login</a>
                    <a href="#" id="SignupButton">Sign up</a>
                </div>
                <div class="content" id="login">
                    <form method="post" action="./login-action.php">
                    <table>
                    <tr>
                        <td id="tag">아이디</td>
                        <td id="input">
                            <input type="text" name="login-id" id="id" placeholder="ID" minlength="4" maxlength="20">
                        </td>
                    </tr>
                    <tr>
                        <td id="tag">비밀번호</td>
                        <td id="input">
                            <input type="password" name="login-password" placeholder="Password" minlength="8" maxlength="20">
                        </td>
                    </tr>
                    <tr>
                        <td colspan='2' id="check">
                            <div>
                                <input type="checkbox" id="auto-login" name="auto-login" value="y">
                                <label for="auto-login">자동 로그인 (30일간 유지)</label> 
                            </div>
                        </td>
                        <!-- <td id="input">
                        </td> -->
                    </tr>
                    </table>
                    <input type="submit" class="login" value="로그인">
                    </form>   
                </div>
                <div class="content" id="sign-up">
                    <form method="post" action="./signup-action.php">
                    <table>
                    <tr>
                        <td id="tag">이름</td>
                        <td id="input">
                            <input type="text" name="name" minlength="2" maxlength="10" placeholder="Name">
                        </td>
                    </tr>
                    <tr>
                        <td id="tag">아이디</td>
                        <td id="input">
                            <input type="text" name="id" id="id2" placeholder="ID" minlength="4" maxlength="20">
                        </td>
                    </tr>
                    <tr>
                        <td id="tag">비밀번호</td>
                        <td id="input">
                            <input type="password" name="password" id="password2" placeholder="Password" minlength="8" maxlength="20">
                        </td>
                    </tr>
                    <tr>
                        <td id="tag">비밀번호 확인</td>
                        <td id="input">
                            <input type="password" name="password2" id="password3"placeholder="Password" minlength="8" maxlength="20">
                        </td>
                    </tr>
                    <tr>
                        <td id="tag">이메일</td>
                        <td id="input">
                            <input type="email" name="email" placeholder="Email">
                        </td>
                    </tr>
                    </table>
                    <input type="submit" class="signup" value="회원가입">
                    </form>
                </div>
            </div>
            <?php
            }
            ?>
        </main>
        <footer class="footer">
            <ul class="f-list">
                <li>회사소개</li>
                <li>이용약관</li>
                <li>개인정보처리방침</li>
                <li>운영정책</li>
                <li>주요서비스</li>
            </ul>
            <div class="name">©StudyFriends:스프</div>
        </footer>
    </body>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script>
        let Login = document.getElementById('LoginButton');
        let SignUp = document.getElementById('SignupButton');

        function login() {
            document.getElementById("login").style.display = "flex";
            document.getElementById("sign-up").style.display = "none";
        }

        function signup() {
            $('#LoginButton').removeClass('active');
            document.getElementById("login").style.display = "none";
            document.getElementById("sign-up").style.display = "flex";

        }

        $('#LoginButton').addClass('active');
        Login.addEventListener("click",login);
        SignUp.addEventListener("click",signup);
    </script>
</html>