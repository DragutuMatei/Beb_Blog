<!DOCTYPE html>
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
    <link rel="icon" href="./assets/img/pencil-alt-solid.svg" type="image/jpg">


</head>

<body>
    <?php
    require_once './core/init.php';
    require_once './components/navbar.php';
     ?> 
    <img class="wave" src="./assets/img/wave.png"/>
    <div class="container">
        <div class="img">
            <img src="./assets/img/bg.svg">
        </div>
        <div class="login-content">
            <form method="POST" action="register.php">
                <img src="./assets/img/avatar.svg">
                <h2 class="title">Welcome</h2>
                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="div">
                        <input type="text" name="nume" placeholder="Nume"/>

                    </div>
                </div>
                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-at"></i>
                    </div>
                    <div class="div">
                        <input type="email" name="email" placeholder="Email"/>

                    </div>
                </div>
                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="div">
                        <input type="password" name="parola1" placeholder="Parola"/>
                    </div>
                </div>
                <div class="input-div pass">
                    <div class="i">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="div">
                        <input type="password" name="parola2" placeholder="Parola"/>
                        <input type="hidden" name="token" value="<?php echo Token::generate(); ?>"/>

                    </div>
                </div>
                <input type="submit" class="btn" value="Register">
                <?php
                
                $user = new User();

                if ($user->isLoggedIn()) {
                    Redirect::to("index.php");
                }

                // if (Input::exists()) {
                //     if (Token::check(Input::get("token"))) {
                //         $validate = new Validation();

                //         $validate = $validate->check($_POST, array(
                //             'nume' => array(
                //                 'required' => true,
                //                 'min' => 4,
                //                 'max' => 20,
                //             ),
                //             'email' => array(
                //                 'required' => true,
                //                 'unique' => 'users',
                //             ),
                //             'parola1' => array(
                //                 'required' => true,
                //                 'min' => 5,
                //             ),
                //             'parola2' => array(
                //                 'required' => true,
                //                 'min' => 5,
                //                 'match' => 'parola1',
                //             ),
                //         ));

                //         if ($validate->passed()) {
                //             $user = new User();
                //             $salt = Hash::salt(32);

                //             try {
                //                 $user->create(array(
                //                     'username' => Input::get('nume'),
                //                     'email' => Input::get('email'),
                //                     'password' => Hash::make(Input::get('parola1'), $salt),
                //                     'salt' => $salt,
                //                 ));
                //                 Redirect::to("login.php");
                //             } catch (Exception $e) {
                //                 die($e->getMessage());
                //             }
                //         } else {
                //             foreach ($validate->errors() as $error) {
                //                 echo "<h5>" . $error . "</h5><br/>";
                //             }
                //         }
                //     }else{
                //         echo "check";
                //     }
                // }else{
                //     echo "exis";
                // }
                ?>
            </form>
        </div>
    </div>

    <?php
    require_once './components/footer.php';
    ?>

</body>

</html>