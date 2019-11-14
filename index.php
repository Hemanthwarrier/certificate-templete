<?php

$url = "http://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";

$full_id = substr($url, strrpos($url, '/') + 1);

if($_POST['certificateID']){
 $full_id = $_POST['certificateID'];
};

$event = substr($full_id,0,4);
$year = substr($full_id,4,2);
$userID = substr($full_id,6);

$dir = "data/".$event."/".$year;
$certificate_file = $dir."/certificate.php";
$json_file = $dir."/".$event.$year.".json";


if(file_exists($certificate_file) && file_exists($json_file)){
      
      $json = json_decode(file_get_contents($json_file, true));

      if(isset($json->$userID))
            include $certificate_file;
      else
            include '404.html';
            
}else
      include '404.html';

?>
