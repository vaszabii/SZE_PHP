<?php
declare(strict_types=1);


spl_autoload_register(function ($name){
    require_once("$name.php");
    
});


$ui = new UI(new DataBase());
$page = "";
if(filter_has_var(INPUT_GET, "page")){
    $page = filter_input(INPUT_GET, "page", FILTER_SANITIZE_STRING);
}
if(filter_has_var(INPUT_GET, "id")){
    $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_STRING);
}

$pageList = ["termek","tulajdonsag"];
if(in_array($page, $pageList)){
    if($id!=null){
        $ui->$page($id);
    }else{
    $ui->$page();
    }
 
} else{
    $ui->termek();
}