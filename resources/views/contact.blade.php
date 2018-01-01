@extends('app')

@section('title', 'Contact')

@section('body')
    <div class="container">
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">
                    {{ $error }}
                </div>
            @endforeach
        @endif

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <div class="row">
            <div class="col-xs-12 col-sm-6">
                <h3>IRC Channel</h3>
                <p>Our preferred method of interaction is IRC (or Internet Relay Chat) a late 1980&rsquo;s invention which is still used worldwide for real time communication. When you&rsquo;re ready to <a href="https://grove.io/help/irc/clients/xchat" target="_blank">connect with us</a>, use the settings below:</p>
                <ul>
                    <li>Server: irc.cplug.net</li>
                    <li>Port: 6667 (not encrypted) or 6697 (encrypted)</li>
                    <li>Channel: #cplug</li>
                </ul>
                <p>Unfamiliar with IRC clients? Behind a proxy? Or maybe you just prefer doing things the old-fashioned way? Use our <a href="http://www.cplug.net/irc/" target="_blank">web interface</a>.</p>
            </div>
            <div class="col-xs-12 col-sm-6">
                <h3>CPLUG Mailing List</h3>
                <p>If you&rsquo;re a fan of email, you can easily subscribe to your preferred option in the drop down menu (Regular, Digest, or No Mail) and leave the rest up to us.</p>
                <p><strong>Regular</strong> subscribers may post to the list, and all postings will be delivered to the chosen address as they happen.</p>
                <p><strong>Digest</strong> subscribers receive a maximum of one daily email containing all the messages that were posted to the list for that day.</p>
                <p><strong>No Mail</strong> is for those who like subscribing to multiple addresses, but without the requisite copy of every post being sent to each account.</p>
                <p><strong>Unsubscribe</strong> removes you from our mailing list.</p>
                <p>Unsure of your choice? Then we suggest you go with Regular.</p>
                {{ Form::open(['route' => 'contact']) }}
                    <div class="form-group">
                        {{ Form::select('type', ['regular' => 'Regular', 'digest' => 'Digest', 'nomail' => 'No Mail', 'unsub' => 'Unsubscribe'], null, ['class' => 'form-control']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email Address']) }}
                    </div>
                    {{ Form::submit('Subscribe', ['class' => 'btn btn-primary']) }}
                {{ form::close() }}
            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection
