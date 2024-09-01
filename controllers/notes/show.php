<?php


$config = require base_path('config.php');

$db = new Database($config['database']);

$heading = 'Note';

 $note = $db->query('SELECT * FROM notes WHERE id = :id', ['id' => $_GET['id']])->findORfail(); 

//$note = $db->query('SELECT * FROM notes WHERE email_id = :user and id = :id',  ['user' => 1, 'id' => $_GET['id']] )->fetch();

// this code authorizes that the current user created the given note

    $currentUserId = 2; 

  authorize($note['email_id'] === $currentUserId);


view("notes/show.view.php" , [
  'heading' => 'My Notes',
  'note' => $note
]);