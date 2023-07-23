<?php
require_once("models/commentModel.php");


class commentController extends controller{
    private $comment;

    public function __construct(){
       $this->comment = new Comment();
    }
    public function postComment($request, $response){
        //var_dump($request);
        $commentID = $this->comment->insert((int)$request['id'], (int)$request['vote'], $request['content'], $request['name'], $request['phone'], $request['email'], 1);
        
        echo json_encode([
            'status' => 'insert comment success'
        ]);
    }
}