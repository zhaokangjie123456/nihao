<?php
$temp     = file_get_contents("php://input",true);
$msg     = date('Y-m-d H:i:s',time());
if(empty($temp)){
    echo 'access defind';
    //file_put_contents("./hooks.log", "access defind $msg"."\r\n",FILE_APPEND);
    exit();
}

$params = json_decode($temp,true);
//file_put_contents("./hooks.log", '参数'.json_encode($params)." $msg"."\r\n",FILE_APPEND);
//设置用户组 可以设置多个用户
$user     = array('Marhal');
if(!isset($params['user_name']) && !in_array($params['user_name'],$user)){
    echo 'user_name error,access defind';
    //file_put_contents("./hooks.log", "user_name error,access defind $msg"."\r\n",FILE_APPEND);
    exit();
}
//项目根目录
$root     = "/home/wwwroot/default/git";

//git仓库地址
$repo     = "https://github.com/zhaokangjie123456/nihao.git";

//执行指令
echo shell_exec("cd $root && sudo git pull $repo");

echo shell_exec("sudo chown -R www-data:www-data $root");
