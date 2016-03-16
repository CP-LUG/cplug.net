<?php
// the number of upcoming events to show
$max_events_to_show = 2;

// make a curl call to the api
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.meetup.com/2/events?status=upcoming&group_urlname=cp-lug');
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// execute the curl call
$resp = curl_exec($ch);
// close the curl connection
curl_close($ch);

// parse the json responce
$meetup_events = json_decode($resp, true);
$meetup_events = $meetup_events['results'];

$events = array();
foreach ($meetup_events as $event) {
    // skip auto generated events (they point to the website anyway)
    if (strpos($event['description'], 'on the CPLUG website') !== false) {
        continue;
    }
    // add event to upcoming events array
    $events[] = array(
        'name' => $event['name'],
        'time' => substr($event['time'], 0, -3),
        'description' => $event['description'],
        'link' => $event['event_url'],
    );
}

// only show $max_events_to_show events
if (count($events) > $max_events_to_show) {
    $events = array_slice($events, 0, $max_events_to_show);
}
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Welcome / Central PA Linux Users Group</title>

    <?php require 'inc/scripts_top.php'; ?>
</head>

<body>
    <?php
    $nav_page = 'home';
    require 'inc/nav.php';
    ?>
    <div class="container">
        <h1 class="blue tagline">Open Your world</h1>
        <div class="row">
            <div class="col-xs-12 col-sm-6">
                <h3 class="blue">About CPLUG</h3>
                <p>CPLUG (Central Pennsylvania Linux Users Group) has been actively involved in the Harrisburg area since before 1997. Our focus is on everything open source, and we sometimes stray from the core Linux concepts to build on the other facets of the industry, like Android, networking and gaming. Everyone is welcome, regardless of background or experience.</p>
                <p>The active members at CPLUG consist of a variety of hobbyists and professional, so our meetings are intended to benefit all levels of expertise.</p>
            </div>
            <?php if (count($events) > 0): ?>
                <div class="col-xs-12 col-sm-6">
                    <h3 class="blue">Upcoming Events</h3>
                    <table class="event_table">
                        <?php
                        foreach ($events as $event) {
                            echo '<tr>
                                <td style="vertical-align: top;">
                                    <div class="thin_border event_date">' . date('M', $event['time']) . '<br />' . date('d', $event['time']) . '</div>
                                </td>
                                <td class="thin_border event_description">
                                    <h4 class="event_headline"><a href="' . $event['link'] . '" target="_blank">' . $event['name'] . '</a></h4>
                                    <span class="event_copy">' . $event['description'] . '</span>
                                </td>
                            </tr>';
                        }
                        ?>
                    </table>
                    <a href="http://www.meetup.com/cp-lug/events/"class="btn btn-primary" style="margin-top: 20px;" target="_blank">Full Calendar</a>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <?php require 'inc/scripts_bottom.php'; ?>
</body>
</html>
