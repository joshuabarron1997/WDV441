<?php
require_once('../../inc/Faqs.class.php');

$faqLimit = (isset($_GET["limit"]) ? intval($_GET["limit"]) : 2);

$faq = new Faqs();

$faqList = $faq->getList();

$faqCount = 0;

// display the widget view
require_once('../../tpl/final/faq-widget.tpl.php');
?>