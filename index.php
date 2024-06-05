<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Login</title>
</head>

<body>
    <main class="login-main">
        <div class="login-container">
            <div class="form-container" id="form-container">
                <div class="login-banner">
                    <h2>Access Your Account</h2>
                </div>
                <form action="auth.php" method="post">
                    <div class="input-group">
                        <input type="text" name="username" id="username" class="username" placeholder="Username" value="<?php if (isset($_COOKIE['username'])) echo $_COOKIE['username']; ?>">
                    </div>

                    <div class="input-group">
                        <input type="password" name="password" id="password" class="password" placeholder="Password" value="<?php if (isset($_COOKIE['password'])) echo $_COOKIE['password']; ?>">
                    </div>

                    <div class="erreur">
                        <?php
                        if (isset($_GET['err'])) {
                            if ($_GET['err'] == 1) {
                                echo "Please make sure to enter your informations corectly";
                            } else {
                                echo "Wrong Password please verify again.";
                            }
                        }
                        ?>
                    </div>

                    <div class="input-group remember-forgot">
                        <label for="rememberMe">
                            <input type="checkbox" name="rememberMe" id="rememberMe" value="1" checked> Remember me
                        </label>
                        <a href="#" class="forgot-password">Forgot password?</a>
                    </div>

                    <div class="input-group button-group">
                        <button type="submit" id="login-button">Login</button>
                    </div>
                    <div class="create-account">
                        <!-- Link to Signup Page -->
                        <a href="signup.php">Create account</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var formContainer = document.getElementById("form-container");
            formContainer.style.opacity = 0;
            formContainer.style.transition = "opacity 2s";
            formContainer.style.opacity = 1;
        });

        var loginButton = document.getElementById("login-button");
        loginButton.addEventListener("mouseover", function() {
            loginButton.style.backgroundColor = "#ff6ec7";
        });
        loginButton.addEventListener("mouseout", function() {
            loginButton.style.backgroundColor = "#a74ad1";
        });
    </script>
</body>

</html>
