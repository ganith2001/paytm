<?php
    class DB_Relay
    {
        function Stack()
        {
            return $this -> $_query_stack;
        }

        function __construct($host=null,$username=null,$password=null,$database=null)
        {
                $this->Link($host,$username,$password,$database);
                $this->EmptyStack();
        }

        function EmptyStack()
        {
            $this->$_query_stack = "";
        }

        function GetLink()
        {
            return $this->$db_link;
        }

        function Link($host=null,$username=null,$password=null,$database=null){
            echo "<script>console.log(\"" . "$database" . "\");</script>";
            $connect=mysqli_connect("localhost","root","root","paytm");
            $this->$db_link=$connect;
         //   
            
        }

        public function RelayQuery(string $query)
        {
            try {
                echo "<script>console.log(\"" . "$query" . "\");</script>";
                $result = mysqli_query(mysqli_connect("localhost","root","root","paytm"), $this->CleanQuery($query));
                
                return $result;
            } catch (Exception $e) {
                throw $e;
            }
        }

        public function selectQuery(string $query)
        {
            try {
                
                $result=$this->RelayQuery($query);
                $res=mysqli_fetch_assoc($result);
                return $res;
            } catch (Exception $e) {
                throw $e;
            }
        }
        
      

        public function FlushStack()
        {
           
                $response = $this->RelayQuery( $this->$_query_stack);
                $this->EmptyStack();
                return $response;
         
        }
        public function PushQuery(string $query)
        {
            $this->$_query_stack .=$query;
            
           
        }

        private function CleanQuery($query)
        {
            return preg_replace("/[\s]{2,}/", " ", rtrim(trim($query, " \t\n\r\0\x0B"), "\;") . ";");
        }
        private mysqli $db_link;
        private string $_query_stack;
    }

?>