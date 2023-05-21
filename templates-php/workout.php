<?php
session_start();
if (!isset($_SESSION['email']))
    header("Location: loginsignup.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Dashboard</title>
    <link rel="stylesheet" href="../Styles-css/workout.css" />
    <!-- Font Awesome Cdn Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
</head>

<body>
    <div class="container">
        <nav>
            <ul>
                <li><a href="#" class="logo">
                        <img src="../Assets/alexander-hipp-iEEBWgY_6lA-unsplash.jpg">
                        <span class="nav-item" id="name-field">Name</span>
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
                        <div class="text">
                            <h4>Chest</h4>
                        </div>
                        <div class="chest">
                            <img src="../Assets/chest.png" alt="">
                        </div>
                        <div class="workout" id="chest">
                            <ul>
                                <li>Bench Press</li>
                                <li>Push Ups</li>
                                <li>Incline DB press</li>
                                <li>Push Downs</li>
                                <li>DB Tricep Extensions</li>
                                <li>Shoulder Press</li>
                                <li>Slide Raises</li>
                            </ul>
                        </div>

                    </div>
                </div>

                <div class="price-col2" data-tilt id="price-col2">
                    <div class="text">
                        <h4>Back</h4>
                    </div>
                    <div class="back">
                        <img src="../Assets/back.png" alt="">
                    </div>
                    <div class="workout" id="back">
                        <ul>
                            <li>Lat Pulldown</li>
                            <li>Barbell Rows</li>
                            <li>Pull Ups</li>
                            <li>Prone Incline DB raise</li>
                            <li>Barbell Curls</li>
                            <li>Incline Hammer Curls</li>
                            <li>Spider Curls</li>
                        </ul>
                    </div>

                </div>
                <div class="price-col3" data-tilt>
                    <div class="text">
                        <h4>Legs</h4>
                    </div>
                    <div class="leg">
                        <img src="../Assets/legs.png" alt="">
                    </div>
                    <div class="workout" id="leg">
                        <ul>
                            <li>Front Squats</li>
                            <li>Back Squats</li>
                            <li>Leg Extensions</li>
                            <li>Leg Curls</li>
                            <li>Deadlifts</li>
                            <li>Leg Press</li>
                            <li>Lunges</li>

                        </ul>
                    </div>

                </div>


            </div>

        </div>

    </div>

    </div>
    </div>
    <?php
    echo "
    <script>
        namefield= document.getElementById('name-field');
        namefield.innerHTML=\"" . $_SESSION['first_name'] . "\";
    </script>
    ";
    //if logout button is pressed destroy the session( storage of user's data )
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