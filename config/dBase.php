<?php
  
  class dBase{
    protected $dbname = 'pr_system';
    protected $dbhost = 'localhost';
    protected $dbpass = '';
    protected $dbuser = 'root';
    protected $handler, $stmt;

   public function __construct() {

        try 
        {

          $options = array(
            PDO::ATTR_PERSISTENT =>true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
          );

            $this->handler = new PDO("mysql:host=localhost;dbname=pr_system","root","", $options);
            // echo "Connected";

        } 
        catch (PDOException $e) 
        {
            die($e->getMessage());
            // echo "Failed to connect.";
        }

    }


    /* 
        for queries that return value - SELECT
        the function returns the rows returned by the query
    */
    public function query($statement, $parameters_array)
    {

      $this->stmt = $this->handler->prepare($statement);
      $this->stmt->execute($parameters_array);

      return $this->stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    /* 
        for queries that do not return any value - UPDATE, DELETE and INSERT
        the function returns the number of rows affected by the query
    */
    public function nonQuery($statement, $parameters_array)
    {

      $this->stmt = $this->handler->prepare($statement);
      $this->stmt->execute($parameters_array);

      return $this->stmt->rowCount();

    }

  
  }


 ?>