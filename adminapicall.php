<?php
require_once './core/init.php';
        // if (Input::exists()) {
        //     if (Token::check(Input::get("token"))) {
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
                    $files = array_filter($_FILES['imagini']['name']);
                    $cate_is = count($_FILES['imagini']['name']);

                    $array_cu_imag = array();

                   for ($i = 0; $i < $cate_is; $i++) {
                        $temporale = $_FILES['imagini']['tmp_name'][$i];

                        $imageFileType = strtolower(pathinfo($temporale, PATHINFO_EXTENSION));

                        // if ($temporale['size'] >= 2000000) {
                            // if (
                                // $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                                // && $imageFileType != "gif" && $imageFileType != "svg"
                            // ) {
                                // echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                            // } else 
                            if ($temporale != "") {
                                $array_cu_imag[$i] = "./assets/img/" . $_FILES['imagini']['name'][$i];
                                $newFilePath = "./assets/img/" . $_FILES['imagini']['name'][$i];
                                move_uploaded_file($temporale, $newFilePath);
                            }
                        // } else {
                            // echo "e prea mare";
                        // }
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
                        
                        Redirect::to("admin.php");
                    } catch (Exception $e) {
                        die($e->getMessage());
                    }
                } else {
                    foreach ($validate->errors() as $error) {
                        echo "<h2>" . $error . "</h2><br/>";
                    }
                }
        //     }
        // }
       