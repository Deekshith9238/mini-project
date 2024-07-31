<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_db"; // Updated database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare and execute SQL statement
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            // Store user info in session
            $_SESSION['user'] = $user;
            // Redirect to main.php
            header("Location: main.php");
            exit();
        } else {
            $_SESSION['login_error'] = "Invalid password.";
        }
    } else {
        $_SESSION['login_error'] = "Invalid email or password.";
    }

    // Redirect to main.php even if login fails
    header("Location: main.php");
    exit();
}

$conn->close();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="login.css">
    <title>Login Page</title>
</head>
<body>
    <form id="login-form" class="auth-form" method="POST" action="">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <img src="images/dotnet.png" alt="Image" class="img-fluid">
                    </div>
                    <div class="col-md-6 contents">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="mb-4">
                                    <h3>Login In</h3>
                                    <p class="mb-4">Login to your existing account</p>
                                </div>
                                <div class="form-group first">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                                <div class="form-group last mb-4">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                </div>
                                <div class="d-flex mb-5 align-items-center">
                                    <label class="control control--checkbox mb-0"><span class="caption">Remember me</span>
                                    <input type="checkbox" checked="checked">
                                    <div class="control__indicator"></div>
                                    </label>
                                    <span class="ml-auto"><a href="signup.php" class="forgot-pass"><em>Don't Have an account? Create one</em></a></span>
                                </div>
                                <input type="submit" value="Log In" class="btn btn-block btn-primary">
                                <span class="d-block text-left my-4 text-muted">&mdash; or login with &mdash;</span>
                                <div class="social-login">
                                    <a href="#" class="facebook">
                                    <span class="icon-facebook mr-3"></span>
                                    </a>
                                    <a href="#" class="twitter">
                                    <span class="icon-twitter mr-3"></span>
                                    </a>
                                    <a href="#" class="google">
                                    <span class="icon-google mr-3"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>
</html>
