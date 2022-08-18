<?php
    require_once './config.php';
    session_start();
    $q_movie = "SELECT * from movie";
    $result = mysqli_query($con,$q_movie);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movies list</title>
</head>
<body>
    <h1>Movie List</h1>
    <?php 
        while($movie= mysqli_fetch_assoc($result)){
            // print_r($movie)
    ?>  
        Name: <?= $movie['name'] ?>
        <a href="seat.php?movie_id=<?= $movie['id'] ?>">Booking</a><br>
    <?php 
        }
    ?>
</body>
</html>