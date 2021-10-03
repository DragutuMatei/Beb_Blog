<?php
    require_once "./core/init.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./assets/css/style.css">

    <!-- =====BOX ICONS===== -->
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>Portfolio website complete</title>
    <style>
        body {
            background: #0e2431 !important;
            color: white !important;
        }
    </style>
</head>

<body>

<br><br><br><br>

        <?php
        if(!isset($_SESSION['admin'])){
            Redirect::to("admin.php");
        }
        ?>

        <form method="POST" enctype="multipart/form-data" >
        <?php
            if (Input::exists()) {
                // if (Token::check(Input::get("token"))) {
                    $validate = new Validation();
    
                    $validate = $validate->check($_POST, array(
                        "titlu" => array(
                            "min" => 5,
                            "required" => true
                        ),
                        "text" => array(
                            "min" => 6,
                            "required" => true,
                        ),
                    ));
    
    
                    if ($validate->passed()) {
                        $files = array_filter($_FILES["imagini"]["name"]);
                        $cate_is = count($_FILES["imagini"]["name"]);
    
                        $array_cu_imag = array();
    
                       for ($i = 0; $i < $cate_is; $i++) {
                            $temporale = $_FILES["imagini"]["tmp_name"][$i];
    
                            $imageFileType = strtolower(pathinfo($temporale, PATHINFO_EXTENSION));
    
                            // if ($temporale["size"] >= 2000000) {
                                // if (
                                    // $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                                    // && $imageFileType != "gif" && $imageFileType != "svg"
                                // ) {
                                    // echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                                // } else 
                                if ($temporale != "") {
                                    $array_cu_imag[$i] = "./assets/img/" . $_FILES["imagini"]["name"][$i];
                                    $newFilePath = "./assets/img/" . $_FILES["imagini"]["name"][$i];
                                    move_uploaded_file($temporale, $newFilePath);
                                } 
                        }
    
                        $imgs = array();
                        for ($i = 0; $i < count($array_cu_imag); $i++) {
                            $imgs[$i] = $array_cu_imag[$i];
                        }
    
                        $add = new AddBlogPost();
    
                        try {
                            $add->add(array(
                                "titlu" => Input::get("titlu"),
                                "text" => Input::get("text"),
                                "poze" => json_encode($imgs),
                                "likes" => 0
                            ));
                            
                            Redirect::to("admini.php");
                            
                        } catch (Exception $e) {
                            die($e->getMessage());
                        }
                    } else {
                        foreach ($validate->errors() as $error) {
                            echo "<h2>" . $error . "</h2><br/>";
                        }
                    }
                // } else{
                //     echo "debug1<br>";
                // }
            }
            // else{
            //     echo "<br>debug2";
            // }
        ?>
    
        <div class="mb-3">
            <label for="tit" class="form-label">Scrie titlul poeziei fara semnul intrebarii sau emoticoane</label>

            <input type="text" id="tit" class="form-control" name="titlu" placeholder="Titlu" />
        </div>
        <div class="mb-3">
            <label for="text" class="form-label">Scrie poezia fara emoticoane. Nu uita ca la sf fiecarui rand sa adaugi &lt;br&gt; </label>

            <textarea rows="10" cols="25" class="form-control" type="text" id="text" name="text" placeholder="Text"></textarea>
        </div>
        <div class="mb-3">
            <label for="imgs" class="form-label">Alege macar o imagine</label>
            <input class="form-control" type="file" id="imgs" require multiple name="imagini[]" />
        </div>

        <input type="hidden" value=" <?php echo Token::generate(); ?> " name="token" />

        <button class="btn btn-primary mb-3" name="submit" type="submit">Submit</button>
    </form>

    <br><br><br><br>

    <section class="work section" id="work" style="margin-top: 40px;">

        <div class="work__container bd-grid">
            
            <?php
                require_once "./components/get.php";
            ?>
        </div>
    </section>
    
   
    
</body>

</html>