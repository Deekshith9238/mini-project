<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$servername = "videodb.mysql.database.azure.com";
$username = "video";
$password = "Deeku@130404";
$dbname = "user_db"; // Updated database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Check if email already exists
    $checkEmailStmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $checkEmailStmt->bind_param("s", $email);
    $checkEmailStmt->execute();
    $result = $checkEmailStmt->get_result();
    
    if ($result->num_rows > 0) {
        echo "Email already exists. Please use a different email.";
    } else {
        $stmt = $conn->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $email, $password);

        if ($stmt->execute()) {
            echo "New record created successfully";
            header("Location: login.html");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    }

    $checkEmailStmt->close();
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
<link rel="stylesheet" href="sign.css">
<title>Sign Up Page</title>
</head>
<body>
    <form id="signup-form" class="auth-form" method="POST" action="">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <img src="./images/dotnet.png" alt="Image" class="img-fluid">
                    </div>
                    <div class="col-md-6 contents">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="mb-4">
                                    <h3>Sign Up</h3>
                                    <p class="mb-4">Create a new Account</p>
                                </div>
                                <div class="form-group first">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                                <div class="form-group last mb-4">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                </div>
                                <input type="submit" value="Sign Up" class="btn btn-block btn-primary">
                                <span class="d-block text-left my-4 text-muted">&mdash; or signup with &mdash;</span>
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
