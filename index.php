<?php

require_once './Db/Db.Connection.php';
session_start();
error_reporting(0);


//relised movies
$relisedSql = "SELECT * FROM `relised_movies` LIMIT 4";
$relised_result = $conn->query($relisedSql);


//upcomming movies
$upSql = "SELECT * FROM `upcommingmovies` ";
$up_result = $conn->query($upSql);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>M Movies</title>
    <link rel="stylesheet" href="./Asserts/Styles/style.css">
    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <!-- Link Swiper's CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
</head>
<body>
    <!-- Navbar  -->
    <?php require('./Components/Header.Php'); ?>

    <!-- Home  -->
    <section class="home swiper" id="home" >
        <div class="swiper-wrapper">
            
            <div class="swiper-slide container">
                <img src="./img/home2.png" alt="">
                <div class="home-text">
                    <span>Marvel Universe</span>
                    <h1>Thor: <br>Love and Thunder</h1>
                    <a href="" class="btn">Book Now</a>
                    <a href="" class="play">
                        <i class='bx bx-play' ></i>
                    </a>
                </div>
            </div>
            <div class="swiper-slide container">
                <img src="./img/home3.jpg" alt="">
                <div class="home-text">
                    <span>Marvel Universe</span>
                    <h1>Spider-Man <br>No Way Home</h1>
                    <a href="" class="btn">Book Now</a>
                    <a href="" class="play">
                        <i class='bx bx-play' ></i>
                    </a>
                </div>
            </div>
            <div class="swiper-slide container">
                <img src="./img/home4.png" alt="">
                <div class="home-text">
                    <span>Marvel Universe</span>
                    <h1>Avengers: <br>End Game</h1>
                    <a href="" class="btn">Book Now</a>
                    <a href="" class="play">
                        <i class='bx bx-play' ></i>
                    </a>
                </div>
            </div>
            
          </div>
          <div class="swiper-pagination"></div>
    </section>

    <!-- Movies  -->
    <div class="movies" id="movies" style="padding-top: 30px;">
        <h2 class="heading">Opening This Week</h2>
        <!-- Movies container  -->
        <div class="movies-container">
            <!-- box-1  -->
            <?php while($row = $relised_result->fetch_assoc()){ ?>
            <div class="box">
                <div class="box-img">
                    <img src="<?php echo './'.$row['IMG']; ?>" alt="">
                </div>
                <h3><?php echo $row['RMovieName']; ?></h3>
                <span><?php echo $row['RMovieDuration'].' min'; ?> | <?php echo $row['RMovieTicketPrice']; ?></span>
                <form action="#">
                    <input type="hidden" name="id" value="<?php echo $row['RMovieId']; ?>">
                    <button type="submit">Book Now</button>
                </form>
            </div>
            <?php } ?>

       
        
          
        </div>
    </div>

    <!-- coming  -->
    <section class="coming" id="coming">
        <h2 class="heading">Coming Soon</h2>
        <!-- coming contanier  -->
        <div class="coming-container swiper">
            <div class="swiper-wrapper">
                <?php while($upRow = $up_result->fetch_assoc()) {?>
                <!-- box-1  -->
                <div class="swiper-slide box">
                    <div class="box-img">
                        <img src="<?php echo './'.$upRow['MovieImg']; ?>" alt="">
                    </div>
                    <h3><?php echo $upRow['UMovieName']; ?></h3>
                </div>
                <?php } ?>
            </div>
        </div>
    </section>



    <!-- footer  -->
    <?php require ('./Components/Footer.php'); ?>

  



    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <script src="./Asserts/Js/main.js"></script>
</body>
</html>