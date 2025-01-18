<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital Clock</title>

    <!-- Use CDN for jQuery (if not using Laravel Mix) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
        }
        #clock {
            font-size: 50px;
            font-weight: bold;
            color: #333;
        }
    </style>
</head>
<body>
    <div id="clock"></div>

    <script>
        $(document).ready(function() {
            function updateClock() {
                var now = new Date();
                var hours = now.getHours();
                var minutes = now.getMinutes();
                var seconds = now.getSeconds();

                // Add leading zero to minutes and seconds if necessary
                minutes = (minutes < 10) ? '0' + minutes : minutes;
                seconds = (seconds < 10) ? '0' + seconds : seconds;

                // Format the time as HH:MM:SS
                var timeString = hours + ':' + minutes + ':' + seconds;

                // Update the clock
                $('#clock').text(timeString);
            }

            // Update the clock every second
            setInterval(updateClock, 1000);

            // Initialize clock immediately
            updateClock();
        });
    </script>
</body>
</html>
