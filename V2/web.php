<?php
$config = [
    "site_url" => "https://m.kiringames.cn",
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
function render_page_pagination($total_count,$page_size,$current_page,$url)
{
    $domain='http://'.$_SERVER['SERVER_NAME'];
    $p = 1;
    $p2 = 2;
    $totalPage = ceil($total_count/$page_size);
    if($current_page>1)
    {
        echo '<a href="'.$url."/".($current_page-1).'" class="paging_pre"> <img src="'.$domain.'/images/right.png" alt="" class="active img_transform"></a>';
    }
    if($totalPage<=$p+$p2)
    {
        for($i=1;$i<=$totalPage;$i++)
        {
            echo '<a '.(($i-$current_page)==0?'class="paging_num active"  ':'class="paging_num " ').'href="'.$url."/".$i.'">'.$i.'</a>';
        }
    }
    else
    {
        if($current_page<=($p-$p2))
        {
            for($i=1;$i<=$p;$i++)
            {
                echo '<a '.(($i-$current_page)==0?'class="paging_num active"   ':'class="paging_num " ').' href="'.$url."/".$i.'">'.$i.'</a>';
            }
            echo '<a class="more" href="'.$url."/".($current_page+$p).'"><img src="'.$domain.'/images/more.png" alt=""></a>';
            for($i=$p2;$i>0;$i--)
            {
                echo '<a class="paging_num" href="'.$url."/".($totalPage-$i).'">'.($totalPage-$i).'</a>';
            }
        }
        elseif($current_page<=($p))
        {
            for($i=1;$i<=($p+$p2);$i++)
            {
                echo '<a '.(($i-$current_page)==0?'class="paging_num active"  ':'class="paging_num " ').' href="'.$url."/".$i.'">'.$i.'</a>';
            }
            echo '<a class="more" href="'.$url."/".($current_page+$p).'"><img src="'.$domain.'/images/more.png" alt=""></a>';
            for($i=$p2;$i>0;$i--)
            {
                echo '<a class="paging_num" href="'.$url."/".($totalPage-$i).'">'.($totalPage-$i).'</a>';
            }
        }
        elseif($current_page>$p && $current_page<($totalPage-$p))
        {
            for($i=1;$i<=1;$i++)
            {
                echo '<a class="paging_num" href="'.$url."/".$i.'">'.$i.'</a>';
            }
            echo '<a class="more" href="'.$url."/".($current_page-$p).'"><img src="'.$domain.'/images/more.png" alt=""></a>';
            for($i=$current_page-2;$i<=$current_page+2;$i++)
            {
                echo '<a '.(($i-$current_page)==0?'class="paging_num active"  ':'class="paging_num "').' href="'.$url."/".$i.'">'.$i.'</a>';
            }
            echo '<a class="more" href="'.$url."/".($current_page+$p).'"><img src="'.$domain.'/images/more.png" alt=""></a>';
            for($i=$p2;$i>0;$i--)
            {
                echo '<a class="paging_num" href="'.$url."/".($totalPage-$i).'">'.($totalPage-$i).'</a>';
            }
        }
        elseif($current_page>=($totalPage-$p))
        {
            for($i=1;$i<=1;$i++)
            {
                echo '<a class="paging_num" href="'.$url."/".$i.'">'.$i.'</a>';
            }
            if($totalPage-$p != 1)
            {
                echo '<a class="paging_num" href="'.$url."/".($current_page-$p).'">...</a>';
            }
            for($i=$p;$i>0;$i--)
            {
                echo '<a '.(($totalPage-$i-$current_page)==0?'class="paging_num active"  ':'class="paging_num "').' href="'.$url."/".($totalPage-$i).'">'.($totalPage-$i).'</a>';
            }
        }
    }
    if($current_page<$totalPage)
    {
        echo '<a href="'.$url."/".($current_page+1).'" class="paging_next"><img src="'.$domain.'/images/right.png" alt="" class="active "></a>';
    }
}
