<?php

$output = shell_exec("ls");
$files = explode("\n", trim($output));

?>
<html lang="en">
	<header>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>The Basement</title>
	</header>
	<body>
<?php
echo "<h1> Welcome to the Basement >:) </h1>";
echo "<ul>";

foreach($files as $row)
{
	echo "<li><a href=\"http://basementDwell3r.duckdns.org/skippy_http/$row\">" . $row . "</a></li>";
}

echo "</ul>";

?>
	</body>
</html>
