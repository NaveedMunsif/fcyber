<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Implementation</title>

	<!-- Swiper JS link -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>

	<!-- Font awesome cdn link -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

	<!-- Custom CSS File link -->
    <link href="/dist/css/tabler.min.css" rel="stylesheet"/>
    <link href="/dist/css/tabler-flags.min.css" rel="stylesheet"/>
    <link href="/dist/css/tabler-payments.min.css" rel="stylesheet"/>
    <link href="/dist/css/tabler-vendors.min.css" rel="stylesheet"/>
    <link href="/dist/css/demo.min.css" rel="stylesheet"/>

</head>
<body>

 <style>
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* This makes the container take up the full height of the viewport */
        }

        .button {
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            background-color: #4CAF50; /* Add background color for better visibility */
        }
		.background-image{
            height: 100vh;
			width: 100%;
			background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
		}
    </style>
    <?php include_once("header.php")
    ?>
<div class="page-wrapper">
<div class="container-xl">
  <!-- Page title -->
  <div class="page-header d-print-none">
    <div class="row align-items-center">
      <div class="col">
        <!-- Page pre-title -->
        <div class="page-pretitle">
          Overview
        </div>
        <h2 class="page-title">
          Dashboard
        </h2>
      </div>
      <!-- Page title actions -->
      <!-- -->  <!-- This comment was not closed, I added -->
    </div>
  </div>
  <!-- Closing page-header div -->
</div>
<!-- Closing container-xl div -->
<div class="page-body">   
        <div class="container-xl">
        <div class="row">
        <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">SQL INJECTION ATTACK - INBAND</h3>
                  </div>
                  <div class="card-body">
                    <div id="carousel-indicators" class="carousel slide" data-bs-ride="carousel">
                      <ol class="carousel-indicators">
                        <li data-bs-target="#carousel-indicators" data-bs-slide-to="0" class="active" aria-current="true"></li>
                        <li data-bs-target="#carousel-indicators" data-bs-slide-to="1" class=""></li>
                        <li data-bs-target="#carousel-indicators" data-bs-slide-to="2" class=""></li>
                        <li data-bs-target="#carousel-indicators" data-bs-slide-to="3" class=""></li>
                        <li data-bs-target="#carousel-indicators" data-bs-slide-to="4" class=""></li>
                      </ol>
                      <div class="carousel-inner">
                        <div class="carousel-item active">
                          <img class="d-block w-100" alt="" src="images/home-slide-111.png">
                        </div>
                        <div class="carousel-item">
                          <img class="d-block w-100" alt="" src="images/home-slide-111.png">
                        </div>
                        <div class="carousel-item">
                          <img class="d-block w-100" alt="" src="images/home-slide-111.png">
                        </div>
                        <div class="carousel-item">
                          <img class="d-block w-100" alt="" src="images/home-slide-111.png">
                        </div>
                        <div class="carousel-item">
                          <img class="d-block w-100" alt="" src="images/home-slide-111.png">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
    </div>


    </div>


<?php include_once("jsdata.php")
    ?>
    </div>
    </div>
</body>
</html>