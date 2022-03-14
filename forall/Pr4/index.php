<?php
$db = require_once 'db.php';
require_once 'Cookie.php';
require_once 'Form.php';
require_once 'Flash.php';
require_once 'Session.php';
require_once 'Stack.php';
require_once 'Mysql.php';


try{
    $session = new Session();
    // Куки нужно создавать до вывода какой-либо информации на странице (написано в официальном мануале)
    $cook = new Cookie();
    $cook->set('user', 'rees', 3600);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Практическая работа №4</title>
</head>
<body>
    
<?php


    $stack = new Stack();
    $stack->push(1);
    $stack->push(2);
    echo $stack->pop();
    var_dump($stack->getStack());
    $stack->reset();
    $stack->push('pop');
    echo $stack->pop();
    var_dump($stack->getStack());

    // Работа с объектом класса куки
    echo $cook->get('user'). '<br>';
    // Удаление куки тоже возможно до вывода информации на сайт, так как их удаление - это пересоздание. 
    // $cook->del('user');
    var_dump($_COOKIE);

    $message = new Flash($session);
    $message->setMessage('user', 'Иван');
    echo $message->getMessage('user');

    $form = Form::Begin([
        'action' => $_SERVER['SCRIPT_NAME'],
        'method' => 'post'
    ]); 

    echo $form->input(["type" => "text", "value" => "aaa"]);
    echo $form->password(["value" => "aaa"]);
    echo $form->textarea(["value" => "aaa", "placeholder" => "123"]);
    echo $form->submit(["value" => "Отправить форму"]);

    Form::end();

    $mysqli = new Mysql($db);
    if($mysqli->connected()){
       echo 'База данных подключена';
    }
} catch(Exception $e){
    echo $e->getMessage();
}
?>
</body>
</html>