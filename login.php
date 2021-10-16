<?php include "ligacao.php"; ?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="shortcut icon" href="images/logomini.png" type="image/png">
    <title>BeHuman - Login</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="login_registo/css/style.css">
</head>
<body>

    <div class="main">
	<figure><a href="index.php" ><img src="images/logo3.png" alt="sing up image"></a></figure>
        <!-- Login -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="images/caologin.png" alt="sing up image"></figure>
                        <a href="registo.php" class="signup-image-link">Regista-te agora!</a>
                    </div>

                    <div class="signin-form">
                        <br><p><h2 class="form-title">Bem-vindo!</h2></p>
                        <form method="POST" class="register-form" id="login-form" action="index.php?pagina=validar_login">
                            <div class="form-group">
                                <label for="email"><img src="images/email.png"/></i></label>
                                <input type="text" name="email_utilizador" id="email" placeholder="E-mail"/>
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><img src="images/lock.png"></i></label>
                                <input type="password" name="password_utilizador" id="your_pass" placeholder="Password"/>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="checkbox" />
                                <label for="remember-me" class="checkbox"><span><span></span></span></label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Login"/>
                            </div>
                        </form>
                        <div class="social-login">
                            <span class="social-label">Login com:</span>
                            <ul class="socials">
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"><img src="images/facebook.png"/></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"><img src="images/twitter.png"/></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-google"><img src="images/gmail.png"/></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="login_registo/vendor/jquery/jquery.min.js"></script>
    <script src="login_registo/js/main.js"></script>
	<link rel="stylesheet" href="login_registo/css/style.css" />
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>