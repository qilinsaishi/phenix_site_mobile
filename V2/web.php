<?php
$config = [
    "site_url" => "http://m.phenix.com",
    "site_id" => 2,
    'site_name'=>"凤凰电竞",
];
function renderCertification()
{
    echo '<a href="https://beian.miit.gov.cn/#/Integrated/index/">琼ICP备19001306号-5</a>';
}
function curl_post($data,$json = 1)
{
    $url = "http://api.qilindianjing.com/get";
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_USERAGENT,'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.71 Safari/537.36');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
    $res = curl_exec($curl);
    curl_close($curl);
    if($json == 1)
    {
        $result = json_decode($res, true);
    }
    else
    {
        $result = $res;
    }
    return $result;
}
function renderDetail301($config,$redirect)
{
    header('location:'.$config['site_url'] . '/detail/' . $redirect);
    exit;
    return true;
}
