<?php include("../db.php");?>
<head>
    <link rel="stylesheet" href="./assets/player.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<style>
		.buffer {
			position: absolute;
			top: 0;
			bottom: 0;
			left: 0;
			right: 0;
			background: url(./assets/buffer.png);
				background-size: auto;
			background-size: 1px 8px;
			width: 0%;
		}
	</style>
</head>
<body style="color:white; background-color:black;">
    <div class="player" id="07player">
    <div class="video-stream" style="
        width: 100%;
        height: 100%;
        position: absolute;
        top: 0px;
        left: 0px;
    ">
    <video id="video-stream" src="../videos/
<?php


$stmt = $mysqli->prepare("SELECT * FROM videos WHERE id = ?");
$stmt->bind_param("s", $_GET['id']);
$stmt->execute();
$result = $stmt->get_result();
if($result->num_rows === 0) exit('No rows');
while($row = $result->fetch_assoc()) {
    echo $row['filename']; } ?>" onclick="playVid()" style="width:100%; height:100%;">
    </video>
    <img src="./assets/playbutton.png" id="playbut" style="position: absolute;left: 43%;top: 38%;width: 83px;opacity: 0.9;" onclick="playVid();">
    <!--<img src="./assets/retrologo.png" id="playbut" style="position: absolute;left: 66%;top: 76%;width: 160px;opacity: 0.9;" onclick="redirectmain();">-->
    <img src="./fulp_spinner.webp" id="buffic" style="display: none;position: absolute;left: 47%;top: 42%;width: 36px;opacity: 0.9;">
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
    <div style="z-index: 1;" class="position" id="position">
    </div>
    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" id="scrubber" style="z-index: 1;left: 0%;"></span>
    <div class="buffer" id="buffer">
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
</body>
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
var playbut = document.getElementById("playbut");
var buffic = document.getElementById("buffic");
var fullscreen = document.getElementById("fullscreenButton");
var scrubber = document.getElementById("scrubber");
var progress = document.getElementById("position");
var buffer = document.getElementById("buffer");
var volslider = document.getElementById("volslider");
var volumeval;
var checkInterval  = 50.0 // check every 50 ms (do not use lower values)
var lastPlayPos    = 0
var currentPlayPos = 0
var bufferingDetected = false
var player = document.getElementById('video-stream')


function setTimePlayer(seconds) {
	vid.currentTime = seconds;
}

setInterval(checkBuffering, checkInterval)
function checkBuffering() {
    currentPlayPos = player.currentTime

    // checking offset should be at most the check interval
    // but allow for some margin
    var offset = (checkInterval - 20) / 1000

    // if no buffering is currently detected,
    // and the position does not seem to increase
    // and the player isn't manually paused...
    if (
            !bufferingDetected 
            && currentPlayPos < (lastPlayPos + offset)
            && !player.paused
        ) {
        console.log("buffering")
        buffic.style.display = "block";

        bufferingDetected = true
    }

    // if we were buffering but the player has advanced,
    // then there is no buffering
    if (
        bufferingDetected 
        && currentPlayPos > (lastPlayPos + offset)
        && !player.paused
        ) {
        console.log("not buffering anymore")
        buffic.style.display = "none";

        bufferingDetected = false
    }
    lastPlayPos = currentPlayPos
}

function openFullscreen() {
var isInFullScreen = (document.fullscreenElement && document.fullscreenElement !== null) ||
        (document.webkitFullscreenElement && document.webkitFullscreenElement !== null) ||
        (document.mozFullScreenElement && document.mozFullScreenElement !== null) ||
        (document.msFullscreenElement && document.msFullscreenElement !== null);

    if (!isInFullScreen) {
        if (docElm.requestFullscreen) {
            docElm.requestFullscreen();
			fullscreen.style.backgroundImage = "url(./assets/close.png)";
			fullscreen.style.width = "44px";
        } else if (docElm.mozRequestFullScreen) {
            docElm.mozRequestFullScreen();
			fullscreen.style.backgroundImage = "url(./assets/close.png)";
			fullscreen.style.width = "44px";
        } else if (docElm.webkitRequestFullScreen) {
            docElm.webkitRequestFullScreen();
			fullscreen.style.backgroundImage = "url(./assets/close.png)";
			fullscreen.style.width = "44px";
        } else if (docElm.msRequestFullscreen) {
            docElm.msRequestFullscreen();
			fullscreen.style.backgroundImage = "url(./assets/close.png)";
			fullscreen.style.width = "44px";
        }
    } else {
        if (document.exitFullscreen) {
            document.exitFullscreen();
			fullscreen.style.backgroundImage = "url(./assets/fullscreen.png)";
			fullscreen.style.width = "22px";
        } else if (document.webkitExitFullscreen) {
            document.webkitExitFullscreen();
			fullscreen.style.backgroundImage = "url(./assets/fullscreen.png)";
			fullscreen.style.width = "22px";
        } else if (document.mozCancelFullScreen) {
            document.mozCancelFullScreen();
			fullscreen.style.backgroundImage = "url(./assets/fullscreen.png)";
			fullscreen.style.width = "22px";
        } else if (document.msExitFullscreen) {
            document.msExitFullscreen();
			fullscreen.style.backgroundImage = "url(./assets/fullscreen.png)";
			fullscreen.style.width = "22px";
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
  fullscreen.style.backgroundImage = "url(https://cdn.discordapp.com/attachments/649036005516509197/860322156189843486/fullscreen.png)";
  fullscreen.style.width = "17px";
 }
 else if (document.mozFullScreen === false)
 {
  fullscreen.style.backgroundImage = "url(https://cdn.discordapp.com/attachments/649036005516509197/860322156189843486/fullscreen.png)";
  fullscreen.style.width = "17px";
 }
 else if (document.msFullscreenElement === false)
 {
  fullscreen.style.backgroundImage = "url(https://cdn.discordapp.com/attachments/649036005516509197/860322156189843486/fullscreen.png)";
  fullscreen.style.width = "17px";
 }
}  
function vidpercentage(num)
{
  return num*100/vid.duration; 
}
function playVid() {
if (playpause.className == "playButton") {
        vid.play();
        playpause.className = "pauseButton";
        $("#playbut").fadeOut(70);
	} else {
        vid.pause();
        playpause.className = "playButton";
        $("#playbut").fadeIn(70);
	}
}
function redirectmain() {
    $(window).attr('location','https://retrotube.ml')
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

    if (vid && vid.buffered && vid.buffered.length > 0 && vid.buffered.end && vid.duration) {
        var buffered = vid.buffered.end(0);
        var duration = vid.duration;
        var buffered_percentage = (buffered / duration) * 100;
        console.log(buffered_percentage);

        buffer.style.width = buffered_percentage + "%";
    }
}

window.onkeydown = vidCtrl;
function vidCtrl(e) {
    const vid = document.querySelector('video');
    const key = e.code;

    if (key === 'ArrowLeft') {
        vid.currentTime -= 5;
        if (vid.currentTime < 0) {
            vid.pause();
            vid.currentTime = 0;
        }
    } else if (key === 'ArrowRight') {
        vid.currentTime += 5;
        if (vid.currentTime > vid.duration) {
            vid.pause();
            vid.currentTime = 0;
        }
    } else if (key === 'Space') {
        if (vid.paused || vid.ended) {
            vid.play();
        } else {
            vid.pause();
        }
    }
}

vid.addEventListener('contextmenu', e => {
  e.preventDefault();
});

</script>
</body>