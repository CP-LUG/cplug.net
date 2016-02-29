<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Contact / Central PA Linux Users Group</title>

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
        <div class="row">
            <div class="col-xs-12 col-sm-6">
                <h3 class="blue">IRC Channel</h3>
                <p>IRC stands for Internet Relay Chat. It has been around since the late 1980's as a protocol for communicating instantly over a network. It still has some advantages over instant messaging systems like Gtalk or Skype.</p>
                <p>To connect from an IRC client, use the following settings:</p>
                <ul>
                    <li>Server: irc.cplug.net</li>
                    <li>Port: 6667 (not encrypted) or 6697 (encrypted)</li>
                    <li>Channel: #cplug</li>
                </ul>

                <p>If you're unfamiliar with IRC client's, are behind a proxy, or simply want to do it the easy way, you can use our web interface.</p>
            </div>
            <div class="col-xs-12 col-sm-6">
                <h3 class="blue">CPLUG Mailing List</h3>
                <p>To subsribe to the list you select from the drop down menu what type of subscription you would like. <strong>The options are Regular, Digest and No Mail.</strong></p>
                <p><strong>Regular</strong> subscription means that you may post to the list and and all postings to the list will be delivered to that address as they happen. </p>
                <p><strong>Digest</strong> means that you will only get one email per day and that email will contain all the messages that were posted to the list that day. </p>
                <p><strong>No Mail</strong> option is for folks that want to subscribe multiple addresses, however do not want a copy of every post to the list to go to each account. If you are unsure you probably want Regular.</p>
                <form>
                    <fieldset class="form-group">
                        <select class="form-control" name="subscription" id="exampleSelect1">
                            <option default>Subscription Type</option>
                            <option>Regular</option>
                            <option>Digest</option>
                            <option>No Mail</option>
                        </select>
                    </fieldset>
                    <fieldset class="form-group">
                        <input type="email" class="form-control" name="email" placeholder="Enter email">
                    </fieldset>
                    <button type="submit" class="btn btn-primary">Subscribe</button>
                    <button type="button" id="unsubscribe" class="btn btn-link">unsubscribe</button>
                </form>
                <hr>
                <div id="unsubscribe_form" style="display: none;">
                    <h4>To Unsubscribe:</h4>
                    <form >
                        <fieldset class="form-group">
                            <input type="email" class="form-control" name="email" placeholder="Enter email">
                        </fieldset>
                        <button type="submit" class="btn btn-default">Subscribe</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script>
    $(function () {
        $("#unsubscribe").click(function(){
            $("#unsubscribe_form").show();
        });
    });
    </script>
</body>
</html>
