@extends('app')

@section('title', 'Directions')

@section('body')
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-6">
                <h3>Meeting Location</h3>
                <p>
                    Historically we met at ITT Tech in Harrisburg. Due to ITT closing, we are looking to settle at Penn State Harrisburg in the Olmsted building.</p>
                </p>
                <p>If you can&rsquo;t find us, follow the signs for CPLUG.</p>

                <h3>Meeting Date &amp; Time</h3>
                <p>2<sup>nd</sup> Tuesday of each month, 6:30 p.m.</p>

                <h3>Directions</h3>
                <p>CPLUG meets at Penn State Harrisburg campus in the Olmsted building. The room is usually posted on meetup.com <a href="https://www.meetup.com/cp-lug/">here</a>.</p>
            </div>
            <div class="col-xs-12 col-sm-6">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63579.13046955145!2d-76.80511387630284!3d40.19412646731007!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c8be1ab0d6c2e1%3A0x571086de88311af1!2sPenn+State+Harrisburg!5e0!3m2!1sen!2sus!4v1516088302255"  width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
        </div>
    </div>
@endsection
