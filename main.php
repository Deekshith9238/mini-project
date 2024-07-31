<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

// Get user info from session
$user = $_SESSION['user'];

// Check for login errors
$loginError = isset($_SESSION['login_error']) ? $_SESSION['login_error'] : '';
unset($_SESSION['login_error']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
    <link rel="stylesheet" href="main.css" type="text/css">
</head>
<body>
    <div id="main-screen">
        <header>
            <div class="container">
                <h1>Welcome to Video Conference</h1>
                <nav>
                    <ul>
                        <li><button onclick="showProfile()">Profile</button></li>
                        <li><button onclick="logout()">Logout</button></li>
                    </ul>
                </nav>
            </div>
        </header>

        <main class="container">
            <div class="left-column">
                <section id="dashboard" class="active">
                    <h2>Dashboard</h2>
                    <h3>Video Call</h3>
                    <button class="btn" onclick="location.href='generate.html'">Create Video Call</button>
                    <button class="btn" onclick="location.href='join.html'">Join Video Call</button>
                    
                    <h3>Voice Call</h3>
                    <button class="btn" onclick="location.href='generate.html'">Create Voice Call</button>
                    <button class="btn" onclick="location.href='join.html'">Join Voice Call</button>
                </section>
            </div>
            <div class="right-column">
                <img src="undraw_remotely_2j6z.png" alt="Video Conference Image" class="conference-image">
            </div>
        </main>

        <?php if ($loginError): ?>
        <div class="alert alert-danger">
            <?php echo $loginError; ?>
        </div>
        <?php endif; ?>
    </div>

    <script>
        function showProfile() {
            location.href = "profile.php";
        }

        function logout() {
            window.location.href = "logout.php";
        }
    </script>
</body>
</html>
