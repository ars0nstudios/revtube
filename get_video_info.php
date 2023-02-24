<?php

/*
*   YouTube 2012 player
*       Brought to you by billyisreal.com
*
*   Most of this stuff is useless so lemme guide you real quick
*
*
*   Qualities (line 25) (doesn't actually change the quality of the video file):
*       medium: 360p
*       large: 480p
*       hd720: 720p
*       hd1080: 1080p
*
*   You also change the author by editing line 68
*/

$fmt_stream_map = [
    [
        "itag" => "43",
        "url" => "/content/video/".$_GET['video_id'],
        "sig" => "revoozieisacutecatfoundoncatbouncedotcom",
        "fallback_host" => "tc.v14.cache3.c.youtube.com",
        "quality" => "hd720",
        "type" => "video/mp4; codecs=\"avc1.4d002a\""
    ],
];

$count = 0;
$url_encoded_fmt_stream_map;
foreach($fmt_stream_map as $stream) {
    if($count == 0)
        $url_encoded_fmt_stream_map = http_build_query($stream);
    else
        $url_encoded_fmt_stream_map = $url_encoded_fmt_stream_map . "," . http_build_query($stream);
    $count++;
}

$data = array(
    "hl" => "en_US",
    "cc_module" => "",
    "track_embed" => "0",
    "vq" => "auto",
    "title" => pathinfo($_GET['video_id'])['filename'],
    "sendtmp" => "1",
    "avg_rating" => "5.0",
    "tts_url" => "http://www.youtube.com/api/timedtext%3Fsignature%3DE949556D4478C57B95F0E4268F8D85D460D27DF6.1EC1679B0E1466625B2A029D836BE9C135A0B300%26hl%3Den_US%26caps%3Dasr%26expire%3D1361228889%26sparams%3Dasr_langs%252Ccaps%252Cv%252Cexpire%26v%3Da3a7f8vgU98%26key%3Dyttt1%26asr_langs%3Dko%252Cde%252Cpt%252Cen%252Cnl%252Cja%252Cru%252Ces%252Cfr%252Cit",
    "url_encoded_fmt_stream_map" => $url_encoded_fmt_stream_map,
    "view_count" => "0",
    "css_asr" => "1",
    "token" => "",
    "no_get_video_log" => "1",
    "muted" => "0",
    "allow_ratings" => "1",
    "keywords" => "the",
    "account_playback_token" => "",
    "video_id" => htmlspecialchars($_GET['video_id']),
    "thumbnail_url" => "/content/thumb/default.png",
    "status" => "ok",
    "has_cc" => "True",
    "fexp" => "907063%2C919329%2C913565%2C920704%2C912806%2C902000%2C922403%2C922405%2C929901%2C913605%2C925006%2C908529%2C920201%2C930101%2C911116%2C926403%2C910221%2C901451%2C919114",
    "ftoken" => "",
    "iurlsd" => "",
    "ccfont" => "Arial Unicode MS, arial, verdana, _sans",
    "pltype" => "contentugc",
    "allow_embed" => "1",
    "author" => "Revista",
    "length_seconds" => "0",
    "storyboard_spec" => "",
    "abd" => "1",
    "iurlmaxres" => "",
    "watermark" => "http://s.ytimg.com/yts/img/watermark/youtube_watermark-vflHX6b6E.png",
    "cc3_module" => "",
    "tmi" => "1",
    "ptk" => "youtube_none",
    "endscreen_module" => "",
    "fmt_list" => "45/1280x720/99/0/0%2C22/1280x720/9/0/115%2C44/854x480/99/0/0%2C35/854x480/9/0/115%2C43/640x360/99/0/0%2C34/640x360/9/0/115%2C18/640x360/9/0/115%2C5/320x240/7/0/0%2C36/320x240/99/0/0%2C17/176x144/99/0/0",
    "timestamp" => "1361203689",
);

$data = http_build_query($data);

die(trim($data));

?>