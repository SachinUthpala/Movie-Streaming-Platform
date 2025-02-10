<?php

session_start();

if ($_SESSION['admin'] == null) {
  header("Location: ./sign-in.php");
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    Soft UI Dashboard 3 by Creative Tim
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700,800" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="https://demos.creative-tim.com/soft-ui-dashboard/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="https://demos.creative-tim.com/soft-ui-dashboard/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1.1.0" rel="stylesheet" />
  <!-- Nepcha Analytics (nepcha.com) -->
  <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
  <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</head>

<body class="g-sidenav-show  bg-gray-100">

<?php

if( $_SESSION['Added'] == 1 ) {
  echo '<script>
  
 Swal.fire({
  title: "Acction Completed!",
  icon: "success",
  draggable: true
});
  
  </script>';

  $_SESSION['login_Sucess'] = null;

}


?>


  <?php require './Components/nav.php'; ?>

  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">


    <?php require './Components/secondaryNav.php'; ?>

    <div class="container-fluid py-4">


      <div class="row mt-4">
        <div class="col-lg-7 mb-lg-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-lg-6">
                  <div class="d-flex flex-column h-100">
                    <p class="mb-1 pt-2 text-bold">Add Movie</p>
                    <h5 class="font-weight-bolder">Add Movie To Web</h5>
                    <p class="mb-5">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eos odio magni, aspernatur
                      deserunt cum pariatur adipisci nesciunt modi labore quas?</p>
                    <a class="text-body text-sm font-weight-bold mb-0 icon-move-right mt-auto" href="javascript:;">
                      Read More
                      <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                    </a>
                  </div>
                </div>
                <div class="col-lg-5 ms-auto text-center mt-5 mt-lg-0">
                  <div class="bg-primary border-radius-lg h-100">
                    <img src="../assets/img/shapes/waves-white.svg"
                      class="position-absolute h-100 w-50 top-0 d-lg-block d-none" alt="waves">
                    <div class="position-relative d-flex align-items-center justify-content-center h-100">
                      <img class="w-100 position-relative z-index-2 pt-4"
                        src="../assets/img/illustrations/rocket-white.png" alt="rocket">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-5">
          <div class="card h-100 p-3">
            <div class="overflow-hidden position-relative border-radius-lg bg-cover h-100"
              style="background-image: url('../assets/img/ivancik.jpg');">
              <span class="mask bg-gradient-dark"></span>
              <div class="card-body position-relative z-index-1 d-flex flex-column h-100 p-3">
                <h5 class="text-white font-weight-bolder mb-4 pt-2">Work with High Quality Images</h5>
                <p class="text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto expedita
                  veritatis adipisci. Non, eveniet officia?.</p>
                <a class="text-white text-sm font-weight-bold mb-0 icon-move-right mt-auto" href="javascript:;">
                  Read More
                  <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>




      <div class="row mt-4">


        <h5 style="text-align: center;">Add Movie</h5>
        <form class="was-validated" action="./AdminFunctions/AddMovie.php" method="post" enctype="multipart/form-data" >


        <div class="mb-3">
          <label for="validationTextarea" class="form-label">Movie Name</label>
            <input type="text" class="form-control" aria-label="file example" name="moviename" required>
            <div class="invalid-feedback">Enter Movie Name</div>
          </div>


          <div class="mb-3">
            <label for="validationTextarea" class="form-label">Discription</label>
            <textarea class="form-control" id="validationTextarea" name="discription" placeholder="Simple Movie Discription"
              required></textarea>
            <div class="invalid-feedback">
              Please enter simple Movie Discription
            </div>
          </div>

          <div class="row">
            <div class="mb-3">
            <label for="validationTextarea" class="form-label">Imdb Rate</label>
              <input type="text" class="form-control" name="imdb" aria-label="file example" required>
              <div class="invalid-feedback">Enter Imdb Rate</div>
            </div>

            <div class="mb-3">
            <label for="validationTextarea" class="form-label">Movie Play Time</label>
              <input type="text" class="form-control" name="playTime" aria-label="file example" required>
              <div class="invalid-feedback">Enter Movie Play Time</div>
            </div>
          </div>


          <div class="mb-3">
            <label for="validationTextarea" class="form-label">Movie Genours</label>
              <input type="text" class="form-control" aria-label="file example" name="genarous" placeholder="Action , Thriller" required>
              <div class="invalid-feedback">Enter Movie Genours</div>
            </div>

         

          <div class="mb-3">
          <label for="validationTextarea" class="form-label">Movie Category</label>
            <select class="form-select" required aria-label="select example" name="category">
              <option value="">Movie Category</option>
              <option value="English">English Movies</option>
              <option value="Tamil">Tamil Movies</option>
              <option value="Theligu">Theligu MoviesHindi Movies</option>
              <option value="Hindi">Hindi Movies</option>
              <option value="Sinhala">Sinhala Movies</option>
              <option value="Other">Other Movies</option>
            </select>
            <div class="invalid-feedback">Example : English - Movie Category</div>
          </div>


          <div class="mb-3">
            <label for="validationTextarea" class="form-label">Movie Acctoress</label>
              <input type="text" class="form-control" aria-label="file example" name="Accorss" required>
              <div class="invalid-feedback">Use Comma to separate names</div>
            </div>



            <div class="mb-3">
            <label for="validationTextarea" class="form-label">Movie Derector</label>
              <input type="text" class="form-control" aria-label="file example" name="derector" required>
              <div class="invalid-feedback">Derector</div>
            </div>


            <div class="mb-3">
            <label for="validationTextarea" class="form-label">Movie Uploaded Link</label>
              <input type="text" class="form-control" aria-label="file example" name="mLink" required>
              <div class="invalid-feedback">Movie Uploaded Link</div>
            </div>

          <div class="mb-3">
          <label for="validationTextarea" class="form-label">Image</label>
            <input type="file" class="form-control" aria-label="file example" name="movieImage" required>
            <div class="invalid-feedback">Movie Image 1920 x 1080 for better experiance</div>
          </div>


          <div class="mb-3">
          <label for="validationTextarea" class="form-label">Top Populer</label>
            <select class="form-select" required aria-label="select example" name="populer">
              <option value="0">NO</option>
              <option value="1">YES</option>
            </select>
            <div class="invalid-feedback">Add As Weekly Top Populer</div>
          </div>


          <div class="mb-3">
          <label for="validationTextarea" class="form-label">Top Trending</label>
            <select class="form-select" required aria-label="select example" name="trending">
              <option value="0">NO</option>
              <option value="1">YES</option>
            </select>
            <div class="invalid-feedback">Add As Weekly Top Trending</div>
          </div>


          <div class="mb-3">
          <label for="validationTextarea" class="form-label">Top Pick</label>
            <select class="form-select" required aria-label="select example" name="picks">
              <option value="0">NO</option>
              <option value="1">YES</option>
            </select>
            <div class="invalid-feedback">Add As Weekly Top Pick</div>
          </div>


          <div class="mb-3">
          <label for="validationTextarea" class="form-label">Top Recomanded</label>
            <select class="form-select" required aria-label="select example" name="recomanded">
              <option value="0">NO</option>
              <option value="1">YES</option>
            </select>
            <div class="invalid-feedback">Add As Weekly Top Recomanded</div>
          </div>


          <div class="mb-3">
          <label for="validationTextarea" class="form-label">Enabled</label>
            <select class="form-select" required aria-label="select example" name="enabled">
              <option value="1">YES</option>
              <option value="0">NO</option>
            </select>
            <div class="invalid-feedback">This will Show your movie mo site</div>
          </div>

          
          <div class="mb-3">
            <button class="btn btn-primary" type="submit" >Submit form</button>
          </div>
        </form>



      </div>


      <footer class="footer pt-3  ">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
              <div class="copyright text-center text-sm text-muted text-lg-start">
                ©
                <script>
                  document.write(new Date().getFullYear())
                </script>,
                made <i class="fa fa-heart"></i> by
                <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Sachin Gunasekara</a>
                for MovieHub.
              </div>
            </div>
            <div class="col-lg-6">
              <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                <li class="nav-item">
                  <a href="https://sachinuthpala.netlify.app/" class="nav-link text-muted" target="_blank">Contact</a>
                </li>
                <li class="nav-item">
                  <a href="https://github.com/SachinUthpala" class="nav-link text-muted" target="_blank">Github</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.facebook.com/sachin.gunasekare/?_rdc=1&_rdr#" class="nav-link text-muted"
                    target="_blank">Facebook</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.instagram.com/sachin_uthpala/" class="nav-link pe-0 text-muted"
                    target="_blank">Instergram</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </main>
  <div class="fixed-plugin">
    <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
      <i class="fa fa-cog py-2"> </i>
    </a>
    <div class="card shadow-lg ">
      <div class="card-header pb-0 pt-3 ">
        <div class="float-start">
          <h5 class="mt-3 mb-0">Soft UI Configurator</h5>
          <p>See our dashboard options.</p>
        </div>
        <div class="float-end mt-4">
          <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
            <i class="fa fa-close"></i>
          </button>
        </div>
        <!-- End Toggle Button -->
      </div>
      <hr class="horizontal dark my-1">
      <div class="card-body pt-sm-3 pt-0">
        <!-- Sidebar Backgrounds -->
        <div>
          <h6 class="mb-0">Sidebar Colors</h6>
        </div>
        <a href="javascript:void(0)" class="switch-trigger background-color">
          <div class="badge-colors my-2 text-start">
            <span class="badge filter bg-primary active" data-color="primary" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
          </div>
        </a>
        <!-- Sidenav Type -->
        <div class="mt-3">
          <h6 class="mb-0">Sidenav Type</h6>
          <p class="text-sm">Choose between 2 different sidenav types.</p>
        </div>
        <div class="d-flex">
          <button class="btn btn-primary w-100 px-3 mb-2 active" data-class="bg-transparent"
            onclick="sidebarType(this)">Transparent</button>
          <button class="btn btn-primary w-100 px-3 mb-2 ms-2" data-class="bg-white"
            onclick="sidebarType(this)">White</button>
        </div>
        <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
        <!-- Navbar Fixed -->
        <div class="mt-3">
          <h6 class="mb-0">Navbar Fixed</h6>
        </div>
        <div class="form-check form-switch ps-0">
          <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)">
        </div>
        <hr class="horizontal dark my-sm-4">
        <a class="btn bg-gradient-dark w-100" href="https://www.creative-tim.com/product/soft-ui-dashboard">Free
          Download</a>
        <a class="btn btn-outline-dark w-100"
          href="https://www.creative-tim.com/learning-lab/bootstrap/license/soft-ui-dashboard">View documentation</a>
        <div class="w-100 text-center">
          <a class="github-button" href="https://github.com/creativetimofficial/soft-ui-dashboard"
            data-icon="octicon-star" data-size="large" data-show-count="true"
            aria-label="Star creativetimofficial/soft-ui-dashboard on GitHub">Star</a>
          <h6 class="mt-3">Thank you for sharing!</h6>
          <a href="https://twitter.com/intent/tweet?text=Check%20Soft%20UI%20Dashboard%20made%20by%20%40CreativeTim%20%23webdesign%20%23dashboard%20%23bootstrap5&amp;url=https%3A%2F%2Fwww.creative-tim.com%2Fproduct%2Fsoft-ui-dashboard"
            class="btn btn-dark mb-0 me-2" target="_blank">
            <i class="fab fa-twitter me-1" aria-hidden="true"></i> Tweet
          </a>
          <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.creative-tim.com/product/soft-ui-dashboard"
            class="btn btn-dark mb-0 me-2" target="_blank">
            <i class="fab fa-facebook-square me-1" aria-hidden="true"></i> Share
          </a>
        </div>
      </div>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <script>
    var ctx = document.getElementById("chart-bars").getContext("2d");

    new Chart(ctx, {
      type: "bar",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
          label: "Sales",
          tension: 0.4,
          borderWidth: 0,
          borderRadius: 4,
          borderSkipped: false,
          backgroundColor: "#fff",
          data: [450, 200, 100, 220, 500, 100, 400, 230, 500],
          maxBarThickness: 6
        },],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
            },
            ticks: {
              suggestedMin: 0,
              suggestedMax: 500,
              beginAtZero: true,
              padding: 15,
              font: {
                size: 14,
                family: "Inter",
                style: 'normal',
                lineHeight: 2
              },
              color: "#fff"
            },
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false
            },
            ticks: {
              display: false
            },
          },
        },
      },
    });


    var ctx2 = document.getElementById("chart-line").getContext("2d");

    var gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);

    gradientStroke1.addColorStop(1, 'rgba(203,12,159,0.2)');
    gradientStroke1.addColorStop(0.2, 'rgba(72,72,176,0.0)');
    gradientStroke1.addColorStop(0, 'rgba(203,12,159,0)'); //purple colors

    var gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);

    gradientStroke2.addColorStop(1, 'rgba(20,23,39,0.2)');
    gradientStroke2.addColorStop(0.2, 'rgba(72,72,176,0.0)');
    gradientStroke2.addColorStop(0, 'rgba(20,23,39,0)'); //purple colors

    new Chart(ctx2, {
      type: "line",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
          label: "Mobile apps",
          tension: 0.4,
          borderWidth: 0,
          pointRadius: 0,
          borderColor: "#cb0c9f",
          borderWidth: 3,
          backgroundColor: gradientStroke1,
          fill: true,
          data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
          maxBarThickness: 6

        },
        {
          label: "Websites",
          tension: 0.4,
          borderWidth: 0,
          pointRadius: 0,
          borderColor: "#3A416F",
          borderWidth: 3,
          backgroundColor: gradientStroke2,
          fill: true,
          data: [30, 90, 40, 140, 290, 290, 340, 230, 400],
          maxBarThickness: 6
        },
        ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              padding: 10,
              color: '#b2b9bf',
              font: {
                size: 11,
                family: "Inter",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#b2b9bf',
              padding: 20,
              font: {
                size: 11,
                family: "Inter",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });
  </script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/soft-ui-dashboard.min.js?v=1.1.0"></script>
</body>

</html>