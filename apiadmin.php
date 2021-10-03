<?php
require_once './core/init.php';
    if(isset($_POST['submit'])){
        
        $parola = "iamdone21motherfuckers";
        
        if($parola === $_POST['password']){
            Session::put("admin", "true");
            Redirect::to("admin.php?success=true");
        } else {
            Redirect::to("admin.php?success=false");
        }
    }