<?php
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
$meetup_events = array_slice($meetup_events['results'], 0, 2);

$events = array();
foreach ($meetup_events as $event) {
    $events[] = array(
        'name' => $event['name'],
        'time' => substr($event['time'], 0, -3),
        'description' => $event['description'],
        'link' => $event['event_url'],
    );
}
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Welcome / Central PA Linux Users Group</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/b.css">
    <link rel="stylesheet" href="css/custom.css">

    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="navbar-brand row">
                    <div class="col-md-4 col-sm-12">
                        <a href="/">
                            <img src="images/cplug-logo.png" class="logo img-responsive" />
                        </a>
                    </div>
                    <div class="col-md-5 hidden-sm hidden-xs white">Central Pennsylavania Linux Users Group</div>
                </div>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="index.php" class="dropdown-toggle" data-toggle="" role="button" aria-haspopup="true" aria-expanded="false">Home</a></li>
                    <li><a href="contact.php" class="dropdown-toggle" data-toggle="" role="button" aria-haspopup="true" aria-expanded="false">Contact</a></li>
                    <li><a href="directions.php" class="dropdown-toggle" data-toggle="" role="button" aria-haspopup="true" aria-expanded="false">Directions</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <h1 class="blue tagline">Open Your world.</h1>
        <div class="row">
            <div class="col-xs-12 col-sm-6">
                <h3 class="blue">About CPLUG</h3>
                <p>CPLUG (Central Pennsylvania Linux Users Group) has been actively involved in the Harrisburg area since before 1997. Our focus is on everything open source, and we sometimes stray from the core Linux concepts to build on the other facets of the industry, like Android, networking and gaming. Everyone is welcome, regardless of background or experience.</p>
                <p>The active members at CPLUG consist of a variety of hobbyists and professional, so our meetings are intended to benefit all levels of expertise.</p>
            </div>
            <div class="col-xs-12 col-sm-6">
                <h3 class="blue">Events</h3>
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
                <button class="btn btn-primary" style="margin-top: 20px;">Click For Full Calendar</button>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>
