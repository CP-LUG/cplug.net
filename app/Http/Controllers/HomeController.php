<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // the number of upcoming events to show
        $max_events_to_show = 2;
        $events = [];

        $client = new Client();
        $resp = $client->request('GET', 'https://api.meetup.com/2/events?status=upcoming&group_urlname=cp-lug');

        // make sure we got a good status code
        if ($resp->getStatusCode() == 200) {
            // parse the json responce retrieving results
            $meetup_events = json_decode($resp->getBody(), true);

            foreach ($meetup_events['results'] as $event) {
                // skip auto generated events (they point to the website anyway)
                if (strpos($event['description'], 'on the CPLUG website') !== false) {
                    continue;
                }

                // add event to upcoming events array
                $events[] = [
                    'name' => $event['name'],
                    'time' => substr($event['time'], 0, -3),
                    'description' => $event['description'],
                    'link' => $event['event_url'],
                ];
            }

            // only show $max_events_to_show events
            if (count($events) > $max_events_to_show) {
                $events = array_slice($events, 0, $max_events_to_show);
            }
        }

        return view('home', [
            'events' => $events,
        ]);
    }
}
