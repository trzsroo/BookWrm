<?php
    define('DBHOST','localhost');
    define('DBNAME','bookwrm');
    define('DBUSER','root');
    define('DBPASS','wit123');
    
    $connection = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
?>