<?php
define('BUFSIZ', 4095);
$url = 'https://www.googleapis.com/drive/v3/files/1TD8r3l9V716uZysozaxRbnBeJHzQUDa1/?key=AIzaSyDXCexvPWhITGQto6nQizNx_y7ip9-NO9Y&alt=media'; 
$filename = 'Dhaman-tr.com.zip';
try {
    $rfile = fopen($url, 'r');
    $check2 = true;
} catch (Exception $e) {
    $check2 = false;
    echo 'Error Message : ' . $e->getMessage();
}
if ($check2) {
    $lfile = fopen($filename, 'w');
    while (!feof($rfile)) {
        fwrite($lfile, fread($rfile, BUFSIZ), BUFSIZ);
    }
    fclose($rfile);
    fclose($lfile);
    echo '{$filename} is Uploaded Successfully';
}
else{
    echo '{$filename} upload has failed';
}







// define('BUFSIZ', 4095);
// $url = 'http://www.sordum.org/files/dns-angel/DnsAngel.zip'; 
// $rfile = fopen($url, 'r');
// $lfile = fopen(basename($url), 'w');
// while(!feof($rfile))
// fwrite($lfile, fread($rfile, BUFSIZ), BUFSIZ);
// fclose($rfile);
// fclose($lfile);



?>

