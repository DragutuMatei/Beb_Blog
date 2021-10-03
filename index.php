
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./assets/css/style.css">

    <!-- =====BOX ICONS===== -->
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
<script src="https://kit.fontawesome.com/2647a8e79d.js" crossorigin="anonymous"></script>
    <title>Portfolio website complete</title>
</head>

<body>

    <?php
    require_once './core/init.php';
    require_once './components/navbar.php';
     ?>
    <main class="l-main">
        <!--===== HOME =====-->
        <section class="home bd-grid" id="home">
            <div class="home__data">
                <h1 class="home__title">Salut,<br>Sunt <span class="home__title-color">Bebe</span><br> un tânăr scriitor</h1>

                <a href="#contact" class="button">Contact</a>
            </div>
            <div class="home__social">
                <a href="https://www.facebook.com/justbebe7484" class="home__social-icon"><i class="fab fa-facebook"></i></a>
                <a href="https://www.instagram.com/beatricesevastre/" class="home__social-icon"><i class="fab fa-instagram"></i></i></a>
                <a href="mailto:sevastrebeatrice@gmail.com" class="home__social-icon"><i class="fas fa-envelope-open"></i></a>
            </div>

            <div class="home__img">
                <!--<img src="assets/img/primaPoza.jpeg" alt="">-->
                <img src="assets/img/perfil.png" alt="">
            </div>
        </section>

        <!--===== ABOUT =====-->
        <section class="about section " id="about">
            <h2 class="section-title">Despre</h2>

            <div class="about__container bd-grid">
                <div class="about__img">
                    <img src="assets/img/about.jpeg" alt="">
                </div>

                <div>
                    <h2 class="about__subtitle">Sunt Sevastre Beatrice</h2>
                    <p class="about__text"> Sunt elevă în clasa a XI-a, iar mediul în care trăiesc reprezintă o inspirație pentru poeziile mele de 5 ani. Am și o pasiune pentru motociclete având și conducând unul de la 16 ani. 
                    </p>
                </div>
            </div>
        </section>

        <!--===== SKILLS =====-->
        <section class="skills section" id="skills">
            <h2 class="section-title">Skiluri</h2>

            <div class="skills__container bd-grid">
                <div>
                    <h2 class="skills__subtitle">Skiluri profesionale</h2>
                    <!--<p class="skills__text">-->
                        
                    <!--</p>-->
                    <div class="skills__data">
                        <div class="skills__names">
                            <i class="fas fa-pencil-alt skills__icon"></i>
                            <span class="skills__name">Compus poezii</span>
                        </div>
                        <div class="skills__bar skills__html">

                        </div>
                        <div>
                            <span class="skills__percentage">95%</span>
                        </div>
                    </div>
                    <div class="skills__data">
                        <div class="skills__names">
                            <i class="fas fa-mail-bulk skills__icon"></i>
                            <span class="skills__name">Marketing și PR</span>
                        </div>
                        <div class="skills__bar skills__css">

                        </div>
                        <div>
                            <span class="skills__percentage">85%</span>
                        </div>
                    </div>
                    <div class="skills__data">
                        <div class="skills__names">
                            <i class="fas fa-video skills__icon"></i> 
                            <span class="skills__name">Editare video</span>
                        </div>
                        <div class="skills__bar skills__js">

                        </div>
                        <div>
                            <span class="skills__percentage">90%</span>
                        </div>
                    </div>
                    <div class="skills__data">
                        <div class="skills__names">
                            <i class="fas fa-users skills__icon"></i> 
                            <span class="skills__name">Team work</span>
                        </div>
                        <div class="skills__bar skills__ux">

                        </div>
                        <div>
                            <span class="skills__percentage">100%</span>
                        </div>
                    </div>
                </div>

                <div style="display:flex; justify-content:center;">
                    <img src="assets/img/work3.jpeg" alt="" class="skills__img" style="max-width:86%;" >
                </div>
            </div>
        </section>

        <!--===== WORK =====-->
        <section class="work section" id="work">
            <h2 class="section-title">Poezii</h2>

            <div class="work__container bd-grid">

                <?php
                $db = DB::getInstance();
                $posts = $db->get("posts", array("id", ">=", "0"), "ORDER BY id DESC LIMIT 6");
                $posts = $posts->results();
                foreach ($posts as $post) {
                    $img = json_decode($post->poze, true);
                    if($img){
                        echo '
                        <a href="blog.php?titlu=' . $post->titlu . '" class="work__img">
                            <img src="' . $img[0] . '" alt="">
                        </a>';
                    }
                }
                ?>
            </div>
        </section>

        <!--===== CONTACT =====-->
        <section class="contact section" style="background:url(./assets/img/background.svg);background-repeat: -repeat; 
    background-size: cover;"  id="contact">
            <h2 class="section-title">Contact</h2>

            <div class="contact__container bd-grid" >
                <form method="POST" class="contact__form" action="index.php">
                 
                    <?php
                        if(Input::exists()){
                            $text = str_replace("\n.", "\n..",Input::get("text") );
                            $headers = array(
                                        'From' => Input::get("email"),
                                        'Reply-To' => 'webmaster@example.com',
                                        'X-Mailer' => 'PHP/' . phpversion()
                                    );
                                    try{
                                        mail("dragutumatei573@yahoo.ro", "Contact blog", $text, $headers);
                                    } catch(Exception $e){
                                        echo $e->getMessage();
                                    }
                        }
                    ?>  
                 
                    <input type="text" name="name" placeholder="Name" class="contact__input">
                    <input type="mail" name="email" placeholder="Email" class="contact__input">
                    <textarea name="text" cols="0" rows="10" placeholder="Scrie un mesaj" class="contact__input"></textarea>
                    <input type="submit" value="Send" class="contact__button button">
                </form>
            </div>
        </section>
    </main>

    <!--===== FOOTER =====-->
    <?php
    require_once './components/footer.php';
    ?>


    <!--===== SCROLL REVEAL =====-->
    <script src="https://unpkg.com/scrollreveal"></script>

    <!--===== MAIN JS =====-->
    <script src="./assets/js/main.js"></script>
</body>

</html>