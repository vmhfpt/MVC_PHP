<?php
require_once("models/commentModel.php");
require_once("models/productModel.php");
class commentController extends controller{
   private $comments;
   private $product;
   public function __construct(){
    $this->comments = new Comment();
    $this->product = new Product();
 }
   public function index(){
       $dataItem = $this->comments->getAllcommentByProduct();
       return ($this->loadView('admin/comment/list', ['dataItem' => $dataItem] ));
   }
   public function detailListComment($request, $response){
      $data = $this->product->getById($request[0]['id']);
      $dataItem = $this->comments->getCommentsByProductID($request[0]['id']);
      $voteRank = $this->comments->getRankProduct($request[0]['id']);
      $total = 0;
        $totalRank = 0;
        $worstVote = 0;
        $badVote = 0;
        $normalVote = 0;
        $goodVote = 0;
        $bestVote = 0;

        foreach($voteRank as $key => $value){
            $totalRank = $totalRank + ($value['total']);
            if($value['vote'] == 1){
            $worstVote = $value['total'];
            }
            if($value['vote'] == 2){
            $badVote = $value['total'];
            }
            if($value['vote'] == 3){
            $normalVote  = $value['total'];
            }
            if($value['vote'] == 4){
            $goodVote = $value['total'];
            }
            if($value['vote'] == 5){
            $bestVote = $value['total'];
            }
            $total = $total + $value['caculation'];
        }
        
        if($totalRank  == 0) $totalRank = 0.1;
        if($total == 0) $total = 0;

        return ($this->loadView('admin/comment/detail', [
            'dataItem' => $dataItem,
            'data' =>$data,
            'voteRank' => $voteRank,
            "total" => $total,
            "totalRank" => $totalRank,
            "worstVote" =>$worstVote,
            "badVote" => $badVote,
            "normalVote" => $normalVote,
            "goodVote" => $goodVote,
            "bestVote" => $bestVote,
        ] ));
   }
   public function destroy($request, $response){
      $this->comments->deleteCommentByID($request['id']);
      echo json_encode([
         'status' => 'success'
      ]);
   }
}
?>