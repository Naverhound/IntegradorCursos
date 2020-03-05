        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="./assets/fonts/material-icon/css/material-design-iconic-font.min.css">
    <!-- CSS Files -->
    <link rel="stylesheet" href="./css/style.css">
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="./assets/css/now-ui-dashboard.css?v=1.5.0" rel="stylesheet" />
</head>
<body>

    <div class="main">

        <!-- Sign up form -->
   <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <form  class="register-form" id="register-form">
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" placeholder="Nombre(s)"/>
                            </div>
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="lname" placeholder="Apellido(s)"/>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="example@gmail.com"/>
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pass" id="pass" placeholder="Password"/>
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="re_pass" id="re_pass" placeholder="Repetir password"/>
                            </div>
                            <div class="form-group mt-4"style="overflow: visible !important;">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="img" aria-describedby="inputGroupFileAddon04">
                                    <label class="custom-file-label" for="img">Avatar...</label>
                                </div>
                            </div>                                
                            <div class="form-group " style="overflow:visible !important;">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>Acepto lo expresado en <a href="#" class="term-service">Terminos de servicio</a></label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Registrarse"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="img/signup-image.jpg" alt="sing up image"></figure>
                        <a href="#" class="signup-image-link">Ya tengo cuenta</a>
                    </div>
                </div>
            </div>
        </section>

       

    </div>

    <!-- JS -->
    <script src="./js/vendor/jquery.min.js"></script>
    <script src="./js/forms.js"></script>
    <script src="./js/main.js"></script>
</body>
</html>