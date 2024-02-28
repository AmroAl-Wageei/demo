<?php

// require ('./database/database.php');
require ('./database/config.php');
require './statusCode/response.php';



$Heading = 'Note';
$currwntUserId = 1;

class Databaseee {

    public $connection;
    public $statement;

    public function __construct($config ,$username = 'root' , $password = '' )
        {
         $dsn = 'mysql:' . http_build_query($config, '' , ';');

        $this->connection = new PDO($dsn, $username, $password , [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);

    }
    public function query($query, $params = []) {

        $this->statement = $this->connection->prepare($query);
        $this->statement->execute($params);

        return  $this;
    }

    public function Amro() {
        return $this->statement->fetch();
    }

    public function findOrFail() {
        $result =  $this->Amro();

        if (! $result ) {
        abort();
        }

        return $result;
    }

}


$config = require('./database/config.php');
$db = new Databaseee($config['database']);

// $id = isset($_GET['id']) ? $_GET['id'] : null;

// if ($id !== null) {
//     $note = $db->query('SELECT * FROM notes WHERE id = :id', ['id' => $id])->fetch();
// }

// if (! $note ) {
//     abort();
// }

// if ($authorize) {
//     abort(Response::FORBIDDEN);
// }

$note = $db->query('SELECT * FROM notes WHERE id = :id' , [
    'id' => $_GET['id']
])->findOrFail();

authorize($note['user_id'] !== $currwntUserId);


require "./view/note.view.php";