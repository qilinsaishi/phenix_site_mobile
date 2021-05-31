<!DOCTYPE html>
<?php include_once ("web.php");
$params = [
    "defaultConfig"=>["keys"=>["ios_url","android_url","weibo_url","baijia_url","wechat"],"fields"=>["name","key","value"],"site_id"=>$config['site_id']],
];
$return = curl_post(json_encode($params),1);
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>关于我们-<?php echo $config['site_name'];?>，专业电竞赛事比分分析大数据平台</title>
    <meta name="description" content="<?php echo $config['site_name'];?>是以电竞赛事为主的电子竞技数据平台,<?php echo $config['site_name'];?>涵盖LOL比赛、DOTA2比赛、CSGO赛事、王者荣耀KPL比分等电竞比赛赛程，关注<?php echo $config['site_name'];?>，电竞赛事数据一手掌握。">
    <meta name=”Keywords” Content=”″>
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
            <span class="logo_title">关于我们</span>
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
            <li>
                <a href="<?php echo $config['site_url'];?>/activity">
                    最新活动
                </a>
            </li>
            <li  class="active">
                <a href="<?php echo $config['site_url'];?>/aboutus">
                    关于我们
                </a>
            </li>
        </ul>
    </header>
    <div class="about">
        <div class="about1">
            <img src="<?php echo $config['site_url'];?>/images/yinhao.png" alt="" class="yinhao_left">
            <p class="about1_div">
                <span class="about1_p">
                    <img src="<?php echo $config['site_url'];?>/images/logo3.png" alt="">
                    <i><?php echo $config['site_name'];?></i>
                </span>
                是获得海南政府批复，以赛事竞猜系统为基础，为广大用户发布赛事信息，提供有奖竞猜的赛事服务平台
            </p>
            <img src="<?php echo $config['site_url'];?>/images/yinhao.png" alt="" class="yinhao_right">
        </div>
        <div class="about2">
            <img src="<?php echo $config['site_url'];?>/images/hot_game.png" alt="" class="img1">
            <ul class="about2_ul">
                <li>
                    <a href="##">
                        <img src="<?php echo $config['site_url'];?>/images/lol.png" alt="">
                        <span>英雄联盟</span>
                    </a>
                </li>
                <li>
                    <a href="##">
                        <img src="<?php echo $config['site_url'];?>/images/dota2.png" alt="">
                        <span>DOTA2</span>
                    </a>
                </li>
                <li>
                    <a href="##">
                        <img src="<?php echo $config['site_url'];?>/images/csgo.png" alt="">
                        <span>CSGO</span>
                    </a>
                </li>
                <li>
                    <a href="##">
                        <img src="<?php echo $config['site_url'];?>/images/kpl.png" alt="">
                        <span>王者荣耀</span>
                    </a>
                </li>
            </ul>
            <p class="about2_p1">
                平台覆盖全球数万场赛事：S赛、LPL、Major、KPL等主流联事以及地区性的乙级联赛
                <span>均有收录</span>
            </p>
            <p class="about2_p2">
                只有没见过的电竞联赛，没有找不到的电竞联赛
            </p>
            <div class="about2_div1">
                <div class="fenxi">
                    <img src="<?php echo $config['site_url'];?>/images/fenxi.png" alt="">
                    <span>赛前数据分析</span>
                    <img src="<?php echo $config['site_url'];?>/images/fenxi.png" alt="">
                </div>
                <p>独特赛事前瞻分析，通过双方近期的战绩和交手纪录以及胜率等表现对比，可科学合理地作出比赛预测</p>
            </div>
        </div>
        <div class="about3">
            <img src="<?php echo $config['site_url'];?>/images/advantage.png" alt="" class="img1">
            <ul class="about3_ul">
                <li>
                    <a href="##">
                        <img src="<?php echo $config['site_url'];?>/images/advantage1.png" alt="">
                        <span>数据分析</span>
                        <p>多层次，全方位高精准的剖析各类赛事</p>
                    </a>
                </li>
                <li>
                    <a href="##">
                        <img src="<?php echo $config['site_url'];?>/images/advantage2.png" alt="">
                        <span>专家预测</span>
                        <p>提供实时、准确全面的热门联赛赛果预测</p>
                    </a>
                </li>
                <li>
                    <a href="##">
                        <img src="<?php echo $config['site_url'];?>/images/advantage3.png" alt="">
                        <span>数据分析</span>
                        <p>各大游戏联赛全面聚焦，网罗全网赛事，精彩不停</p>
                    </a>
                </li>
                <li>
                    <a href="##">
                        <img src="<?php echo $config['site_url'];?>/images/advantage4.png" alt="">
                        <span>数据分析</span>
                        <p>海南省最大的赛事举办运营公司之一</p>
                    </a>
                </li>
                <li>
                    <a href="##">
                        <img src="<?php echo $config['site_url'];?>/images/advantage5.png" alt="">
                        <span>数据分析</span>
                        <p>最新最热话题战队、选手动态实时更新</p>
                    </a>
                </li>
                <li>
                    <a href="##">
                        <img src="<?php echo $config['site_url'];?>/images/advantage6.png" alt="">
                        <span>数据分析</span>
                        <p>海南政府批复平台注册资金1000万元</p>
                    </a>
                </li>
            </ul>
        </div>
        <div class="about4">
            <a href="<?php echo $return['defaultConfig']['data']['weibo_url']['value'];?>">
                <img src="<?php echo $config['site_url'];?>/images/weibo.png" alt="微博">
            </a>
            <a href="<?php echo $return['defaultConfig']['data']['wechat']['value'];?>" class="weixin">
                <img src="<?php echo $config['site_url'];?>/images/weixin.png" alt="微信账号">
            </a>
            <a href="<?php echo $return['defaultConfig']['data']['baijia_url']['value'];?>">
                <img src="<?php echo $config['site_url'];?>/images/baijiahao.png" alt="百家号">
            </a>
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