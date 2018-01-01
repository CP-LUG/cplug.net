@extends('app')

@section('title', 'Welcome')

@section('body')
    <div class="container">
        <h1 class="tagline">Open Your world</h1>
        <div class="row">
            <div class="col-xs-12 col-sm-6">
                <h3>What is CPLUG?</h3>
                <p>Actively involved in the Harrisburg, PA area since the mid 1990’s, CPLUG (Central Pennsylvania Linux Users Group) is a diverse combination of hobbyists and computer professionals. Our members (and occasional guest speakers) conduct regular monthly forums geared to all levels of expertise. Though our primary focus is on open source software, we occasionally divert our attention to other key facets of the industry, including Android, networking and gaming.</p>
                <p>Open to all backgrounds and experience levels.</p>
                <div class="hidden-xs">
                    <h3>Our Sponsors</h3>
                    <div class="row">
                        <div class="col-sm-6 col-lg-4">
                            <a href="https://www.TEKsystems.com" target="_blank">
                                <img src="{{ asset('images/TEKsystems-logo.jpg') }}" alt="TEKsystems Logo" class="img-responsive img-thumbnail" />
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @if (count($events))
                <div class="col-xs-12 col-sm-6">
                    <h3>Upcoming Events</h3>
                    <table class="event_table">
                        @foreach ($events as $event)
                            <tr>
                                <td style="vertical-align: top;">
                                    <div class="thin_border event_date">{{ date('M', $event['time']) }}<br />{{ date('d', $event['time']) }}</div>
                                </td>
                                <td class="thin_border event_description">
                                    <h4 class="event_headline"><a href="{{ $event['link'] }}" target="_blank">{{ $event['name'] }}</a></h4>
                                    <span class="event_copy">{!! $event['description'] !!}</span>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    <a href="http://www.meetup.com/cp-lug/events/" class="btn btn-primary" style="margin-top: 20px;" target="_blank">Full Calendar</a>
                </div>
            @endif
        </div>
    </div>
@endsection
