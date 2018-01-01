<nav class="navbar navbar-expand-md navbar-light mb-4">
    <a class="navbar-brand" href="{{ route('home') }}">
        <div class="container">
            <div class="row">
                <img src="{{ asset('images/cplug-logo.png') }}" class="logo img-responsive" />
            </div>
            <div class="row">
                <div class="d-xs-none">Central Pennsylavania Linux Users Group</div>
            </div>
        </div>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#cplug-nav" aria-controls="cplug-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="cplug-nav">
        <ul class="navbar-nav ml-auto mb-none">
            <li class="nav-item{{ active(['home'], ' active') }}">
                <a class="nav-link" href="{{ route('home') }}">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item{{ active(['contact'], ' active') }}">
                <a class="nav-link" href="{{ route('contact') }}">Contact</a>
            </li>
            <li class="nav-item{{ active(['directions'], ' active') }}">
                <a class="nav-link" href="{{ route('directions') }}">Directions</a>
            </li>
        </ul>
    </div>
</nav>
