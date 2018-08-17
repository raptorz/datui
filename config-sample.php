<?php

// Cookie encryption key. Max 52 characters
define('ENCRYPTION_KEY', 'your_dabr_name');

// OAuth consumer and secret keys. Available from http://twitter.com/oauth_clients
define('OAUTH_CONSUMER_KEY', 'your_oauth_key');
define('OAUTH_CONSUMER_SECRET', 'your_oauth_secret');

// bit.ly login and API key for URL shortening
define('BITLY_LOGIN', 'your_bitly_account');
define('BITLY_API_KEY', 'your_bitly_key');

// Optional API keys for retrieving thumbnails
define('FLICKR_API_KEY', 'your_flickr_key');

// Optional: Allows you to turn shortened URLs into long URLs http://www.longurlplease.com/docs
// Uncomment to enable.
// define('LONGURL_KEY', 'true');

// Base URL, should point to your website, including a trailing slash
// Can be set manually but the following code tries to work it out automatically.

define ('FORCE_SECURE', 1);

if(FORCE_SECURE==1 && $_SERVER['HTTPS']!="on") {
    $redirect= "https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    header("Location:$redirect");
}

$base_url = (($_SERVER['HTTPS']!="on")?'http://':'https://').$_SERVER['HTTP_HOST'];
if ($directory = trim(dirname($_SERVER['SCRIPT_NAME']), '/\,')) {
  $base_url .= '/'.$directory;
}
define('BASE_URL', $base_url.'/');


// Google Analytics Mobile tracking code
// You need to download ga.php from the Google Analytics website for this to work
// Copyright 2009 Google Inc. All Rights Reserved.
$GA_ACCOUNT = "";
$GA_PIXEL = "ga.php";

function googleAnalyticsGetImageUrl() {
  global $GA_ACCOUNT, $GA_PIXEL;
  $url = "";
  $url .= $GA_PIXEL . "?";
  $url .= "utmac=" . $GA_ACCOUNT;
  $url .= "&utmn=" . rand(0, 0x7fffffff);
  $referer = $_SERVER["HTTP_REFERER"];
  $query = $_SERVER["QUERY_STRING"];
  $path = $_SERVER["REQUEST_URI"];
  if (empty($referer)) {
    $referer = "-";
  }
  $url .= "&utmr=" . urlencode($referer);
  if (!empty($path)) {
    $url .= "&utmp=" . urlencode($path);
  }
  $url .= "&guid=ON";
  return str_replace("&", "&amp;", $url);
}

define('TIME_DIFF', 5); //  your server timezone
define('WEB_ROOT', '/');
define('DABR_TITLE', 'your_dabr_title');
define('DABR_API', 'http://twitter.com/');
define('DABR_APIS', 'http://search.twitter.com/');

define('OAUTH_URL', 'https://twitter.com/oauth/');
define('ITAP_URL', 'your_itap_url');

define('TWITPIC_MAIL_SENDER', 'your_email_for_send_to_twitpic');

define('LONG_URL', 0);
// 是否开启还原短链接功能? 0为不开启, 1为开启. 默认开启.
define('INVITE', 1);
//是否开启"仅受邀用户可登录"的功能? 0为不开启, 1为开启. 默认不开启.
define('INVITE_PASSWORD', 'your_invite_password');
?>
