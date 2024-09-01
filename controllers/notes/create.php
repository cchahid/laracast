<?php

require base_path('Validator.php');

$config = require base_path('config.php');

$db = new Database($config['database']);

$heading = 'Create Note';

$errors = []; 

if(!Validator::email('ach@test.com')){
    dd('that is not a validator email');
}


if ($_SERVER['REQUEST_METHOD'] === 'POST'){



    if( !Validator::string($_POST['body'],1,1000)){

        $errors['body'] = 'A body of no more than 1,000 caracters is required';

    }

    if(empty($errors)){

        $db->query('INSERT INTO notes(body,email_id)
                VALUES  (:body, :email_id)',[ 'body' => $_POST['body'],
                                              'email_id' => 2
                                            ]
              );

    }

    
}


view("notes/create.view.php" , [
    'heading' => 'Create Note',
    'errors' => $errors
]);