<?php

$cmdlist = glob("*.sh");
$htmllist = glob("*.html");

$cmd = str_replace('/', '', $_SERVER['REQUEST_URI']);

if(in_array($cmd, $cmdlist)) {
  if(isset($_POST['STDIN'])){
    $body = $_POST['STDIN'];
  } else {
    $body = "\n";
  }

  $tmpFile = tempnam(sys_get_temp_dir(), 'php');
  file_put_contents($tmpFile, $body);

  passthru("./".$cmd." < ".$tmpFile);

  unlink($tmpFile);
} else if(in_array($cmd, $htmllist)) {
  require($cmd);
} else {
  require('index.php');
}
