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
    <link rel="stylesheet" href="styles/todo.css?v=<?php echo time(); ?>">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <title>Dashboard</title>
</head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<body>
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
                <a href="index.php">
                    <span class="material-icons-sharp">grid_view</span>
                    <h3>Dashboard</h3>
                </a>
                <a href="analytics.php">
                    <span class="material-icons-sharp">insights</span>
                    <h3>Analytics</h3>
                </a>
                <a class="active" href="todo.php">
                    <span  class="material-icons-sharp">task</span>
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
            <h1>Tasks</h1>
            <div class="date">
                <input id="date" type="date">
            </div>

            <div class="wrapper">
                <div class="task-input">
                    <img src="img/bars-icon.svg" alt="icon">
                    <input type="text" placeholder="Add a new task">
                </div>
                <div class="controls">
                    <div class="filters">
                        <span class="active" id="all">All</span>
                    </div>
                    <button class="clear-btn">Clear All</button>
                </div>
                <ul class="task-box"></ul>
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
        </div>
    </div>

<script src="todo.js"></script>
</body>
</html>
