@extends('app')

@section('title', 'Directions')

@section('body')
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-6">
                <h3>Meeting Location</h3>
                <p>
                    Historically we met at ITT Tech in Harrisburg. Due to ITT closing, we are looking to settle at Penn State Harrisburg. In the meantime, you can find the location details on the meetup site.
                </p>
                <p>If you can&rsquo;t find us, follow the signs for CPLUG.</p>

                <h3>Meeting Date &amp; Time</h3>
                <p>2<sup>nd</sup> Tuesday of each month, 6:30 p.m.</p>

                <h3>Directions</h3>
                <p>ITT Tech is located on the corner of Paxton Street and Eisenhower Boulevard, under Belco, just down the road from the Harrisburg Mall. CPLUG meets on the lower level, and the simplest way to get there is to use the student entrance in the back.</p>
            </div>
            <div class="col-xs-12 col-sm-6">
                <iframe src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d97443.1579190608!2d-76.88493243987456!3d40.25133808869269!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x89c8bf7a97838463%3A0x2ced247926299ced!2s449+Eisenhower+Boulevard%2C+Suite+100!3m2!1d40.251359199999996!2d-76.8148925!5e0!3m2!1sen!2sus!4v1455907141638" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
        </div>
    </div>
@endsection
