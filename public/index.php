<?php

   //import
    use PORTFOLIO\core\App;
    
    //path
    define('DS',DIRECTORY_SEPARATOR);
    define('ROOT',dirname(__DIR__));
    
    define('APP',ROOT.DS.'app');
    define('VENDOR',ROOT.DS.'vendor'); 
    define('PUBLIC_',ROOT.DS.'public');

    define('CONTROLLERS',APP.DS.'controllers');
    define('MODELS',APP.DS.'models');
    define('VIEWS',APP.DS.'views');

    define('AUTHENTICATION_CONTROLLERS',CONTROLLERS.DS.'Authentication');
    define('AUTHENTICATION_MODELS',MODELS.DS.'Authentication');
    define('AUTHORIZATION_CONTROLLERS',CONTROLLERS.DS.'Authorization');
    define('AUTHORIZATION_MODELS',MODELS.DS.'Authorization');
    define('USER_CONTROLLERS',CONTROLLERS.DS.'user');
    define('USER_MODELS',MODELS.DS.'user');
    
    //constant
    define('PARENT_CONTROLLER_FOLDER_NAME','controllers');

    //Domain  
    define('DOMAIN','http://localhost/Portfolio/public/');

    //upload 
    define('UPLOAD_SET',PUBLIC_.DS.'upload');
    define('UPLOAD_GET',DOMAIN.'/upload'.'/');

    //redirect from view
    define("CONTROLLERS_DOMAIN",DOMAIN.PARENT_CONTROLLER_FOLDER_NAME.'/');
    define('AUTHENTICATION_DOMAIN',CONTROLLERS_DOMAIN.'Authentication/');
    define('AUTHORIZATION_DOMAIN',CONTROLLERS_DOMAIN.'Authorization/');
    define('USER_DOMAIN',CONTROLLERS_DOMAIN.'User/');
    define('ERROR_DOMAIN',CONTROLLERS_DOMAIN.'ERROR/'); 
    
    //redirct from controller
    define('AUTHORIZATION_CONTROLLER_REDIRCT',PARENT_CONTROLLER_FOLDER_NAME.'/Authorization//');
    define('ERROR_CONTROLLER_REDIRCT',PARENT_CONTROLLER_FOLDER_NAME.'/ERROR//');
    define('USER_CONTROLLER_REDIRCT',PARENT_CONTROLLER_FOLDER_NAME.'/User//');
    define('AUTHENTICATION_CONTROLLER_REDIRCT',PARENT_CONTROLLER_FOLDER_NAME.'/Authentication//');
    //asset
    define('BACK_ASSET',DOMAIN.'backasset/');
    define('FRONT_ASSET',DOMAIN.'frontasset/'); 

    //connection
    define('USERNAME','root');
    define('DB_NAME','portfolio');
    define('PASSWORD','');
    define('TYPE','mysql');
    define('HOST','localhost');
    define('PORT','3306');
    
    //session
    define('ADMIN_SESSION_KEY','ADMIN_SESSION_KEY');

    //require
    require_once VENDOR.DS.'autoload.php';
    
    //object
    $appObj = new App();
?>