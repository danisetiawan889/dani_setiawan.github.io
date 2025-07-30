<?php
session_start();

$host = "localhost";
$username = "root";
$password = "";
$database = "dani_db";

$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Cek apakah email dan password dikirim
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Validasi format email umum
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Format email tidak valid!";
            exit;
        }

        // Validasi domain tertentu (misalnya hanya @gmail.com)
        $allowed_domain = 'gmail.com';
        $email_parts = explode('@', $email);
        if (count($email_parts) !== 2 || strtolower($email_parts[1]) !== $allowed_domain) {
            echo "Hanya email dengan domain @$allowed_domain yang diperbolehkan.";
            exit;
        }

        // Cek apakah email ada di database
        $query = $conn->prepare("SELECT * FROM registrasi_user WHERE email = ?");
        $query->bind_param("s", $email);
        $query->execute();
        $result = $query->get_result();

        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();

            // Verifikasi password
            if (password_verify($password, $user['password'])) {
                if ($user['is_verified'] == 1) {
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['email'] = $user['email'];

                    header("Location: portopolio1.2.php");
                    exit;
                } else {
                    echo "Email Anda belum diverifikasi. Silakan cek inbox email.";
                }
            } else {
                echo "Password salah!";
            }
        } else {
            echo "Email tidak ditemukan!";
        }
    } else {
        echo "Email dan password harus diisi.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <div class="login-container">
        <form action="portopolio1.3.php" method="post">
            <h2>Login Form</h2>
            
            <label for="email">Email:</label>
            <input type="text" id="email" name="email" required>
            
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
