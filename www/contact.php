<?php
// get any input sent to php
$data = file_get_contents('php://input');
// check if there was any input sent to php
if (!empty($data)) {
    // decode php input
    $data = json_decode($data, true);
    // let the user know we are returning json
    header('Content-Type: application/json');
    // array to return
    $rarr = array();
    // make sure the users email looks valid
    if (filter_var($data['sub_email'], FILTER_VALIDATE_EMAIL)) {
        $subject  = 'subscribe';
        $message  = 'subscribe';
        // check which list the user is trying to get on
        switch ($data['sub_type']) {
            case 'regular':
                $to = 'cplug+subscribe';
                break;
            case 'digest':
                $to = 'cplug+subscribe-digest';
                break;
            case 'nomail':
                $to = 'cplug+subscribe-nomail';
                break;
            case 'unsub':
                $to = 'cplug+unsubscribe';
                $subject  = 'unsubscribe';
                $message  = 'unsubscribe';
                break;
            default:
                header('HTTP/1.1 400 Bad Request', true, 400);
                $rarr['errors'][] = 'Bad subscription type';
                die(json_encode($rarr));
                break;
        }
        $to .= '@mail.cplug.net';
        $from = $data['sub_email'];
        $headers = "From: {$data['sub_email']}\r\nReply-To: {$data['sub_email']}\r\nX-Mailer: PHP/" . phpversion();
        // send the message
        $result = mail($to, $subject, $message, $headers);
        die(json_encode($rarr));
    } else {
        header('HTTP/1.1 400 Bad Request', true, 400);
        $rarr['errors'][] = 'Invalid email address';
        die(json_encode($rarr));
    }
}
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Contact / Central PA Linux Users Group</title>

    <?php require 'inc/scripts_top.php'; ?>
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
    <style>
        #toast-container {
            margin-top: 70px;
        }
        #toast-container > div {
            opacity: .95;
            -ms-filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=95);
            filter: alpha(opacity=95);
            -moz-box-shadow: 0 0 12px #000;
            -webkit-box-shadow: 0 0 12px #000;
            box-shadow: 0 0 12px #000;
        }
    </style>
</head>

<body>
    <?php
    $nav_page = 'contact';
    require 'inc/nav.php';
    ?>
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
                <p>If you're unfamiliar with IRC client's, are behind a proxy, or simply want to do it the easy way, you can use our <a href="http://www.cplug.net/irc/" target="_blank">web interface</a>.</p>
            </div>
            <div class="col-xs-12 col-sm-6">
                <h3 class="blue">CPLUG Mailing List</h3>
                <p>To subsribe to the list you select from the drop down menu what type of subscription you would like. <strong>The options are Regular, Digest and No Mail.</strong></p>
                <p><strong>Regular</strong> subscription means that you may post to the list and and all postings to the list will be delivered to that address as they happen. </p>
                <p><strong>Digest</strong> means that you will only get one email per day and that email will contain all the messages that were posted to the list that day. </p>
                <p><strong>No Mail</strong> option is for folks that want to subscribe multiple addresses, however do not want a copy of every post to the list to go to each account.</p>
                <p><strong>Unsubscribe</strong> option is to remove yourself from any mailing list.</p>
                <p>If you are unsure you probably want Regular.</p>
                <form id="frmRegister">
                    <fieldset class="form-group">
                        <select class="form-control" name="sub_type">
                            <option value="regular" default>Regular</option>
                            <option value="digest">Digest</option>
                            <option value="nomail">No Mail</option>
                            <option value="unsub">Unsubscribe</option>
                        </select>
                    </fieldset>
                    <fieldset class="form-group">
                        <input type="email" class="form-control" name="sub_email" placeholder="Enter email">
                    </fieldset>
                    <button type="submit" name="subscribe" class="btn btn-primary" data-loading-text="Subscribing...">Subscribe</button>
                </form>
            </div>
        </div>
    </div>
    <?php require 'inc/scripts_bottom.php'; ?>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script>
    $(function () {
        // set toastr timout to a reasonable time
        toastr.options.timeOut = 7000;

        $('select[name=sub_type]').on('change', function() {
            var sub_button = $('button[name=subscribe]')
            if ($(this).val() == 'unsub') {
                sub_button.text('Unsubscribe');
                sub_button.attr('data-loading-text', 'Unsubscribing...');
            } else {
                sub_button.text('Subscribe');
                sub_button.attr('data-loading-text', 'Subscribing...');
            }
        });

        $('#frmRegister').on('submit', function(e) {
            e.preventDefault();

            $('.has-error').each(function() {
                $(this).removeClass('has-error');
            });

            toastr.clear();

            // make sure the email field is filled out
            if (!$('input[name=sub_email]', this).val()) {
                $('input[name=sub_email]', this).closest('.form-group').addClass('has-error');
                $('input[name=sub_email]', this).focus();
                toastr.error('Please enter your email address');
                return false;
            }

            // set the success_message
            var success_message = 'Congrats! You are successfully subscribed.';
            if ($('select[name=sub_type]').val() == 'unsub'){
                success_message = 'Sorry to see you go. You are successfully unsubscribed.';
            }

            // get the submit button
            var submit_button = $('button[type=submit]', this);
            // disable submit button
            submit_button.button('loading');

            var the_data = {};
            $.map($(this).serializeArray(), function(n) {
                the_data[n['name']] = n['value'];
            });
            the_data = JSON.stringify(the_data);

            $.ajax({
                url: window.location.href,
                method: 'POST',
                contentType: 'application/json',
                data: the_data
            })
            .done(function(data) {
                $('#frmRegister')[0].reset();
                toastr.success(success_message);
            })
            .fail(function(x, status, error) {
                if (x.responseJSON && x.responseJSON.errors) {
                    $.each(x.responseJSON.errors, function(i, item) {
                        toastr.error(item);
                    });
                } else {
                    if (x.responseText){
                        console.log(x.responseText);
                    }
                    // let the user know there was a server error
                    toastr.error('Error communicating with the server');
                }
            })
            .always(function() {
                // reenable button
                submit_button.button('reset');
            });
        });
    });
    </script>
</body>
</html>
