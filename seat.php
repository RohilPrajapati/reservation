<html lang="zh-Hant">

<head>
    <title>Seat Reservation</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/w3.css">
    <style>
        .seatbox {
            width: 60px;
            height: 60px;
            margin: 8px;
            border: 2px solid black;
            background-color: green;
            text-align: center;
            line-height: 80px;
            display: inline-block;
            color: white;
        }
    </style>

</head>

<body class="w3-white ">
    <?php
    include('header.php');
    ?>
    <div class="w3-white w3-padding-16">
        <script>
            var rows = "ABCDEF";
            for (i = 0; i < rows.length; i++) {
                document.write('<div class="w3-center">');
                for (j = 1; j <= 14; j++) {
                    document.write('<div class="seatbox" id="', rows.charAt(i), j, '"',
                        'onmouseover="this.style.backgroundColor=\'orange\';"',
                        'onmouseout="restoreColor(this.id);"',
                        'onclick="toggle(this.id);alert(this.id);"',
                        '>', rows.charAt(i), j,
                        '</div>');

                }
                document.write('</div>');
            }
        </script>
    </div>
    <form class="w3-white" action="confirmation.php" method="POST">
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Green=available&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Red=reserved</p>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Selected seats:<span id="selectedSeatsID"></span></p>
        <input type="hidden" name="seatsInForm" id="seatsInForm" value="">
        <input type="text" name="seat" placeholder="input seat number">
        <input type="hidden" name="movie" value="<?= $_SESSION['movie'] ?>">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button class="w3-button w3-white w3-border w3-border-red w3-round-large" type="submit" name="submitbutton" id="submitbutton">Confirm</button>
    </form>
    <script>
        var selectedseats = [];

        function restoreColor(seatId) {
            var a = selectedseats.indexOf(seatId);
            if (a == -1) {
                document.getElementById(seatId).style.backgroundColor = 'green';

            } else {

                document.getElementById(seatId).style.backgroundColor = 'red';
            }
        }

        function toggle(seatId) {
            var a = selectedseats.indexOf(seatId);
            if (a == -1) {
                add(seatId);
            } else {
                cancel(seatId);
            }
        }

        function add(seatId) {
            selectedseats.push(seatId);
            updateSelectedSeats();
            document.getElementById(seatId).style.backgroundColor = 'red';
            document.getElementById(seatId).style.textDecoration = 'line-through';
        }

        function cancel(seatId) {
            var a = selectedseats.indexOf(seatId);
            selectedseats.splice(a, 1);
            updateSelectedSeats();
            document.getElementById(seatId).style.backgroundColor = 'green';
            document.getElementById(seatId).style.textDecoration = '';
        }

        function updateSelectedSeats() {
            var s = "";
            selectedseats.sort();
            for (x of selectedseats) {
                s += x + ' ';
            }
            document.getElementById('selectedSeatsID').innerHTML = s;
            document.getElementById('seatsInForm').value = s;
        }
    </script>
</body>

</html>