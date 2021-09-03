<?php
include_once 'SenderService.php';

//var_dump(json_encode($_POST));
//die;
$request = json_decode(file_get_contents('php://input'));

$name = $request->class;
$function = $request->function;

$class = 'core\plugins\\'.$name;

if (file_exists('../plugins/'.$name.'.php')){
    include_once '../plugins/'.$name.'.php';
}

if (isset($request->class)) {
    $class = new $class();
    $class->$function();
}


