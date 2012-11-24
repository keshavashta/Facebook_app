<br/>
<br/>
<div id="fb-root">
    <input class="btn" type="button" id="send" value="Send a Request" /><br />
</div>
<script src="http://connect.facebook.net/en_US/all.js"></script>
    <script type="text/javascript">

        window.fbAsyncInit = function() {
            FB.init({appId: '174961989300941', status: true,
                cookie: true, xfbml: true});
            $(document).ready(function() {
                $("#send").click(function() {
                    FB.ui({
                        method: 'apprequests',
                        message: 'Try this awesome application?'},
                        function(response) {
                            if (response) {
                                $.each(
                                    response.request_ids,
                                    function(index, value) {
                                        alert(index + ': ' + value);
                                    });
                            }
                            else {
                                alert('Request was not sent');
                            }
                        });
                });
            });
        };
    </script>