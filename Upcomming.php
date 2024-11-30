<?php


require_once './Db/Db.Connection.php';
session_start();
error_reporting(0);


//relised movies
$relisedSql = "SELECT * FROM `upcommingmovies`";
$relised_result = $conn->query($relisedSql);




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>M Booking | Upcomming</title>
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

    <section class="home swiper" id="home" style="height: 40vh;">
        <div class="swiper-wrapper">
            <div class="swiper-slide container">
                <img src="./img/home1.jpg" alt="">
                <div class="home-text">
                    <span>Marvel Universe</span>
                    <h1>Guardians of the Galaxy <br>Volume 2</h1>
                    <a href="" class="btn">Book Now</a>
                    <a href="" class="play">
                        <i class='bx bx-play' ></i>
                    </a>
                </div>
            </div>
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



    <!-- upcomming -->
    <div class="movies" id="movies" style="padding-top: 30px;">
        <h2 class="heading">Comming Soon</h2>
        <!-- Movies container  -->
        <div class="movies-container">
            <!-- box-1  -->
            <?php while($row = $relised_result->fetch_assoc()){ ?>
            <div class="box">
                <div class="box-img">
                    <img src="<?php echo './'.$row['MovieImg']; ?>" alt="">
                </div>
                <h3><?php echo $row['UMovieName']; ?></h3>
                <span><?php echo $row['Duration'].' min'; ?> | <?php echo $row['MovieType']; ?></span>
                <form action="./MoreDetailsUpComming.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $row['UMovieId']; ?>">
                    <button type="submit">More Details</button>
                </form>
            </div>
            <?php } ?>

       
        
          
        </div>
    </div>

                
    <!-- Movies  -->
    <!-- <div class="movies" id="movies" style="padding-top: 30px;">
        <h2 class="heading">Opening This Week</h2>
       
        <div class="movies-container">
        
            <div class="box">
                <div class="box-img">
                    <img src="./img/m1.jpg" alt="">
                </div>
                <h3>Dr.Strange</h3>
                <span>120 min | Action</span>
                <span>Ticket Price : Rs 2000.00</span>
                <form action="#">
                    <input type="hidden" name="id">
                    <button type="submit">More Details</button>
                </form>
            </div>
       
            <div class="box">
                <div class="box-img">
                    <img src="./img/m2.jpg" alt="">
                </div>
                <h3>Pathan</h3>
                <span>120 min | Action</span>
                <span>Ticket Price : Rs 2000.00</span>
                <form action="#">
                    <input type="hidden" name="id">
                    <button type="submit">More Details</button>
                </form>
            </div>
    <div class="box">
                <div class="box-img">
                    <img src="./img/m3.jpg" alt="">
                </div>
                <h3>Batman vs Superman</h3>
                <span>120 min | Thriller</span>
                <span>Ticket Price : Rs 2000.00</span>
                <form action="#">
                    <input type="hidden" name="id">
                    <button type="submit">More Details</button>
                </form>
            </div>

            <div class="box">
                <div class="box-img">
                    <img src="./img/m4.jpg" alt="">
                </div>
                <h3>John Wick 2</h3>
                <span>120 min | Action</span>
                <span>Ticket Price : Rs 2000.00</span>
                <form action="#">
                    <input type="hidden" name="id">
                    <button type="submit">More Details</button>
                </form>
 
            <div class="box">
                <div class="box-img">
                    <img src="./img/m5.jpg" alt="">
                </div>
                <h3>Aquaman</h3>
                <span>120 min | Adventure</span>
                <span>Ticket Price : Rs 2000.00</span>
                <form action="#">
                    <input type="hidden" name="id">
                    <button type="submit">More Details</button>
                </form>
            </div>

            <div class="box">
                <div class="box-img">
                    <img src="./img/m6.jpg" alt="">
                </div>
                <h3>Black Panther</h3>
                <span>120 min | Thriller</span>
                <form action="#">
                    <input type="hidden" name="id">
                    <button type="submit">More Details</button>
                </form>
            </div>
      
            <div class="box">
                <div class="box-img">
                    <img src="./img/m7.jpg" alt="">
                </div>
                <h3>Uncharted</h3>
                <span>120 min | Adventure</span>
                <form action="#">
                    <input type="hidden" name="id">
                    <button type="submit">More Details</button>
                </form>
            </div>
       
            <div class="box">
                <div class="box-img">
                    <img src="./img/m8.jpg" alt="">
                </div>
                <h3>Brahmastra</h3>
                <span>120 min | Action</span>
                <form action="#">
                    <input type="hidden" name="id">
                    <button type="submit">More Details</button>
                </form>
            </div>

            <div class="box">
                <div class="box-img">
                    <img src="./img/m9.jpg" alt="">
                </div>
                <h3>Mortal-Engines</h3>
                <span>120 min | Action</span>
                <form action="#">
                    <input type="hidden" name="id">
                    <button type="submit">More Details</button>
                </form>
            </div>

            <div class="box">
                <div class="box-img">
                    <img src="./img/m10.jpg" alt="">
                </div>
                <h3>UnderWorld Blood Wars</h3>
                <span>120 min | Action</span>
                <form action="#">
                    <input type="hidden" name="id">
                    <button type="submit">More Details</button>
                </form>
            </div>
        </div>
    </div> -->

    <!-- footer -->
    <?php require ('./Components/Footer.php'); ?>
    




  



    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <script src="./Asserts/Js/main.js"></script>
</body>
</html>