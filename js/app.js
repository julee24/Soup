document.addEventListener('DOMContentLoaded', function(){
    document.getElementById("menu-button").addEventListener("click", function(e){
        if ( document.querySelector('.menu-nav').classList.contains('on') ){
            //메뉴닫힘
            document.querySelector('.menu-nav').classList.remove('on');
            //페이지 스크롤 락 해제
        } else {
            //메뉴펼침
            document.querySelector('.menu-nav').classList.add('on');        

        }
    });
});


// const signUpButton = document.getElementById('signUp');
// const signInButton = document.getElementById('signIn');
// const container = document.querySelector('.container');
// let modal = document.getElementById('modal_wrap');

// function modalOpen() {
//     modal.style.display = 'block';
//     document.querySelector('.bg').style.display = 'block';
//     document.body.style.overflow = "hidden";
// }

// function modalClose() {
//     modal.style.display = 'none';
//     document.querySelector('.bg').style.display = 'none';
//     document.body.style.overflow = "unset";
// }

// document.getElementById('login-modal').addEventListener('click', modalOpen);
// document.querySelector('.bg').addEventListener('click', modalClose);


// signUpButton.addEventListener('click', () => {
//   container.classList.add("right-panel-active");
// });

// signInButton.addEventListener('click', () => {
//   container.classList.remove("right-panel-active");
// });