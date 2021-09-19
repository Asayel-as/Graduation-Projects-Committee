<?php // Script 9.1 - customize.php

// Address error handing.
ini_set ('display_errors', 1);
error_reporting (E_ALL & ~E_NOTICE);

$cookies = FALSE; // Cookies have not been sent.

// Handle the form if it has been submitted.
if (isset ($_POST['submit'])) {
	
	// Send the cookies.
	setcookie ('bg_color', $_POST['bg_color']);
	setcookie ('font_color', $_POST['font_color']);

	$cookies = TRUE; // Cookies have been sent.
	
} // End of submit IF.
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
	<title>Customize Your Settings</title>
</head>
<body>
<?php
// If the cookies were sent, print a message.
if ($cookies) {
	print '<p>Your settings have been entered! Click <a href="view_settings.php">here</a> to go back to the main page.</p>';
}
?>

<p>Use this form to set your preferences:</p>

<form action="customize.php" method="post">
<select name="bg_color">
<option value="">Background Color</option>
<option value="#ffffff">White</option>
<option value="#00cc00">Green</option>
<option value="#0000ff">Blue</option>
<option value="#cc0000">Red</option>
<option value="#000000">Black</option>
</select>
<select name="font_color">
<option value="">Font Color</option>
<option value="#ffffff">White</option>
<option value="#00cc00">Green</option>
<option value="#0000ff">Blue</option>
<option value="#cc0000">Red</option>
<option value="#000000">Black</option>
</select>
<input type="submit" name="submit" value="Set My Preferences" />
</form>

</body>
</html>
