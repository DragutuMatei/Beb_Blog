<?php
require_once("./core/init.php");

if (Input::exists()) {
    echo "Asd ";
    if (Token::check(Input::get("token"))) {
        echo "e bun ";
        $validate = new Validation();

        $validate = $validate->check($_POST, array(
            'nume' => array(
                'required' => true,
                'min' => 4,
                'max' => 20,
            ),
            'email' => array(
                'required' => true,
                'unique' => 'users',
            ),
            'parola1' => array(
                'required' => true,
                'min' => 5,
            ),
            'parola2' => array(
                'required' => true,
                'min' => 5,
                'match' => 'parola1',
            ),
        ));

        if ($validate->passed()) {
            echo "plic ";
            $user = new User();
            $salt = time();
                
                // echo "<br><br><br><Br>".Input::get('nume')."<br>";
            try {
                
                // echo Hash::make(Input::get('parola1'), $salt);
                $user->create(array(
                    'username' => Input::get('nume'),
                    'email' => Input::get('email'),
                    'password' => hash("sha256", Input::get("parola1").$salt),
                    'salt' => $salt
                ));
                // echo Input::get("parola1").$salt;
                    // 'salt' => $salt,  Hash::make(Input::get('parola1'), $salt),
                Redirect::to("login.php");
            } catch (Exception $e) {
                die($e->getMessage());
            }
        } else {
            foreach ($validate->errors() as $error) {
                echo "<h5>" . $error . "</h5><br/>";
            }
        }
    } else {
        echo "check";
    }
} else {
    echo "exis";
}
