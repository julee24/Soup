let myVideoStream = document.getElementById('myVideo')     // make it a global variable
let myStoredInterval = 0

function getVideo(){
        document.getElementById("bg").src = "http://localhost/video_feed";
};

function stopVideo(){
    document.getElementById("bg").src = "";
};

"use strict";
let secondsLabel = document.getElementById("seconds"),
minutesLabel = document.getElementById("minutes"), 
hoursLabel = document.getElementById("hours"), totalSeconds = 0, 
startButton = document.getElementById("start"), 
stopButton = document.getElementById("stop"), 
resetButton = document.getElementById("end"), timer = null;


function timerStart() {
    if (!timer) {
    timer = setInterval(setTime, 1000);
    }
};

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
    minutesLabel.value = pad(parseInt((totalSeconds / 60)%60));
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