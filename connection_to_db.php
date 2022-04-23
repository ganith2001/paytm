<?php
    require_once "relay.php";
    

    define('$DB_HOST', 'localhost');
    define('$DB_USER', 'root');
    define('$DB_PASSWORD', 'root');
    define('$DB_NAME', 'paytm');
   

    try {
        $connection_test = new DB_Relay(
            'localhost',
            'root',
            'root',
            'paytm'
        );
    } catch (Exception $e) {
        throwAlert('Server connection failure. Please try again later or contact our dev team');
        consoleBug($e -> getMessage());
        
    } finally {
        $dbc = $connection_test;
        echo "<script>console.log('Database connected Successfully')</script>";
    }
?>