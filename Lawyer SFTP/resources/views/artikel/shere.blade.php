<?php
require_once "../../model/connection.php";
require_once "../../model/security.php";
require_once "../../model/MCrypt.php";
include '../../assets/gumlet/lib/ImageResize.php';

    // ini_set( 'display_errors', 1 );   
    // error_reporting( E_ALL );    

$db = new Security();
$mcrypt = new MCrypt();

$terget = $_GET['id'];
$id = $mcrypt->decrypt($terget);

$event = $db->getOne("SELECT a.*, a.nama as nama_event, b.nama FROM events as a INNER JOIN users as b ON a.id_user = b.id WHERE a.id_event = '$id' AND a.status_event != 'DIHAPUS' ORDER BY a.id_event DESC");


// Settings
$scheme = 'http';
$ios_id = 1234567;
$android_package = 'com.cement.semengresikmaster';
$auto = false;

// No trailing slash after path, conform to http://x-callback-url.com/specifications/
$REQUEST_URI = preg_replace('@/(?:\?|$)@', '', $_SERVER['REQUEST_URI']);

// Detection
$HTTP_USER_AGENT = strtolower($_SERVER['HTTP_USER_AGENT']);
$android = (bool) strpos($HTTP_USER_AGENT, 'android');
$iphone = !$android && ((bool) strpos($HTTP_USER_AGENT, 'iphone') || (bool) strpos($HTTP_USER_AGENT, 'ipod'));
$ipad = !$android && !$iphone && (bool) strpos($HTTP_USER_AGENT, 'ipad');
$ios = $iphone || $ipad;
$mobile = $android || $ios;

// Install
$ios_install = 'http://itunes.apple.com/app/id' . $ios_id;
$android_install = 'http://play.google.com/store/apps/details?id=' . $android_package;

// Open
if ($ios) {
    $open = $scheme . ':/' . $REQUEST_URI;
}
if ($android) {
    $open = 'intent:/' . $REQUEST_URI . '#Intent;package=' . $android_package . ';scheme=' . $scheme . ';launchFlags=268435456;end;';
}

$file = "";
if (!empty($event['banner'])) {
  if (strpos($event['banner'],"|")) {
  $array = explode('|', $string);
  $file = $array[0];
  }else{
  $file = $event['banner'];    
  }
}else{
  $file = "";
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta property="og:title" content="<?=$event['nama']?>"/>
  <meta property="og:site_name" content="SGCC"/>
  <meta property="og:description" content="<?=$event['nama_event']?>"/>
  <meta property="og:image" itemprop="image" content="http://idaman.co.id/core/public/storage/<?=$file?>"/>
  <meta property="og:image:url"  itemprop="image" content="http://idaman.co.id/core/public/storage/<?=$file?>"/>
  <meta property="og:image:alt" content="<?=$event['nama']?>"/>
  <meta property="og:image:width" content="100"/>
  <meta property="og:image:height" content="100"/>
  <meta property="og:image:type" content="image/*"/>
  <meta property="article:published_time" content="<?= date_format(date_create($event['created_at']), 'Y-m-d') ?>"/>
  <meta property="article:author" content="SGCC"/>
  <meta property="article:section" content="SGCC"/>
  <meta property="article:tag" content="SGCC"/>
  <link rel="icon" href="../assets/images/logo2.png" type="image/x-icon" />
        <title>SGCC</title>
        <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <? if ($ios): ?>
            <meta name="apple-itunes-app" content="app-id=<?= $ios_id ?>, app-argument=<?= $open ?>"/>
        <? endif ?>
    </head>
    <body>

        <script>
        function open() {
            window.location = '<?= $open ?>';

            <? if ($ios): ?>
                setTimeout(function() {
                    if (!document.webkitHidden) {
                        window.location = '<?= $ios_install ?>';
                    }
                }, 25);
            <? endif ?>
        }
        </script>
        <?php 
    if($mobile){
      if($android){
        echo "<script>location.replace('$android_install')</script>";
      }
      if ($auto) {
        echo"<script>open();</script>";
      }else{
        echo "<script>location.replace('$android_install')</script>";
      }
    }else{
      echo "<script>location.replace('$android_install')</script>";
    } 
    ?>

        <script type="text/javascript">
            var IS_IPAD = navigator.userAgent.match(/iPad/i) != null,
    IS_IPHONE = !IS_IPAD && ((navigator.userAgent.match(/iPhone/i) != null) || (navigator.userAgent.match(/iPod/i) != null)),
    IS_IOS = IS_IPAD || IS_IPHONE,
    IS_ANDROID = !IS_IOS && navigator.userAgent.match(/android/i) != null,
    IS_MOBILE = IS_IOS || IS_ANDROID;
        </script>

        <script type="text/javascript">
            function open() {
    
    // If it's not an universal app, use IS_IPAD or IS_IPHONE
        if (IS_IOS) {
        window.location = "myapp://view?id=123";
    
        setTimeout(function() {
    
            // If the user is still here, open the App Store
            if (!document.webkitHidden) {
    
                // Replace the Apple ID following '/id'
                window.location = 'http://itunes.apple.com/app/id1234567';
            }
        }, 25);
    
            } else if (IS_ANDROID) {
    
        // Instead of using the actual URL scheme, use 'intent://' for better UX
        window.location = 'intent://view?id=123#Intent;package=com.cement.semengresikmaster;scheme=http;launchFlags=268435456;end;';
            }
        }
        </script>
    </body>
</html>