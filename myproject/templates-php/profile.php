<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Dashboard</title>
    <link rel="stylesheet" href="../Styles-css/profile.css" />
    <!-- Font Awesome Cdn Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
</head>

<body>
    <div class="container">
        <nav>
            <ul>
                <li><a href="#" class="logo">
                        <img src="../Assets/alexander-hipp-iEEBWgY_6lA-unsplash.jpg">
                        <span class="nav-item">Name</span>
                    </a></li>
                <li><a href="profile.php">
                        <i class="fas fa-user"></i>
                        <span class="nav-item">Profile</span>
                    </a></li>
                <li><a href="workout.php">
                        <i class="fas fa-dumbbell"></i>
                        <span class="nav-item">Workout</span>
                    </a></li>

                <li><a href="#">
                        <i class="fas fa-heartbeat"></i>
                        <span class="nav-item">Recovery</span>
                    </a></li>
                <li><a href="acc-settings.php">
                        <i class="fas fa-cog"></i>
                        <span class="nav-item">Settings</span>
                    </a></li>

                <li>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                        <button name="logout-btn" class="logout" id="logout-btn">
                            <i class="fas fa-sign-out-alt"></i>
                            <span class="nav-item">Log out</span>
                        </button>
                    </form>
                </li>

            </ul>
        </nav>
        <div>
            <div class="containers" id="pricing">
                <div class="Price-row">
                    <div class="price-col1" data-tilt>

                    </div>
                </div>
                <div class="price-col2" data-tilt>
                    <div id="subscription">
                        <h2 class="h-sub">Subscription</h2>
                        <div class="circular-progress">
                            <span class="progress-value">100</span>
                        </div>
                        <span class="text">Remaining To Renew</span>

                        <!-- JavaScript -->
                        <script>
                            let circularProgress = document.querySelector(".circular-progress"),
                                progressValue = document.querySelector(".progress-value");
                            let progressStartValue = 0,
                                progressEndValue = 28,
                                speed = 50;

                            let progress = setInterval(() => {
                                progressStartValue++;
                                progressValue.textContent = `${progressStartValue}` + " days";
                                circularProgress.style.background = `conic-gradient(#121313  ${progressStartValue * 10.5
                                    }deg, #f2ededa1 0deg)`;
                                if (progressStartValue == progressEndValue) {
                                    clearInterval(progress);
                                }
                            }, speed);
                        </script>
                        <script src="js/script.js"></script>
                    </div>
                </div>
                <div class="price-col3" data-tilt>

                </div>
                <div class="price-col4" data-tilt>
                </div>

            </div>

        </div>
    </div>

    </div>
    </div>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['logout-btn'])) {
            session_destroy();
            echo "<script>
		window.location.href= 'index.php';
		</script>";
        }
    }
    ?>
</body>

</html>