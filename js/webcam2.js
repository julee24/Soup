let myVideoStream = document.getElementById('myVideo')     // make it a global variable
let myStoredInterval = 0


"use strict";
let secondsLabel = document.getElementById("seconds"),
minutesLabel = document.getElementById("minutes"), 
hoursLabel = document.getElementById("hours"), totalSeconds = 0, 
startButton = document.getElementById("start"), 
stopButton = document.getElementById("stop"), 
resetButton = document.getElementById("end"), timer = null;



function getVideo(){
// navigator.getMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia;
// navigator.getMedia({video: true, audio: false},
                   
//   function(stream) {
//     myVideoStream.srcObject = stream   
//     myVideoStream.play();
// }, 
                   
//  function(error) {
//    alert('작동하지 않습니다. 카메라 연결여부를 확인해주세요.');
// });
    document.getElementById("bg").src = "http://localhost/video_feed";
    timerStart();
    // function timerStart() {
    // if (!timer) {
    // timer = setInterval(setTime, 1000);
    // }
};
    


function timerStart() {
    if (!timer) {
    timer = setInterval(setTime, 1000);
    }
}

function timerStop() {
    if (timer) {
    clearInterval(timer);
    timer = null;
    }
};

function timerEnd() {
    if (timer) {
    timerStop();
    }
};

function setTime() {
    ++totalSeconds;
    secondsLabel.value = pad(totalSeconds % 60);
    minutesLabel.value = pad(parseInt(totalSeconds / 60));
    hoursLabel.value = pad(parseInt(totalSeconds / 3600))
}

function pad(val) {
    var valString = val + "";
    if (valString.length < 2) {
    return "0" + valString;
    } else {
    return valString;
    }
}