<?php
require_once('../inc/CMS.class.php');

$cms = new CMS();

$cmsDataArray = array();

// load the article if we have it
if (isset($_REQUEST['cms_id']) && $_REQUEST['cms_id'] > 0) {
    $cms->load($_REQUEST['cms_id']);
    $cmsDataArray = $cms->data;
}
// create curl resource
$ch = curl_init();

// set url
curl_setopt($ch, CURLOPT_URL, "http://localhost/WDV%20Server/classes/WDV441/Week13schoolcopy/public/article-widget.php?limit=2");

// if redirected, follow it
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

//return the transfer as a string
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$userAgent = "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.114 Safari/537.36";

curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);

// $output contains the output string
$newsWidgetHTML = curl_exec($ch);

// close curl resource to free up system resources
curl_close($ch);

//weather API
$url = "http://api.weatherunlocked.com/api/current/us.50317?app_id=4d027a5f&app_key=180f2565ad758dc4d93995e8bdb37719";


$ch = curl_init();

// set url
curl_setopt($ch, CURLOPT_URL, $url);

//header
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json'));

// if redirected, follow it
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

//return the transfer as a string
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$userAgent = "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.114 Safari/537.36";

curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);

// $output contains the output string
$weatherAPI = json_decode(curl_exec($ch));

// close curl resource to free up system resources
curl_close($ch);   

// display the view
require_once('../tpl/cms.tpl.php');
?>