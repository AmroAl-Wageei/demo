<?php

require './function/function.php';

require './routes/route.php';

require './database/database.php';

// class Person {
//     public $name;
//     public $age;

//     public function breathe() {
//         echo $this->name . " is breathing";
//     }
// }

// $person = new Person();
// $person->name = "Amro Salah";
// $person->age = 26;

// print_r($person);
// dd($person->name);
// dd($person->age);
// dd($person->breathe());

$config = require('./database/config.php');

    $db = new Database($config['database']);
    $posts = $db->query("select * from posts where id = 1")->fetch();

    // if ($result) {
    //     $posts = $result->fetchAll(PDO::FETCH_ASSOC);

    //     foreach ($posts as $post) {
    //         echo "Post ID: " . $post['id'] . ", Title: " . $post['title'] . "<br>";
    //     }
    // } else {
    //     echo "Error executing query.";
    // }

   $id = $_GET['id'];
   $query = $db->query($query)->fetch();
    // print_r($posts)
?>