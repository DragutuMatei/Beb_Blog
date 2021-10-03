<?php
class AddBlogPost
{
    private $_db, $_data;

    public function __construct()
    {
        $this->_db = DB::getInstance();
    }
    public function add($fields = array())
    {
        if (!$this->_db->insert("posts", $fields)) {
            throw new Exception("meci mai prst");
        }
    }
    
    public function delete($fields = array()){
        if(!$this->_db->delete("posts", $fields)){
            throw new Exception("nu mai vr el, frt");
        }
    
    }
 
    
    public function getLikes($post_id){
        $likes = $this->_db->get("posts", array("id","=", $post_id));
        $likes=$likes->first();
        return $likes->likes;
    }
    
    public function ai_dat_like($user_id, $post_id){
        $liked = $this->_db->get("likes", array("user_id", "=", $user_id));
        $liked = $liked->results();
        
        foreach($liked as $like){
            if($like->post_id == $post_id){
                return true;
            }
        }
        return false;
    }
    
    public function like($post_id, $user_id){
        $users = $this->_db->get("likes", array("user_id", "=", $user_id));
        foreach($users->results() as $user){
            $us_id = $user->user_id; 
            $po_id = $user->post_id;
        
            if((int) $po_id == (int) $post_id && (int) $us_id == (int) $user_id){
                return false;
            }
        
        }
        
        $likes = $this->_db->get("posts", array("id","=", $post_id));
        
        $like = $likes->first();
        $like = $like->likes;
        
        $like++;
        
        if (!$this->_db->update("posts", $post_id, array("likes" => $like))) { 
            throw new Exception("meci mai prst");
        } 

        if (!$this->_db->insert("likes", array("user_id"=>$user_id, "post_id"=>$post_id))) { 
            throw new Exception("meci mai prst");
        }
        
        return true;
    }
    
    public function coment($fields = array()){
        if(!$this->_db->insert("comments", $fields)){
            throw new Exception("amin si aia e");
        }
    }
    
    public function getComments($post_id){ 
        $rez = $this->_db->get("comments", array("post_id", "=", $post_id));
        return $rez->results();
    }
    
    public function result(){
        return $this->_data;
    }
    
    
}
