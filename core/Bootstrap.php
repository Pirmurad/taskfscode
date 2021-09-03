<?php
include_once 'SenderService.php';

$request = json_decode(file_get_contents('php://input'));

if (isset($request->class)){
    $name=  $request->class;
    $function = $request->function;
}
else {
    $name = $request[0]->value;
    $function = 'send';
}

$class = 'core\plugins\\'.$name;

if (file_exists('../plugins/'.$name.'.php')){
    include_once '../plugins/'.$name.'.php';
}

    $class = new $class();
    $class->$function();



