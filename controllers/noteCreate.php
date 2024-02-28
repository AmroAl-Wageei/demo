<?php

require("./validation/validator.php");

$Heading = 'Create Notes Page';
$user_id = 1;

class DatabaseNote {
    public $connection;
    public $Statement;

    public function __construct($config, $username = 'root', $password = '') {
        $dsn = 'mysql:' . http_build_query($config, '', ';');

        $this->connection = new PDO($dsn, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION // Enable error reporting
        ]);
    }

    public function query($query, $params = []) {
        $this->Statement = $this->connection->prepare($query);
        $this->Statement->execute($params);

        return $this;
    }

    public function Leen() {
        return $this->Statement->fetchAll();
    }
}

$config = require('./database/config.php');
$db = new DatabaseNote($config['database']);

// $words = explode(' ', $_POST['body']);
// $num_words = count($words);


$validator = new Validator();
// dd(Validator::email('shandaqamro@gmail.com')); // true
// dd(Validator::email('dfsdgsdgg')); //false

if (! Validator::email('shandaqamro@gmail.com')) {
    return dd("That not validat email");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $error = [];

    if (! $validator::string($_POST['body'], 1 , 100)) {
        $error['body'] = 'A Note of body no more than 100 char is required!';
    } 


    if (empty($error)) {
        $db->query('INSERT INTO notes (body, user_id) VALUES (:body, :user_id)', [
            'body' => $_POST['body'], 
            'user_id' => $user_id,
        ]);
    }
}




// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     $body = isset($_POST['body']) ? trim($_POST['body']) : '';

//     if (!empty($body)) {
//         try {
//             $existingNote = $db->query('SELECT COUNT(*) FROM notes WHERE body = :body AND user_id = :user_id', [
//                 'body' => $body,
//                 'user_id' => $user_id
//             ])->Leen();

//             if ($existingNote[0]['COUNT(*)'] == 0) {
//                 $db->query('INSERT INTO notes (body, user_id) VALUES (:body, :user_id)', [
//                     'body' => $body, 
//                     'user_id' => $user_id,
//                 ]);
//                 echo "Note created successfully!";
//             } else {
//                 echo "Error: Note with the same content already exists.";
//             }
//         } catch (PDOException $e) {
//             echo "Error: " . $e->getMessage();
//         }
//     } else {
//         echo "Error: Invalid input!";
//     }
// }




require "./view/noteCreate.view.php";
?>