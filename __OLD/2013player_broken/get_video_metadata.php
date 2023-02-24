<?php require($_SERVER['DOCUMENT_ROOT'] . "/static/important/config.inc.php"); ?>
<?php require($_SERVER['DOCUMENT_ROOT'] . "/static/lib/new/base.php"); ?>
<?php require($_SERVER['DOCUMENT_ROOT'] . "/static/lib/new/fetch.php"); ?>
<?php require($_SERVER['DOCUMENT_ROOT'] . "/static/lib/new/update.php"); ?>
<?php require($_SERVER['DOCUMENT_ROOT'] . "/static/lib/new/insert.php"); ?>
<?php
    $_user_fetch_utils = new user_fetch_utils();
    $_video_fetch_utils = new video_fetch_utils();
    $_video_insert_utils = new video_insert_utils();
    $_user_insert_utils = new user_insert_utils();
    $_user_update_utils = new user_update_utils();
    $_base_utils = new config_setup();
    
    $_base_utils->initialize_db_var($conn);
    $_video_fetch_utils->initialize_db_var($conn);
    $_video_insert_utils->initialize_db_var($conn);
    $_user_fetch_utils->initialize_db_var($conn);
    $_user_insert_utils->initialize_db_var($conn);
    $_user_update_utils->initialize_db_var($conn);
    $_video = $_video_fetch_utils->fetch_video_rid($_GET['video_id']);
    $_user = $_user_fetch_utils->fetch_user_username($_video['author']);
    $_video['subscribed'] = $_user_fetch_utils->if_subscribed(@$_SESSION['siteusername'], $_video['author']);

    if($_video['subscribed']) { $sub2 = "un"; } else { $sub2 = ""; }
    if($_video['subscribed']) { $sub3 = "d"; } else { $sub3 = ""; }

    header('Content-type: application/json');
$jsonUser = array(
    "channel_banner_url" => "https://www.fulptube.org/dynamic/banners/".$_user['2012_bg']."",
    "channel_external_id" => htmlspecialchars($_user['username']),
    "channel_logo_url" => "https://www.fulptube.org/dynamic/pfp".$_user['pfp']."",
    "channel_paid" => 0,
    "channel_title" => htmlspecialchars($_user['username']),
    "channel_url" => "/channel?id=".htmlspecialchars($_user['username']),
    "external_channel_id" => htmlspecialchars($_user['username']),
    "external_id" => htmlspecialchars($_user['username']),
    "image_url" => "https://www.fulptube.org/dynamic/pfp/".$_user['pfp'],
    "public_name" => htmlspecialchars($_user['username']),
    "subscriber_count" => $_user_fetch_utils->fetch_subs_count($_video['author']),
    "subscriber_count_string" => $_user_fetch_utils->fetch_subs_count($_video['author'])." subscribers",
    "subscription_button_html" => "<span class=' yt-uix-button-subscription-container' ><button class='yt-uix-button yt-uix-button-size-default yt-uix-button-subscribe".$sub3."-branded yt-uix-button-has-icon yt-uix-subscription-button yt-can-buffer' type='button' onclick=';window.location.href=this.getAttribute(`href`);return false;' href='/get/".$sub2."subscribe?n=".htmlspecialchars($_video['author'])."' aria-busy='false' aria-role='button' aria-live='polite' data-sessionlink='ei=R7RfVJ75C9PoqAOl34KoDw&amp;feature=html5-player' data-style-type='branded' data-channel-external-id='".$_user['username']."'><span class='yt-uix-button-icon-wrapper'><span class='yt-uix-button-icon yt-uix-button-icon-subscribe yt-sprite'></span></span><span class='yt-uix-button-content'><span class='subscribe-label' aria-label='Subscribe'>Subscribe</span><span class='subscribed-label' aria-label='Subscribed'>Subscribed</span><span class='unsubscribe-label' aria-label='Unsubscribe'>Unsubscribe</span> </span></button><span class='yt-subscription-button-subscriber-count-branded-horizontal'  tabindex='0'>".$_user_fetch_utils->fetch_subs_count($_video['author'])."</span>  <span class='yt-subscription-button-disabled-mask' title=''></span>
</span>",
    "username" => htmlspecialchars($_user['username']),
);

$jsonVid = array(
    "description" => $_video['description'],
    "dislikes_count_unformatted" => intval($_video_fetch_utils->get_video_dislikes($_GET['video_id'])),
    "likes_count_unformatted" => intval($_video_fetch_utils->get_video_likes($_GET['video_id'])),
    "subscription_ajax_token" => "",
    "view_count" => $_video_fetch_utils->fetch_video_views($_video['rid']),
    "view_count_string" => $_video_fetch_utils->fetch_video_views($_video['rid'])." views",
);
$jsonRoot = array(
    "user_info" => $jsonUser,
    "video_info" => $jsonVid,
);


    echo json_encode($jsonRoot);

?>
