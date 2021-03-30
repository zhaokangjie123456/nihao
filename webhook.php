<?php
//git项目设置里的秘钥
$secret = 'zhaoxiansheng';
//项目的目录
$path = '/home/wwwroot/default/git';
////git仓库地址
//$repo     = "https://github.com/zhaokangjie123456/nihao.git";
//$signature = $_SERVER['HTTP_X_HUB_SIGHATURE'];
$signature = $_SERVER['HTTP_X_HUB_SIGNATURE'];
if($signature){
    $hash = 'shaq'.hash_hmac('sha1',file_get_contents('php://input'),$secret);
    if(strcmp($signature,$hash) == 0){
        echo shell_exec("cd {$path} && /usr/bin/git reset--hard origin/master && /usr/bin/git clean -f && /usr/bin/git pull 2>&1");
        exit();
    }
}
http_response_code(404);