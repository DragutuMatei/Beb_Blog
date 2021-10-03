<?php
require_once './core/init.php';

if(isset($_POST['like'])){
    $add = new AddBlogPost();
     
    if($add->like($_POST['post_id'], $_POST['user_id'])){
        Redirect::to("blog.php?titlu=".$_POST['titlu']."&success=true");
    } else {
        Redirect::to("blog.php?titlu=".$_POST['titlu']."&success=false");
    }
    
    
}