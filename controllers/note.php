<?php

// require ('./database/database.php');
require ('./database/config.php');

$Heading = 'Note';


class Databaseee {

    public $connection;

    public function __construct($config ,$username = 'root' , $password = '' )
        {
         $dsn = 'mysql:' . http_build_query($config, '' , ';');

        $this->connection = new PDO($dsn, $username, $password , [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);

    }
    public function query($query, $params = []) {

        $Statement = $this->connection->prepare($query);
        $Statement->execute($params);

        return  $Statement;
    }
}


$config = require('./database/config.php');
$db = new Databaseee($config['database']);

$id = isset($_GET['id']) ? $_GET['id'] : null;

if ($id !== null) {
    $note = $db->query('SELECT * FROM notes WHERE id = :id', ['id' => $id])->fetch();
}

require "./view/note.view.php";