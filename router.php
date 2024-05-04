<?php

$filelist = glob("*");

$cmd = str_replace('/', '', $_SERVER['REQUEST_URI']);

if(in_array($cmd, $filelist)) {
  $body = $_POST['STDIN'];

  $tmpFile = tempnam(sys_get_temp_dir(), 'php');
  file_put_contents($tmpFile, $body);

  passthru("./".$cmd." < ".$tmpFile);

  unlink($tmpFile);
} else {
  require('index.php');
}
