<!DOCTYPE html>
<?php include_once ("web.php");
$params = [
    "defaultConfig"=>["keys"=>["ios_download_url","android_url","contact_type","contact_content","copy_text"],"fields"=>["name","key","value"],"site_id"=>$config['site_id']],
];
$return = curl_post(json_encode($params),1);
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>首页</title>
    <title><?php echo $config['site_name'];?>-专业电竞赛事比分分析大数据平台</title>
    <meta name="description" content="<?php echo $config['site_name'];?>，专注于电竞比分、电竞赛事数据，平台囊括英雄联盟(LOL)赛事、DOTA2比赛、CSGO赛事、王者荣耀比赛等电子竞技赛程、比分、结果等数据，了解电竞赛事数据，尽在<?php echo $config['site_name'];?>。">
    <meta name=”Keywords” Content=”电竞赛事,电竞比分,电竞数据分析″>
    <script src="<?php echo $config['site_url'];?>/js/rem.js"></script>
    <link rel="stylesheet" href="<?php echo $config['site_url'];?>/css/reset.css">
    <link rel="stylesheet" href="<?php echo $config['site_url'];?>/css/index.css">
</head>
<body>
    <header>
        <div class="logo">
            <img src="<?php echo $config['site_url'];?>/images/logo.png" alt="" class="logo_img">
            <span class="logo_title">凤凰电竞</span>
        </div>
        <div id='menu'>
            <img src="<?php echo $config['site_url'];?>/images/menu.png" alt="">
        </div>
        <div class="menu_detail"></div>
        <ul class="nav">
            <li class="logo2">
                <a href="<?php echo $config['site_url'];?>">
                    <img src="<?php echo $config['site_url'];?>/images/logo2.png" alt="" class="logo2_img">
                </a>
            </li>
            <li class="active">
                <a href="<?php echo $config['site_url'];?>">
                    首页
                </a>
            </li>
            <li>
                <a href="<?php echo $config['site_url'];?>/match">
                    看比赛
                </a>
            </li>
            <li>
                <a href="<?php echo $config['site_url'];?>/newslist">
                    最新资讯
                </a>
            </li>
            <li>
                <a href="<?php echo $config['site_url'];?>/activity">
                    最新活动
                </a>
            </li>
            <li>
                <a href="<?php echo $config['site_url'];?>/aboutus">
                    关于我们
                </a>
            </li>
        </ul>
        <script>
            var _hmt = _hmt || [];
            (function() {
                var hm = document.createElement("script");
                hm.src = "https://hm.baidu.com/hm.js?b8e1298a4ba636e4f0e189efaa2412ac";
                var s = document.getElementsByTagName("script")[0];
                s.parentNode.insertBefore(hm, s);
            })();
        </script>
    </header>
    <div class="content">
        <div class="img1">
            <img src="<?php echo $config['site_url'];?>/images/img1.png" alt="">
        </div>
        <div class="img2">
            <img src="<?php echo $config['site_url'];?>/images/img2.png" alt="">
        </div>
        <div class="img3">
            <img src="<?php echo $config['site_url'];?>/images/img3.png" alt="">
        </div>
        <div class="index_bot">
            <div class="btn">
                <a href="<?php echo $return['defaultConfig']['data']['android_url']['value'];?>" class="android">安卓版下载</a>
                <a href="<?php echo $return['defaultConfig']['data']['ios_download_url']['value'];?>" class="ios">IOS版下载</a>
            </div>
            <div class="copyright">
                <p class="copyright">
                    <?php renderCertification();?>
                </p>
            </div>
        </div>
    </div>
    <script src="<?php echo $config['site_url'];?>/js/zepto.js"></script>
    <script>
        $("body").on("click",'#menu',function(){
            $(".menu_detail").addClass("active");
            $(".nav").addClass("active");
        })
        $("body").on("click",'.menu_detail',function(){
            $(".menu_detail").removeClass("active");
            $(".nav").removeClass("active");
        })
    </script>
</body>
</html>