<?php 

spl_autoload_register(function($class){
   
    $lastDirectories = substr(getcwd(), strlen(__DIR__));
    
    $numberOfLastDirectories = substr_count($lastDirectories, '\\');
    
    $directories = ["businessService", "businessService/models", "database", "presentation", "presentation/handlers", "presentation/login", "presentation/register", "presentation/shared"];
    
    foreach($directories as $dir){
        $currentDirectory = $dir;
        for($i = 0; $i < $numberOfLastDirectories; $i++){
            $currentDirectory = "../" . $currentDirectory;
        }
        
        $classFile = $currentDirectory . "/" . $class . ".php";
        
        if(is_readable($classFile)){
            if(require $dir . "/" . $class . ".php"){
                break;
            }
        }
    }
});
?>