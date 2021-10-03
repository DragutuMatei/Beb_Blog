
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
                            <form method="POST" action="adminapi.php">
                    <input type="hidden" name="id" value="'.$post->id.'" />
                    
                    <input type="hidden" name="token" value="'.Token::generate().'" />
                        <input type="submit" value="Delete" />
                    </form>
                            </figure>';
                            
                        } 
                        
                    }
                    