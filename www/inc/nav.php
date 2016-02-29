<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#cplug-nav" aria-expanded="false">
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

        <div class="collapse navbar-collapse" id="cplug-nav">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="index.php" class="dropdown-toggle<?php if ($nav_page == 'home') { echo ' active'; } ?>" data-toggle="" role="button" aria-haspopup="true" aria-expanded="false">Home</a></li>
                <li><a href="contact.php" class="dropdown-toggle<?php if ($nav_page == 'contact') { echo ' active'; } ?>" data-toggle="" role="button" aria-haspopup="true" aria-expanded="false">Contact</a></li>
                <li><a href="directions.php" class="dropdown-toggle<?php if ($nav_page == 'directions') { echo ' active'; } ?>" data-toggle="" role="button" aria-haspopup="true" aria-expanded="false">Directions</a></li>
            </ul>
        </div>
    </div>
</nav>
