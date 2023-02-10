<?php
require_once('../../inc/Faqs.class.php');
require_once('../../inc/Users.class.php');
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// usage: http://localhost/Week05/public/article-view.php?articleID=1

$faq= new Faqs();
$faqDataArray = array();
$validProfile = false;

// load the user if we have it
if (isset($_REQUEST['faqID'])) {
    $validProfile = $faq->load($_REQUEST['faqID']);
    $faqDataArray = $faq->faqData;
}
require_once('../../tpl/final/faq-view.tpl.php');
?>
