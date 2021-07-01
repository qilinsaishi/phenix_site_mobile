<!DOCTYPE html>
<?php include_once ("web.php");
$params = [
    "defaultConfig"=>["keys"=>["ios_download_url","android_url","contact_type","contact_content","copy_text"],"fields"=>["name","key","value"],"site_id"=>$config['site_id']],
	 "activityList"=>["page"=>1,"page_size"=>20,"site_id"=>$config['activity_site_id']]
];
$return = curl_post(json_encode($params),1);
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="<?php echo $config['site_url'];?>/js/rem.js"></script>
    <link rel="stylesheet" href="<?php echo $config['site_url'];?>/css/reset.css">
    <link rel="stylesheet" href="<?php echo $config['site_url'];?>/css/index.css">
    <title>最新活动-<?php echo $config['site_name'];?>，专业电竞赛事比分分析大数据平台</title>
    <meta name="description" content="">
    <meta name=”Keywords” Content=”<?php echo $config['site_name'];?>最新活动,<?php echo $config['site_name'];?>优惠活动″>
</head>

<body>
    <header>
        <div class="logo">
            <img src="<?php echo $config['site_url'];?>/images/logo.png" alt="" class="logo_img">
            <span class="logo_title">凤凰电竞</span>
            <i class="dot"></i>
            <span class="logo_title">最新活动</span>
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
            <li>
                <a href="<?php echo $config['site_url'];?>/newslist">
                    最新资讯
                </a>
            </li>
            <li class="active">
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
    <div class="activities">
		  <?php foreach($return['activityList']['data'] as $activeInfo){?>
        <a href="<?php echo $activeInfo['url'];?>">
        <div class="activity">
            <div class="img">
                <img src="<?php echo $activeInfo['logo'];?>" alt="<?php echo $activeInfo['title'];?>"  class="imgauto">
            </div>
            <div class="activity_div1">
                <p><?php echo $activeInfo['title'];?></p>
                <span><?php echo date("Y.m.d",$activeInfo['start_time']);?>—<?php echo date("Y.m.d",$activeInfo['end_time']);?></span>
            </div>
            <div class="activity_p"><?php echo html_entity_decode($activeInfo['description']);?></div>
        </div>
        </a>
		 <?php }?>
    </div>
    <footer>
        <a href="<?php echo $return['defaultConfig']['data']['ios_download_url']['value'];?>" class="download">立即下载</a>
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