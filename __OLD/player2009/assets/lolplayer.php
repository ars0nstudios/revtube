<head>
<link rel="stylesheet" href="./assets/player.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>
<body style="color:white; background-color:black;">
<div class="player" id="07player">
<div class="video-stream" style="
    width: 100%;
    height: 100%;
    position: absolute;
    top: -16px;
    left: 0px;
">
<video id="video-stream" src="https://cdn.discordapp.com/attachments/858227583861391361/860570475888115742/Beans.mp4" style="width: 100%;
    height: 100%;" onclick="playVid();" preload="auto"></></video>
</div>
<div id="loading" class="spinner"></div>
<div class="playIcon" onclick="playVid();"></div>
<div class="controls" style="background-color:white;">
<div style="float: left; height: 100%; text-align: left;">
<div class="playButton" id="playpause" onclick="playVid();"></div>
</div>
<div style="float: right;">
<div class="timer">
<span class="cur" id="cur">00:00</span>
 / 
<span class="dur" id="dur">00:00</span>
</div>
<div class="separator"></div>
<div class="volbar" id="volbar">
<span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" id="slider" style="left: 0%;"></span>
</div>
<div class="volvisual">
</div>
<div class="separator"></div>
<div class="fullscreenButton" id="fullscreenButton" onclick="openFullscreen();"></div>
</div>
<div style="overflow: hidden; height: 100%; text-align: left;">
<div class="progress" id="progress">
<div class="position" id="position">
</div>
<span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" id="scrubber" style="left: 0%;"></span>
</div>
</div>
</div>
</div>
<script>
var vid = document.getElementById("video-stream");
var gTimeFormat=function(seconds){
	var m=Math.floor(seconds/60)<10?"0"+Math.floor(seconds/60):Math.floor(seconds/60);
	var s=Math.floor(seconds-(m*60))<10?"0"+Math.floor(seconds-(m*60)):Math.floor(seconds-(m*60));
	return m+":"+s;
};
window.onload = function() {
	$( "#volbar" ).slider();
	$( "#progress" ).slider();
	$('#volbar').slider("option", "value", 100);
	$('#progress').slider("option", "value", 0);
}
var docElm = document.getElementById("07player");
var selected = 0;
var playpause = document.getElementById("playpause");
var fullscreen = document.getElementById("fullscreenButton");
var scrubber = document.getElementById("scrubber");
var progress = document.getElementById("position");
var volslider = document.getElementById("volslider");
var volumeval;
function openFullscreen() {
var isInFullScreen = (document.fullscreenElement && document.fullscreenElement !== null) ||
        (document.webkitFullscreenElement && document.webkitFullscreenElement !== null) ||
        (document.mozFullScreenElement && document.mozFullScreenElement !== null) ||
        (document.msFullscreenElement && document.msFullscreenElement !== null);

    if (!isInFullScreen) {
        if (docElm.requestFullscreen) {
            docElm.requestFullscreen();
			fullscreen.style.backgroundImage = "url(./assets/fullscreen.png)";
			fullscreen.style.width = "17px";
        } else if (docElm.mozRequestFullScreen) {
            docElm.mozRequestFullScreen();
			fullscreen.style.backgroundImage = "url(./assets/fullscreen.png)";
			fullscreen.style.width = "17px";
        } else if (docElm.webkitRequestFullScreen) {
            docElm.webkitRequestFullScreen();
			fullscreen.style.backgroundImage = "url(./assets/fullscreen.png)";
			fullscreen.style.width = "17px";
        } else if (docElm.msRequestFullscreen) {
            docElm.msRequestFullscreen();
			fullscreen.style.backgroundImage = "url(./assets/fullscreen.png)";
			fullscreen.style.width = "17px";
        }
    } else {
        if (document.exitFullscreen) {
            document.exitFullscreen();
			fullscreen.style.backgroundImage = "url(./assets/fullscreen.png)";
			fullscreen.style.width = "17px";
        } else if (document.webkitExitFullscreen) {
            document.webkitExitFullscreen();
			fullscreen.style.backgroundImage = "url(./assets/fullscreen.png)";
			fullscreen.style.width = "17px";
        } else if (document.mozCancelFullScreen) {
            document.mozCancelFullScreen();
			fullscreen.style.backgroundImage = "url(./assets/fullscreen.png)";
			fullscreen.style.width = "17px";
        } else if (document.msExitFullscreen) {
            document.msExitFullscreen();
			fullscreen.style.backgroundImage = "url(./assets/fullscreen.png)";
			fullscreen.style.width = "17px";
        }
}
}
if (document.addEventListener)
{
 document.addEventListener('fullscreenchange', exitHandler, false);
 document.addEventListener('mozfullscreenchange', exitHandler, false);
 document.addEventListener('MSFullscreenChange', exitHandler, false);
 document.addEventListener('webkitfullscreenchange', exitHandler, false);
}

function exitHandler()
{
 if (document.webkitIsFullScreen === false)
 {
  fullscreen.style.backgroundImage = "url(./assets/fullscreen.png)";
  fullscreen.style.width = "17px";
 }
 else if (document.mozFullScreen === false)
 {
  fullscreen.style.backgroundImage = "url(./assets/fullscreen.png)";
  fullscreen.style.width = "17px";
 }
 else if (document.msFullscreenElement === false)
 {
  fullscreen.style.backgroundImage = "url(./assets/fullscreen.png)";
  fullscreen.style.width = "17px";
 }
}  
function vidpercentage(num)
{
  return num*100/vid.duration; 
}
function playVid() {
$('.playIcon').remove();
if (playpause.className == "playButton") {
    vid.play();
	playpause.className = "pauseButton";
	} else {
	vid.pause();
	playpause.className = "playButton";
	}
}
vid.ontimeupdate = function() {timeUpdate()};
$("#progress").on("mousedown", function(e){
	selected = 1;
});
$("#progress").on("mouseup", function(e){
	selected = 0;
	vid.currentTime = $('#progress').slider("option", "value");
});
function timeUpdate() {
	document.getElementById("cur").innerHTML = gTimeFormat(vid.currentTime);
	document.getElementById("dur").innerHTML = gTimeFormat(vid.duration);
	$('#progress').slider("option", "max", vid.duration);
	if(selected == 0) {
	scrubber.style.left = vidpercentage(vid.currentTime) + "%";
	}
	progress.style.width = vidpercentage(vid.currentTime) + "%";
	volumeval = $('#volbar').slider("option", "value");
	vid.volume = volumeval / 100;
}
vid.addEventListener('contextmenu', e => {
  e.preventDefault();
});
vid.onwaiting = function() {
  showLoad(loading, this);
};
vid.onplaying = function() {
  hideLoad(loading, this);
};
function showLoad(img, vid) {
  img.style.display = "block";
}

function hideLoad(img, vid) {
  img.style.display = "none";
}
</script>
</body>