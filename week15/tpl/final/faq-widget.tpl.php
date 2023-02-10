<table class="FAQ-table">
<?php foreach ($faqList as $faqInfo) { ?>
	<?php if ($faqCount++ >= $faqLimit) break; ?>
	<tr class ="FAQ-tr">
		<td class = "FAQ-td"><?= $faqInfo["faqQuestion"]; ?></td>
		<td class = "FAQ-td"><?= $faqInfo["faqAnswer"]; ?></td>
	<tr>
<?php } ?>
<table>