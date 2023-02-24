<?php 
/* 
Use example :
echo time_elapsed_string('2013-05-01 00:22:35');
echo time_elapsed_string('@1367367755'); # timestamp input
echo time_elapsed_string('2013-05-01 00:22:35', true);
Input can be any supported date and time format.
Output :
4 months ago
4 months ago
4 months, 2 weeks, 3 days, 1 hour, 49 minutes, 15 seconds ago
*/
function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}
?>