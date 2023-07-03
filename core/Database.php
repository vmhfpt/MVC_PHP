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

      
}