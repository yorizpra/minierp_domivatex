<?php

use backend\models\Product;
use backend\models\ProductSearch;
use common\utils\EncryptionDB;
use frontend\assets\AppAsset;
use backend\models\News;
use backend\models\NewsSearch;
use backend\models\WebVocabularySearch;
use backend\models\ContentSearch;
use common\helpers\ContentStringManipulator;
use yii\helpers\Url;

use backend\models\AppSettingSearch;


$appName = AppSettingSearch::getValueByKey("APP-NAME-SINGKAT");
$appNameSingkat = AppSettingSearch::getValueByKey("APP-NAME-SINGKATAN");

/* @var $this yii\web\View */
$this->title = $appName;
AppAsset::register($this);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="description" content="" />
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    .hovereffect {
      width: 100%;
      height: 100%;
      float: left;
      overflow: hidden;
      position: relative;
      text-align: center;
      cursor: default;
    }

    .hovereffect .overlay {
      width: 100%;
      height: 100%;
      position: absolute;
      overflow: hidden;
      top: 0;
      left: 0;
      opacity: 0;
      background-color: rgba(0, 0, 0, 0.5);
      -webkit-transition: all .4s ease-in-out;
      transition: all .4s ease-in-out
    }

    .hovereffect img {
      display: block;
      position: relative;
      -webkit-transition: all .4s linear;
      transition: all .4s linear;
    }

    .hovereffect h2 {
      text-transform: uppercase;
      color: #fff;
      text-align: center;
      position: relative;
      font-size: 17px;
      background: rgba(0, 0, 0, 0.6);
      -webkit-transform: translatey(-100px);
      -ms-transform: translatey(-100px);
      transform: translatey(-100px);
      -webkit-transition: all .2s ease-in-out;
      transition: all .2s ease-in-out;
      padding: 10px;
    }

    .hovereffect a.info {
      text-decoration: none;
      display: inline-block;
      text-transform: uppercase;
      color: #fff;
      border: 1px solid #fff;
      background-color: transparent;
      opacity: 0;
      filter: alpha(opacity=0);
      -webkit-transition: all .2s ease-in-out;
      transition: all .2s ease-in-out;
      margin: 80px 0 0;
      padding: 7px 14px;
    }

    .hovereffect a.info:hover {
      box-shadow: 0 0 5px #fff;
    }

    .hovereffect:hover img {
      -ms-transform: scale(1.2);
      -webkit-transform: scale(1.2);
      transform: scale(1.2);
    }

    .hovereffect:hover .overlay {
      opacity: 1;
      filter: alpha(opacity=100);
    }

    .hovereffect:hover h2,
    .hovereffect:hover a.info {
      opacity: 1;
      filter: alpha(opacity=100);
      -ms-transform: translatey(0);
      -webkit-transform: translatey(0);
      transform: translatey(0);
    }

    .hovereffect:hover a.info {
      -webkit-transition-delay: .2s;
      transition-delay: .2s;
    }

    .container {
      position: center;
      width: 50%;
    }

    .image {
      opacity: 1;
      display: block;
      width: 100%;
      height: auto;
      transition: .5s ease;
      backface-visibility: hidden;
    }

    .middle {
      transition: .5s ease;
      opacity: 0;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      -ms-transform: translate(-50%, -50%);
      text-align: center;
    }

    .container:hover .image {
      opacity: 0.3;
    }

    .container:hover .middle {
      opacity: 1;
    }

    .text {
      background-color: #04AA6D;
      color: white;
      font-size: 16px;
      padding: 16px 32px;
    }
  </style>

  <style>
    body {
      font-family: Arial, Helvetica, sans-serif;
    }

    #myImg {
      border-radius: 5px;
      cursor: pointer;
      transition: 0.3s;
    }

    #myImg:hover {
      opacity: 0.7;
    }

    /* The Modal (background) */
    .modal {
      display: none;
      /* Hidden by default */
      position: fixed;
      /* Stay in place */
      z-index: 1;
      /* Sit on top */
      padding-top: 100px;
      /* Location of the box */
      left: 0;
      top: 0;
      width: 100%;
      /* Full width */
      height: 100%;
      /* Full height */
      overflow: auto;
      /* Enable scroll if needed */
      background-color: rgb(0, 0, 0);
      /* Fallback color */
      background-color: rgba(0, 0, 0, 0.9);
      /* Black w/ opacity */
    }

    /* Modal Content (image) */
    .modal-content {
      margin: auto;
      display: block;
      width: 80%;
      max-width: 700px;
    }

    /* Caption of Modal Image */
    #caption {
      margin: auto;
      display: block;
      width: 80%;
      max-width: 700px;
      text-align: center;
      color: #ccc;
      padding: 10px 0;
      height: 150px;
    }

    /* Add Animation */
    .modal-content,
    #caption {
      -webkit-animation-name: zoom;
      -webkit-animation-duration: 0.6s;
      animation-name: zoom;
      animation-duration: 0.6s;
    }

    @-webkit-keyframes zoom {
      from {
        -webkit-transform: scale(0)
      }

      to {
        -webkit-transform: scale(1)
      }
    }

    @keyframes zoom {
      from {
        transform: scale(0)
      }

      to {
        transform: scale(1)
      }
    }

    /* The Close Button */
    .close {
      position: absolute;
      top: 15px;
      right: 35px;
      color: #f1f1f1;
      font-size: 40px;
      font-weight: bold;
      transition: 0.3s;
    }

    .close:hover,
    .close:focus {
      color: #bbb;
      text-decoration: none;
      cursor: pointer;
    }

    /* 100% Image Width on Smaller Screens */
    @media only screen and (max-width: 700px) {
      .modal-content {
        width: 100%;
      }
    }
  </style>

  <title>Makloon</title>
  <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/carousel/" />

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
  <link href="css/bootstrap.min.css" rel="stylesheet" />
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <div class="container-fluid px-4 py-2">
        <a class="navbar-brand" href="#">Makloon</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav me-auto mb-2 mb-md-0">
            <li class="nav-item">
              <a class="nav-link" href="administrator">Login</a>
            </li>
          </ul>
          <?php /*
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
              <li class="nav-item">
                <a class="nav-link" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Tentang</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Kontak</a>
              </li>
            </ul>
            */ ?>
        </div>
      </div>
    </nav>
  </header>

  <main>
    <div id="carouselExampleCaptions" class="carousel slide mb-5" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="<?= Yii::$app->request->baseUrl; ?>/frontend/web/img/kain3.jpg" class="d-block w-100" alt="Gambar Kain" height="600px" />
          <div class="carousel-caption d-none d-md-block">
            <h5>Maklooon</h5>
            <p>Kualitas kain terbaik</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="<?= Yii::$app->request->baseUrl; ?>/frontend/web/img/kain1.jpg" class="d-block w-100" alt="Gambar Kain" height="600px" />
          <div class="carousel-caption d-none d-md-block">
            <h5>Makloon</h5>
            <p>Harga terjangkau</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="<?= Yii::$app->request->baseUrl; ?>/frontend/web/img/kain2.jpeg" class="d-block w-100" alt="Gambar Kain" height="600px" />
          <div class="carousel-caption d-none d-md-block">
            <h5>Makloon</h5>
            <p>Pelayanan terbaik</p>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>


    <!-- batas atas front end album -->
    <section class="py-5 text-center container">
      <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
          <h1 class="fw-light">Welcome to Domivatex</h1>
          <p class="lead text-muted">
            PT Domivatex adalah perusahaan startup e-commerce yang bergerak di bidang maklon atau toll manufacturer / OEM / OBM / ODM segala jenis produk kecantikan dan kosmetik meliputi Make Up, Skin Care, Body Care, Hair Care, Minuman Kecantikan dan Suplemen Kesehatan. Kehadiran kami ingin menjembatani bagi pemula bisnis maupun profesional bisnis yang ingin mengembangkan produknya melalui jasa maklon dengan memanfaatkan utilitas produksinya di tempat kami melalui serangkaian ide dan merek yang Anda ciptakan sendiri.
          </p>
          <!-- <p>
              <a href="#" class="btn btn-primary my-2">Main call to action</a>
              <a href="#" class="btn btn-secondary my-2">Secondary action</a>
            </p> -->
        </div>
      </div>
    </section>

    <div class="album py-1 bg-light">
      <section class="py-1 text-center container">
        <div class="row py-lg-5">
          <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light">Produk Yang Kami Buat</h1>
            <!-- <p>
                <a href="#" class="btn btn-primary my-2">Main call to action</a>
                <a href="#" class="btn btn-secondary my-2">Secondary action</a>
              </p> -->
          </div>
        </div>
      </section>
      <section class="py-1 text-left container">
        <h3>Polos</h3>
      </section>

      <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

          <div class="col">
            <div class="card shadow-sm">
              <!-- <img src="<?= Yii::$app->request->baseUrl; ?>/frontend/web/img/polos1.jpg" class="d-block w-100" alt="Gambar Kain" height="200px" /> -->
              <!-- <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg> -->
              <!-- batas atas modal -->
              <img id="myImgPolos1" src="<?= Yii::$app->request->baseUrl; ?>/frontend/web/img/polos1.jpg" alt="" class="d-block w-100" alt="Gambar Kain" height="200px" />

              <!-- The Modal -->
              <div id="myModal" class="modal">
                <span class="close">&times;</span>
                <img class="modal-content" id="img01">
                <div id="caption"></div>
              </div>

              <script>
                // Get the modal
                var modal = document.getElementById("myModal");

                // Get the image and insert it inside the modal - use its "alt" text as a caption
                var img = document.getElementById("myImgPolos1");
                var modalImg = document.getElementById("img01");
                var captionText = document.getElementById("caption");
                img.onclick = function() {
                  modal.style.display = "block";
                  modalImg.src = this.src;
                  captionText.innerHTML = this.alt;
                }

                // Get the <span> element that closes the modal
                var span = document.getElementsByClassName("close")[0];

                // When the user clicks on <span> (x), close the modal
                span.onclick = function() {
                  modal.style.display = "none";
                }
              </script>
              <!-- batas bawah modal -->
              <div class="card">
                <p class="card-text"></p>
                <!-- <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                      <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                    </div>
                    <small class="text-muted">9 mins</small>
                  </div> -->
              </div>
            </div>
          </div>

          <div class="col">
            <div class="card shadow-sm">
              <!-- <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg> -->
              <!-- <img src="<?= Yii::$app->request->baseUrl; ?>/frontend/web/img/polos2.jpg" class="d-block w-100" alt="Gambar Kain" height="200px" /> -->
              <!-- batas atas modal -->
              <img id="myImgPolos2" src="<?= Yii::$app->request->baseUrl; ?>/frontend/web/img/polos2.jpg" alt="" class="d-block w-100" alt="Gambar Kain" height="200px" />

              <!-- The Modal -->
              <div id="myModal" class="modal">
                <span class="close">&times;</span>
                <img class="modal-content" id="img01">
                <div id="caption"></div>
              </div>

              <script>
                // Get the modal
                var modal = document.getElementById("myModal");

                // Get the image and insert it inside the modal - use its "alt" text as a caption
                var img = document.getElementById("myImgPolos2");
                var modalImg = document.getElementById("img01");
                var captionText = document.getElementById("caption");
                img.onclick = function() {
                  modal.style.display = "block";
                  modalImg.src = this.src;
                  captionText.innerHTML = this.alt;
                }

                // Get the <span> element that closes the modal
                var span = document.getElementsByClassName("close")[0];

                // When the user clicks on <span> (x), close the modal
                span.onclick = function() {
                  modal.style.display = "none";
                }
              </script>
              <!-- batas bawah modal -->
              <div class="card">
                <p class="card-text"></p>
                <!-- <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                      <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                    </div>
                    <small class="text-muted">9 mins</small>
                  </div> -->
              </div>
            </div>
          </div>

          <div class="col">
            <div class="card shadow-sm">
              <!-- <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"> -->
              <!-- <img src="<?= Yii::$app->request->baseUrl; ?>/frontend/web/img/polos3.jpg" class="d-block w-100" alt="Gambar Kain" height="200px" /> -->
              <!-- batas atas modal -->
              <img id="myImgPolos3" src="<?= Yii::$app->request->baseUrl; ?>/frontend/web/img/polos3.jpg" alt="" class="d-block w-100" alt="Gambar Kain" height="200px" />

              <!-- The Modal -->
              <div id="myModal" class="modal">
                <span class="close">&times;</span>
                <img class="modal-content" id="img01">
                <div id="caption"></div>
              </div>

              <script>
                // Get the modal
                var modal = document.getElementById("myModal");

                // Get the image and insert it inside the modal - use its "alt" text as a caption
                var img = document.getElementById("myImgPolos3");
                var modalImg = document.getElementById("img01");
                var captionText = document.getElementById("caption");
                img.onclick = function() {
                  modal.style.display = "block";
                  modalImg.src = this.src;
                  captionText.innerHTML = this.alt;
                }

                // Get the <span> element that closes the modal
                var span = document.getElementsByClassName("close")[0];

                // When the user clicks on <span> (x), close the modal
                span.onclick = function() {
                  modal.style.display = "none";
                }
              </script>
              <!-- batas bawah modal -->
              <title>Placeholder</title>
              <rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em"> </text>
              </svg>

              <div class="card">
                <p class="card-text"></p>
                <!-- <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                      <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                    </div>
                    <small class="text-muted">9 mins</small>
                  </div> -->
              </div>
            </div>
          </div>

          <div class="col">
            <div class="card shadow-sm">
              <!-- <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"> -->
              <!-- <img src="<?= Yii::$app->request->baseUrl; ?>/frontend/web/img/polos4.jpg" class="d-block w-100" alt="Gambar Kain" height="200px" /> -->
              <!-- batas atas modal -->
              <img id="myImgPolos4" src="<?= Yii::$app->request->baseUrl; ?>/frontend/web/img/polos4.jpg" alt="" class="d-block w-100" alt="Gambar Kain" height="200px" />

              <!-- The Modal -->
              <div id="myModal" class="modal">
                <span class="close">&times;</span>
                <img class="modal-content" id="img01">
                <div id="caption"></div>
              </div>

              <script>
                // Get the modal
                var modal = document.getElementById("myModal");

                // Get the image and insert it inside the modal - use its "alt" text as a caption
                var img = document.getElementById("myImgPolos4");
                var modalImg = document.getElementById("img01");
                var captionText = document.getElementById("caption");
                img.onclick = function() {
                  modal.style.display = "block";
                  modalImg.src = this.src;
                  captionText.innerHTML = this.alt;
                }

                // Get the <span> element that closes the modal
                var span = document.getElementsByClassName("close")[0];

                // When the user clicks on <span> (x), close the modal
                span.onclick = function() {
                  modal.style.display = "none";
                }
              </script>
              <!-- batas bawah modal -->
              <title>Placeholder</title>
              <rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em"> </text>
              </svg>

              <div class="card">
                <p class="card-text"></p>
                <!-- <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                      <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                    </div>
                    <small class="text-muted">9 mins</small>
                  </div> -->
              </div>
            </div>
          </div>

          <div class="col">
            <div class="card shadow-sm">
              <!-- <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"> -->
              <!-- <img src="<?= Yii::$app->request->baseUrl; ?>/frontend/web/img/polos5.jpg" class="d-block w-100" alt="Gambar Kain" height="200px" /> -->
              <!-- batas atas modal -->
              <img id="myImgPolos5" src="<?= Yii::$app->request->baseUrl; ?>/frontend/web/img/polos5.jpg" alt="" class="d-block w-100" alt="Gambar Kain" height="200px" />

              <!-- The Modal -->
              <div id="myModal" class="modal">
                <span class="close">&times;</span>
                <img class="modal-content" id="img01">
                <div id="caption"></div>
              </div>

              <script>
                // Get the modal
                var modal = document.getElementById("myModal");

                // Get the image and insert it inside the modal - use its "alt" text as a caption
                var img = document.getElementById("myImgPolos5");
                var modalImg = document.getElementById("img01");
                var captionText = document.getElementById("caption");
                img.onclick = function() {
                  modal.style.display = "block";
                  modalImg.src = this.src;
                  captionText.innerHTML = this.alt;
                }

                // Get the <span> element that closes the modal
                var span = document.getElementsByClassName("close")[0];

                // When the user clicks on <span> (x), close the modal
                span.onclick = function() {
                  modal.style.display = "none";
                }
              </script>
              <!-- batas bawah modal -->
              <title>Placeholder</title>
              <rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em"> </text>
              </svg>

              <div class="card">
                <p class="card-text"></p>
                <!-- <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                      <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                    </div>
                    <small class="text-muted">9 mins</small>
                  </div> -->
              </div>
            </div>
          </div>

          <div class="col">
            <div class="card shadow-sm">
              <!-- <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"> -->
              <!-- <img src="<?= Yii::$app->request->baseUrl; ?>/frontend/web/img/polos6.jpg" class="d-block w-100" alt="Gambar Kain" height="200px" /> -->
              <!-- batas atas modal -->
              <img id="myImgPolos6" src="<?= Yii::$app->request->baseUrl; ?>/frontend/web/img/polos6.jpg" alt="" class="d-block w-100" alt="Gambar Kain" height="200px" />

              <!-- The Modal -->
              <div id="myModal" class="modal">
                <span class="close">&times;</span>
                <img class="modal-content" id="img01">
                <div id="caption"></div>
              </div>

              <script>
                // Get the modal
                var modal = document.getElementById("myModal");

                // Get the image and insert it inside the modal - use its "alt" text as a caption
                var img = document.getElementById("myImgPolos6");
                var modalImg = document.getElementById("img01");
                var captionText = document.getElementById("caption");
                img.onclick = function() {
                  modal.style.display = "block";
                  modalImg.src = this.src;
                  captionText.innerHTML = this.alt;
                }

                // Get the <span> element that closes the modal
                var span = document.getElementsByClassName("close")[0];

                // When the user clicks on <span> (x), close the modal
                span.onclick = function() {
                  modal.style.display = "none";
                }
              </script>
              <!-- batas bawah modal -->
              <title>Placeholder</title>
              <rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em"> </text>
              </svg>

              <div class="card">
                <p class="card-text"></p>
                <!-- <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                      <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                    </div>
                    <small class="text-muted">9 mins</small>
                  </div> -->
              </div>
            </div>
          </div>

          <?php /*
          <div class="col">
            <div class="card shadow-sm">
              <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                <title>Placeholder</title>
                <rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
              </svg>

              <div class="card-body">
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <!-- <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                      <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                    </div>
                    <small class="text-muted">9 mins</small>
                  </div> -->
              </div>
            </div>
          </div>

          <div class="col">
            <div class="card shadow-sm">
              <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                <title>Placeholder</title>
                <rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
              </svg>

              <div class="card-body">
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <!-- <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                      <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                    </div>
                    <small class="text-muted">9 mins</small>
                  </div> -->
              </div>
            </div>
          </div>

          <div class="col">
            <div class="card shadow-sm">
              <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                <title>Placeholder</title>
                <rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
              </svg>

              <div class="card-body">
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <!-- <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                      <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                    </div>
                    <small class="text-muted">9 mins</small>
                  </div> -->
              </div>
            </div>
          </div>

          <div class="col">
            <div class="card shadow-sm">
              <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                <title>Placeholder</title>
                <rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
              </svg>

              <div class="card-body">
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <!-- <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                      <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                    </div>
                    <small class="text-muted">9 mins</small>
                  </div> -->
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card shadow-sm">
              <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                <title>Placeholder</title>
                <rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
              </svg>

              <div class="card-body">
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <!-- <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                      <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                    </div>
                    <small class="text-muted">9 mins</small>
                  </div> -->
              </div>
            </div>
          </div>
          <?php /*<div class="col">
            <div class="card shadow-sm">
              <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                <title>Placeholder</title>
                <rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
              </svg>

              <div class="card-body">
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <!-- <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                      <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                    </div>
                    <small class="text-muted">9 mins</small>
                  </div> -->
              </div>
            </div>*/ ?>
        </div>
      </div>
    </div>
    <br>

    <div class="album py-1 bg-light">
      <section class="py-1 text-left container">
        <h3>Motif</h3>
      </section>

      <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

          <div class="col">
            <div class="card shadow-sm">
              <!-- <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"> -->
              <?php /* <img src="<?= Yii::$app->request->baseUrl; ?>/frontend/web/img/motif6.jpg" class="d-block w-100" alt="Gambar Kain" height="200px" />*/ ?>

              <!-- batas atas modal -->
              <img id="myImgMotif1" src="<?= Yii::$app->request->baseUrl; ?>/frontend/web/img/motif1.jpg" alt="" class="d-block w-100" alt="Gambar Kain" height="200px" />

              <!-- The Modal -->
              <div id="myModal" class="modal">
                <span class="close">&times;</span>
                <img class="modal-content" id="img01">
                <div id="caption"></div>
              </div>

              <script>
                // Get the modal
                var modal = document.getElementById("myModal");

                // Get the image and insert it inside the modal - use its "alt" text as a caption
                var img = document.getElementById("myImgMotif1");
                var modalImg = document.getElementById("img01");
                var captionText = document.getElementById("caption");
                img.onclick = function() {
                  modal.style.display = "block";
                  modalImg.src = this.src;
                  captionText.innerHTML = this.alt;
                }

                // Get the <span> element that closes the modal
                var span = document.getElementsByClassName("close")[0];

                // When the user clicks on <span> (x), close the modal
                span.onclick = function() {
                  modal.style.display = "none";
                }
              </script>
              <!-- batas bawah modal -->

              <title>Placeholder</title>
              <rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em"> </text>
              </svg>

              <div class="card">
                <p class="card-text"></p>
                <!-- <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                      <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                    </div>
                    <small class="text-muted">9 mins</small>
                  </div> -->
              </div>
            </div>
          </div>

          <div class="col">
            <div class="card shadow-sm">
              <!-- <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"> -->
              <?php /* <img src="<?= Yii::$app->request->baseUrl; ?>/frontend/web/img/motif6.jpg" class="d-block w-100" alt="Gambar Kain" height="200px" />*/ ?>

              <!-- batas atas modal -->
              <img id="myImgMotif2" src="<?= Yii::$app->request->baseUrl; ?>/frontend/web/img/motif2.jpg" alt="" class="d-block w-100" alt="Gambar Kain" height="200px" />

              <!-- The Modal -->
              <div id="myModal" class="modal">
                <span class="close">&times;</span>
                <img class="modal-content" id="img01">
                <div id="caption"></div>
              </div>

              <script>
                // Get the modal
                var modal = document.getElementById("myModal");

                // Get the image and insert it inside the modal - use its "alt" text as a caption
                var img = document.getElementById("myImgMotif2");
                var modalImg = document.getElementById("img01");
                var captionText = document.getElementById("caption");
                img.onclick = function() {
                  modal.style.display = "block";
                  modalImg.src = this.src;
                  captionText.innerHTML = this.alt;
                }

                // Get the <span> element that closes the modal
                var span = document.getElementsByClassName("close")[0];

                // When the user clicks on <span> (x), close the modal
                span.onclick = function() {
                  modal.style.display = "none";
                }
              </script>
              <!-- batas bawah modal -->

              <title>Placeholder</title>
              <rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em"> </text>
              </svg>

              <div class="card">
                <p class="card-text"></p>
                <!-- <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                      <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                    </div>
                    <small class="text-muted">9 mins</small>
                  </div> -->
              </div>
            </div>
          </div>

          <div class="col">
            <div class="card shadow-sm">
              <!-- <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"> -->
              <?php /* <img src="<?= Yii::$app->request->baseUrl; ?>/frontend/web/img/motif6.jpg" class="d-block w-100" alt="Gambar Kain" height="200px" />*/ ?>

              <!-- batas atas modal -->
              <img id="myImgMotif3" src="<?= Yii::$app->request->baseUrl; ?>/frontend/web/img/motif3.jpg" alt="" class="d-block w-100" alt="Gambar Kain" height="200px" />

              <!-- The Modal -->
              <div id="myModal" class="modal">
                <span class="close">&times;</span>
                <img class="modal-content" id="img01">
                <div id="caption"></div>
              </div>

              <script>
                // Get the modal
                var modal = document.getElementById("myModal");

                // Get the image and insert it inside the modal - use its "alt" text as a caption
                var img = document.getElementById("myImgMotif3");
                var modalImg = document.getElementById("img01");
                var captionText = document.getElementById("caption");
                img.onclick = function() {
                  modal.style.display = "block";
                  modalImg.src = this.src;
                  captionText.innerHTML = this.alt;
                }

                // Get the <span> element that closes the modal
                var span = document.getElementsByClassName("close")[0];

                // When the user clicks on <span> (x), close the modal
                span.onclick = function() {
                  modal.style.display = "none";
                }
              </script>
              <!-- batas bawah modal -->

              <title>Placeholder</title>
              <rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em"> </text>
              </svg>

              <div class="card">
                <p class="card-text"></p>
                <!-- <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                      <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                    </div>
                    <small class="text-muted">9 mins</small>
                  </div> -->
              </div>
            </div>
          </div>

          <div class="col">
            <div class="card shadow-sm">
              <!-- <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"> -->
              <?php /* <img src="<?= Yii::$app->request->baseUrl; ?>/frontend/web/img/motif6.jpg" class="d-block w-100" alt="Gambar Kain" height="200px" />*/ ?>

              <!-- batas atas modal -->
              <img id="myImgMotif4" src="<?= Yii::$app->request->baseUrl; ?>/frontend/web/img/motif4.jpg" alt="" class="d-block w-100" alt="Gambar Kain" height="200px" />

              <!-- The Modal -->
              <div id="myModal" class="modal">
                <span class="close">&times;</span>
                <img class="modal-content" id="img01">
                <div id="caption"></div>
              </div>

              <script>
                // Get the modal
                var modal = document.getElementById("myModal");

                // Get the image and insert it inside the modal - use its "alt" text as a caption
                var img = document.getElementById("myImgMotif4");
                var modalImg = document.getElementById("img01");
                var captionText = document.getElementById("caption");
                img.onclick = function() {
                  modal.style.display = "block";
                  modalImg.src = this.src;
                  captionText.innerHTML = this.alt;
                }

                // Get the <span> element that closes the modal
                var span = document.getElementsByClassName("close")[0];

                // When the user clicks on <span> (x), close the modal
                span.onclick = function() {
                  modal.style.display = "none";
                }
              </script>
              <!-- batas bawah modal -->

              <title>Placeholder</title>
              <rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em"> </text>
              </svg>

              <div class="card">
                <p class="card-text"></p>
                <!-- <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                      <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                    </div>
                    <small class="text-muted">9 mins</small>
                  </div> -->
              </div>
            </div>
          </div>

          <div class="col">
            <div class="card shadow-sm">
              <!-- <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"> -->
              <?php /* <img src="<?= Yii::$app->request->baseUrl; ?>/frontend/web/img/motif6.jpg" class="d-block w-100" alt="Gambar Kain" height="200px" />*/ ?>

              <!-- batas atas modal -->
              <img id="myImgMotif5" src="<?= Yii::$app->request->baseUrl; ?>/frontend/web/img/motif5.jpg" alt="" class="d-block w-100" alt="Gambar Kain" height="200px" />

              <!-- The Modal -->
              <div id="myModal" class="modal">
                <span class="close">&times;</span>
                <img class="modal-content" id="img01">
                <div id="caption"></div>
              </div>

              <script>
                // Get the modal
                var modal = document.getElementById("myModal");

                // Get the image and insert it inside the modal - use its "alt" text as a caption
                var img = document.getElementById("myImgMotif5");
                var modalImg = document.getElementById("img01");
                var captionText = document.getElementById("caption");
                img.onclick = function() {
                  modal.style.display = "block";
                  modalImg.src = this.src;
                  captionText.innerHTML = this.alt;
                }

                // Get the <span> element that closes the modal
                var span = document.getElementsByClassName("close")[0];

                // When the user clicks on <span> (x), close the modal
                span.onclick = function() {
                  modal.style.display = "none";
                }
              </script>
              <!-- batas bawah modal -->

              <title>Placeholder</title>
              <rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em"> </text>
              </svg>

              <div class="card">
                <p class="card-text"></p>
                <!-- <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                      <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                    </div>
                    <small class="text-muted">9 mins</small>
                  </div> -->
              </div>
            </div>
          </div>

          <div class="col">
            <div class="card shadow-sm">
              <!-- <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"> -->
              <?php /* <img src="<?= Yii::$app->request->baseUrl; ?>/frontend/web/img/motif6.jpg" class="d-block w-100" alt="Gambar Kain" height="200px" />*/ ?>

              <!-- batas atas modal -->
              <img id="myImgMotif6" src="<?= Yii::$app->request->baseUrl; ?>/frontend/web/img/motif6.jpg" alt="" class="d-block w-100" alt="Gambar Kain" height="200px" />

              <!-- The Modal -->
              <div id="myModal" class="modal">
                <span class="close">&times;</span>
                <img class="modal-content" id="img01">
                <div id="caption"></div>
              </div>

              <script>
                // Get the modal
                var modal = document.getElementById("myModal");

                // Get the image and insert it inside the modal - use its "alt" text as a caption
                var img = document.getElementById("myImgMotif6");
                var modalImg = document.getElementById("img01");
                var captionText = document.getElementById("caption");
                img.onclick = function() {
                  modal.style.display = "block";
                  modalImg.src = this.src;
                  captionText.innerHTML = this.alt;
                }

                // Get the <span> element that closes the modal
                var span = document.getElementsByClassName("close")[0];

                // When the user clicks on <span> (x), close the modal
                span.onclick = function() {
                  modal.style.display = "none";
                }
              </script>
              <!-- batas bawah modal -->

              <title>Placeholder</title>
              <rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em"> </text>
              </svg>

              <div class="card">
                <p class="card-text"></p>
                <!-- <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                      <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                    </div>
                    <small class="text-muted">9 mins</small>
                  </div> -->
              </div>
            </div>
          </div>



        </div>
      </div>
    </div>

    <?php /* 
      <section class="py-1 text-left container">
        <h3>Polos</h3>
      </section>

      <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

          <div class="col">
            <div class="card shadow-sm">
              <img src="<?= Yii::$app->request->baseUrl; ?>/frontend/web/img/Asahi.jpg" class="d-block w-100" alt="Gambar Kain" height="200px" />
              <!-- <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg> -->
              <div class="card-body">
                <p class="card-text">Asahi</p>
                <!-- <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                      <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                    </div>
                    <small class="text-muted">9 mins</small>
                  </div> -->
              </div>
            </div>
          </div>

          <div class="col">
            <div class="card shadow-sm">
              <!-- <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg> -->
              <img src="<?= Yii::$app->request->baseUrl; ?>/frontend/web/img/Bsy.jpg" class="d-block w-100" alt="Gambar Kain" height="200px" />
              <div class="card-body">
                <p class="card-text">BSY</p>
                <!-- <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                      <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                    </div>
                    <small class="text-muted">9 mins</small>
                  </div> -->
              </div>
            </div>
          </div>

          <div class="col">
            <div class="card shadow-sm">
              <!-- <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"> -->
              <img src="<?= Yii::$app->request->baseUrl; ?>/frontend/web/img/Roberto-Cavalli.jpg" class="d-block w-100" alt="Gambar Kain" height="200px" />
              <title>Placeholder</title>
              <rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em"> </text>
              </svg>

              <div class="card-body">
                <p class="card-text">Roberto Cavalli</p>
                <!-- <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                      <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                    </div>
                    <small class="text-muted">9 mins</small>
                  </div> -->
              </div>
            </div>
          </div>
        </div>
      </div>
      */ ?>
    </div>
    <!-- batas bawah front end album -->

    <div class="container">
      <div class="row h-100">
        <div class="col-lg-7 mx-auto text-center mt-7 mb-5">
          <h5 class="fw-bold fs-3 fs-lg-5 lh-sm">Popular items</h5>
        </div>
        <div class="col-12">
          <div class="carousel slide" id="carouselPopularItems" data-bs-touch="false" data-bs-interval="false">
            <div class="carousel-inner">
              <div class="carousel-item active" data-bs-interval="10000">
                <div class="row gx-3 h-100 align-items-center">
                  <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                    <div class="card card-span h-100 rounded-3"><img class="img-fluid rounded-3 h-100" src="<?= Yii::$app->request->baseUrl; ?>/frontend/web/img/wa.jpg" alt="...">
                      <div class="card-body ps-0">
                        <h5 class="fw-bold text-1000 text-truncate mb-1">Cheese Burger</h5>
                        <div><span class="text-warning me-2"><svg class="svg-inline--fa fa-map-marker-alt fa-w-12" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="map-marker-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" width="15px" data-fa-i2svg="">
                              <path fill="currentColor" d="M172.268 501.67C26.97 291.031 0 269.413 0 192 0 85.961 85.961 0 192 0s192 85.961 192 192c0 77.413-26.97 99.031-172.268 309.67-9.535 13.774-29.93 13.773-39.464 0zM192 272c44.183 0 80-35.817 80-80s-35.817-80-80-80-80 35.817-80 80 35.817 80 80 80z"></path>
                            </svg><!-- <i class="fas fa-map-marker-alt"></i> Font Awesome fontawesome.com --></span><span class="text-primary">Burger Arena</span></div><span class="text-1000 fw-bold">$3.88</span>
                      </div>
                    </div>
                    <div class="d-grid gap-2"><a class="btn btn-lg btn-danger" href="#!" role="button">Order now</a></div>
                  </div>
                  <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                    <div class="card card-span h-100 rounded-3"><img class="img-fluid rounded-3 h-100" src="<?= Yii::$app->request->baseUrl; ?>/frontend/web/img/instagram.png" alt="...">
                      <div class="card-body ps-0">
                        <h5 class="fw-bold text-1000 text-truncate mb-1">Toffe's Cake</h5>
                        <div><span class="text-warning me-2"><svg class="svg-inline--fa fa-map-marker-alt fa-w-12" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="map-marker-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" width="15px" data-fa-i2svg="">
                              <path fill="currentColor" d="M172.268 501.67C26.97 291.031 0 269.413 0 192 0 85.961 85.961 0 192 0s192 85.961 192 192c0 77.413-26.97 99.031-172.268 309.67-9.535 13.774-29.93 13.773-39.464 0zM192 272c44.183 0 80-35.817 80-80s-35.817-80-80-80-80 35.817-80 80 35.817 80 80 80z"></path>
                            </svg><!-- <i class="fas fa-map-marker-alt"></i> Font Awesome fontawesome.com --></span><span class="text-primary">Top Sticks</span></div><span class="text-1000 fw-bold">$4.00</span>
                      </div>
                    </div>
                    <div class="d-grid gap-2"><a class="btn btn-lg btn-danger" href="#!" role="button">Order now</a></div>
                  </div>
                  <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                    <div class="card card-span h-100 rounded-3"><img class="img-fluid rounded-3 h-100" src="<?= Yii::$app->request->baseUrl; ?>/frontend/web/img/motif6.jpg" alt="...">
                      <div class="card-body ps-0">
                        <h5 class="fw-bold text-1000 text-truncate mb-1">Dancake</h5>
                        <div><span class="text-warning me-2"><svg class="svg-inline--fa fa-map-marker-alt fa-w-12" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="map-marker-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" width="15px" data-fa-i2svg="">
                              <path fill="currentColor" d="M172.268 501.67C26.97 291.031 0 269.413 0 192 0 85.961 85.961 0 192 0s192 85.961 192 192c0 77.413-26.97 99.031-172.268 309.67-9.535 13.774-29.93 13.773-39.464 0zM192 272c44.183 0 80-35.817 80-80s-35.817-80-80-80-80 35.817-80 80 35.817 80 80 80z"></path>
                            </svg><!-- <i class="fas fa-map-marker-alt"></i> Font Awesome fontawesome.com --></span><span class="text-primary">Cake World</span></div><span class="text-1000 fw-bold">$1.99</span>
                      </div>
                    </div>
                    <div class="d-grid gap-2"><a class="btn btn-lg btn-danger" href="#!" role="button">Order now</a></div>
                  </div>

                  <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                    <div class="card card-span h-100 rounded-3"><img class="img-fluid rounded-3 h-100" src="assets/img/gallery/cheese-burger.png" alt="...">
                      <div class="card-body ps-0">
                        <h5 class="fw-bold text-1000 text-truncate mb-1">Cheese Burger</h5>
                        <div><span class="text-warning me-2"><svg class="svg-inline--fa fa-map-marker-alt fa-w-12" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="map-marker-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" width="15px" data-fa-i2svg="">
                              <path fill="currentColor" d="M172.268 501.67C26.97 291.031 0 269.413 0 192 0 85.961 85.961 0 192 0s192 85.961 192 192c0 77.413-26.97 99.031-172.268 309.67-9.535 13.774-29.93 13.773-39.464 0zM192 272c44.183 0 80-35.817 80-80s-35.817-80-80-80-80 35.817-80 80 35.817 80 80 80z"></path>
                            </svg><!-- <i class="fas fa-map-marker-alt"></i> Font Awesome fontawesome.com --></span><span class="text-primary">Burger Arena</span></div><span class="text-1000 fw-bold">$3.88</span>
                      </div>
                    </div>
                    <div class="d-grid gap-2"><a class="btn btn-lg btn-danger" href="#!" role="button">Order now</a></div>
                  </div>
                  <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                    <div class="card card-span h-100 rounded-3"><img class="img-fluid rounded-3 h-100" src="assets/img/gallery/toffes-cake.png" alt="...">
                      <div class="card-body ps-0">
                        <h5 class="fw-bold text-1000 text-truncate mb-1">Toffe's Cake</h5>
                        <div><span class="text-warning me-2"><svg class="svg-inline--fa fa-map-marker-alt fa-w-12" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="map-marker-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" width="15px" data-fa-i2svg="">
                              <path fill="currentColor" d="M172.268 501.67C26.97 291.031 0 269.413 0 192 0 85.961 85.961 0 192 0s192 85.961 192 192c0 77.413-26.97 99.031-172.268 309.67-9.535 13.774-29.93 13.773-39.464 0zM192 272c44.183 0 80-35.817 80-80s-35.817-80-80-80-80 35.817-80 80 35.817 80 80 80z"></path>
                            </svg><!-- <i class="fas fa-map-marker-alt"></i> Font Awesome fontawesome.com --></span><span class="text-primary">Top Sticks</span></div><span class="text-1000 fw-bold">$4.00</span>
                      </div>
                    </div>
                    <div class="d-grid gap-2"><a class="btn btn-lg btn-danger" href="#!" role="button">Order now</a></div>
                  </div>
                  <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                    <div class="card card-span h-100 rounded-3"><img class="img-fluid rounded-3 h-100" src="assets/img/gallery/dancake.png" alt="...">
                      <div class="card-body ps-0">
                        <h5 class="fw-bold text-1000 text-truncate mb-1">Dancake</h5>
                        <div><span class="text-warning me-2"><svg class="svg-inline--fa fa-map-marker-alt fa-w-12" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="map-marker-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" width="15px" data-fa-i2svg="">
                              <path fill="currentColor" d="M172.268 501.67C26.97 291.031 0 269.413 0 192 0 85.961 85.961 0 192 0s192 85.961 192 192c0 77.413-26.97 99.031-172.268 309.67-9.535 13.774-29.93 13.773-39.464 0zM192 272c44.183 0 80-35.817 80-80s-35.817-80-80-80-80 35.817-80 80 35.817 80 80 80z"></path>
                            </svg><!-- <i class="fas fa-map-marker-alt"></i> Font Awesome fontawesome.com --></span><span class="text-primary">Cake World</span></div><span class="text-1000 fw-bold">$1.99</span>
                      </div>
                    </div>
                    <div class="d-grid gap-2"><a class="btn btn-lg btn-danger" href="#!" role="button">Order now</a></div>
                  </div>

                  <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                    <div class="card card-span h-100 rounded-3"><img class="img-fluid rounded-3 h-100" src="assets/img/gallery/toffes-cake.png" alt="...">
                      <div class="card-body ps-0">
                        <h5 class="fw-bold text-1000 text-truncate mb-1">Toffe's Cake</h5>
                        <div><span class="text-warning me-2"><svg class="svg-inline--fa fa-map-marker-alt fa-w-12" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="map-marker-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" width="15px" data-fa-i2svg="">
                              <path fill="currentColor" d="M172.268 501.67C26.97 291.031 0 269.413 0 192 0 85.961 85.961 0 192 0s192 85.961 192 192c0 77.413-26.97 99.031-172.268 309.67-9.535 13.774-29.93 13.773-39.464 0zM192 272c44.183 0 80-35.817 80-80s-35.817-80-80-80-80 35.817-80 80 35.817 80 80 80z"></path>
                            </svg><!-- <i class="fas fa-map-marker-alt"></i> Font Awesome fontawesome.com --></span><span class="text-primary">Top Sticks</span></div><span class="text-1000 fw-bold">$4.00</span>
                      </div>
                    </div>
                    <div class="d-grid gap-2"><a class="btn btn-lg btn-danger" href="#!" role="button">Order now</a></div>
                  </div>
                  <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                    <div class="card card-span h-100 rounded-3"><img class="img-fluid rounded-3 h-100" src="assets/img/gallery/dancake.png" alt="...">
                      <div class="card-body ps-0">
                        <h5 class="fw-bold text-1000 text-truncate mb-1">Dancake</h5>
                        <div><span class="text-warning me-2"><svg class="svg-inline--fa fa-map-marker-alt fa-w-12" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="map-marker-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" width="15px" data-fa-i2svg="">
                              <path fill="currentColor" d="M172.268 501.67C26.97 291.031 0 269.413 0 192 0 85.961 85.961 0 192 0s192 85.961 192 192c0 77.413-26.97 99.031-172.268 309.67-9.535 13.774-29.93 13.773-39.464 0zM192 272c44.183 0 80-35.817 80-80s-35.817-80-80-80-80 35.817-80 80 35.817 80 80 80z"></path>
                            </svg><!-- <i class="fas fa-map-marker-alt"></i> Font Awesome fontawesome.com --></span><span class="text-primary">Cake World</span></div><span class="text-1000 fw-bold">$1.99</span>
                      </div>
                    </div>
                    <div class="d-grid gap-2"><a class="btn btn-lg btn-danger" href="#!" role="button">Order now</a></div>
                  </div>

                </div>
              </div>
            </div><button class="carousel-control-prev carousel-icon" type="button" data-bs-target="#carouselPopularItems" data-bs-slide="prev"><span class="carousel-control-prev-icon hover-top-shadow" aria-hidden="true"></span><span class="visually-hidden">Previous</span></button><button class="carousel-control-next carousel-icon" type="button" data-bs-target="#carouselPopularItems" data-bs-slide="next"><span class="carousel-control-next-icon hover-top-shadow" aria-hidden="true"></span><span class="visually-hidden">Next </span></button>
          </div>
        </div>
      </div>
    </div>

    <!-- batas atas front end social media -->

    <div class="container marketing">

      <!-- Three columns of text below the carousel -->

      <center>
        <div class="row">
          <section class="py-1 text-center container">
            <div class="row py-lg-5">
              <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">Kunjungi Sosial Media & Online Shop Kami</h1>
                <!-- <p>
                  <a href="#" class="btn btn-primary my-2">Main call to action</a>
                  <a href="#" class="btn btn-secondary my-2">Secondary action</a>
                </p> -->
              </div>
            </div>
          </section>
          <div class="col-lg-4">
            <div class="hovereffect">
              <!-- <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"></rect><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg> -->
              <img src="<?= Yii::$app->request->baseUrl; ?>/frontend/web/img/wa.jpg" class="d-block w-100" alt="Gambar Kain" height="200px" />

              <!-- <p>Some representative placeholder content for the three columns of text below the carousel. This is the first column.</p> -->
              <div class="overlay">
                <p><a class="info" href="https://www.instagram.com/domivatexmedia/">Kunjungi »</a></p>
              </div>
            </div>
          </div><!-- /.col-lg-4 -->


          <!-- <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12"> -->
          <div class="col-lg-4">
            <div class="hovereffect">
              <img src="<?= Yii::$app->request->baseUrl; ?>/frontend/web/img/instagram.png" class="img-responsive" alt="WhatsApp" height="200px" />
              <div class="overlay">
                <!-- <h2>Hover effect 1</h2> -->
                <a class="info" href="#">Kunjungi »</a>
              </div>
            </div>
          </div>

          <div class="col-lg-4">
            <!-- <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"></rect><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg> -->
            <div class="hovereffect">
              <img src="<?= Yii::$app->request->baseUrl; ?>/frontend/web/img/tokopedia.jpg" class="d-block w-100" alt="Gambar Kain" height="200px" />
              <!-- <p>And lastly this, the third column of representative placeholder content.</p> -->
              <div class="overlay">
                <p><a class="info" href="#">Kunjungi »</a></p>
              </div>
            </div><!-- /.col-lg-4 -->
          </div><!-- /.row -->
        </div>
      </center>


      <!-- START THE FEATURETTES -->


      <section class="py-1 text-center container">
        <div class="row py-lg-5">
          <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="featurette-header">Cara kami memproduksi</h1>
            <!-- <p>
                  <a href="#" class="btn btn-primary my-2">Main call to action</a>
                  <a href="#" class="btn btn-secondary my-2">Secondary action</a>
                </p> -->
          </div>
        </div>
      </section>
      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-7">
          <h2 class="featurette-heading">Gudang yang luas<span class="text-muted"></span></h2>
          <p class="lead">Kami memiliki 6 gudang yang luas dan 2 diantaranya berada di perusahaan cabang kami yang terletak di jakarta dan surabaya</p>
        </div>
        <div class="col-md-5">
          <!-- <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false"> -->
          <!-- <img src="<?= Yii::$app->request->baseUrl; ?>/frontend/web/img/gudang1.jpg" class="d-block w-100" alt="Gambar Kain" height="200px" /> -->
          <!-- batas atas modal -->
          <img id="myImgGudang1" src="<?= Yii::$app->request->baseUrl; ?>/frontend/web/img/gudang1.jpg" alt="" class="d-block w-100" alt="Gambar Kain" height="200px" />

          <!-- The Modal -->
          <div id="myModal" class="modal">
            <span class="close">&times;</span>
            <img class="modal-content" id="img01">
            <div id="caption"></div>
          </div>

          <script>
            // Get the modal
            var modal = document.getElementById("myModal");

            // Get the image and insert it inside the modal - use its "alt" text as a caption
            var img = document.getElementById("myImgGudang1");
            var modalImg = document.getElementById("img01");
            var captionText = document.getElementById("caption");
            img.onclick = function() {
              modal.style.display = "block";
              modalImg.src = this.src;
              captionText.innerHTML = this.alt;
            }

            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];

            // When the user clicks on <span> (x), close the modal
            span.onclick = function() {
              modal.style.display = "none";
            }
          </script>
          <!-- batas bawah modal -->
          <title>Placeholder</title>
          <rect width="100%" height="100%" fill="#eee"></rect><text x="50%" y="50%" fill="#aaa" dy=".3em"></text>
          </svg>

        </div>
      </div>

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-7 order-md-2">
          <h2 class="featurette-heading">Proses penggulungan yang rapih, cepat, dan teliti <span class="text-muted"></span></h2>
          <p class="lead">Proses penggulungan dan pengukuran menggunakan bantuan mesin yang dapat membuat kain yang dihasilkan menjadi lebih rapih</p>
        </div>
        <div class="col-md-5 order-md-1">
          <!-- <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false"> -->
          <!-- <img src="<?= Yii::$app->request->baseUrl; ?>/frontend/web/img/gudang2.jpg" class="d-block w-100" alt="Gambar Kain" height="200px" /> -->
          <!-- batas atas modal -->
          <img id="myImgGudang2" src="<?= Yii::$app->request->baseUrl; ?>/frontend/web/img/gudang2.jpg" alt="" class="d-block w-100" alt="Gambar Kain" height="200px" />

          <!-- The Modal -->
          <div id="myModal" class="modal">
            <span class="close">&times;</span>
            <img class="modal-content" id="img01">
            <div id="caption"></div>
          </div>

          <script>
            // Get the modal
            var modal = document.getElementById("myModal");

            // Get the image and insert it inside the modal - use its "alt" text as a caption
            var img = document.getElementById("myImgGudang2");
            var modalImg = document.getElementById("img01");
            var captionText = document.getElementById("caption");
            img.onclick = function() {
              modal.style.display = "block";
              modalImg.src = this.src;
              captionText.innerHTML = this.alt;
            }

            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];

            // When the user clicks on <span> (x), close the modal
            span.onclick = function() {
              modal.style.display = "none";
            }
          </script>
          <!-- batas bawah modal -->
          <title>Placeholder</title>
          <rect width="100%" height="100%" fill="#eee"></rect><text x="50%" y="50%" fill="#aaa" dy=".3em"></text>
          </svg>

        </div>
      </div>

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-7">
          <h2 class="featurette-heading">Packaging yang rapih dan cepat<span class="text-muted"></span></h2>
          <p class="lead">Kami dapat melakukan packaging yang rapih dan cepat dan akan langsung dikirim ke lokasi anda</p>
        </div>
        <div class="col-md-5">
          <!-- <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false"> -->
          <!-- <img src="<?= Yii::$app->request->baseUrl; ?>/frontend/web/img/gudang3.jpg" class="d-block w-100" alt="Gambar Kain" height="200px" /> -->
          <!-- batas atas modal -->
          <img id="myImgGudang3" src="<?= Yii::$app->request->baseUrl; ?>/frontend/web/img/gudang3.jpg" alt="" class="d-block w-100" alt="Gambar Kain" height="200px" />

          <!-- The Modal -->
          <div id="myModal" class="modal">
            <span class="close">&times;</span>
            <img class="modal-content" id="img01">
            <div id="caption"></div>
          </div>

          <script>
            // Get the modal
            var modal = document.getElementById("myModal");

            // Get the image and insert it inside the modal - use its "alt" text as a caption
            var img = document.getElementById("myImgGudang3");
            var modalImg = document.getElementById("img01");
            var captionText = document.getElementById("caption");
            img.onclick = function() {
              modal.style.display = "block";
              modalImg.src = this.src;
              captionText.innerHTML = this.alt;
            }

            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];

            // When the user clicks on <span> (x), close the modal
            span.onclick = function() {
              modal.style.display = "none";
            }
          </script>
          <!-- batas bawah modal -->
          <title>Placeholder</title>
          <rect width="100%" height="100%" fill="#eee"></rect><text x="50%" y="50%" fill="#aaa" dy=".3em"></text>
          </svg>

        </div>
      </div>

      <hr class="featurette-divider">

      <!-- /END THE FEATURETTES -->

    </div>
    <!-- batas bawah front end social media -->



    <!-- Marketing messaging and featurettes
  ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <?php /*
      <div class="container marketing">
        <!-- START THE FEATURETTES -->

        <hr class="featurette-divider" />

        <div class="row featurette">
          <div class="col-md-7">
            <h2 class="featurette-heading">
              Kualitas kain.
            </h2>
            <p class="lead">
              Untuk kualitas kain sendiri kami menyediakan kualitas kain yang terbaik serta nyaman untuk digunakan
            </p>
          </div>
          <div class="col-md-5">
            <img
              src="<?= Yii::$app->request->baseUrl; ?>/frontend/web/img/kualitas.png"
              alt="Kualitas"
              class="featurette-image img-fluid mx-auto"
            />
          </div>
        </div>

        <hr class="featurette-divider" />

        <div class="row featurette">
          <div class="col-md-7 order-md-2">
            <h2 class="featurette-heading">
              Harga kain.
            </h2>
            <p class="lead">
              Serta untuk harganya sendiri kami menjualnya relatif terjangkau bagi masyarakat dan untuk bahan kainnya sendiri itu nyaman untuk dipakai seperti pembuatan baju dll.
            </p>
          </div>
          <div class="col-md-5 order-md-1">
            <img
              src="<?= Yii::$app->request->baseUrl; ?>/frontend/web/img/harga.jpg"
              alt="Kualitas"
              class="featurette-image img-fluid mx-auto"
            />
          </div>
        </div>

        <hr class="featurette-divider" />

        <div class="row featurette">
          <div class="col-md-7">
            <h2 class="featurette-heading">
              Tentang kami. 
            <p class="lead">
              Bandung, Jawa Barat Indonesia.
            </p>
          </div>
          <div class="col-md-5">
            <img
              src="img/lokasie.png"
              alt="Kualitas"
              class="featurette-image img-fluid mx-auto"
            />
          </div>
        </div>

        <hr class="featurette-divider" />

        <!-- /END THE FEATURETTES -->
      </div>
      <!-- /.container -->
      */ ?>

    <!-- FOOTER -->

    <!-- Footer -->
    <footer class="bg-dark text-center text-white">
      <!-- Grid container -->
      <div class="container p-4">
        <!-- Section: Social media -->
        <section class="mb-4">
          <!-- Facebook -->
          <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-facebook-f"></i></a>

          <!-- Twitter -->
          <!-- <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
        ><i class="fab fa-twitter"></i
      ></a> -->

          <!-- Google -->
          <!-- <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
        ><i class="fab fa-google">  domivatexmedia@gmail.com</i
      ></a> -->

          <!-- Instagram -->
          <a class="btn btn-outline-light btn-floating m-1" href="https://www.instagram.com/domivatexmedia/" role="button"><i class="fab fa-instagram"></i></a>

          <!-- Linkedin -->
          <a class="btn btn-outline-light btn-floating m-1" href="https://www.linkedin.com/in/domivatex-media-8300b9221/" role="button"><i class="fab fa-linkedin-in"></i></a>

          <!-- Github -->
          <!-- <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
        ><i class="fab fa-github"></i
      ></a> -->
        </section>
        <!-- Section: Social media -->

        <!-- Section: Form -->
        <?php /*
    <section class="">
      <form action="">
        <!--Grid row-->
        <div class="row d-flex justify-content-center">
          <!--Grid column-->
          <div class="col-auto">
            <p class="pt-2">
              <strong>Sign up for our newsletter</strong>
            </p>
          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-md-5 col-12">
            <!-- Email input -->
            <div class="form-outline form-white mb-4">
              <input type="email" id="form5Example2" class="form-control" />
              <label class="form-label" for="form5Example2">Email address</label>
            </div>
          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-auto">
            <!-- Submit button -->
            <button type="submit" class="btn btn-outline-light mb-4">
              Subscribe
            </button>
          </div>
          <!--Grid column-->
        </div>
        <!--Grid row-->
      </form>
    </section>
    */ ?>
        <!-- Section: Form -->

        <!-- Section: Text -->
        <section class="mb-4">
          <p>
            Stay Connected With Us
          </p>
        </section>
        <!-- Section: Text -->

        <!-- Section: Links -->
        <section class="">
          <!--Grid row-->
          <div class="row">
            <!--Grid column-->
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
              <h5 class="text-uppercase">Email</h5>

              <ul class="list-unstyled mb-0">
                <li>
                  <a href="https://mail.google.com/" class="text-white">domivatexmedia@gmail.com</a>
                </li>
                <!-- <li>
              <a href="#!" class="text-white">Link 2</a>
            </li>
            <li>
              <a href="#!" class="text-white">Link 3</a>
            </li>
            <li>
              <a href="#!" class="text-white">Link 4</a>
            </li> -->
              </ul>
            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
              <h5 class="text-uppercase">Contact</h5>

              <ul class="list-unstyled mb-0">
                <li>
                  <a href="#!" class="text-white">+6281234567890</a>
                </li>
                <!-- <li>
              <a href="#!" class="text-white">Link 2</a>
            </li>
            <li>
              <a href="#!" class="text-white">Link 3</a>
            </li>
            <li>
              <a href="#!" class="text-white">Link 4</a>
            </li> -->
              </ul>
            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
              <h5 class="text-uppercase">Address</h5>

              <ul class="list-unstyled mb-0">
                <li>
                  <a href="https://www.google.com/maps/place/PT.+Domivatex/@-6.9679019,107.55242,17z/data=!3m1!4b1!4m5!3m4!1s0x2e68ef213cfa5fc5:0x6932cb2d61d23df5!8m2!3d-6.9679072!4d107.5546087" class="text-white">blok E 12B no.38, Jl. Taman Kopo Indah 3, Mekar Rahayu, Margaasih, Bandung, West Java 40218</a>
                </li>
                <!-- <li>
              <a href="#!" class="text-white">Link 2</a>
            </li>
            <li>
              <a href="#!" class="text-white">Link 3</a>
            </li>
            <li>
              <a href="#!" class="text-white">Link 4</a>
            </li> -->
              </ul>
            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
              <h5 class="text-uppercase">Opening Hours</h5>

              <ul class="list-unstyled mb-0">
                <li>
                  <!-- <a href="#!" class="text-white">Link 1</a> -->

                </li>
                <li>
                  <!-- <a href="#!" class="text-white">Link 2</a> -->
                  <strong>
                    <p>Senin - Jum'at</p>
                  </strong>
                  <p>08:00 - 17:00</p>
                </li>
                <li>
                  <!-- <a href="#!" class="text-white">Link 2</a> -->
                  <strong>
                    <p>Sabtu</p>
                  </strong>
                  <p>08:00 - 16:00</p>
                </li>
                <!-- <li>
              <a href="#!" class="text-white">Link 3</a>
            </li>
            <li>
              <a href="#!" class="text-white">Link 4</a>
            </li> -->
              </ul>
            </div>
            <!--Grid column-->
          </div>
          <!--Grid row-->
        </section>
        <!-- Section: Links -->
      </div>
      <!-- Grid container -->

      <!-- Copyright -->
      <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        © 2017–2021 Copyright:
        <a class="text-white" href="http://domivatex.id/minierp/">Domivatex.id</a>
      </div>
      <!-- Copyright -->
    </footer>
    <!-- Footer -->

    <!-- <footer class="container">
<?php /*<p class="float-end"><a href="#">Back to top</a></p> */ ?>
        <p>&copy; 2017–2021 Makloon Kain. &middot;</p>
      </footer> -->
  </main>

  <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>