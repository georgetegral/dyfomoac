<?php
$dir=$_GET["dir"];

header('Content-type: application/pdf');
header('Content-Disposition: inline; filename="' . $dir . '"');
header('Content-Transfer-Encoding: binary');
header('Content-Length: ' . filesize($dir));
header('Accept-Ranges: bytes');
@readfile($dir);

?>
