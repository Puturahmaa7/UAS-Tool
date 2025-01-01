<?php
// Koneksi ke database
$host = 'localhost';
$user = 'root';
$password = ''; 
$dbname = 'db_dinosaur'; 

$conn = new mysqli($host, $user, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Proses Login
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['username'], $_POST['password']) && !isset($_POST['email'])) {
    $username = $conn->real_escape_string($_POST['username']);
    $password = $conn->real_escape_string($_POST['password']);

    $query = "SELECT * FROM users WHERE username = '$username' AND password = MD5('$password')";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        echo "<script>alert('Login successful!');</script>";
    } else {
        echo "<script>alert('Wrong username or password! Register if you are logging in for the first time');</script>";
    }
}

// Proses Registrasi
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['email'], $_POST['confirm_password'])) {
    $username = $conn->real_escape_string($_POST['username']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = $conn->real_escape_string($_POST['password']);
    $confirm_password = $conn->real_escape_string($_POST['confirm_password']);

    if ($password !== $confirm_password) {
        echo "<script>alert('Password and password confirmation do not match!');</script>";
    } else {
        $query = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', MD5('$password'))";
        if ($conn->query($query) === TRUE) {
            echo "<script>alert('Registration successful! Now you can login.');</script>";
        } else {
            echo "<script>alert('Registration failed: " . $conn->error . "');</script>";
        }
    }
}


$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login and Register</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="container" id="container">
        <div class="form-container login-container">
            <form action="" method="post">
                <h1>Login</h1>
                <input type="text" placeholder="Username" name="username" required>
                <input type="password" placeholder="Password" name="password" required>
                <button type="submit">Login</button>
                <p>
                    Don't have an account?
                    <a href="#" id="registerBtn">Click here to register</a>
                </p>
            </form>
        </div>
        <div class="form-container register-container">
            <form action="" method="post">
                <h1>Register</h1>
                <input type="text" placeholder="Username" name="username" required>
                <input type="email" placeholder="Email" name="email" required>
                <input type="password" placeholder="Password" name="password" required>
                <input type="password" placeholder="Confirm Password" name="confirm_password" required>
                <button type="submit">Register</button>
                <p>
                    Already have an account?
                    <a href="#" id="loginBtn">Click here to login</a>
                </p>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Welcome to our website!</h1>
                    <p>Join us and unlock a world of opportunities waiting for you.</p>
                    <a href="yanginibeneran.php">Back</a> 
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Hello, welcome back!</h1>
                    <p>Log in to your account continue your journey with us</p>
                    <a href="yanginibeneran.php">Back</a> 
                </div>
            </div>
        </div>
    </div>
    <script src="login.js"></script>
</body>
</html>
