<?php


require_once './Db/Db.Connection.php';
session_start();
error_reporting(0);


$mid = intval($_POST['id']);

$sql = "SELECT * FROM `upcommingmovies` WHERE UMovieId = $mid";
$result = $conn->query($sql);
$row = $result->fetch_assoc();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>M Booking | More Details</title>
    <link rel="stylesheet" href="./Asserts/Styles/style.css">
    <link rel="stylesheet" href="./Asserts/Styles/MoreDetails.css">
    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <!-- Link Swiper's CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
</head>
<body>
    <!-- Navbar  -->
    <?php require('./Components/Header.Php'); ?>

    <section class="home swiper" id="home" style="height: 30vh;">
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

    <section class="movies MoreDetails">
        <h1><?php echo $row['UMovieName']; ?></h1>
        <span><?php echo $row['Duration'].' min'; ?> |<?php echo $row['MovieType']; ?> | <span style="color:#fa1216">
            Ticket Price : Rs 0.00 (Price Will Show After Relised)</span></span>
        
        <div class="content">
            <div class="left">
               <img src="<?php echo './'.$row['MovieImg']; ?>" alt="">     
            </div><div class="right">
                <h1>Movie Discriptions</h1>
                <p><?php echo $row['Discription']; ?></p>
                    <br>
                    <h1>Movie Attress</h1>
                    <ul>
                        <li>🔻 <?php echo $row['Acttress01']; ?></li>
                        <li>🔻 <?php echo $row['Attress02']; ?></li>
                        <li>🔻 <?php echo $row['Attress03']; ?></li>
                    </ul>
                    <br>
                    <br>
                    <h1>Relised Date</h1>
                    <p>Date : 2025 - 10 -10</p>
                    <br>
                    <!-- <h1>Book A Ticket Now</h1> -->
                    <form action="#">
                        <input type="hidden" name="movieId" value="">
                        <input type="number" min="1" max="20" name="NumOfTicket" placeholder="Num Of Tickets" disabled>
                        <button type="submit" disabled>Add To Cart</button>
                    </form>
            </div>
        </div>
    </section>

    <!-- Home  -->

    <!-- Movies  -->
    <div class="movies" id="movies" style="padding-top: 30px;">
        <h2 class="heading">Comming Soon</h2>
        <!-- Movies container  -->
        <div class="movies-container">
            <!-- box-1  -->
            <div class="box">
                <div class="box-img">
                    <img src="./img/m1.jpg" alt="">
                </div>
                <h3>Dr.Strange</h3>
                <span>120 min | Action</span>
                <span>Ticket Price : Rs 2000.00</span>
                <div></div>
            </div>
            <!-- box-2  -->
            <div class="box">
                <div class="box-img">
                    <img src="./img/m2.jpg" alt="">
                </div>
                <h3>Pathan</h3>
                <span>120 min | Action</span>
                <span>Ticket Price : Rs 2000.00</span>
            </div>
            <!-- box-3  -->
            <div class="box">
                <div class="box-img">
                    <img src="./img/m3.jpg" alt="">
                </div>
                <h3>Batman vs Superman</h3>
                <span>120 min | Thriller</span>
                <span>Ticket Price : Rs 2000.00</span>
            </div>
            <!-- box-4  -->
            <div class="box">
                <div class="box-img">
                    <img src="./img/m4.jpg" alt="">
                </div>
                <h3>John Wick 2</h3>
                <span>120 min | Action</span>
            </div>
            <!-- box-5  -->
            <div class="box">
                <div class="box-img">
                    <img src="./img/m5.jpg" alt="">
                </div>
                <h3>Aquaman</h3>
                <span>120 min | Adventure</span>
            </div>
            
        </div>
    </div>

    <!-- footer -->
    <?php require ('./Components/Footer.php'); ?>
    




  



    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <script src="./Asserts/Js/main.js"></script>
</body>
</html>