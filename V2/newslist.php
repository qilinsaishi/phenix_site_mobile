<!DOCTYPE html>
<?php include_once ("web.php");
$reset = $_GET['reset']??0;
$info['page']['page_size'] = 5;
$page = $_GET['page']??1;
if($page==''){
$page=1;
}
$params = [
    "defaultConfig"=>["keys"=>["ios_url","android_url","weibo_url","baijia_url","wechat"],"fields"=>["name","key","value"],"site_id"=>$config['site_id']],
    "informationList"=>["page"=>$page,"site"=>1,"page_size"=>$info['page']['page_size'],"type"=>"1,2,3,5,6,7","fields"=>"*","reset"=>intval($reset)],
];
$return = curl_post(json_encode($params),1);
$info['page']['total_count'] = $return['informationList']['count'];
$info['page']['total_page'] = intval($return['informationList']['count']/$info['page']['page_size']);
if($reset>0)
{
    print_r(array_column($return["informationList"]['data'],"id"));
    echo "refreshed";
    die();
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>热门资讯-<?php echo $config['site_name'];?>，专业电竞赛事比分分析大数据平台</title>
    <meta name="description" content="<?php echo $config['site_name'];?>提供热门电竞行业赛事资讯，电子竞技比赛新闻，了解电竞赛事资讯新闻，关注<?php echo $config['site_name'];?>。">
    <meta name=”Keywords” Content=”电竞赛事资讯,电竞比赛资讯″>
    <!-- <script src="<?php echo $config['site_url'];?>/js/flexible.js"></script> -->
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
            <span class="logo_title">最新资讯</span>
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
        <?php   foreach($return['informationList']['data'] as $key => $value) {?>
            <div class="new_item">
                <a href="<?php echo $config['site_url']; ?>/detail/<?php echo $value['id'];?>">
                    <p class="title"><?php echo $value['title'];?></p>
                    <div class="new_item_div">
                        <div class="left">
                            <p class="description"><?php echo $value['content'];?></p>
                            <div class="others">
                                <div class="chakan">
                                    <img src="<?php echo $config['site_url'];?>/images/eye.png" alt="">
                                    <span><?php echo $value['views'];?></span>
                                </div>
                                <span><?php echo date("Y-m-d",strtotime($value['create_time']));?></span>
                            </div>
                        </div>
                        <div class="new_item_img">
                            <img src="<?php echo $value['logo'];?>" alt="<?php echo $value['title'];?>" class="imgauto">
                        </div>
                    </div>
                </a>
            </div>

        <?php }?>
    </div>
    <footer>
        <a href="<?php echo $return['defaultConfig']['data']['ios_url']['value'];?>" class="download">立即下载</a>
    </footer>
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

        $(".watch_ul").on("click",'li',function(){
            $(".watch_ul li").removeClass("active");
            $(this).addClass("active");
            $(this).parents(".watch").find(".watch_content").find(".watch_item").removeClass("active").eq($(this).index()).addClass("active");
        })
    </script>
</body>
</html>