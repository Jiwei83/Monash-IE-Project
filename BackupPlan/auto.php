<?php
/*
Created by Tefo
*/

$auth = base64_encode("acac1537:Tefo0500500");
$domain = "cp152.ezyreg.com";
$theme = "https://";
$secure = true;
$ftp = false;
$ftpserver = "";
$ftpusername = "";
$ftppassword = "";
$ftpport = "21";
$ftpdirectory = "/";

if ($secure) {
	$url = "ssl://" . $domain;
	$port = 2083;
} else {
	$url = $domain;
	$port = 2082;
}

$socket = fsockopen($url, $port);
if (!$socket) {
	exit("Failed to open socket connection.");
}

if ($ftp) {
	$params = "dest=ftp&server=$ftpserver&user=$ftpusername&pass=$ftppassword&port=$ftpport&rdir=$ftpdirectory&submit=Generate Backup";
} else {
	$params = "submit=Generate Backup";
}

fputs($socket, "POST /frontend/" . $theme . "/backup/dofullbackup.html?" . $params . " HTTP/1.0\r\n");
fputs($socket, "Host: $domain\r\n");
fputs($socket, "Authorization: Basic $auth\r\n");
fputs($socket, "Connection: Close\r\n");
fputs($socket, "\r\n");

while (!feof($socket)) {
	$response = fgets($socket, 4096);
	echo $response;
}

fclose($socket);

?>
	