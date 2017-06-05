<?php

//данные API для получения параметра "code"
$client_id = '269455356861743'; // Client ID
$client_secret = 'a9833edee1112a8d30256e7c888dde26'; // Client secret
$redirect_uri = 'http://localhost/'; // Redirect URIs

$url = 'https://www.facebook.com/dialog/oauth';

$params = array(
    'client_id'     => $client_id,
    'redirect_uri'  => $redirect_uri,
    'response_type' => 'code'
    // 'scope'         => 'email,user_birthday'
);
//Получаем параметр "code"
     $link = '<p align="center"><a class="btn btn-primary" href="' . $url . '?' . urldecode(http_build_query($params)) . '">Login with Facebook</a></p>';
     
if (isset($_GET['code'])) {
    $result = false;

    $params = array(
        'client_id'     => $client_id,
        'redirect_uri'  => $redirect_uri,
        'client_secret' => $client_secret,
        'code'          => $_GET['code']
    );
//Отправляем "code", получаем "acces token"
    $url = 'https://graph.facebook.com/oauth/access_token';

    // parse_str(file_get_contents($url . '?' . http_build_query($params)), $tokenInfo); Была попытка реализации с помощью ф-ии parse_str, для получения массива и т.д. - не получилось. Пришлось идти другим путем.
    $res = file_get_contents($url . '?' . http_build_query($params)); //Получаем ответ от сервера и выделяем из строки нужный нам токен.
    // echo $res, '<br>';
    $res = substr($res, strpos($res, 'token')+8);
    $access_token = substr($res, 0, strpos($res, 'token')-strlen($res)-3);
    // echo $access_token, '<br>';

    if (isset($access_token)) {
        $params = array('access_token' => $access_token);
        //отсылаем токен, получаем разрешение на вход и собираем информацию о пользователе.
        $userInfo = json_decode(file_get_contents('https://graph.facebook.com/me' . '?' . urldecode(http_build_query($params))), true);

        if (isset($userInfo['id']) && isset($userInfo['name'])) {
            $userInfo = $userInfo;
            // print_r($userInfo); 
            $result = true;
        }
    }

    if ($result) {
        $_SESSION['user'] = $userInfo;
        // echo "User ID: " . $userInfo['id'] . '<br />';
        // echo "User name: " . $userInfo['name'] . '<br />';
        echo '<script>window.location="http://localhost/"</script>';
    }
}

if(isset($_POST['out'])) {
    // session_start();
    session_destroy();
    unset($_SESSION);
    echo '<script>window.location=document.URL</script>';
    // header('Location:/');
}


?>
