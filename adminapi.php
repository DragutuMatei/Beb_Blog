<?php
    require_once './core/init.php';
    
    // if (Input::exists()) {
        // if (Token::check(Input::get("token"))) {
            $blog = new AddBlogPost();
                
            try{
                $blog->delete(array("id", "=", Input::get("id")));
                Redirect::to("admin.php");
            }catch(Exception $e){
                die($e->getMessage());
            }
        // }
        // else{
            // echo "asdasdasd ";
        // }
    // } else{ 
    // echo "ASd";
        
    // }