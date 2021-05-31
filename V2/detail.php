<!DOCTYPE html>
<?php include_once ("web.php");
$id = $_GET['id']??1;
$data = [
    "defaultConfig"=>["keys"=>["ios_url","android_url","weibo_url","baijia_url","wechat"],"fields"=>["name","key","value"],"site_id"=>$config['site_id']],
    "information"=>[$id],
];
$return = curl_post(json_encode($data),1);
if(isset($return["information"]['data']['redirect']) && $return["information"]['data']['redirect']>0)
{
    renderDetail301($config,$return["information"]['data']['redirect']);
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $return['information']['data']['title'];?>-<?php echo $config['site_name'];?></title>
    <script src="<?php echo $config['site_url'];?>/js/rem.js"></script>
    <link rel="stylesheet" href="<?php echo $config['site_url'];?>/css/reset.css">
    <link rel="stylesheet" href="<?php echo $config['site_url'];?>/css/index.css">
</head>

<body>
    <header>
        <div class="logo">
            <img src="<?php echo $config['site_url'];?>/images/logo.png" alt="" class="logo_img">
            <span class="logo_title">凤凰电竞</span>
            <i class="dot"></i>
            <span class="logo_title"><?php echo $return['information']['data']['title'];?></span>
        </div>
        <div id='menu'>
            <img src="<?php echo $config['site_url'];?>/images/menu.png" alt="">
        </div>
        <div class="menu_detail"></div>
        <ul class="nav">
            <li class="logo2">
                <a href="##">
                    <img src="<?php echo $config['site_url'];?>/images/logo2.png" alt="" class="logo2_img">
                </a>
            </li>
            <li>
                <a href="<?php echo $config['site_url'];?>">
                    首页
                </a>
            </li>
            <li>
                <a href="<?php echo $config['site_url'];?>/match">
                    看比赛
                </a>
            </li>
            <li class="active">
                <a href="<?php echo $config['site_url'];?>/newslist">
                    最新资讯
                </a>
            </li>
            <li>
                <a href="<?php echo $config['site_url'];?>/activity">
                    最新活动
                </a>
            </li>
        </ul>
    </header>
    <div class="new new_detail">
        <div class="new_item">
            <a href="##">
                <p class="title"><?php echo $return['information']['data']['title'];?></p>
                <div class="others">
                    <div class="chakan">
                        <img src="<?php echo $config['site_url'];?>/images/eye.png" alt="">
                        <span><?php echo $return['information']['data']['views'];?></span>
                    </div>
                    <span><?php echo date("Y-m-d",strtotime($return['information']['data']['create_time']));?></span>
                </div>
            </a>
            <div class="new_detail_div">
                <?php echo html_entity_decode($return['information']['data']['content']);?>
            </div>
        </div>

    </div>
    <footer>
        <a href="<?php echo $return['defaultConfig']['data']['ios_url']['value'];?>" class="download">立即下载</a>
    </footer>
    <script src="<?php echo $config['site_url'];?>/js/zepto.js"></script>
    <script>
        $("body").on("click", '#menu', function () {
            $(".menu_detail").addClass("active");
            $(".nav").addClass("active");
        })
        $("body").on("click", '.menu_detail', function () {
            $(".menu_detail").removeClass("active");
            $(".nav").removeClass("active");
        })

        $(".watch_ul").on("click", 'li', function () {
            $(".watch_ul li").removeClass("active");
            $(this).addClass("active");
            $(this).parents(".watch").find(".watch_content").find(".watch_item").removeClass("active").eq($(this).index()).addClass("active");
        })
    </script>
</body>

</html>