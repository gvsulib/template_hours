<?php
header("access-control-allow-origin: *");
date_default_timezone_set('America/Detroit');

//read hours data for today from libapps API
$hoursurl = fopen("https://api3.libcal.com/api_hours_today.php?iid=1647&lid=0&format=json&systemTime=1", "r");
$hoursoutput = fread($hoursurl, 4000);
$cmshours = json_decode($hoursoutput, true);

var_dump($cmshours);

$cmslocations = $hours["locations"];
$cmscodes = array("19433" => "Seidman House", "8552" => "Mary Idema Pew Library", "8738" => "Steelcase Library", "8907" => "Frey Foundation Learning Commons");
$location_hours = array();

foreach($cmslocations as $cmslocation) {
  if (array_key_exists($cmslocation["lid"], $cmscodes)) {
      $name = $codes[$cmslocation["lid"]];
      $location_hours[$name] = $cmslocation["rendered"];
    
  }
}