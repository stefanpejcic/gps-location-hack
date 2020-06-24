
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Loading...</title>
</head>
<body>

<p id="status"></p>

<div style="position: relative;
            height: 300px;
            width: 300px;">

    <iframe width="300"
            height="300"
            frameborder="0"
            scrolling="no"
            marginheight="0"
            marginwidth="0"
            id="map-link"></iframe>
    
    <div style="background-image: url('pin.png');
                background-repeat: no-repeat;
                background-position: center;
                width: 50px;
                height: 50px;
                position: absolute;
                top: calc(50% - 35px);
                left: calc(50% - 25px);"></div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    jQuery(document).ready(function($) {
        $.ajax({
            type: 'GET',
            url: 'process.php',
            success: function (response) {
                let coordinates = JSON.parse(response);
                let latitude = coordinates[0];
                let longitude = coordinates[1];
                $("#map-link").attr('src', `https://www.openstreetmap.org/export/embed.html?bbox=${longitude},${latitude},${longitude},${latitude}&layer=mapnik`);
            }
        });
    });
</script>

</body>
</html>