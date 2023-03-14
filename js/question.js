// button = document.querySelector('.search-btn');
// input = document.querySelector('.serch-txt');

// // 클릭,엔터키 이벤트 
// input.focus()
// input.addEventListener('keydown',function(e){
//     if(e.key === "Enter"){
//     Filter();
//     }
// })

// button.addEventListener('click',Filter);

// function Filter() {
    
//     let value = document.getElementById('value').value.toUpperCase();
//     let item = document.getElementsByClassName('one_quarter')
    
// //indexOf()를 활용한 검색기능 구현
// for(i=0; i<item.length;i++) {
//     let name = item[i].getElementsByClassName("panel-faq-title");
//     if(name[0].innerHTML.toUpperCase().indexOf(value) > -1){
//         item[i].style.display = "inline-block";
//     } else{
//         item[i].style.display = "none";
//     }
//     }
        
// }   

window.onload = () => {
    // panel-faq-container
    const panelFaqContainer = document.querySelectorAll(".panel-faq-container"); // NodeList 객체
    
    // panel-faq-answer
    let panelFaqAnswer = document.querySelectorAll(".panel-faq-answer");
  
    // btn-all-close
    const btnAllClose = document.querySelector("#btn-all-close");
    
    // 반복문 순회하면서 해당 FAQ제목 클릭시 콜백 처리
    for( let i=0; i < panelFaqContainer.length; i++ ) {
      panelFaqContainer[i].addEventListener('click', function() { // 클릭시 처리할 일
        // FAQ 제목 클릭시 -> 본문이 보이게끔 -> active 클래스 추가
        panelFaqAnswer[i].classList.toggle('active');
      });
    };
}

document.getElementById("button1").style.backgroundColor ="#404089";
document.getElementById("button1").style.color="white";
document.getElementById("button2").style.backgroundColor ="white";
document.getElementById("button3").style.backgroundColor ="white";
document.getElementById("tabel2").style.display = "none";
document.getElementById("tabel3").style.display = "none";


document.getElementById("button1").onclick = function(){
            this.style.backgroundColor ="#404089";
            this.style.color="white";
            document.getElementById("button2").style.backgroundColor ="white";
            document.getElementById("button2").style.color = "black";
            document.getElementById("button3").style.backgroundColor ="white";
            document.getElementById("button3").style.color = "black";
            document.getElementById("tabel1").style.display = "block";
            document.getElementById("tabel2").style.display = "none";
            document.getElementById("tabel3").style.display = "none";
        };

document.getElementById("button2").onclick = function(){
            this.style.backgroundColor ="#404089";
            this.style.color="white";
            document.getElementById("button1").style.backgroundColor ="white";
            document.getElementById("button1").style.color = "black";
            document.getElementById("button3").style.backgroundColor ="white";
            document.getElementById("button3").style.color = "black";
            document.getElementById("tabel1").style.display = "none";
            document.getElementById("tabel2").style.display = "block";
            document.getElementById("tabel3").style.display = "none";
        };

document.getElementById("button3").onclick = function() {
            this.style.backgroundColor ="#404089";
            this.style.color="white";
            document.getElementById("button1").style.backgroundColor ="white";
            document.getElementById("button1").style.color = "black";
            document.getElementById("button2").style.backgroundColor ="white";
            document.getElementById("button2").style.color = "black";
            document.getElementById("tabel1").style.display = "none";
            document.getElementById("tabel2").style.display = "none";
            document.getElementById("tabel3").style.display = "block";
        };