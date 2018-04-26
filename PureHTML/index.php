<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="manifest" href="site.webmanifest">
        <link rel="apple-touch-icon" href="icon.png">
        <!-- Place favicon.ico in the root directory -->

        <!-- Stylesheets -->
        <link rel="stylesheet" type="text/css" href="./css/normalize.css">
        <link rel="stylesheet" type="text/css" href="./css/main.css">
        <link rel="stylesheet" type="text/css" href="./design.css">
        <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Quicksand">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Ubuntu">
        <link rel="stylesheet" href="css/Login_form.css">
        <link rel="stylesheet" href="css/styles.css">

        <!-- Javascripts -->
        <script type="text/javascript" src="./js/bootstrap.min.js" ></script>
        <script type="text/javascript" src="./js/fading_moves.js"></script>

        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <link href="./css/ie10-viewport-bug-workaround.css" rel="stylesheet">


    </head>
    <body>
        <form id="login_form"
              style="   font-family:Quicksand, sans-serif;
                        background-color:rgba(44,40,52,0.73);
                        width:320px;
                        padding:40px;
                        position: absolute;
                        margin-left: 0;"
              method="post" action="php/login.php" >
            <h1 id="head">Login</h1>
            <div><img class="rounded img-fluid" src="img/logo.png" id="image" style="width:auto;height:auto;"></div>

            <div class="form-group">
                <input class="form-control" type="text" id="form2" name="umail" placeholder="Email">
            </div>
            <div class="form-group">
                <input class="form-control" type="password" id="form2" name="psw" placeholder="Password">
            </div>
            <button class="btn btn-light" type="submit" id="log_btn">Login</button><br>
            <button class="btn btn-light floginbutton" type="button" id="registerfade">Register</button>
            <a href="" id="link">Forgot your E-mail or password?</a>
        </form>
<!--///////////////////////////REGISTRATION//////////////////////////-->
        <form id="reg_form"
              style="   font-family:Quicksand, sans-serif;
                        background-color:rgba(44,40,52,0.73);
                        width:320px;
                        padding:40px;
                        position: absolute;
                        margin-left: 0;
                        margin-top: -5%;
                        display: none;"
              method="post" action="php/registration.php" >
            <h1 id="head">Register</h1>
            <div><img class="rounded img-fluid" src="img/logo.png" id="image" style="width:auto;height:auto;"></div>

            <div class="form-group">
                <input class="form-control" type="text" id="form2"       name="email" placeholder="Email (optional)">
            </div>
            <div class="form-group">
                <input class="form-control" type="text" id="form2"       name="school" placeholder="Schule (optional)">
            </div>
            <div class="form-group">
                <input class="form-control" type="text" id="form2"       name="class_" placeholder="Klasse (optional)">
            </div>
            <div class="form-group">
                <input class="form-control" type="text" id="form2"       name="uname" placeholder="Desired Username" required>
            </div>
            <div class="form-group">
                <input class="form-control" type="password" id="form2"   name="psw"  pattern="^\S{8,}$"
                       onchange="
                                this.setCustomValidity(
                                    this.validity.patternMismatch ? 'Password must be at least 8 characters long' : ''
                                );
                                if(this.checkValidity())
                                    form.psw2.pattern = this.value;
                       " placeholder="Password" required>
            </div>
            <div class="form-group">
                <input class="form-control" type="password" id="form2"  name="psw2" pattern="^\S{8,}$"
                       onchange="
                                this.setCustomValidity(
                                    this.validity.patternMismatch ? 'Passwords must match!' : ''
                                );"
                       placeholder="Confirm Password" required>
            </div>
            <div class="form-group">
                <input class="form-control" type="text" id="form2"      name="fname" placeholder="First Name" required>
            </div>
            <div class="form-group">
                <input class="form-control" type="text" id="form2"      name="lname" placeholder="Last Name" required>
            </div>


            <button class="btn btn-light" type="submit" id="reg_btn">Register</button><br>
            <button class="btn btn-light fregisterbtn" type="button" id="loginfade">Back to Login</button>
            <a href="" id="link">Forgot your E-mail or password?</a>
        </form>
<!--////////////////////////////REGISTRATION END///////////////////////-->
        <script src="js/vendor/modernizr-3.5.0.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-3.2.1.min.js"><\/script>')</script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/Pop-Out-Vertical-Nav-w-Footer--Social-Links--1.js"></script>

        <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
        <script>
            window.ga=function(){ga.q.push(arguments)};ga.q=[];ga.l=+new Date;
            ga('create','UA-XXXXX-Y','auto');ga('send','pageview')
        </script>
        <script src="https://www.google-analytics.com/analytics.js" async defer></script>


        <div style="
                    background: url('./img/back_login.png') no-repeat;
                    background-size: cover;
                    position: fixed;
                    width: 100%;
                    height: 100%;
                    top: 0;
                    left: 0;
                    z-index: -1;">
        </div>
    </body>
</html>
