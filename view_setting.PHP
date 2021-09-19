

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
	<title>View Your Settings</title>
<style type="text/css">
	body {
<?php // Script 9.2 - view_settings.php

// Address error handing.
ini_set ('display_errors', 1);
error_reporting (E_ALL & ~E_NOTICE);

// Check for a bg_color value.
if (isset ($_COOKIE['bg_color'])) {
	print "\t\tbackground-color: {$_COOKIE['bg_color']};\n";		
} else {
	print "\t\tbackground-color: #ffffff;\n";		
}

// Check for a font_color value.
if (isset ($_COOKIE['font_color'])) {
	print "\t\tcolor: {$_COOKIE['font_color']}; \n";		
} else {
	print "\t\tcolor: #000000; \n";		
}

?>
	}
</style>
</head>
<body>
<p><a href="customize.php">Customize Your Settings</a></p>
<p><a href="reset.php">Reset Your Settings</a></p>

<p>
yadda yadda yadda yadda yadda
yadda yadda yadda yadda yadda
yadda yadda yadda yadda yadda
yadda yadda yadda yadda yadda
yadda yadda yadda yadda yadda
</p>

</body>
</html>
