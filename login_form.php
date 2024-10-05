<head>
    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <?php include 'user_login.php';?>
        <form action="login_form.php" method="post">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Login</button>
            <?php if (isset($error)) { echo "<p style='color: red;'>$error</p>"; } ?>
        </form>
    </div>
</body>