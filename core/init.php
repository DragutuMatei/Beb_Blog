<?php
session_start();

$cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$cleardb_server = $cleardb_url["host"];
$cleardb_username = $cleardb_url["user"];
$cleardb_password = $cleardb_url["pass"];
$cleardb_db = substr($cleardb_url["path"],1);


$GLOBALS['config'] = array(
    'mysql' => array(
        'host' => $cleardb_server,
        'username' => $cleardb_username,
        'password' => $cleardb_password,
        'db' => $cleardb_db
        
        // 'host' => "eu-cdbr-west-01.cleardb.com",
        // 'username' => "b8f4cd3c10b0c1",
        // 'password' => "6f3c670c",
        // 'db' => "heroku_a9f91118cf15b13"
    ),
    "remember" => array(
        'cookie_name' => 'hash',
        'cookie_expire' => 604800,
    ),
    'session' => array(
        'session_name' => 'user',
        'token_name' => 'token'
    )
);

spl_autoload_register(function ($class) {
    require_once './classes/' . $class . ".php";
});

require_once "./functions/sanitaze.php";
