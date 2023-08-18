<?php
require(ROOT_PATH . "config.php");


define('USERNAME', $config["database"]["user"]);
define('PASSWORD',  $config["database"]["pass"]);
define('SEVER',  $config["database"]["host"]);
define('NAMEDB', $config["database"]["name"]);

class Database
{
    private $connection;
   
    public function __construct()
    {
        try {
            $conn = new PDO("mysql:host=".SEVER.";dbname=".NAMEDB."", USERNAME,PASSWORD);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->connection = $conn;
          } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            die();
          }
    }
    public function pdo_execute($sql){
        $sql_args = array_slice(func_get_args(), 1);
        try{
           
           $stmt = $this->connection->prepare($sql);
           $stmt->execute($sql_args);
        }
        catch(PDOException $e) {
           throw $e;
        }
        finally{
          unset($conn);
        }
    }
    public function pdo_query($sql){
        $sql_args = array_slice(func_get_args(), 1);
         try{
            $stmt = $this->connection->prepare($sql);
            $stmt->execute($sql_args);
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return ($rows);
         }
         catch(PDOException $e) {
            throw $e;
         }
         finally{
           unset($conn);
         }
     }
    public function pdo_query_one($sql){
        $sql_args = array_slice(func_get_args(), 1);
        try{
            $stmt = $this->connection->prepare($sql);
            $stmt->execute($sql_args);
            $rows = $stmt->fetch(PDO::FETCH_ASSOC);
            return ($rows);
        }
        catch(PDOException $e) {
           throw $e;
        }
        finally{
          unset($conn);
        }
     }
     public function pdo_query_get_total($sql){
        $sql_args = array_slice(func_get_args(), 1);
        try{
            $stmt = $this->connection->prepare($sql);
            $stmt->execute($sql_args);
            $stmt->fetchAll(PDO::FETCH_ASSOC);
            $count = $stmt->rowCount();
            return ($count);
        }
        catch(PDOException $e) {
           throw $e;
        }
        finally{
          unset($conn);
        }
       }
       public  function pdo_query_get_lastId($sql){
         $sql_args = array_slice(func_get_args(), 1);
         try{
            $stmt = $this->connection->prepare($sql);
            $stmt->execute($sql_args);
            return ($this->connection->lastInsertId());
         }
         catch(PDOException $e) {
            throw $e;
         }
         finally{
           unset($conn);
         }
      }
      public  function pdo_update_get_Id($sql){
         $sql_args = array_slice(func_get_args(), 1);
         try{
            $cc = $this->connection;
            $stmt = $cc->prepare($sql);
            $stmt->execute($sql_args);
            return ($cc->lastInsertId());
         }
         catch(PDOException $e) {
            throw $e;
         }
         finally{
           unset($conn);
         }
      }
      public function autoRemoveFlashSale(){
         $sql = "SELECT * FROM `flash_sales` WHERE current_timestamp() >= `flash_sales`.`end_date`";
         $dataItem = $this->pdo_query($sql);
         
         foreach($dataItem as $key => $value){
            
            $sql = "UPDATE `products` SET `price_sale` = ? WHERE `products`.`id` = ?";
            $this->pdo_execute($sql, $value['discount_old'], $value['product_id']);
            $sqlDel = "DELETE FROM `flash_sales` WHERE `product_id` = ?";
            $this->pdo_execute($sqlDel, $value['product_id'] );
         }
      }

      
}

 $autoLoadRemove = new Database();
 $autoLoadRemove->autoRemoveFlashSale();