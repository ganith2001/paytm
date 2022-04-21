<?php
    class DB_Relay
    {
        function Stack()
        {
            return $this -> _query_stack;
        }

        function __construct($host=null,$username=null,$password=null,$database=null)
        {
                $this->Link($host,$username,$password,$database);
                $this->EmptyStack();
        }

        function EmptyStack()
        {
            $this->_query_stack = "";
        }

        function GetLink()
        {
            return $this->_db_link;
        }

        function Link($host=null,$username=null,$password=null,$database=null){
            $connect=mysqli_connect($host,$username,$password,$database);
            $this->_db_link=$connect;
        }
        private mysqli $_db_link;
        private string $_query_stack;
    }

?>