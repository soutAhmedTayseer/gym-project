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
    <link rel="stylesheet" href="../Styles-css/profile.css" />
    <!-- Font Awesome Cdn Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <script src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.0/dist/chart.umd.min.js"></script>
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
                    <div id="price-col1" class="price-col1" data-tilt>
                        <h2>Your Streak</h2>
                        <p style="color:#121313b0;margin-bottom:20px;">This graph shows the number of consecutive days
                            you have attended the gym</p>
                        <canvas id="streak" width="425" height="285"></canvas>
                    </div>
                </div>
                <script type="text/javascript">
                    var ctx = document.getElementById("streak");

                    const config = {
                        type: "line",
                        data: {
                            labels: ["HTML", "CSS", "JAVASCRIPT", "CHART.JS", "JQUERY", "BOOTSTRP"],
                            datasets: [{
                                label: "online tutorial subjects",
                                data: [20, 40, 30, 35, 30, 20],
                                backgroundColor: ['coral', 'aqua', 'pink', 'lightgreen', 'lightblue', 'crimson'],
                                borderColor: [
                                    "black",
                                ],
                                borderWidth: 1,
                                pointRadius: 0,
                            }],
                        },
                        options: {
                            responsive: false,
                            animations: {
                                tension: {
                                    duration: 750,
                                    easing: 'easeInQuad',
                                    from: 0.2,
                                    to: 0,
                                    loop: true
                                }
                            },
                            scales: {
                                y: {
                                    min: 0,
                                    max: 45,
                                }
                            }
                        }
                    };
                    var ActivityChart = new Chart(ctx, config);

                </script>
                <div id="price-col2" class="price-col2" data-tilt>
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
                <div id="price-col3" class="price-col3" data-tilt>
                    <div class="h_leaderboard">
                        <div class="player1">
                        <img class="first" src="../Assets/first.png" alt="" style="    width: 50px; transform: translate(-10px, -7px);">
                        <div class="names">
                        <h6>Moatasem Mohamed</h6>
                        </div>

                        </div>
                        <div class="player2">
                        <img class="first" src="../Assets/second.png" alt="" style="    width: 50px; transform: translate(-10px, -7px);">
                        <div class="names">
                        <h6>Moatasem Mohamed</h6>
                        </div>

                        </div>
                        <div class="player3">
                        <img class="first" src="../Assets/third.png" alt="" style="    width: 50px; transform: translate(-10px, -7px);">
                        <div class="names">
                        <h6>Moatasem Mohamed</h6>
                        </div>

                        </div>
                        <div class="player4">
                            <h6 style=" color: black; font-size: 20px;font-weight: 600;">4th</h6>
                            <div class="name">
                        <h6>Moatasem Mohamed</h6>
                        </div>

                        </div>
                        <div class="player5">
                        <h6 style=" color: black; font-size: 20px;font-weight: 600;">5th</h6>
                        <div class="name">
                        <h6>Moatasem Mohamed</h6>
                        </div>
                        

                        </div>
                        <div class="player6">
                        <h6 style=" color: black; font-size: 20px;font-weight: 600;">6th</h6>
                        <div class="name">
                        <h6>Moatasem Mohamed</h6>
                        </div>

                        </div>
                        <div class="player7">
                        <h6 style=" color: black; font-size: 20px;font-weight: 600;">7th</h6>
                        <div class="name">
                        <h6>Moatasem Mohamed</h6>
                        </div>

                        </div>
                        <div class="player8">
                        <h6 style=" color: black; font-size: 20px;font-weight: 600;">8th</h6>
                        <div class="name">
                        <h6>Moatasem Mohamed</h6>
                        </div>

                        </div>
                        <div class="player9">
                        <h6 style=" color: black; font-size: 20px;font-weight: 600;">9th</h6>
                        <div class="name">
                        <h6>Moatasem Mohamed</h6>
                        </div>

                        </div>
                        <div class="player10">
                        <h6 style=" color: black; font-size: 20px;font-weight: 600;">10th</h6>
                        <div class="name">
                        <h6>Moatasem Mohamed</h6>
                        </div>

                        </div>
                    </div>
                    <div class="leaderboard">
                        <h1>Leaderboard</h1>

                    </div>
                    <div class="x_leaderboard">
                    <!-- <i id="trophy" class="fas fa-trophy fa-lg (100% increase)" style="color: #ffd700 ;"></i> -->
                            <img class="trophy" src="../Assets/trophy.png" alt="">
                    </div>
                </div>
                <div id="price-col4" class="price-col4" data-tilt>
                    <div class="membership">
                        <div class="membership_h">
                            <h2 class="hmember">Membership</h2>
                            <div class="content">
                        <p>start date:</p>
                        <p>end date:</p>
                        
                        </div>

                        </div>
                    
                    </div>
                    <div class="streak">
                        <div class="streak_h">
                        <h2 class="hstreak">Streak</h2>
                        <div class="content">
                        <p>longest presence streak:</p>
                        <p>longest absence streak:</p>
                        
                        </div>

                        </div>
                    
                    </div>
                    <div class="extra">
                        <div class="extra_h">
                        <h2 class="hextra">Extra</h2>
                        <div class="content">
                        <p>First date at the gym:</p>
                        <p>anniversary:</p>
                        
                        </div>

                        </div>
                    
                    </div>
                </div>

                <div id="price-col5" class="price-col5" data-tilt>
                    <h2>Your Activity</h2>
                    <p style="color:#121313b0;margin-bottom:20px;">This graph shows your activity in comparison to
                        others.</p>
                    <canvas id="compare" width="900" height="600"></canvas>
                </div>
                <script type="text/javascript">
                    var ac = document.getElementById("compare");
                    let delayed;
                    const trainees_data = {
                        labels: ["P1", "P2", "P3", "You", "P5", "P6"],
                        datasets: [
                            {
                                label: '# of trainees',
                                data: [105, 124, 78, 91, 62, 56],
                                backgroundColor: ['rgba(18, 19, 19, 0.2)',
                                    'rgba(18, 19, 19, 0.2)',
                                    'rgba(18, 19, 19, 0.2)',
                                    'rgba(215, 3, 56,0.2)',
                                    'rgba(18, 19, 19, 0.2)',
                                    'rgba(18, 19, 19, 0.2)'
                                ],

                                borderColor: [
                                    'rgba(18, 19, 19, 1)',
                                    'rgba(18, 19, 19, 1)',
                                    'rgba(18, 19, 19, 1)',
                                    'rgba(215, 3, 56, 1)',
                                    'rgba(18, 19, 19, 1)',
                                    'rgba(18, 19, 19, 1)'
                                ],
                                borderWidth: 1
                            }
                        ]
                    }
                    var CompareChart = new Chart(ac, {
                        type: 'bar',
                        data: trainees_data,
                        options: {
                            animation: {
                                onComplete: () => {
                                    delayed = true;
                                },
                                delay: (context) => {
                                    let delay = 0;
                                    if (context.type === 'trainee_data' && context.mode === 'default' && !delayed) {
                                        delay = context.dataIndex * 300 + context.datasetIndex * 100;
                                    }
                                    return delay;
                                },
                            },
                            scales: {
                                x: {
                                    stacked: true,
                                },
                                y: {
                                    stacked: true
                                },
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true
                                    }
                                }]
                            }
                        }
                    });
                </script>
                <div id="price-col6" class="price-col6" data-tilt>
                </div>
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
    echo "
    <script>
        var qrcode = new QRCode(\"price-col6\", {
        text: \"ID: " . $_SESSION['trainee_id'] . " Name: " . $_SESSION['first_name'] . " " . $_SESSION['last_name'] . " Email: " . $_SESSION['email'] . "\",
        width: 460,
        height: 400,
        colorDark: \"#000000\",
        colorLight: \"#ffffff\",
        correctLevel: QRCode.CorrectLevel.H
    });
</script>
    ";
    ?>
</body>

</html>