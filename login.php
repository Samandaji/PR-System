<?php
  
  class dBase{
    protected $dbname = 'retrievalsystem';
    protected $dbhost = 'localhost';
    protected $dbpass = '';
    protected $dbuser = 'root';
    protected $handler, $stmt;

   /**
    *@param null
    *@return null
    *@desc  create connection or return error message
    **/
    public function _dBase()
    {
      $pdo = 'mysql:host=' . $this->dbhost . 'name=' . $this->dbname;
      $options = array(
        PDO::ATTR_PERSISTENT =>true,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
      );

       try
       {
           $this->handler = new PDO($pdo, $this->dbuser, $this->dbpass, $options);
       }

       catch (PDOException $e)
       {
           throw new PDOException($e->getMessage(), (int) $e->getCode());
       }
      
     }
      /**
      * @param string query
      * @return null
      * @desc Creates a PDO statement object
    **/
    public function query($query)
    {
      $this->stmt = $this->handler->prepare($query);
    }
    /**
      * @param string
      * @return null
      * @desc Matches the correct datatype to the PDO Statement Object.
    **/
    public function bind($param, $value, $type = null)
    {
      if (is_null($type)) {
        switch (true) {
          case is_int($value):
            $type = PDO::PARAM_INT;
          break;
          case is_bool($value):
            $type = PDO::PARAM_BOOL;
          break;
          case is_null($value):
            $type = PDO::PARAM_NULL;
          break;
          default:
            $type = PDO::PARAM_STR;
          break;
        }
      }

      $this->stmt->bindValue($param, $value, $type);
    }
    /**
      * @param null
      * @return null
      * @desc Executes a PDO Statement Object or a db query...
    **/
    public function execute()
    {
      $this->stmt->execute();
      return true;
    }

    /**
      * @param null
      * @return null
      * @desc Executes a PDO Statement Object 
    **/
    public function fetch()
    {
      $this->execute();
      return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
      * @param null
      * @return null
      * @desc Executes a PDO Statement Object an returns nultiple database 
    **/
    public function fetchAll()
    {
      $this->execute();
      return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }
  }
 ?>