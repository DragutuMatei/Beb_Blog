 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="./assets/css/style.css">
     <title>My mind is a mess</title>
     <link rel="icon" href="./assets/img/pencil-alt-solid.svg" type="image/jpg">

     <style>
         @import url(https://fonts.googleapis.com/css?family=Source+Sans+Pro);
         @import url(https://fonts.googleapis.com/css?family=Teko:700);

         .snip1543 {
             background-color: #fff;
             color: #ffffff;
             font-family: 'Source Sans Pro', sans-serif;
             font-size: 16px;
             margin: 10px;
             max-width: 315px;
             min-width: 230px;
             height: 350px;
             overflow: hidden;
             position: relative;
             text-align: left;
             border-radius: 20px;
             width: 100%;
             -webkit-transform: translateZ(0);
             transform: translateZ(0);
         }

         .snip1543 *,
         .snip1543 *:before,
         .snip1543 *:after {
             -webkit-box-sizing: border-box;
             box-sizing: border-box;
             -webkit-transition: all 0.45s ease;
             transition: all 0.45s ease;
         }

         .snip1543 img {
             backface-visibility: hidden;
             max-width: 100%;
             vertical-align: top;
             width:100%;
             height:100%;
             
         }

         .snip1543:before,
         .snip1543:after {
             position: absolute;
             top: 0;
             bottom: 0;
             left: 0;
             right: 0;
             content: '';
             background-color: #f440be;
             opacity: 0.5;
             -webkit-transition: all 0.45s ease;
             transition: all 0.45s ease;
         }

         .snip1543:before {
             -webkit-transform: skew(30deg) translateX(-80%);
             transform: skew(30deg) translateX(-80%);
         }

         .snip1543:after {
             -webkit-transform: skew(-30deg) translateX(-70%);
             transform: skew(-30deg) translateX(-70%);
         }

         .snip1543 figcaption {
             position: absolute;
             top: 0px;
             bottom: 0px;
             left: 0px;
             right: 0px;
             z-index: 1;
             bottom: 0;
             padding: 25px 40% 25px 20px;
             display: flex;
             align-items: center;
         }

         .snip1543 figcaption:before,
         .snip1543 figcaption:after {
             position: absolute;
             top: 0;
             bottom: 0;
             left: 0;
             right: 0;
             background-color: #f440be;
             box-shadow: 0 0 20px rgba(0, 0, 0, 0.7);
             content: '';
             opacity: 0.5;
             z-index: -1;
         }

         .snip1543 figcaption:before {
             -webkit-transform: skew(30deg) translateX(-100%);
             transform: skew(30deg) translateX(-100%);
         }

         .snip1543 figcaption:after {
             -webkit-transform: skew(-30deg) translateX(-90%);
             transform: skew(-30deg) translateX(-90%);
         }

         .snip1543 h3,
         .snip1543 p {
             margin: 0;
             opacity: 0;
             letter-spacing: 1px;
         }

         .snip1543 h3 {
             font-family: "Indie Flower", cursive;
             font-size: 36px;
             font-weight: 700;
             line-height: 1em;
             text-transform: uppercase;
         }

         .snip1543 p {
             font-size: 0.9em;
         }

         .snip1543 a {
             position: absolute;
             top: 0;
             bottom: 0;
             left: 0;
             right: 0;
             z-index: 1;
         }

         .snip1543:hover h3,
         .snip1543.hover h3,
         .snip1543:hover p,
         .snip1543.hover p {
             -webkit-transform: translateY(0);
             transform: translateY(0);
             opacity: 0.9;
             -webkit-transition-delay: 0.2s;
             transition-delay: 0.2s;
         }

         .snip1543:hover:before,
         .snip1543.hover:before {
             -webkit-transform: skew(30deg) translateX(-20%);
             transform: skew(30deg) translateX(-20%);
             -webkit-transition-delay: 0.05s;
             transition-delay: 0.05s;
         }

         .snip1543:hover:after,
         .snip1543.hover:after {
             -webkit-transform: skew(-30deg) translateX(-10%);
             transform: skew(-30deg) translateX(-10%);
         }

         .snip1543:hover figcaption:before,
         .snip1543.hover figcaption:before {
             -webkit-transform: skew(30deg) translateX(-40%);
             transform: skew(30deg) translateX(-40%);
             -webkit-transition-delay: 0.15s;
             transition-delay: 0.15s;
         }

         .snip1543:hover figcaption:after,
         .snip1543.hover figcaption:after {
             -webkit-transform: skew(-30deg) translateX(-30%);
             transform: skew(-30deg) translateX(-30%);
             -webkit-transition-delay: 0.1s;
             transition-delay: 0.1s;
         }
     </style>
 </head>

 <body>
<?php
    require_once './core/init.php';
    require_once './components/navbar.php';
     ?>
     <main class="l-main">

         <section class="work section" id="work" style="margin-top: 40px;">

             <div class="work__container bd-grid">

                 <?php
                    $db = DB::getInstance();
                    $posts = $db->get("posts", array("id", ">=", "0"), "ORDER BY id DESC");
                    $posts = $posts->results();
                    foreach ($posts as $post) {
                        $img = json_decode($post->poze, true);
                        if($img){
                        echo '
                    <figure class="snip1543">
                    <img src="' . $img[0] . '" alt="sample108"  style="object-fit:cover;" />
                    <figcaption>
                        <h3>' . $post->titlu . '</h3>
                    </figcaption>
                    <a href="blog.php?titlu=' . $post->titlu . '"></a>
                </figure>';}
                    }
                    ?>
             </div>
         </section>
     </main>
     <?php
        require_once './components/footer.php';
        ?>
 </body>

 </html>