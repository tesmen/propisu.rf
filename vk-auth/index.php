<?php

$client_id = '5387412'; // ID приложения
$client_secret = 'm8kU9FlWTEwAMJhqL79E'; // Защищённый ключ
$redirect_uri = 'http://tesmen.co/vk_auth.php'; // Адрес сайта
$authUrl = 'http://oauth.vk.com/authorize';

$params = [
    'client_id'     => $client_id,
    'redirect_uri'  => $redirect_uri,
    'response_type' => 'code',
];

if (isset($_GET['code'])) {
    $userInfo = 1;
}

$authLink = $authUrl.'?'.urldecode(http_build_query($params));


?>

<a href="<?php echo $authLink ?>">
    Аутентификация через ВКонтакте
</a>
