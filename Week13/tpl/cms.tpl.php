<html>
	<head>
		<title><?php echo (isset($cmsDataArray['title']) ? $cmsDataArray['title'] : ''); ?></title>
		<meta name="keywords" content="<?php echo (isset($cmsDataArray['keywords']) ? $cmsDataArray['keywords'] : ''); ?>"/>
		<style>
			#weather {
				text-align: center;
				width: 600px;
				background-color: lightblue;
				padding: 20px;
			}
		</style>
	</head>
    <body>
		<h1><?php echo (isset($cmsDataArray['h1']) ? $cmsDataArray['h1'] : ''); ?></h1>
        <?php if (is_file(dirname(__FILE__) . "/../public/images/" . $cmsDataArray['cms_id'] . "_cms_banner.jpg")) { ?>
            <img src="images/<?php echo $cmsDataArray['cms_id'] . "_cms_banner.jpg"; ?>" width="50" height="50"/>
        <?php } ?>
		<p>
			<?php echo (isset($cmsDataArray['content']) ? $cmsDataArray['content'] : ''); ?>
		</p>

		<div>
			<h3>News Article Widget:</h3>
			<?php echo $newsWidgetHTML; ?>
		</div>
		<br>
		<div id = "weather">
		<table>
			<tr><th><h2>Current Weather via API</h2></th></tr>
			<tr><td><p>it is currently <?php echo $weatherAPI->temp_f?>°, but feels like <?php echo $weatherAPI->feelslike_f?>°.</p></td></tr>
			<tr><td><p>There is a max windspeed of <?php echo $weatherAPI->windspd_mph?> mph coming from <?php echo $weatherAPI->winddir_deg?> degrees.</p></td></tr>
			<tr><td><p>it is about <?php echo $weatherAPI->cloudtotal_pct?>% cloudy at the moment.</p></td></tr>
			<tr><td><p>Humidity is <?php echo $weatherAPI->humid_pct?>%.</p></td></tr>
			<tr><td><p>Visibility is <?php echo $weatherAPI->vis_mi?> miles.</p></td></tr>
		</table>
		</div>
	        
    </body>
</html>