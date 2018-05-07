<?php
date_default_timezone_set('America/Detroit');

// Cron job to pull the hours every morning

$hours =array(0 => "Mary%20Idema%20Pew", 
              1 => "Steelcase", 
              2 => "Frey"
        );

//get JSON for all hours and format them for display
$hoursOutput = array();

foreach ($hours as $order => $string) {
    
    $handle = fopen('https://prod.library.gvsu.edu/hours_api/index.php?order=' . $order . '&string=' . $string, "r");
    $output = fread($handle, 800);
    $hoursFormat = json_decode($output, true);
    $string = urldecode($string);

    $hoursOutput[] = '<li class="row"><strong>' . $string . "</strong>: <div>" .  $hoursFormat[$string] . '</div></li>';

    fclose($handle);

}

// Put it all together

$json = '<?php header("Access-Control-Allow-Origin: *");  ?> 
<h2 class="h3">' . date("l") . '&#8217;s Hours</h3>
<ul>';

 foreach ($hoursOutput as $html) {
            $json .= $html;
        }

$json .= '</ul>
<p><a href="https://www.gvsu.edu/library/hours.htm">More Hours</a></p>';

file_put_contents('hours.php', $json);
