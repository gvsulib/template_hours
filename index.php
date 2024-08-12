<?php
header("access-control-allow-origin: *");
date_default_timezone_set('America/Detroit');

//read hours data for today from libapps API
$handle = fopen("https://api3.libcal.com/api_hours_today.php?iid=1647&lid=0&format=json&systemTime=1", "r");
$output = fread($handle, 4000);
$hours = json_decode($output, true);


$locations = $hours["locations"];

//locations we are looking to get hours on

$codes = array("8552" => "Mary Idema Pew Library", "8738" => "Steelcase Library", "8907" => "Frey Foundation Learning Commons");

$hours_locations = array();



//cycle through the locations and pick out the time data for the ones we want
foreach($locations as $location) {
  if (array_key_exists($location["lid"], $codes)) {
      $name = $codes[$location["lid"]];
      $hours_locations[$name] = $location["rendered"];
    
  }
  
}

//get JSON for all hours and format them for display
$hoursOutput = array();

foreach ($hours_locations as $name => $time) {
    
    

    $hoursOutput[] = '<li class="row"><strong>' . $name . ":</strong> <div>" .  $time . '</div></li>';

    

}

// Put it all together

$json = '<h2 class="h3">' . date("l") . '&#8217;s Hours</h3>
<ul>';

 foreach ($hoursOutput as $html) {
            $json .= $html;
        }

$json .= '</ul>
<p><a href="https://www.gvsu.edu/library/hours.htm">More Hours</a></p>';

echo $json;
