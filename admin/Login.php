<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include '../config/db.php';

    $username = $_POST['username'];
    $password = $_POST['password'];

    // Note: This SQL logic is preserved as requested, but consider using prepared statements 
    // in the future to prevent SQL Injection.
    $sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows === 1) {
        $_SESSION['admin'] = $username;
        header("Location: index.php");
    } else {
        $error = "Invalid Username or Password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Access</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
            /* Dark space background */
            background-color: #000;
            background-image: radial-gradient(circle at center, #111 0%, #000 100%);
            font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
            overflow: hidden;
        }

        /* Optional: Subtle star effect using CSS */
        body::before {
            content: "";
            position: absolute;
            width: 100%;
            height: 100%;
            background-image: 
                radial-gradient(white, rgba(255,255,255,.2) 2px, transparent 3px),
                radial-gradient(white, rgba(255,255,255,.15) 1px, transparent 2px),
                radial-gradient(white, rgba(255,255,255,.1) 2px, transparent 3px);
            background-size: 550px 550px, 350px 350px, 250px 250px;
            background-position: 0 0, 40px 60px, 130px 270px;
            opacity: 0.1; 
            z-index: -1;
        }

        .login-card {
            background: #0a0a0a; /* Very dark grey card */
            padding: 40px;
            border-radius: 16px;
            border: 1px solid #222;
            width: 400px;
            text-align: center;
            box-shadow: 0 0 40px rgba(0, 0, 0, 0.8);
            position: relative;
        }

        /* The Shield Icon Container */
        .icon-container {
            width: 60px;
            height: 60px;
            margin: 0 auto 20px auto;
            background: rgba(37, 99, 235, 0.1); /* Faint blue background */
            border-radius: 12px;
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: 0 0 15px rgba(37, 99, 235, 0.2);
        }

        .icon-container i {
            font-size: 28px;
            color: #3b82f6; /* Bright Blue */
        }

        .login-card h2 {
            margin: 0;
            font-size: 24px;
            font-weight: 600;
            color: #fff;
        }

        .login-card p.subtitle {
            margin-top: 8px;
            margin-bottom: 35px;
            color: #666;
            font-size: 14px;
        }

        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        .form-group label {
            display: block;
            font-size: 11px;
            font-weight: 700;
            color: #3b82f6; /* Blue Label */
            margin-bottom: 8px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .input-wrapper {
            position: relative;
        }

        .input-wrapper i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #555;
            font-size: 14px;
        }

        .input-wrapper input {
            width: 100%;
            padding: 14px 14px 14px 45px; /* Left padding for icon */
            background-color: #050505;
            border: 1px solid #333;
            border-radius: 8px;
            color: #fff;
            font-size: 14px;
            outline: none;
            transition: border-color 0.3s ease;
        }

        .input-wrapper input:focus {
            border-color: #3b82f6;
        }

        .input-wrapper input::placeholder {
            color: #444;
        }

        button {
            width: 100%;
            padding: 14px;
            background: linear-gradient(to right, #3b82f6, #2563eb);
            border: none;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            color: white;
            cursor: pointer;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-top: 10px;
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.3);
            transition: all 0.3s ease;
        }

        button:hover {
            background: linear-gradient(to right, #2563eb, #1d4ed8);
            box-shadow: 0 6px 16px rgba(37, 99, 235, 0.4);
            transform: translateY(-1px);
        }

        .error {
            background: rgba(220, 53, 69, 0.1);
            color: #ff6b6b;
            padding: 10px;
            border-radius: 6px;
            font-size: 13px;
            margin-top: 15px;
            border: 1px solid rgba(220, 53, 69, 0.2);
        }

        .footer-text {
            margin-top: 30px;
            font-size: 12px;
            color: #444;
        }

        /* Responsive */
        @media (max-width: 450px) {
            .login-card {
                width: 90%;
                padding: 30px 20px;
            }
        }
    </style>
</head>
<body>

<div class="login-card">
    <div class="icon-container">
        <i class="fas fa-shield-alt"></i>
    </div>

    <h2>Admin Access</h2>
    <p class="subtitle">Enter your credentials to continue</p>

    <form method="post" action="">
        
        <div class="form-group">
            <label>USERNAME</label>
            <div class="input-wrapper">
                <i class="fas fa-user"></i>
                <input type="text" name="username" placeholder="Enter username" required>
            </div>
        </div>

        <div class="form-group">
            <label>PASSWORD</label>
            <div class="input-wrapper">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" placeholder="••••••••" required>
            </div>
        </div>

        <button type="submit">Login Dashboard</button>

        <?php if (isset($error)) echo "<div class='error'>$error</div>"; ?>
    </form>

    <div class="footer-text">
        Protected System. Unauthorized access is prohibited.
    </div>
</div>

</body>
</html>