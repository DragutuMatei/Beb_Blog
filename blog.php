<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>


    <style>
        .comments .al{
            display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: flex-start;
        }
        
        .comments .al .coment{
            background:#0e24318c;
            width: 90vw;
    margin: 10px 50px;
    box-shadow: inset 2px 7px 17px 2px rgb(255 255 255 / 50%);
    border-radius: 20px;
    padding: 10px;
        } 
        
        .comments .al .coment h3{
                font-weight: 900;
    color: #f440be;
    text-transform: capitalize;
        margin: 0 10px;
        }
        
        .comments .al .coment p{
            text-indent: 20px;
        }
    
        .comments form{
            display:flex;
            justify-content:center;
            align-items:center;
            width:100vw;
            height:80px;
            margin-top:40px;
            
        }
        
        
        .comments form input[type=text]{
            width:100%;
            max-width:430px;
            padding:10px 12px;
            outline:none;
            border:none;
            border-radius:10px 0 0 10px;
            font-size:18px;
        }
        
        .comments form input[type=submit]{
            font-size:18px;
            padding:10px 12px;
            background:#f440be;
            color:white;
            border:none;
            outline:none;
            border-radius:0 10px 10px 0;
            cursor:pointer;
            
        }
    
        img,
        svg,
        image {
            max-width: 100%;
        }

        .cd-filter {
            /* SVG animation style switcher - not needed in production */
            margin-top: 1em;
            text-align: center;
        }

        .cd-filter li {
            display: inline-block;
            margin: 4px;
        }

        .cd-filter a {
            display: block;
            border-bottom: 2px solid rgba(76, 92, 98, 0);
            padding: .8em 1em;
            font-size: 1.2rem;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: .1em;
            color: #4c5c62;
        }

        .no-touch .cd-filter a:hover {
            border-bottom: 2px solid rgba(76, 92, 98, 0.6);
        }

        .cd-filter a.selected {
            color: #00A7E1;
            border-bottom: 2px solid rgba(0, 167, 225, 0.4);
        }

        .no-touch .cd-filter a.selected:hover {
            border-bottom: 2px solid rgba(0, 167, 225, 0.4);
        }

        @media only screen and (min-width: 768px) {
            .cd-filter {
                margin-top: 2em;
            }
        }

        .cd-slider-wrapper {
            position: relative;
            width: 90%;
            max-width: 1024px;
            margin: 2em auto;
            /* hide horizontal scrollbar on IE11 */
            overflow-x: hidden;
        }

        .cd-slider>li {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            opacity: 0;
            /* hide vertical scrollbar on IE11 */
            overflow: hidden;
        }

        .cd-slider>li.visible {
            position: relative;
            z-index: 2;
            opacity: 1;
        }

        .cd-slider>li.is-animating {
            z-index: 3;
            opacity: 1;
        }

        .cd-slider .cd-svg-wrapper {
            /* using padding Hack to fix bug on IE - svg height not properly calculated */
            height: 0;
            padding-bottom: 57.15%;
        }

        .cd-slider-wrapper svg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }



        .cd-slider-navigation li {
            position: absolute;
            z-index: 3;
            top: 50%;
            bottom: auto;
            -webkit-transform: translateY(-50%);
            -moz-transform: translateY(-50%);
            -ms-transform: translateY(-50%);
            -o-transform: translateY(-50%);
            transform: translateY(-50%);
            right: 10px;
            height: 48px;
            width: 48px;
        }

        .cd-slider-navigation li a {
            display: block;
            height: 100%;
            overflow: hidden;
            text-indent: 100%;
            white-space: nowrap;
            color: transparent;
            background: url(./assets/img/cd-icon-arrows.svg) no-repeat 0 0;
            -webkit-transition: -webkit-transform 0.2s;
            -moz-transition: -moz-transform 0.2s;
            transition: transform 0.2s;
        }

        .no-touch .cd-slider-navigation li a:hover {
            -webkit-transform: scale(1.1);
            -moz-transform: scale(1.1);
            -ms-transform: scale(1.1);
            -o-transform: scale(1.1);
            transform: scale(1.1);
        }

        .cd-slider-navigation li:last-of-type {
            left: 10px;
            right: auto;
        }

        .cd-slider-navigation li:last-of-type a {
            background-position: -48px 0;
        }


        .cd-slider-controls {
            position: absolute;
            bottom: 20px;
            left: 50%;
            right: auto;
            -webkit-transform: translateX(-50%);
            -moz-transform: translateX(-50%);
            -ms-transform: translateX(-50%);
            -o-transform: translateX(-50%);
            transform: translateX(-50%);
            z-index: 3;
            text-align: center;
            width: 90%;
        }

        .cd-slider-controls::after {
            clear: both;
            content: "";
            display: table;
        }

        .cd-slider-controls li {
            display: inline-block;
            margin-right: 10px;
        }

        .cd-slider-controls li:last-of-type {
            margin-right: 0;
        }

        .cd-slider-controls li.selected a {
            background-color: #ffffff;
        }

        .cd-slider-controls a {
            display: block;
            /* image replacement */
            overflow: hidden;
            text-indent: 100%;
            white-space: nowrap;
            color: transparent;
            height: 10px;
            width: 10px;
            border-radius: 50%;
            border: 2px solid #ffffff;
        }

        .no-touch .cd-slider-controls a:hover {
            background-color: #ffffff;
        }
    </style>

</head>

<body>
<?php
    require_once './core/init.php';
    require_once './components/navbar.php';
     ?>
    <?php

    // require_once './components/navbar.php';
    $db = DB::getInstance();
    $postare = $db->get("posts", array("titlu", "=", $_GET['titlu']));
    $postare = $postare->first();
    ?>
    
    <main class="l-main bl" style="background: url(./assets/img/diamond-sunset.svg);
    background-repeat: no-repeat;
    
    background-position: center;
    background-size: cover;
    position: relative;
    width: 100vw;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;">
        <div class="cd-slider-wrapper" style="margin-top:100px;">
            <ul class="cd-slider" data-step1="M1402,800h-2c0,0,0-213,0-423s0-377,0-377h1c0.6,0,1,0.4,1,1V800z" data-step2="M1400,800H724c0,0-297-155-297-423C427,139,728,0,728,0h671c0.6,0,1,0.4,1,1V800z" data-step3="M1400,800H0c0,0,1-213,1-423S1,0,1,0h1398c0.6,0,1,0.4,1,1V800z" data-step4="M-2,800h2c0,0,0-213,0-423S0,0,0,0h-1c-0.6,0-1,0.4-1,1V800z" data-step5="M0,800h676c0,0,297-155,297-423C973,139,672,0,672,0L1,0C0.4,0,0,0.4,0,1L0,800z" data-step6="M0,800h1400c0,0-1-213-1-423s0-377,0-377L1,0C0.4,0,0,0.4,0,1L0,800z">
                <?php
                $poze = json_decode($postare->poze, true);
                $cate_sunt = count($poze);
                $i=1;
                foreach ($poze as $poza) {
                    echo '                        <li>
                            <div class="cd-svg-wrapper">
                                <svg viewBox="0 0 1400 800">
                                    <defs>
                                        <clipPath id="cd-image-'.$i.'">
                                            <path id="cd-changing-path-'.$i.'" d="M1400,800H0c0,0,1-213,1-423S1,0,1,0h1398c0.6,0,1,0.4,1,1V800z" />
                                        </clipPath>
                                    </defs>
                                    <image height="800px" width="1400px" clip-path="url(#cd-image-'.$i.')" xlink:href="' . $poza . '"></image>
                                </svg>
                            </div>  
                        </li>
                        ';
                    $i++;
                    }
                ?>

                <script>
                    const lis = document.querySelectorAll(".cd-slider-wrapper ul li");
                    lis[0].classList.add("visible");
                </script>


            </ul> <!-- .cd-slider -->

            <?php
            if ($cate_sunt > 1) {
                echo '<ul class="cd-slider-navigation">
                    <li><a href="#0" class="next-slide">Next</a></li>
                    <li><a href="#0" class="prev-slide">Prev</a></li>
                </ul>
                ';
            }
            ?>
        </div>
        <div class="poezie" >
            <h1 style="margin: 5px;padding: 25px; text-align:center;"><?php echo $postare->titlu; ?> </h1>
            
            <h2 style="font-size:20px; text-align:center;">
            <?php
            $user = new User();
            $blog= new AddBlogPost();
            $nr =$blog->getLikes($postare->id);
            if($user->isLoggedIn()){
                $user_id = $user->data()->id;
                $liked = $blog->ai_dat_like($user_id, $postare->id);
                
                echo '
                    <form method="POST" action="./like.php" style="display:flex; justify-content:center; align-items:center;">
                        <input type="hidden" value="'. $_GET['titlu'] .'" name="titlu"  />
                        <input type="hidden" value="'. $postare->id .'" name="post_id"  />
                        <input type="hidden" value="'. $user->data()->id .'" name="user_id"  />
                        <button type="submit" title="like this poem" name="like" style="background:none; ouline:none; border:none; cursor:pointer;">
                        <svg xmlns="http://www.w3.org/2000/svg" height="48px" viewBox="0 0 24 24" width="48px" fill="#f440be"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>
                        </button>';
                        
                        // if($nr==1){
                        //   echo " like";
                        // } else {
                        //     echo " likes";
                        // }
                        //</form>';
                        
                        echo '</form>';
                        if($liked){
                            echo "Ai dat deja like la poezie!";
                        }
                    
            } else{
                    echo "Loghează-te ca să poți da like!";
            
                //  if($nr==1){
                //           echo $nr." like Logheaza-te ca sa poti da like!";
                //         } else {
                //             echo $nr." likes Logheaza-te ca sa poti da like!";
                //         }
            }
            
            if(isset($_GET['success']) && $_GET['success'] == "true"){
                echo "Ai dat like!";
            }
            ?>
            </h2>
            <p style="    padding: 30px;
    text-indent: 20px;
    margin: 30px;">
                <?php
                echo $postare->text;
                ?>
            </p>
            
        </div>
        <div class="comments">
    <form method="POST">
      <?php
        
        if (Input::exists()) {
            if (Token::check(Input::get("token"))) {

               $blog = new AddBlogPost();

              try{
                $blog->coment(array(
                  "post_id"=>Input::get("id"),
                  "coment"=>Input::get("text"),
                  "username"=>Input::get("username")
                ));

               }catch(Exception $e){
                 die($e->getMessage());
               }

            }
        }
     
        if($user->isLoggedIn()){
            echo '
                <input type="text" name="text" placeholder="Scrie un comentariu">
                <input type="hidden" name="username" value="'. $user->data()->username  .'" />
                <input type="hidden" name="id" value="'. $postare->id .'" />
                <input type="hidden" name="token" value="'.  Token::generate().'"/>
                <input type="submit" value="Adauga">
';
        }else{
            echo "Loghează-te ca să lași un comentariu!";
        }
     
      ?>
      
     
    </form>
    <div class="al">
    <?php
        $blog = new AddBlogPost();
        $rez = $blog->getComments($postare->id); 
        
        foreach($rez as $r){
        
             echo '<div class="coment">
                <h3> - '.$r->username.' - </h3>
                <p>'.$r->coment.'</p>
                </div>';
        }
    ?>
    </div>
  </div>
 <?php
            require_once './components/footer.php';
            ?>
        <script src="./assets/js/jquery-2.1.4.js"></script>
        <script src="./assets/js/jquery.mobile.custom.min.js"></script>
        <script src="./assets/js/snap.svg-min.js"></script>
        <script src="./assets/js/main2.js"></script>

    </main>

</body>

</html>