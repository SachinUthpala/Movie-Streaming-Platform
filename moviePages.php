<?php

session_start();
$category = $_GET['category'];
$pagename =  $category . " Movies";




require './Configs/db.config.php';
$sql_Top = "SELECT * FROM movies WHERE `category` = :category AND enabllelity = 1 AND  topPick = 1 ";
$stmt_Top = $conn->prepare($sql_Top);
$stmt_Top->execute([':category' => $category]);


$sql_populer = "SELECT * FROM movies WHERE `category` = :category AND enabllelity = 1 AND  populer = 1 ";
$stmt_populer = $conn->prepare($sql_populer);
$stmt_populer->execute([':category' => $category]);


$sql_trending = "SELECT * FROM movies WHERE `category` = :category AND enabllelity = 1 AND  trending = 1 ";
$stmt_trending= $conn->prepare($sql_trending);
$stmt_trending->execute([':category' => $category]);

$sql_recomanded = "SELECT * FROM movies WHERE `category` = :category AND enabllelity = 1 AND  trending = 1 ";
$stmt_recomanded= $conn->prepare($sql_recomanded);
$stmt_recomanded->execute([':category' => $category]);

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Video Streaming</title>
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
  <!-- i will provide this in description  -->
  <link rel="stylesheet" href="css/slick.css" />
  <link rel="stylesheet" href="css/slick-theme.css" />
  <link rel="stylesheet" href="css/owl.carousel.min.css" />
  <link rel="stylesheet" href="css/animate.min.css" />
  <link rel="stylesheet" href="css/magnific-popup.css" />
  <link rel="stylesheet" href="css/select2.min.css" />
  <link rel="stylesheet" href="css/select2-bootstrap4.min.css" />

  <link rel="stylesheet" href="css/slick-animation.css" />
  <link rel="stylesheet" href="style.css" />
</head>

<body>


  <!--navigaton bar  -->
  <?php
  require './Components/Navbar.php';
  ?>

  <br><br><br><br> <br>

  <h1 style="text-align: center; background: linear-gradient(to right, #e5091400 0%, #e50914 50%, #e5091400 100%); color: white; padding: 20px;"> <?php echo $pagename; ?></h1>




  <!-- main content starts  -->
  <div class="main-content">
    <!-- favorite section starts   -->

    <section id="iq-favorites">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12 overflow-hidden">
            <div class="iq-main-header d-flex align-items-center justify-content-between">
              <h4 class="main-title">Top Picks For You</h4>
              <a href="#" class="iq-view-all">View All</a>
            </div>
            <div class="favorite-contens">
              <ul class="favorites-slider list-inline row p-0 mb-0">
                <!-- slide item 1 -->
                <?php while($movie_top = $stmt_Top->fetch(PDO::FETCH_ASSOC)){ ?>
                <li class="slide-item">
                  <div class="block-images position-relative">
                    <div class="img-box">
                      <img src="<?php echo $movie_top['moviImage']; ?>" class="img-fluid" alt="" style="height: 200px;" />
                    </div>
                    <div class="block-description">
                      <h6 class="iq-title">
                        <a href="#"> <?php echo $movie_top['movieName']; ?> </a>
                      </h6>
                      <div class="movie-time d-flex align-items-center my-2">
                        <div class="badge badge-secondary p-1 mr-2"><?php echo $movie_top['imdb']; ?></div>
                        <span class="text-white"><?php echo $movie_top['playTime']; ?></span>
                      </div>
                      <div class="hover-buttons" onclick="location.href='./moreDetails.php?id=<?php echo $movie_top['movieId']; ?>'">
                        <span class="btn btn-hover iq-button">
                          <i class="fa fa-play mr-1"></i>
                          Play Now
                        </span>
                      </div>
                    </div>
                    <div class="block-social-info">
                      <ul class="list-inline p-0 m-0 music-play-lists">
                        <li class="share">
                          <span><i class="fa fa-share-alt"></i></span>
                          <div class="share-box">
                            <div class="d-flex align-items-center">
                              <a href="#" class="share-ico"><i class="fa fa-share-alt"></i></a>
                              <a href="#" class="share-ico"><i class="fa fa-youtube"></i></a>
                              <a href="#" class="share-ico"><i class="fa fa-instagram"></i></a>
                            </div>
                          </div>
                        </li>
                        <li>
                          <span><i class="fa fa-heart"></i></span>
                          <span class="count-box">19+</span>
                        </li>
                        <li>
                          <span><i class="fa fa-plus"></i></span>
                        </li>
                      </ul>
                    </div>
                  </div>
                </li>

                
                <?php } ?>
                
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- favourite section ends -->

    <!-- upcoming contents section starts  -->
    <section id="iq-upcoming-movie">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12 overflow-hidden">
            <div class="iq-main-header d-flex align-items-center justify-content-between">
              <h4 class="main-title">Popular Movies</h4>
              <a href="#" class="iq-view-all">View All</a>
            </div>
            <div class="favorite-contens">
              <ul class="favorites-slider list-inline row p-0 mb-0">
                <!-- slide item 1 -->
                <?php while($movie_top = $stmt_populer->fetch(PDO::FETCH_ASSOC)){ ?>
                <li class="slide-item">
                  <div class="block-images position-relative">
                    <div class="img-box">
                      <img src="<?php echo $movie_top['moviImage']; ?>" class="img-fluid" alt="" style="height: 200px;" />
                    </div>
                    <div class="block-description">
                      <h6 class="iq-title">
                        <a href="#"> <?php echo $movie_top['movieName']; ?> </a>
                      </h6>
                      <div class="movie-time d-flex align-items-center my-2">
                        <div class="badge badge-secondary p-1 mr-2"><?php echo $movie_top['imdb']; ?></div>
                        <span class="text-white"><?php echo $movie_top['playTime']; ?></span>
                      </div>
                      <div class="hover-buttons" onclick="location.href='./moreDetails.php?id=<?php echo $movie_top['movieId']; ?>'">
                        <span class="btn btn-hover iq-button">
                          <i class="fa fa-play mr-1"></i>
                          Play Now
                        </span>
                      </div>
                    </div>
                    <div class="block-social-info">
                      <ul class="list-inline p-0 m-0 music-play-lists">
                        <li class="share">
                          <span><i class="fa fa-share-alt"></i></span>
                          <div class="share-box">
                            <div class="d-flex align-items-center">
                              <a href="#" class="share-ico"><i class="fa fa-share-alt"></i></a>
                              <a href="#" class="share-ico"><i class="fa fa-youtube"></i></a>
                              <a href="#" class="share-ico"><i class="fa fa-instagram"></i></a>
                            </div>
                          </div>
                        </li>
                        <li>
                          <span><i class="fa fa-heart"></i></span>
                          <span class="count-box">19+</span>
                        </li>
                        <li>
                          <span><i class="fa fa-plus"></i></span>
                        </li>
                      </ul>
                    </div>
                  </div>
                </li>
                <?php } ?>
                
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- upcoming contents section ends -->

    <!-- top ten trending  -->

    <section id="iq-topten">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12 overflow-hidden">
            <div class="topten-contents">
              <h4 class="main-title iq-title topten-title">
                Trending Movies
              </h4>
              <ul id="top-ten-slider" class="list-inline p-0 m-0 d-flex align-items-center">
                
                <li class="slick-bg">
                  <a href="#">
                    <img src="images/top-10/01.jpg" class="img-fluid w-100" alt="" />
                    <h6 class="iq-title"><a href="#">Harry Potter</a></h6>
                  </a>
                </li>
               
              </ul>
              <div class="vertical_s">
                <ul id="top-ten-slider-nav" class="list-inline p-0 m-0 d-flex align-items-center">

                  <li>
                    <div class="block-images position-relative">
                      <a href="#">
                        <img src="images/top-10/01.jpg" class="img-fluid w-100" alt="" />
                      </a>
                      <div class="block-description">
                        <h5>Harry Potter</h5>
                        <div class="movie-time d-flex align-items-center my-2">
                          <div class="badge badge-secondary p-1 mr-2">
                            10+
                          </div>
                          <span class="text-white">8 Parts</span>
                        </div>
                        <div class="hover-buttons">
                          <a href="#" class="btn btn-hover" tabindex="0">
                            <i class="fa fa-play mr-1" aria-hidden="true"></i>
                            Play Now
                          </a>
                        </div>
                      </div>
                    </div>
                  </li>

                 

                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="iq-suggested" class="s-margin">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12 overflow-hidden">
            <div class="iq-main-header d-flex align-items-center justify-content-between">
              <h4 class="main-title">Suggested Sports</h4>
              <a href="#" class="iq-view-all">View All</a>
            </div>
            <div class="favorite-contens">
              <ul class="favorites-slider list-inline row p-0 mb-0">
                <!-- slide item 1 -->
                <li class="slide-item">
                  <div class="block-images position-relative">
                    <div class="img-box">
                      <img src="images/suggested/01.jpg" class="img-fluid" alt="" />
                    </div>
                    <div class="block-description">
                      <h6 class="iq-title">
                        <a href="#"> Basketball </a>
                      </h6>
                      <div class="movie-time d-flex align-items-center my-2">
                        <div class="badge badge-secondary p-1 mr-2">NBA</div>
                        <span class="text-white">SPorts</span>
                      </div>
                      <div class="hover-buttons">
                        <span class="btn btn-hover iq-button">
                          <i class="fa fa-play mr-1"></i>
                          Play Now
                        </span>
                      </div>
                    </div>
                    <div class="block-social-info">
                      <ul class="list-inline p-0 m-0 music-play-lists">
                        <li class="share">
                          <span><i class="fa fa-share-alt"></i></span>
                          <div class="share-box">
                            <div class="d-flex align-items-center">
                              <a href="#" class="share-ico"><i class="fa fa-share-alt"></i></a>
                              <a href="#" class="share-ico"><i class="fa fa-youtube"></i></a>
                              <a href="#" class="share-ico"><i class="fa fa-instagram"></i></a>
                            </div>
                          </div>
                        </li>
                        <li>
                          <span><i class="fa fa-heart"></i></span>
                          <span class="count-box">89+</span>
                        </li>
                        <li>
                          <span><i class="fa fa-plus"></i></span>
                        </li>
                      </ul>
                    </div>
                  </div>
                </li>
                <!-- slide item 2 -->
                <li class="slide-item">
                  <div class="block-images position-relative">
                    <div class="img-box">
                      <img src="images/suggested/02.jpg" class="img-fluid" alt="" />
                    </div>
                    <div class="block-description">
                      <h6 class="iq-title">
                        <a href="#"> VolleyBall </a>
                      </h6>
                      <div class="movie-time d-flex align-items-center my-2">
                        <div class="badge badge-secondary p-1 mr-2">PRO</div>
                        <span class="text-white">Sports</span>
                      </div>
                      <div class="hover-buttons">
                        <span class="btn btn-hover iq-button">
                          <i class="fa fa-play mr-1"></i>
                          Play Now
                        </span>
                      </div>
                    </div>
                    <div class="block-social-info">
                      <ul class="list-inline p-0 m-0 music-play-lists">
                        <li class="share">
                          <span><i class="fa fa-share-alt"></i></span>
                          <div class="share-box">
                            <div class="d-flex align-items-center">
                              <a href="#" class="share-ico"><i class="fa fa-share-alt"></i></a>
                              <a href="#" class="share-ico"><i class="fa fa-youtube"></i></a>
                              <a href="#" class="share-ico"><i class="fa fa-instagram"></i></a>
                            </div>
                          </div>
                        </li>
                        <li>
                          <span><i class="fa fa-heart"></i></span>
                          <span class="count-box">35+</span>
                        </li>
                        <li>
                          <span><i class="fa fa-plus"></i></span>
                        </li>
                      </ul>
                    </div>
                  </div>
                </li>
                <!-- slide item 3 -->
                <li class="slide-item">
                  <div class="block-images position-relative">
                    <div class="img-box">
                      <img src="images/suggested/03.jpg" class="img-fluid" alt="" />
                    </div>
                    <div class="block-description">
                      <h6 class="iq-title">
                        <a href="#"> Basketball </a>
                      </h6>
                      <div class="movie-time d-flex align-items-center my-2">
                        <div class="badge badge-secondary p-1 mr-2">LSU</div>
                        <span class="text-white">Sports</span>
                      </div>
                      <div class="hover-buttons">
                        <span class="btn btn-hover iq-button">
                          <i class="fa fa-play mr-1"></i>
                          Play Now
                        </span>
                      </div>
                    </div>
                    <div class="block-social-info">
                      <ul class="list-inline p-0 m-0 music-play-lists">
                        <li class="share">
                          <span><i class="fa fa-share-alt"></i></span>
                          <div class="share-box">
                            <div class="d-flex align-items-center">
                              <a href="#" class="share-ico"><i class="fa fa-share-alt"></i></a>
                              <a href="#" class="share-ico"><i class="fa fa-youtube"></i></a>
                              <a href="#" class="share-ico"><i class="fa fa-instagram"></i></a>
                            </div>
                          </div>
                        </li>
                        <li>
                          <span><i class="fa fa-heart"></i></span>
                          <span class="count-box">99+</span>
                        </li>
                        <li>
                          <span><i class="fa fa-plus"></i></span>
                        </li>
                      </ul>
                    </div>
                  </div>
                </li>
                <!-- slide item 4 -->
                <li class="slide-item">
                  <div class="block-images position-relative">
                    <div class="img-box">
                      <img src="images/suggested/04.jpg" class="img-fluid" alt="" />
                    </div>
                    <div class="block-description">
                      <h6 class="iq-title">
                        <a href="#"> Cricket </a>
                      </h6>
                      <div class="movie-time d-flex align-items-center my-2">
                        <div class="badge badge-secondary p-1 mr-2">T-20</div>
                        <span class="text-white">Sports</span>
                      </div>
                      <div class="hover-buttons">
                        <span class="btn btn-hover iq-button">
                          <i class="fa fa-play mr-1"></i>
                          Play Now
                        </span>
                      </div>
                    </div>
                    <div class="block-social-info">
                      <ul class="list-inline p-0 m-0 music-play-lists">
                        <li class="share">
                          <span><i class="fa fa-share-alt"></i></span>
                          <div class="share-box">
                            <div class="d-flex align-items-center">
                              <a href="#" class="share-ico"><i class="fa fa-share-alt"></i></a>
                              <a href="#" class="share-ico"><i class="fa fa-youtube"></i></a>
                              <a href="#" class="share-ico"><i class="fa fa-instagram"></i></a>
                            </div>
                          </div>
                        </li>
                        <li>
                          <span><i class="fa fa-heart"></i></span>
                          <span class="count-box">19+</span>
                        </li>
                        <li>
                          <span><i class="fa fa-plus"></i></span>
                        </li>
                      </ul>
                    </div>
                  </div>
                </li>
                <!-- slide item 5 -->
                <li class="slide-item">
                  <div class="block-images position-relative">
                    <div class="img-box">
                      <img src="images/suggested/05.jpg" class="img-fluid" alt="" />
                    </div>
                    <div class="block-description">
                      <h6 class="iq-title">
                        <a href="#"> Golf </a>
                      </h6>
                      <div class="movie-time d-flex align-items-center my-2">
                        <div class="badge badge-secondary p-1 mr-2">PGA</div>
                        <span class="text-white">Sports</span>
                      </div>
                      <div class="hover-buttons">
                        <span class="btn btn-hover iq-button">
                          <i class="fa fa-play mr-1"></i>
                          Play Now
                        </span>
                      </div>
                    </div>
                    <div class="block-social-info">
                      <ul class="list-inline p-0 m-0 music-play-lists">
                        <li class="share">
                          <span><i class="fa fa-share-alt"></i></span>
                          <div class="share-box">
                            <div class="d-flex align-items-center">
                              <a href="#" class="share-ico"><i class="fa fa-share-alt"></i></a>
                              <a href="#" class="share-ico"><i class="fa fa-youtube"></i></a>
                              <a href="#" class="share-ico"><i class="fa fa-instagram"></i></a>
                            </div>
                          </div>
                        </li>
                        <li>
                          <span><i class="fa fa-heart"></i></span>
                          <span class="count-box">19+</span>
                        </li>
                        <li>
                          <span><i class="fa fa-plus"></i></span>
                        </li>
                      </ul>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- parallax section  -->
    <section id="parallex" class="parallax-window">
      <div class="container-fluid h-100">
        <div class="row align-items-center justify-content-center h-100 parallaxt-details">
          <div class="col-lg-4 r-mb-23">
            <div class="text-left">
              <a href="javascript:void(0)">
                <h1 class="parallax-heading">Avatar</h1>
              </a>
              <div class="parallax-ratting d-flex align-items-center mt-3 mb-3">
                <ul
                  class="ratting-start p-o m-0 list-inline text-primary d-flex align-items-center justify-content-left">
                  <li>
                    <a href="#" class="text-primary"><i class="fa fa-star"></i></a>
                  </li>
                  <li>
                    <a href="#" class="text-primary"><i class="pl-2 fa fa-star"></i></a>
                  </li>
                  <li>
                    <a href="#" class="text-primary"><i class="pl-2 fa fa-star"></i></a>
                  </li>
                  <li>
                    <a href="#" class="text-primary"><i class="pl-2 fa fa-star"></i></a>
                  </li>
                  <li>
                    <a href="#" class="text-primary"><i class="pl-2 fa fa-star-half-o"></i></a>
                  </li>
                </ul>
                <span class="text-white ml-3">7.8(Imbd)</span>
              </div>
              <div class="movie-time d-flex align-items-center mb-3">
                <div class="badge badge-secondary p-1 mr-2">9+</div>
                <span class="text-white">2h 42min</span>
              </div>
              <p>
                A paraplegic Marine dispatched to the moon Pandora on a unique
                mission becomes torn between following his orders and
                protecting the world he feels is his home.
              </p>
              <div class="parallax-buttons">
                <a href="#" class="btn btn-hover">Play Now</a>
                <a href="#" class="btn btn-link">More Details</a>
              </div>
            </div>
          </div>
          <div class="col-lg-8">
            <div class="parallax-img">
              <a href="#"><img src="images/parallax/avatar.jpg" alt="" class="img-fluid w-100" /></a>
            </div>
          </div>
        </div>
      </div>
    </section>


    <!-- trending section  -->
    <section id="iq-trending" class="s-margin">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12 overflow-hidden">
            <div class="iq-main-header d-flex align-items-center justify-content-between">
              <h4 class="main-title">Trending</h4>
            </div>
            <div class="trending-contens">
              <ul id="trending-slider-nav" class="list-inline p-0 mb-0 row align-items-center">

                <li>
                  <a href="javascript:void(0);">
                    <div class="movie-slick position-relative">
                      <img src="images/trending/01.jpg" class="img-fluid" alt="">
                    </div>
                  </a>
                </li>
               

              </ul>
              <ul id="trending-slider" class="list-inline p-0 m-0 d-flex align-items-center">
                <li>
                  <div class="tranding-block position-relative" style="background-image: url(images/trending/01.jpg);">
                    <div class="trending-custom-tab">
                      <div class="tab-title-info position-relative">
                        <ul class="trending-pills d-flex nav nav-pills justify-content-center align-items-center text-center" role="tablist">
                          <li class="nav-item">
                            <a href="#trending-data1" class="nav-link active show" data-toggle="pill" role="tab" aria-selected="true">
                              Overview
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="#trending-data2" class="nav-link" data-toggle="pill" role="tab" aria-selected="false">
                              Episodes
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="#trending-data3" class="nav-link" data-toggle="pill" role="tab" aria-selected="false">
                              Trailers
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="#trending-data4" class="nav-link" data-toggle="pill" role="tab" aria-selected="false">
                              Similiar Like This
                            </a>
                          </li>
                        </ul>
                      </div>
                      <div class="trending-content">
                        <div id="trending-data1" class="overview-tab tab-pane fade active show">
                          <div class="trending-info align-items-center w-100 animated fadeInUp">
                            <a href="javascript:void(0);" tabindex="0">
                              <div class="res-logo">
                                <div class="channel-logo">
                                  <img src="images/logo.png" class="c-logo" alt="">
                                </div>
                              </div>
                            </a>
                            <h1 class="trending-text big-title text-uppercase">The Crown</h1>
                            <div class="d-flex align-items-center text-white text-detail">
                              <span class="badge badge-secondary p-3">18+</span>
                              <span class="ml-3">3 Seasons</span>
                              <span class="trending-year">2020</span>
                            </div>
                            <div class="d-flex align-items-center series mb-4">
                              <a href="javascript:void(0);">
                                <img src="images/trending/trending-label.png" class="img-fluid" alt="">
                              </a>
                              <span class="text-gold ml-3">#2 in Series Today</span>
                            </div>
                            <p class="trending-dec">
                              Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ex facere sapiente optio dolor aperiam impedit sint molestiae delectus, qui magni 1500 thid had that.
                            </p>
                            <div class="p-btns">
                              <div class="d-flex align-items-center p-0">
                                <a href="#" class="btn btn-hover mr-2" tabindex="0">
                                  <i class="fa fa-play mr-2"></i>
                                  Play Now
                                </a>
                                <a href="#" class="btn btn-link" tabindex="0">
                                  <i class="fa fa-plus pr-2"></i>
                                  My List
                                </a>
                              </div>
                            </div>
                            <div class="trending-list mt-4">
                              <div class="text-primary title">
                                Starring :
                                <span class="text-body">
                                  Clarie Foy, Olivia Colman, Imelda Staunton
                                </span>
                              </div>
                              <div class="text-primary title">
                                Genres :
                                <span class="text-body">
                                  Biography
                                </span>
                              </div>
                              <div class="text-primary title">
                                Creators :
                                <span class="text-body">
                                  Peter Morgan
                                </span>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div id="trending-data2" class="overlay-tab tab-pane fade">
                          <div class="trending-info align-items-center w-100 animated fadeInUp">
                            <a href="#" tabindex="0">
                              <div class="channel-logo">
                                <img src="images/logo.png" class="c-logo" alt="">
                              </div>
                            </a>
                            <h1 class="trending-text big-title text-uppercase">the Crown</h1>
                            <div class="d-flex align-items-center text-white text-detail mb-4">
                              <span class="season_date">
                                2 Seasons
                              </span>
                              <span class="trending-year">Feb 2019</span>
                            </div>
                            <div class="iq-custom-select d-inline-block sea-epi">
                              <select name="Seasons" class="form-control season-select">
                                <option value="Season1">Season 1</option>
                                <option value="Season2">Season 2</option>
                                <option value="Season3">Season 3</option>
                                <option value="Season4">Season 4</option>
                                <option value="Season4">Season 4</option>
                                <option value="Season6">Season 6</option>
                              </select>
                            </div>

                            <div class="episodes-contens mt-4">
                              <div class="owl-carousel owl-theme episodes-slider1 list-inline p-0 m-0">
                                <div class="e-item">
                                  <div class="block-image position-relative">
                                    <a href="#">
                                      <img src="images/episodes/ce1.jpg" class="img-fluid" alt="">
                                    </a>
                                    <div class="episode-play-info">
                                      <div class="episode-play">
                                        <a href="#" tabindex="0">
                                          <i class="fa fa-play"></i>
                                        </a>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="episodes-description text-body">
                                    <div class="d-flex align-items-center justify-content-between">
                                      <a href="#">Episode 1</a>
                                      <span class="text-primary">2.25m</span>
                                    </div>
                                    <p class="mb-0">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Cumque aliquam quisquam iure tempore earum sequi.</p>
                                  </div>
                                </div>
                                <div class="e-item">
                                  <div class="block-image position-relative">
                                    <a href="#">
                                      <img src="images/episodes/ce2.jpg" class="img-fluid" alt="">
                                    </a>
                                    <div class="episode-play-info">
                                      <div class="episode-play">
                                        <a href="#" tabindex="0">
                                          <i class="fa fa-play"></i>
                                        </a>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="episodes-description text-body">
                                    <div class="d-flex align-items-center justify-content-between">
                                      <a href="#">Episode 2</a>
                                      <span class="text-primary">2.25m</span>
                                    </div>
                                    <p class="mb-0">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Cumque aliquam quisquam iure tempore earum sequi.</p>
                                  </div>
                                </div>
                                <div class="e-item">
                                  <div class="block-image position-relative">
                                    <a href="#">
                                      <img src="images/episodes/ce3.jpg" class="img-fluid" alt="">
                                    </a>
                                    <div class="episode-play-info">
                                      <div class="episode-play">
                                        <a href="#" tabindex="0">
                                          <i class="fa fa-play"></i>
                                        </a>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="episodes-description text-body">
                                    <div class="d-flex align-items-center justify-content-between">
                                      <a href="#">Episode 3</a>
                                      <span class="text-primary">2.25m</span>
                                    </div>
                                    <p class="mb-0">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Cumque aliquam quisquam iure tempore earum sequi.</p>
                                  </div>
                                </div>
                                <div class="e-item">
                                  <div class="block-image position-relative">
                                    <a href="#">
                                      <img src="images/episodes/ce4.jpg" class="img-fluid" alt="">
                                    </a>
                                    <div class="episode-play-info">
                                      <div class="episode-play">
                                        <a href="#" tabindex="0">
                                          <i class="fa fa-play"></i>
                                        </a>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="episodes-description text-body">
                                    <div class="d-flex align-items-center justify-content-between">
                                      <a href="#">Episode 4</a>
                                      <span class="text-primary">2.25m</span>
                                    </div>
                                    <p class="mb-0">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Cumque aliquam quisquam iure tempore earum sequi.</p>
                                  </div>
                                </div>
                                <div class="e-item">
                                  <div class="block-image position-relative">
                                    <a href="#">
                                      <img src="images/episodes/ce5.jpg" class="img-fluid" alt="">
                                    </a>
                                    <div class="episode-play-info">
                                      <div class="episode-play">
                                        <a href="#" tabindex="0">
                                          <i class="fa fa-play"></i>
                                        </a>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="episodes-description text-body">
                                    <div class="d-flex align-items-center justify-content-between">
                                      <a href="#">Episode 5</a>
                                      <span class="text-primary">2.25m</span>
                                    </div>
                                    <p class="mb-0">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Cumque aliquam quisquam iure tempore earum sequi.</p>
                                  </div>
                                </div>

                              </div>
                            </div>

                          </div>
                        </div>

                        <div id="trending-data3" class="overlay-tab tab-pane fade">
                          <div class="trending-info align-items-center w-100 animated fadeInUp">
                            <a href="#" tabindex="0">
                              <div class="channel-logo">
                                <img src="images/logo.png" class="c-logo" alt="">
                              </div>
                            </a>
                            <h1 class="trending-text big-title text-uppercase">the crown</h1>
                            <div class="episodes-contens mt-4">
                              <div class="owl-carousel owl-theme episodes-slider1 list-inline p-0 m-0">
                                <div class="e-item">
                                  <div class="block-image position-relative">
                                    <a href="#">
                                      <img src="images/episodes/ce1.jpg" class="img-fluid" alt="">
                                    </a>
                                    <div class="episode-play-info">
                                      <div class="episode-play">
                                        <a href="#" tabindex="0">
                                          <i class="fa fa-play"></i>
                                        </a>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="episodes-description text-body">
                                    <div class="d-flex align-items-center justify-content-between">
                                      <a href="#">Trailer 1</a>
                                      <span class="text-primary">2.25m</span>
                                    </div>
                                    <p class="mb-0">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Cumque aliquam quisquam iure tempore earum sequi.</p>
                                  </div>
                                </div>
                                <div class="e-item">
                                  <div class="block-image position-relative">
                                    <a href="#">
                                      <img src="images/episodes/ce2.jpg" class="img-fluid" alt="">
                                    </a>
                                    <div class="episode-play-info">
                                      <div class="episode-play">
                                        <a href="#" tabindex="0">
                                          <i class="fa fa-play"></i>
                                        </a>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="episodes-description text-body">
                                    <div class="d-flex align-items-center justify-content-between">
                                      <a href="#">Trailer 2</a>
                                      <span class="text-primary">2.25m</span>
                                    </div>
                                    <p class="mb-0">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Cumque aliquam quisquam iure tempore earum sequi.</p>
                                  </div>
                                </div>
                                <div class="e-item">
                                  <div class="block-image position-relative">
                                    <a href="#">
                                      <img src="images/episodes/ce3.jpg" class="img-fluid" alt="">
                                    </a>
                                    <div class="episode-play-info">
                                      <div class="episode-play">
                                        <a href="#" tabindex="0">
                                          <i class="fa fa-play"></i>
                                        </a>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="episodes-description text-body">
                                    <div class="d-flex align-items-center justify-content-between">
                                      <a href="#">Trailer 3</a>
                                      <span class="text-primary">2.25m</span>
                                    </div>
                                    <p class="mb-0">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Cumque aliquam quisquam iure tempore earum sequi.</p>
                                  </div>
                                </div>
                                <div class="e-item">
                                  <div class="block-image position-relative">
                                    <a href="#">
                                      <img src="images/episodes/ce4.jpg" class="img-fluid" alt="">
                                    </a>
                                    <div class="episode-play-info">
                                      <div class="episode-play">
                                        <a href="#" tabindex="0">
                                          <i class="fa fa-play"></i>
                                        </a>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="episodes-description text-body">
                                    <div class="d-flex align-items-center justify-content-between">
                                      <a href="#">Trailer 4</a>
                                      <span class="text-primary">2.25m</span>
                                    </div>
                                    <p class="mb-0">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Cumque aliquam quisquam iure tempore earum sequi.</p>
                                  </div>
                                </div>
                                <div class="e-item">
                                  <div class="block-image position-relative">
                                    <a href="#">
                                      <img src="images/episodes/ce5.jpg" class="img-fluid" alt="">
                                    </a>
                                    <div class="episode-play-info">
                                      <div class="episode-play">
                                        <a href="#" tabindex="0">
                                          <i class="fa fa-play"></i>
                                        </a>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="episodes-description text-body">
                                    <div class="d-flex align-items-center justify-content-between">
                                      <a href="#">Trailer 5</a>
                                      <span class="text-primary">2.25m</span>
                                    </div>
                                    <p class="mb-0">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Cumque aliquam quisquam iure tempore earum sequi.</p>
                                  </div>
                                </div>

                              </div>
                            </div>
                          </div>
                        </div>

                        <div id="trending-data4" class="overlay-tab tab-pane fade">
                          <div class="trending-info align-items-center w-100 animated fadeInUp">
                            <a href="#" tabindex="0">
                              <div class="channel-logo">
                                <img src="images/logo.png" class="c-logo" alt="">
                              </div>
                            </a>
                            <h1 class="trending-text big-title text-uppercase">the Crown</h1>
                            <div class="episodes-contens mt-4">
                              <div class="owl-carousel owl-theme episodes-slider1 list-inline p-0 m-0">
                                <div class="e-item">
                                  <div class="block-image position-relative">
                                    <a href="#">
                                      <img src="images/episodes/bbt3.jpg" class="img-fluid" alt="">
                                    </a>
                                    <div class="episode-play-info">
                                      <div class="episode-play">
                                        <a href="#" tabindex="0">
                                          <i class="fa fa-play"></i>
                                        </a>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="episodes-description text-body">
                                    <div class="d-flex align-items-center justify-content-between">
                                      <a href="#">Trailer 1</a>
                                      <span class="text-primary">2.25m</span>
                                    </div>
                                    <p class="mb-0">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Cumque aliquam quisquam iure tempore earum sequi.</p>
                                  </div>
                                </div>
                                <div class="e-item">
                                  <div class="block-image position-relative">
                                    <a href="#">
                                      <img src="images/episodes/fe2.jpg" class="img-fluid" alt="">
                                    </a>
                                    <div class="episode-play-info">
                                      <div class="episode-play">
                                        <a href="#" tabindex="0">
                                          <i class="fa fa-play"></i>
                                        </a>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="episodes-description text-body">
                                    <div class="d-flex align-items-center justify-content-between">
                                      <a href="#">Trailer 2</a>
                                      <span class="text-primary">2.25m</span>
                                    </div>
                                    <p class="mb-0">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Cumque aliquam quisquam iure tempore earum sequi.</p>
                                  </div>
                                </div>
                                <div class="e-item">
                                  <div class="block-image position-relative">
                                    <a href="#">
                                      <img src="images/episodes/m4.jpg" class="img-fluid" alt="">
                                    </a>
                                    <div class="episode-play-info">
                                      <div class="episode-play">
                                        <a href="#" tabindex="0">
                                          <i class="fa fa-play"></i>
                                        </a>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="episodes-description text-body">
                                    <div class="d-flex align-items-center justify-content-between">
                                      <a href="#">Trailer 3</a>
                                      <span class="text-primary">2.25m</span>
                                    </div>
                                    <p class="mb-0">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Cumque aliquam quisquam iure tempore earum sequi.</p>
                                  </div>
                                </div>
                                <div class="e-item">
                                  <div class="block-image position-relative">
                                    <a href="#">
                                      <img src="images/episodes/pb3.jpg" class="img-fluid" alt="">
                                    </a>
                                    <div class="episode-play-info">
                                      <div class="episode-play">
                                        <a href="#" tabindex="0">
                                          <i class="fa fa-play"></i>
                                        </a>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="episodes-description text-body">
                                    <div class="d-flex align-items-center justify-content-between">
                                      <a href="#">Trailer 4</a>
                                      <span class="text-primary">2.25m</span>
                                    </div>
                                    <p class="mb-0">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Cumque aliquam quisquam iure tempore earum sequi.</p>
                                  </div>
                                </div>
                                <div class="e-item">
                                  <div class="block-image position-relative">
                                    <a href="#">
                                      <img src="images/episodes/n5.jpg" class="img-fluid" alt="">
                                    </a>
                                    <div class="episode-play-info">
                                      <div class="episode-play">
                                        <a href="#" tabindex="0">
                                          <i class="fa fa-play"></i>
                                        </a>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="episodes-description text-body">
                                    <div class="d-flex align-items-center justify-content-between">
                                      <a href="#">Trailer 5</a>
                                      <span class="text-primary">2.25m</span>
                                    </div>
                                    <p class="mb-0">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Cumque aliquam quisquam iure tempore earum sequi.</p>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>

                
               
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>


    <section id="iq-suggested" class="s-margin">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12 overflow-hidden">
            <div class="iq-main-header d-flex align-items-center justify-content-between">
              <h4 class="main-title">Recommended For You</h4>
              <a href="#" class="iq-view-all">View All</a>
            </div>
            <div class="favorite-contens">
              <ul class="favorites-slider list-inline row p-0 mb-0">
                <!-- slide item 1 -->
                <li class="slide-item">
                  <div class="block-images position-relative">
                    <div class="img-box">
                      <img src="images/tvthrillers/01.jpg" class="img-fluid" alt="" />
                    </div>
                    <div class="block-description">
                      <h6 class="iq-title">
                        <a href="#">The Martian</a>
                      </h6>
                      <div class="movie-time d-flex align-items-center my-2">
                        <div class="badge badge-secondary p-1 mr-2">15+</div>
                        <span class="text-white">2h 45min</span>
                      </div>
                      <div class="hover-buttons">
                        <span class="btn btn-hover iq-button">
                          <i class="fa fa-play mr-1"></i>
                          Play Now
                        </span>
                      </div>
                    </div>
                    <div class="block-social-info">
                      <ul class="list-inline p-0 m-0 music-play-lists">
                        <li class="share">
                          <span><i class="fa fa-share-alt"></i></span>
                          <div class="share-box">
                            <div class="d-flex align-items-center">
                              <a href="#" class="share-ico"><i class="fa fa-share-alt"></i></a>
                              <a href="#" class="share-ico"><i class="fa fa-youtube"></i></a>
                              <a href="#" class="share-ico"><i class="fa fa-instagram"></i></a>
                            </div>
                          </div>
                        </li>
                        <li>
                          <span><i class="fa fa-heart"></i></span>
                          <span class="count-box">89+</span>
                        </li>
                        <li>
                          <span><i class="fa fa-plus"></i></span>
                        </li>
                      </ul>
                    </div>
                  </div>
                </li>
                
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>


  </div>

  <!-- main content ends  -->

  <?php require './Components/SweetAlert.php'; ?>
  <?php require './Components/Footer.php'; ?>

  <!-- js files  -->
  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/slick.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/select2.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/slick-animation.min.js"></script>

  <script src="main.js"></script>
</body>

</html>