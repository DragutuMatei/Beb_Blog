<?php
// session_start();
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <!-- <link rel="stylesheet" href="./assets/css/registerstyle.css" /> -->
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/login.css">
    <title>My mind is a mess</title>


</head>

<body>
   <?php
    require_once './core/init.php';
    require_once './components/navbar.php';
     ?>

    <img class="wave" src="./assets/img/wave.png">
    <div class="container">
        <div class="img">
            <img src="./assets/img/bg.svg">
        </div>
        <div class="login-content">
            <form method="POST">
                <?php
                require_once './core/init.php';
                $user = new User();

                if ($user->isLoggedIn()) {
                    Redirect::to("index.php");
                }

                if (Input::exists()) {
                    if (Token::check(Input::get("token"))) {
                        $validate = new Validation();
                        $validate = $validate->check($_POST, array(
                            "email" => array(
                                'required' => true,
                            ),
                            "password" => array(
                                "min" => 5,
                                "required" => true
                            ),
                        ));

                        if ($validate->passed()) {
                            $login = $user->login(
                                Input::get("email"),
                                Input::get("password")
                            );

                            $user->login(
                                Input::get("email"),
                                Input::get("password")
                            );

                            if ($login) {
                                Redirect::to("index.php");
                            } else {
                                echo "aia e";
                            }
                        } else {
                            foreach ($validate->errors() as $error) {
                                echo "<h2>" . $error . "</h2><br/>";
                            }
                        }
                    }
                }


                ?>
                <img src="./assets/img/avatar.svg">
                <h2 class="title">Welcome</h2>
                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="div">
                        <!-- <h5>Username</h5> -->
                        <input type="email" class="input" placeholder="Email" name="email" />
                    </div>
                </div>
                <div class="input-div pass">
                    <div class="i">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="div">
                        <!-- <h5>Password</h5> --> <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
                        <input type="password" class="input" placeholder="Password" name="password" />

                    </div>
                </div>
                <input type="submit" class="btn" value="Login">
            </form>
        </div>
    </div>
    <?php
    require_once './components/footer.php';
    ?>

</body>

</html>