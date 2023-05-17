<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <title>| FitNess - Home |</title>
  <link rel="icon" href="cb.png" />

  <link rel="stylesheet" href="style.css" />
  <!-- Font Awesome Iocns cdn link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
  <link rel="stylesheet" type="text/css" href="../Styles-css/home.css" />
  <link rel="stylesheet" type="text/css"
    href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
</head>

<body>
  <header class="header">
    <a href="#" class="logo"> <i class="fas fa-dumbbell"></i>FitNess </a>
    <nav class="navbar">
      <a href="#">Home</a>
      <a href="#preview">Preview</a>
      <a href="#pricing">Pricing</a>
      <a href="#footer1">Contact Us</a>
      <a href="#">|</a>
      <a href="loginsignup.php" class="btn">Login</a>
    </nav>
  </header>

  <section class="home">
    <div class="max-width">
      <div class="home-content">
        <h3>
          help for ideal <br />
          body fitness
        </h3>
        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta,
          numquam, sequi assumenda nam, vel nihil repudiandae omnis eveniet
          est excepturi atque molestias at dolores fugit!
        </p>
        <a href="loginsignup.php"><button class="btn">Get started</button></a>
      </div>
      <div class="home-image">
        <img src="../Assets/p1.webp" alt="" />
      </div>
    </div>
  </section>
  <div class="image-preview">
    <div class="preview0" id="preview">
      <h1><i class="fas fa-dumbbell"></i> Take a Look at Our Gym</h1>
    </div>
    <section>
      <div class="preview">
        <div class="carousel">
          <div class="box">
            <img src="../Assets/g1.jpg" />
          </div>
          <div class="box">
            <img src="../Assets/g2.jpg" />
          </div>
          <div class="box">
            <img src="../Assets/g3.jpg" />
          </div>
          <div class="box">
            <img src="../Assets/g4.jpg" />
          </div>
          <div class="box">
            <img src="../Assets/g1.jpg" />
          </div>
        </div>
      </div>
    </section>
  </div>
  <script>
    $(document).ready(function () {
      $('.carousel').slick({
        slidesToShow: 4,
        slidesToScroll: 1
      });
    });
  </script>
  <div class="container" id="pricing">
    <h1>Choose Your Plan</h1>
    <div class="Price-row">
      <div class="price-col" data-tilt>
        <h4>1 Month</h4>
        <h3>$ 450</h3>
        <ul>
          <li>1 Month</li>
          <li>cardio</li>
          <li>nutrions included</li>
        </ul>
        <button style="margin-top: 110px">Subscribe</button>
      </div>
      <div class="price-col" data-tilt>
        <h4>6 Month</h4>
        <h3>$ 2500</h3>
        <ul>
          <li>6 Month</li>
          <li>private coach</li>
          <li>cardio</li>
          <li>nutritions included</li>
        </ul>
        <button style="margin-top: 70px">Subscribe</button>
      </div>
      <div class="price-col" data-tilt>
        <h4>1 Year</h4>
        <h3>$ 4500</h3>
        <ul>
          <li>12 Month</li>
          <li>private coach</li>
          <li>cardio</li>
          <li>online coaching</li>
          <li>nutritions included</li>
        </ul>
        <button>Subscribe</button>
      </div>
    </div>
  </div>
  <footer class="footer" id="footer1">
    <ul class="social-icon">
      <li class="social-icon__item">
        <a class="social-icon__link" href="https://www.facebook.com/" target="_blank">
          <ion-icon name="logo-facebook"></ion-icon>
        </a>
      </li>
      <li class="social-icon__item">
        <a class="social-icon__link" href="https://twitter.com/?lang=ar" target="_blank">
          <ion-icon name="logo-twitter"></ion-icon>
        </a>
      </li>
      <li class="social-icon__item">
        <a class="social-icon__link" href="https://www.instagram.com/" target="_blank">
          <ion-icon name="logo-instagram"></ion-icon>
        </a>
      </li>
    </ul>
    <ul class="menu">
      <li class="menu__item"><a class="menu__link" href="#">Home</a></li>
      <li class="menu__item"></li>
      <li class="menu__item"><a class="menu__link" href="#">Team</a></li>
      <li class="menu__item"></li>
    </ul>

    <p>&copy;2023 CB | All Rights Reserved</p>
  </footer>

  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>