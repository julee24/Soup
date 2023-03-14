<?php
    $is_logged = 'NO';
    session_start();
    $is_logged = $_SESSION['is_logged'];
    $_SESSION['confirm'] = 'NO';
    if(!isset($_SESSION)) {
        session_start();
        $is_logged = $_SESSION['is_logged'];
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF=8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/question.css"/>
        <title>자주 묻는 질문</title>
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
                    <div class="header-navigation-actions">
                    <?php
                        if($is_logged=='YES') {
                        ?>
                        <a href="logout.php" class="button">
                            <i class="ph-lightning-bold"></i>
                            <span>Logout</span>
                        </a>
                        <a href="#" class="avatar">
                        <?php
                            $id = $_SESSION['id'];
                            $connect = mysqli_connect("localhost","root","yewwey1105","newdb") or die ("Can't access DB");
                            $sql= "SELECT * FROM users where id='$id'";
                            $con = mysqli_query($connect, $sql);             
                            $array = mysqli_fetch_array($con);
                            $profile = $array['profile'];
                            $_SESSION['profile'] = $profile;
                            if ($profile == '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'){
                                echo '<img src="data:image/png;base64,'.$profile.'">';
                            } else {
                                echo '<img src="data:image/png;base64,'.base64_encode($profile).'">';
                            }
                            $g_name = $array["name"];
                            $g_email = $array["email"];
                            mysqli_close($connect);
                        ?>
                        </a>
                        <?php
                        } else {
                        ?>
                        <a href="login.php" class="button">
                            <i class="ph-lightning-bold"></i>
                            <span>Login & Sign up</span>
                        </a>
                        <?php
                        }
                        ?>
                    </div>
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
            <div class="responsive-wrapper">
                <div class="main-header">
                    <h2>자주 묻는 질문(FAQ)</h2>
                    <!-- <div class="search">
                        <input type="text" placeholder="Search" />
                        <button type="submit">
                            <i class="ph-magnifying-glass-bold"></i>
                        </button>
                    </div> -->
                </div>
                <div class="sub-header">
                    <span>원하시는 질문 종류를 클릭해주세요.<br>더 궁금하신 사항이 있으면 1:1 문의하기를 눌러주세요.</span>
                    <a href="myqna.php" class="button">1:1 문의하기</a>
                </div>
                <div class="content-header">
                    <div class="content-panel">
                        <a id="button1" class="button">이용 문의</a>
                        <a id="button2" class="button">계정 문의</a>
                        <a id="button3" class="button">기타 문의</a>
                    </div>
                </div>
                <div class="content">
                    <table class="table table-bordered table-striped table-dark table-hover">
                        <thead class="thead-light text-center">
                        </thead>
                        <tbody class="text-center" id="tabel1">
                          <tr>
                            <td class="text-left" width="50%">
                              <div class="panel-faq-container">
                                <p class="panel-faq-title">
                                  <strong>[이용 문의]</strong>
                                  <span class="faq-title"> 비밀번호를 잊어버렸어요.</span>
                                </p>
                                <div class="panel-faq-answer">
                                  <p><br>다음 링크를 이용하시면 비밀번호를 찾으실 수 있습니다
                                      <br>
                                  </p>
                                  <a href="http://naver.com">자세히 보기</a>
                                </div>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td class="text-left" width="50%">
                              <div class="panel-faq-container">
                                <p class="panel-faq-title">
                                  <strong>[이용 문의]</strong>
                                  <span class="faq-title"> 공부하다가 시간이 사라졌어요.</span>
                                </p>
                                <div class="panel-faq-answer">
                                  <p>시간이 사라지는 가장 큰 이유는 인터넷 연결입니다.</p>
                                  <p>항상 인터넷 연결을 확인해주시기 바랍니다.</p>
                                  <p>기록된 시간이 사라지면 복구가 불가능합니다.</p>
                                </div>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td class="text-left" width="50%">
                              <div class="panel-faq-container">
                                  <p class="panel-faq-title">
                                      <strong>[이용 문의]</strong>
                                      <span class="faq-title"> 친구를 추가하고 싶어요. </span>
                                    </p>
                                    <div class="panel-faq-answer">
                                      <p>다음 링크를 가시면 친구를 추가할 수 있습니다.</p>
                                      <p>아이디를 입력하여 추가하시기 바랍니다.</p>
                                    </div>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td class="text-left" width="50%">
                              <div class="panel-faq-container">
                                  <p class="panel-faq-title">
                                      <strong>[이용 문의]</strong>
                                      <span class="faq-title"> 탈퇴하고 싶어요.</span>
                                    </p>
                                    <div class="panel-faq-answer">
                                      <p>다음 링크를 이용하면 탈퇴로 이동합니다.</p>
                                      <p>항상 인터넷 연결을 확인해주시기 바랍니다.</p>
                                    </div>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td class="text-left" width="50%">
                              <div class="panel-faq-container">
                                  <p class="panel-faq-title">
                                      <strong>[이용 문의]</strong>
                                      <span class="faq-title"> 공부하다가 시간이 사라졌어요.</span>
                                    </p>
                                    <div class="panel-faq-answer">
                                      <p>시간이 사라지는 가장 큰 이유는 인터넷 연결입니다.</p>
                                      <p>항상 인터넷 연결을 확인해주시기 바랍니다.</p>
                                      <p>기록된 시간이 사라지면 복구가 불가능합니다.</p>
                                    </div>
                              </div>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      <table class="table table-bordered table-striped table-dark table-hover">
                          <thead class="thead-light text-center">
                          </thead>
                          <tbody class="text-center" id="tabel2">
                            <tr>
                              <td class="text-left" width="50%">
                                <div class="panel-faq-container">
                                  <p class="panel-faq-title">
                                    <strong>[계정 문의]</strong>
                                    <span class="faq-title"> 비밀번호를 잊어버렸어요.</span>
                                  </p>
                                  <div class="panel-faq-answer">
                                    <p><br>다음 링크를 이용하시면 비밀번호를 찾으실 수 있습니다
                                        <br>
                                    </p>
                                    <a href="http://naver.com">자세히 보기</a>
                                  </div>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td class="text-left" width="50%">
                                <div class="panel-faq-container">
                                  <p class="panel-faq-title">
                                    <strong>[계정 문의]</strong>
                                    <span class="faq-title"> 공부하다가 시간이 사라졌어요.</span>
                                  </p>
                                  <div class="panel-faq-answer">
                                    <p>시간이 사라지는 가장 큰 이유는 인터넷 연결입니다.</p>
                                    <p>항상 인터넷 연결을 확인해주시기 바랍니다.</p>
                                    <p>기록된 시간이 사라지면 복구가 불가능합니다.</p>
                                  </div>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td class="text-left" width="50%">
                                <div class="panel-faq-container">
                                    <p class="panel-faq-title">
                                        <strong>[계정 문의]</strong>
                                        <span class="faq-title"> 친구를 추가하고 싶어요. </span>
                                      </p>
                                      <div class="panel-faq-answer">
                                        <p>다음 링크를 가시면 친구를 추가할 수 있습니다.</p>
                                        <p>아이디를 입력하여 추가하시기 바랍니다.</p>
                                      </div>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td class="text-left" width="50%">
                                <div class="panel-faq-container">
                                    <p class="panel-faq-title">
                                        <strong>[계정 문의]</strong>
                                        <span class="faq-title"> 탈퇴하고 싶어요.</span>
                                      </p>
                                      <div class="panel-faq-answer">
                                        <p>다음 링크를 이용하면 탈퇴로 이동합니다.</p>
                                        <p>항상 인터넷 연결을 확인해주시기 바랍니다.</p>
                                      </div>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td class="text-left" width="50%">
                                <div class="panel-faq-container">
                                    <p class="panel-faq-title">
                                        <strong>[계정 문의]</strong>
                                        <span class="faq-title"> 공부하다가 시간이 사라졌어요.</span>
                                      </p>
                                      <div class="panel-faq-answer">
                                        <p>시간이 사라지는 가장 큰 이유는 인터넷 연결입니다.</p>
                                        <p>항상 인터넷 연결을 확인해주시기 바랍니다.</p>
                                        <p>기록된 시간이 사라지면 복구가 불가능합니다.</p>
                                      </div>
                                </div>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                        <table class="table table-bordered table-striped table-dark table-hover">
                          <thead class="thead-light text-center">
                          </thead>
                          <tbody class="text-center" id="tabel3">
                            <tr>
                              <td class="text-left" width="50%">
                                <div class="panel-faq-container">
                                  <p class="panel-faq-title">
                                    <strong>[기타 문의]</strong>
                                    <span class="faq-title"> 어쩌라구요.</span>
                                  </p>
                                  <div class="panel-faq-answer">
                                    <p><br>다음 링크를 이용하시면 비밀번호를 찾으실 수 있습니다
                                        <br>
                                    </p>
                                    <a href="http://naver.com">자세히 보기</a>
                                  </div>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td class="text-left" width="50%">
                                <div class="panel-faq-container">
                                  <p class="panel-faq-title">
                                    <strong>[기타 문의]</strong>
                                    <span class="faq-title"> 공부하다가 시간이 사라졌어요.</span>
                                  </p>
                                  <div class="panel-faq-answer">
                                    <p>시간이 사라지는 가장 큰 이유는 인터넷 연결입니다.</p>
                                    <p>항상 인터넷 연결을 확인해주시기 바랍니다.</p>
                                    <p>기록된 시간이 사라지면 복구가 불가능합니다.</p>
                                  </div>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td class="text-left" width="50%">
                                <div class="panel-faq-container">
                                    <p class="panel-faq-title">
                                        <strong>[기타 문의]</strong>
                                        <span class="faq-title"> 친구를 추가하고 싶어요. </span>
                                      </p>
                                      <div class="panel-faq-answer">
                                        <p>다음 링크를 가시면 친구를 추가할 수 있습니다.</p>
                                        <p>아이디를 입력하여 추가하시기 바랍니다.</p>
                                      </div>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td class="text-left" width="50%">
                                <div class="panel-faq-container">
                                    <p class="panel-faq-title">
                                        <strong>[기타 문의]</strong>
                                        <span class="faq-title"> 탈퇴하고 싶어요.</span>
                                      </p>
                                      <div class="panel-faq-answer">
                                        <p>다음 링크를 이용하면 탈퇴로 이동합니다.</p>
                                        <p>항상 인터넷 연결을 확인해주시기 바랍니다.</p>
                                      </div>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td class="text-left" width="50%">
                                <div class="panel-faq-container">
                                    <p class="panel-faq-title">
                                        <strong>[기타 문의]</strong>
                                        <span class="faq-title"> 공부하다가 시간이 사라졌어요.</span>
                                      </p>
                                      <div class="panel-faq-answer">
                                        <p>시간이 사라지는 가장 큰 이유는 인터넷 연결입니다.</p>
                                        <p>항상 인터넷 연결을 확인해주시기 바랍니다.</p>
                                        <p>기록된 시간이 사라지면 복구가 불가능합니다.</p>
                                      </div>
                                </div>
                              </td>
                            </tr>
                          </tbody>
                    </table>
                </div>
            </div>
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
        <script src="js/question.js?ver=1"></script>
    </body>
</html>