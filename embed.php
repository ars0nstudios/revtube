<!DOCTYPE html>
<html lang="en" dir="ltr">

  <head>
    <link rel="stylesheet" href="/yt/cssbin/www-embed-refresh-vflIpfDM2.css">
    <!-- This style tag is to show the 'Full screen' button -->
    <style>
      .el-embedded .html5-fullscreen-button {
        display: block !important;
      }
    </style>

    <!-- This style tag is to get rid of the 'Watch on YouTube' button -->
    <style>
      .el-embedded .html5-watch-on-youtube-button {
        display: none;
      }
    </style>
  </head>

  <body id="" class="date-20120201 en_US ltr " dir="ltr">


    <div id="player" class="full-frame"></div> <!-- Pro tip: add the light-theme class to the player for light mode -->



    <script src="/yt/jsbin/www-embed_core_module-vflyEJLff.js"></script>


    <script>
      yt.setConfig({
        'EMBED_BINARY_URL': '/yt/jsbin/www-embed_core_module-vflyEJLff.js',
        'ORIGIN': "*",
        'IS_OPERA_MINI': false
      });
      yt.setMsg({
        'FLASH_UPGRADE': '<div  class=\"yt-alert yt-alert-error yt-alert-player yt-rounded \"><span class=\"yt-alert-icon\"><img src=\"\/\/s.ytimg.com\/yt\/img\/pixel-vfl3z5WfW.gif\" class=\"icon master-sprite\" alt=\"Alert icon\"><\/span><div  class=\"yt-alert-content\">        Due to issues of you being a nostalgiatard stuck in 2009\n your browser doesn\'t support html5 \n<\/div><\/div>'
      });
      yt.setConfig({
        'PLAYER_CONFIG': {
          "assets": {
            "html": "\/html5_player_template",
            "css": "\/yt\/cssbin\/www-player-vflAajDXF.css",
            "js": ".\/yt\/jsbin\/html5player-vfl4vf-DJ.js"
          },
          "url": "",
          "min_version": "8.0.0",
          "args": {
            "el": "embedded", // comment this out for normal player
            "fexp": "919100,909904,914102",
            "is_html5_mobile_device": false,
            "length_seconds": 0,
            "allow_embed": 1,
            "tabsb": "0",
            "allow_ratings": 1,
            "hl": "en_US",
            "use_tablet_controls": "0", // if you want the tablet player for some reason change this to 1
            "eurl": "",
            "iurl": "\/content\/thumb\/<?php echo (isset($_GET['t'])) ? htmlspecialchars($_GET['t']) : "" ?>",
            "view_count": 731650,
            "title": "",
            "avg_rating": 1.84592688903,
            "video_id": "<?php echo (isset($_GET['v'])) ? htmlspecialchars($_GET['v']) : "" ?>",
            "sw": "1.0",
            "iurlmaxres": "\/content\/thumb\/<?php echo (isset($_GET['t'])) ? htmlspecialchars($_GET['t']) : "" ?>",
            "enablejsapi": "0",
            "sk": "PwcYoZXnL15O-tkWlQGRO-BYdf7IQNNYC",
            "advideo": "1",
            "use_native_controls": false, // if you are a demon and want the default player with extra steps change this to true
            "rel": "1",
            "playlist_module": "",
            "iurlsd": "\/content\/thumb\/<?php echo (isset($_GET['t'])) ? htmlspecialchars($_GET['t']) : "" ?>",
          },
          "url_v9as2": "",
          "params": {
            "allowscriptaccess": "always",
            "allowfullscreen": "true",
            "bgcolor": "#000000"
          },
          "attrs": {
            "width": "100%",
            "id": "video-player",
            "height": "100%"
          },
          "url_v8": "",
          "html5": true
        },
        'EMBED_HTML_TEMPLATE': "",
        'EMBED_HTML_URL': ""
      });
      yt.net.ajax.setToken('html5_ajax', "SzIC8N3vORRP1MADIJANb8jarE58MEAxMzI4MTUxNDg0");

      yt.setMsg('HTML5_DEFAULT_FALLBACK', "Your browser does not currently recognize any of the video formats available.\u003cbr\u003e\u003ca href=\"https:\/\/youtube.com\/html5\"\u003eClick here to visit our frequently asked questions about HTML5 video.\u003c\/a\u003e");
      yt.setMsg('PLAYER_FALLBACK', "\u003cdiv  class=\"yt-alert yt-alert-error yt-alert-player yt-rounded \"\u003e\u003cspan class=\"yt-alert-icon\"\u003e\u003cimg s\u0072c=\"\/\/s.ytimg.com\/yt\/img\/pixel-vfl3z5WfW.gif\" class=\"icon master-sprite\" alt=\"Alert icon\"\u003e\u003c\/span\u003e\u003cdiv  class=\"yt-alert-content\"\u003e        The Adobe Flash Player or an HTML5 supported browser is required for video playback. \u003cbr\u003e \u003ca href=\"http:\/\/get.adobe.com\/flashplayer\/\"\u003eGet the latest Flash Player\u003c\/a\u003e \u003cbr\u003e \u003ca href=\"\/html5\"\u003eLearn more about upgrading to an HTML5 browser\u003c\/a\u003e\n\u003c\/div\u003e\u003c\/div\u003e");
      yt.setMsg('QUICKTIME_FALLBACK', "\u003cdiv  class=\"yt-alert yt-alert-error yt-alert-player yt-rounded \"\u003e\u003cspan class=\"yt-alert-icon\"\u003e\u003cimg s\u0072c=\"\/\/s.ytimg.com\/yt\/img\/pixel-vfl3z5WfW.gif\" class=\"icon master-sprite\" alt=\"Alert icon\"\u003e\u003c\/span\u003e\u003cdiv  class=\"yt-alert-content\"\u003e        The Adobe Flash Player or QuickTime is required for video playback. \u003cbr\u003e \u003ca href=\"http:\/\/get.adobe.com\/flashplayer\/\"\u003eGet the latest Flash Player\u003c\/a\u003e \u003cbr\u003e \u003ca href=\"http:\/\/www.apple.com\/quicktime\/download\/\"\u003eGet the latest version of QuickTime\u003c\/a\u003e\n\u003c\/div\u003e\u003c\/div\u003e");
      yt.setMsg('HTML5_QUALITY_SETTING', "quality");
      yt.setMsg('HTML5_SPEED_SETTING', "speed");
      yt.setMsg('HTML5_SPEED_NORMAL', "normal");
      yt.setMsg('HTML5_VOLUME_SETTING', "volume");
      yt.setMsg('HTML5_VOLUME_MUTED', "muted");
      yt.setMsg('HTML5_VOLUME_MUTE', "mute");
      yt.setMsg('HTML5_VOLUME_UNMUTE', "unmute");
      yt.setMsg('HTML5_CONTROL_TOGGLE', "toggle");
      yt.setMsg('HTML5_SUBS_TRANSCRIBED', "transcribed");


      yt.embed.writeEmbed();
    </script>



  </body>
</html>