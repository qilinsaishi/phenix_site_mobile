<!DOCTYPE html>
<?php include_once ("web.php");
$params = [
    "defaultConfig"=>["keys"=>["ios_download_url","android_url","weibo_url","baijia_url","wechat"],"fields"=>["name","key","value"],"site_id"=>$config['site_id']],
];
$startDate = date("Y-m-d",time()-10*86400);
$endDate = date("Y-m-d",time()+3*86400);
//依次加入所有游戏
foreach ($config['game'] as $game => $gameName)
{
    $params[$game."matchList"] =
        ["dataType"=>"matchList","source"=>"scoregg","page"=>1,"page_size"=>100,"game"=>$game,"start_date"=>$startDate,"end_date"=>$endDate,"cache_time"=>3600];
}
$return = curl_post(json_encode($params),1);
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>最新电竞赛事赛程-<?php echo $config['site_name'];?></title>
    <meta name="Keywords" content="电竞赛事赛程,电竞比赛">
    <meta name="description" content="<?php echo $config['site_name'];?>提供最新电子竞技赛事,为广大电竞玩家提供最新电竞赛事赛程信息,了解最新最全电竞赛事赛程信息,请关注<?php echo $config['site_name'];?>">
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
            <span class="logo_title">看比赛</span>
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
            <li  class="active">
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
            <li>
                <a href="<?php echo $config['site_url'];?>/aboutus">
                    关于我们
                </a>
            </li>
        </ul>
    </header>
    <div class="watch">
        <ul class="watch_ul">
            <?php $i=0;foreach($config['game'] as $currentGame => $gameName){?>
                <li <?php if($i==0){echo 'class="active"';}?>>
                    <a href="##">
                        <?php echo $gameName?>
                    </a>
                </li>
            <?php $i++;}?>
        </ul>
        <div class="watch_content">
            <?php $i=0;foreach($config['game'] as $currentGame => $gameName){?>
                <div class="watch_item <?php if($i==0){echo 'active';}?>">
                    <?php foreach($return[$currentGame."matchList"]['data'] as $matchInfo){?>
                                    <div class="watch_match">
            <a href="##">
                <div class="watch_match_top">
                    <p><?php echo strtoupper($currentGame);?><span class="grey">&nbsp;·&nbsp;<?php echo date("m-d H:i",strtotime($matchInfo['start_time']));?></span></p>
                    <p class="<?php echo generateMatchStatus($matchInfo['start_time'])['color'];?>"><?php echo generateMatchStatus($matchInfo['start_time'])['text'];?></p>
                </div>
                <div class="watch_match_bot">
                    <div class="team_img mr">
                        <img src="<?php echo $matchInfo['home_team_info']['logo'];?>" alt="<?php echo $matchInfo['home_team_info']['team_name'];?>" class="">
                    </div>
                    <span class="team_name tl"><?php echo $matchInfo['home_team_info']['team_name'];?></span>
                    <span class="span mr red"><?php echo $matchInfo['home_score'];?></span>
                    <span class="span blue"><?php echo $matchInfo['away_score'];?></span>
                    <span class="team_name tr"><?php echo $matchInfo['away_team_info']['team_name'];?></span>
                    <div class="team_img ml">
                        <img src="<?php echo $matchInfo['away_team_info']['logo'];?>" alt="<?php echo $matchInfo['away_team_info']['team_name'];?>" class="">
                    </div>
                </div>
            </a>
        </div>

        <?php }?>
                </div>
                <?php $i++;}?>
        </div>
    </div>
    <footer>
        <a href="<?php echo $return['defaultConfig']['data']['ios_download_url']['value'];?>" class="download">立即下载</a>
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