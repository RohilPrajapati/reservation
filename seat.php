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
        .reserved{
            background-color:red;
        }
    </style>

</head>

<body class="w3-white ">
    <?php
    include('header.php');
    // jun movie ma click gara tyo movie to id halde yesma
    $_SESSION['movie_id'] = 1;

    // yo login gardai set gar so that every reserver user_id na hos ani hatta yo
    $_SESSION['user_id'] = 1;
    ?>
    <div class="w3-white w3-padding-16">
        <div class="w3-center">
            <?php 
                $q_seat = "select * from seat";
                echo $conn->error;
                $result = mysqli_query($con,$q_seat);
                while($seat = mysqli_fetch_assoc($result)){
                
                    // print_r($seat)
                    $q_reserever = "select * from reserved_seat where movie_id = ".$_SESSION['movie_id']." and seat_id = ".$seat['id'];
                    $r_result = mysqli_query($con,$q_reserever);
                    // echo $q_reserever;
                    // echo $con->error;
                    if(mysqli_num_rows($r_result)==0){
            ?>
                
                    <div class="seatbox" id="">
                        <?= $seat['name'] ?>
                    </div>
                    <?php 
                    }else{?>
                        <div class="seatbox reserved" id="">
                        <?= $seat['name'] ?>
                    </div>
                    <?php
                    }
                    ?>
            <?php
                }
            ?>
        </div>
        <!-- <script>
            var rows = "ABCDEF";
            for (i = 0; i < rows.length; i++) {
                document.write('<div class="w3-center">');
                for (j = 1; j <= 14; j++) {
                    document.write('', rows.charAt(i), j,
                        '</div>');

                }
                document.write('</div>');
            }
        </script> -->
    </div>
    <form class="w3-white" action="confirmseat.php" method="POST">
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Green=available&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Red=reserved</p>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Selected seats:<span id="selectedSeatsID"></span></p>
        <input type="text" name="seat_name" placeholder="input seat number">
        <input type="hidden" name="movie_id" value="<?= $_SESSION['movie_id'] ?>">
        <input type="hidden" name="user_id" value="<?= $_SESSION['user_id'] ?>">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button class="w3-button w3-white w3-border w3-border-red w3-round-large" type="submit" name="submitbutton" id="submitbutton">Confirm</button>
    </form>
    <script>
    //     var selectedseats = [];

    //     function restoreColor(seatId) {
    //         var a = selectedseats.indexOf(seatId);
    //         if (a == -1) {
    //             document.getElementById(seatId).style.backgroundColor = 'green';

    //         } else {

    //             document.getElementById(seatId).style.backgroundColor = 'red';
    //         }
    //     }

    //     function toggle(seatId) {
    //         var a = selectedseats.indexOf(seatId);
    //         if (a == -1) {
    //             add(seatId);
    //         } else {
    //             cancel(seatId);
    //         }
    //     }

    //     function add(seatId) {
    //         selectedseats.push(seatId);
    //         updateSelectedSeats();
    //         document.getElementById(seatId).style.backgroundColor = 'red';
    //         document.getElementById(seatId).style.textDecoration = 'line-through';
    //     }

    //     function cancel(seatId) {
    //         var a = selectedseats.indexOf(seatId);
    //         selectedseats.splice(a, 1);
    //         updateSelectedSeats();
    //         document.getElementById(seatId).style.backgroundColor = 'green';
    //         document.getElementById(seatId).style.textDecoration = '';
    //     }

    //     function updateSelectedSeats() {
    //         var s = "";
    //         selectedseats.sort();
    //         for (x of selectedseats) {
    //             s += x + ' ';
    //         }
    //         document.getElementById('selectedSeatsID').innerHTML = s;
    //         document.getElementById('seatsInForm').value = s;
    //     }
    </script>
</body>

</html>