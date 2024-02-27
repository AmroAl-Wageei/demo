<?php

$Heading = 'Notes Page';

class Databasee {

    public $connection;

    public function __construct($config ,$username = 'root' , $password = '' )
        {
         $dsn = 'mysql:' . http_build_query($config, '' , ';');

        // $dsn = "mysql:host={$config['host']};port={$config['port']};dbname={$config['dbname']};user=root;charset={$config['charset']}";
        // $dsn = 'mysql:host=' . $config['host'] . ';port=' . $config['port'] . ';dbname=' . $config['dbname'] . ';charset=' . $config['charset'];

        $this->connection = new PDO($dsn, $username, $password , [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);

    }
    public function query($query) {

        $Statement = $this->connection->prepare($query);
        $Statement->execute();

        return  $Statement;
    }
}

$config = require('./database/config.php');
$db = new Databasee($config['database']);

$notes = $db->query(' select * from notes')->fetchAll();

// dd($notes);



require "./view/notes.view.php";