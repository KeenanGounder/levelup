<?php 
  session_start(); 
  
  if (!isset($_SESSION['name'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['name']);
  	header("location: login.php");
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/dashboard.css?v=<?php echo time(); ?>">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <title>Dashboard</title>
</head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<body>
    <div id="modal-container" class="modal-container">
        <div class="modal">
            <h2>Welcome!</h2>
            <p>Focus on what truly matters with LevelUp. Build the best version of yourself by mastering your habits.
            </p>
            <button id="pop-btn" class="pop-btn">Continue</button>
        </div>
        <div class="modal q1">
            <h2>Sleep</h2>
            <p>How many hours of sleep do you get?</p>
            <input type="text" placeholder="Enter Hours here:">
            <button id="pop-btn" class="pop-btn_1">Continue</button>
        </div>
        <div class="modal q2">
            <h2>Water</h2>
            <p>How many glasses of water do you drink? </p>
            <input type="text" placeholder="Enter glasses here:">
            <button id="pop-btn" class="pop-btn_2">Continue</button>
        </div>
        <div class="modal q3">
            <h2>Excercise</h2>
            <p>How many minutes do you spend exercising? </p>
            <input type="text" placeholder="Enter minutes here:">
            <button id="pop-btn" class="pop-btn_3">Continue</button>
        </div>
        <div class="modal q4">
            <h2>Building Habits</h2>
            <div class="loader"></div>
            <button id="pop-btn" class="pop-btn_4">Continue</button>
        </div>
    </div>
    <div class="container">
        <aside>
            <div class="top">
                <div class="logo">
                    <img src="img/logo.png">
                    <h2>Level Up</h2>
                </div>
                <div class="close" id="close-btn">
                    <span class="material-icons-sharp">close</span>
                </div>
            </div>
            <div class="sidebar">
                <a class="active" href="index.php">
                    <span class="material-icons-sharp">grid_view</span>
                    <h3>Dashboard</h3>
                </a>
                <a href="analytics.php">
                    <span class="material-icons-sharp">insights</span>
                    <h3>Analytics</h3>
                </a>
                <a href="todo.php">
                    <span class="material-icons-sharp">task</span>
                    <h3>Tasks</h3>
                </a>
                <a href="shop.php">
                    <span class="material-icons-sharp">shopping_bag</span>
                    <h3>Shop</h3>
                </a>
                <a href="messages.php">
                    <span class="material-icons-sharp">mail_outline</span>
                    <h3>Messages</h3>
                    <span class="message-count">0</span>
                </a>
                <a href="settings.php">
                    <span class="material-icons-sharp">settings</span>
                    <h3>Settings</h3>
                </a>
                <?php  if (isset($_SESSION['name'])) : ?>
                <a href="index.php?logout='1'">
                    <span class="material-icons-sharp">logout</span>
                    <h3>Logout</h3>
                    <?php endif ?>
                </a>
            </div>
        </aside>
        <!--------------------------------Main section------------------>
        <main>
            <h1>Dashboard</h1>
            <div class="date">
                <input id="date" type="date">
            </div>

            <div class="insights">
                <div class="water">
                    <span class="material-icons-sharp">water_drop</span>
                    <div class="middle">
                        <div class="left">
                            <h3>Total Water Intake:</h3>
                            <h1 id="water_ml">0ml</h1>
                        </div>
                        <div class="progress">
                            <svg>
                                <circle cx='38' cy='38' r='38'></circle>
                                <circle id="water_percent" cx='38' cy='38' r='38'></circle>
                            </svg>
                            <div class="number">
                                <p id="water_perc_num">0%</p>
                            </div>
                        </div>
                    </div>
                    <small class="text-muted">Last 24 Hours</small>
                </div>

                <div class="sleep">
                    <span class="material-icons-sharp">hotel</span>
                    <div class="middle">
                        <div class="left">
                            <h3>Total Hours of Sleep</h3>
                            <h1 id="hours_display">0h</h1>
                        </div>
                        <div class="progress">
                            <svg>
                                <circle cx='38' cy='38' r='38'></circle>
                                <circle id="sleep_percent" cx='38' cy='38' r='38'></circle>
                            </svg>
                            <div class="number">
                                <p id="sleep_perc_num">0%</p>
                            </div>
                        </div>
                    </div>
                    <small class="text-muted">Last 24 Hours</small>
                </div>

                <div class="excercise">
                    <span class="material-icons-sharp">fitness_center</span>
                    <div class="middle">
                        <div class="left">
                            <h3>Minutes of Excercise</h3>
                            <h1 id="min_exc">0m</h1>
                        </div>
                        <div class="progress">
                            <svg>
                                <circle cx='38' cy='38' r='38'></circle>
                                <circle id="exc_percent" cx='38' cy='38' r='38'></circle>
                            </svg>
                            <div class="number">
                                <p id="exc_percent_num">0%</p>
                            </div>
                        </div>
                    </div>
                    <small class="text-muted">Last 24 Hours</small>
                </div>
            </div>
            <div class="bottom">
                <div class="char">
                    <img src="char.png">
                    <div class="level">
                        <h2 id="level">Level 1</h2>
                        <progress id="progress_bar" max="100" value="0">    
                        </progress>
                    </div>
                </div>
                <div class="tasks">
                    <div class="task drink">
                        <div class="icon">
                            <span class="material-icons-sharp">water_drop</span>
                        </div>
                        <div class="right">
                            <div class="info">
                                <h3>Drink 8 glasses of water</h3>
                                <small id="water_inc" class="text-muted">0/8</small>
                            </div>
                            <div class="xp">
                                <p>+5 XP</p>
                            </div>
                            <button class="water_task">Complete</button>
                        </div>
                    </div>
                    <div id="sleeping" class="task sleep">
                        <div class="icon">
                            <span class="material-icons-sharp">hotel</span>
                        </div>
                        <div class="right">
                            <div class="info">
                                <h3>How many hours of sleep?</h3>
                                <input id="sleep_hours" type="textbox" placeholder="Enter Hours Here:">
                            </div>
                            <div class="xp">
                                <p>+5 XP</p>
                            </div>
                            <button class="sleep_task">Complete</button>
                        </div>
                    </div>
                    <div class="task gym">
                        <div class="icon">
                            <span class="material-icons-sharp">fitness_center</span>
                        </div>
                        <div class="right">
                            <div class="info">
                                <h3>Complete Daily Excercise</h3>
                                <small class="text-muted">0/1</small>
                            </div>
                            <div class="xp">
                                <p>+5 XP</p>
                            </div>
                            <button class="excercise_task">Complete</button>
                        </div>
                    </div>
                    <div id="add_task" class="task custom">
                        <div>
                            <span class="material-icons-sharp">add</span>
                            <a href="todo.php"><h3>Add Task</h3></a>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <!----------right-->
        <div class="right">
            <div class="top">
                <button id="menu-btn">
                    <span class="material-icons-sharp">menu</span>
                </button>
                <div class="theme-toggle">
                    <span id="light" class="material-icons-sharp active">light_mode</span>
                    <span class="material-icons-sharp">dark_mode</span>
                </div>
                <div class="profile">
                    <div class="info">
                    <?php  if (isset($_SESSION['name'])) : ?>
                        <p>Hey, <b><?php echo $_SESSION['name'];?></b> </p>
                        <small>User</small>
                    <?php endif ?>
                    </div>
                    <div class="profile-photo">
                        <img src="def.png">
                    </div>
                </div>
            </div>
            <!----------------end-->
            <div class="recent-updates">
                <h2>Completed Tasks</h2>
                <div class="updates">
                    <div id="activity" class="no_data">
                        <h3>No Data Available</h3>
                    </div>
                </div>
            </div>
            <!----------------Bottom right-->
            <div class="chart">
                <h2>Analytics</h2>
                <div class="chart-box">
                    <canvas id="myChart"></canvas>
                </div>
                
            </div>
        </div>
    </div>
    <script>
        let today = new Date().toISOString().slice(0, 10)
        document.getElementById("date").value = today;
        var xValues = ["Water", "Sleep", "Excercise"];
        var yValues = [33.33,33.33,33.33];
        var barColors = [
          "#7380ec",
          "#41f1b6",
          "#ff7782"

        ];
        
        new Chart("myChart", {
          type: "pie",
          data: {
            labels: xValues,
            datasets: [{
              backgroundColor: barColors,
              data: yValues
            }]
          },
          options: {
            title: {
              display: true,
              text: "Importance of Tasks"
              
            }
          }
        });
        </script>
        <script src="menu.js"></script>

        <?php
            if($_SESSION['login']){
        
                echo "<script>
                const bg = document.querySelector('.modal-container');
                bg.classList.add('active');
                </script>";
                echo '<script src="dashboard.js?v="+ Date.now() + Math.random()></script>';
                // display user data
            }
            else if(!$_SESSION['login']){
                echo "<script>
                const popScreen = document.querySelector('.modal');
                const closebtn = document.querySelector('#pop-btn');
                const q1 = document.querySelector('.q1');
                const close_1 = document.querySelector('.pop-btn_1')
                const q2 = document.querySelector('.q2');
                const close_2 = document.querySelector('.pop-btn_2')
                const q3 = document.querySelector('.q3');
                const close_3 = document.querySelector('.pop-btn_3')
                const q4 = document.querySelector('.q4');
                const close_4 = document.querySelector('.pop-btn_4')
                const bg = document.querySelector('.modal-container');

                

                closebtn.addEventListener('click',()=>{
                    popScreen.classList.add('active');
                    //hours_display = window.localStorage.getItem('hours');
                    
                })
                
                close_1.addEventListener('click',()=>{
                    q1.classList.add('active');
                })
                
                close_2.addEventListener('click',()=>{
                    q2.classList.add('active');
                })
                
                close_3.addEventListener('click',()=>{
                    q3.classList.add('active');
                })
                
                close_4.addEventListener('click',()=>{
                    q4.classList.add('active');
                    bg.classList.add('active');
                })

                </script>";
                $_SESSION['login'] = true;
                // display quiz pop up
                echo '<script src="dashboard.js?v="+ Date.now() + Math.random()></script>';

            }
        ?>
</body>
</html>
