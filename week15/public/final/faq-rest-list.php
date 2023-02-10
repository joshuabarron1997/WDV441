<?php
require_once('../../inc/Faqs.class.php');
$faq = new Faqs();
$faqList = $faq->getList();
echo json_encode($faqList);
?>
