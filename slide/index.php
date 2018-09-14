<?php
define('_INDEX_', true);
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MOBILE_PATH.'/index.php');
    return;
}

include_once(G5_THEME_PATH.'/head.php');
?>

<script>
  $(document).ready(function(){
    $('.slide1').bxSlider({
      pager:false, controls:false, auto:true
    });
  });
</script>

<div class="slide1">
  <div><img src="<? echo G5_THEME_IMG_URL; ?>/slide01.png" alt="slide01"></div>
  <div><img src="<? echo G5_THEME_IMG_URL; ?>/slide02.png" alt="slide02"></div>
  <div><img src="<? echo G5_THEME_IMG_URL; ?>/slide03.png" alt="slide03"></div>
</div>

<style>
  .gallery_wrap {width: 100%;},
  .gallery_wrap>ul{width: 100%;overflow: hidden;}
  .gallery_wrap>ul>li{margin: 5px 0;float: left;}
  .gallery_wrap>ul>li:nth-child(2n) .latest{margin-left: 10px;}
</style>

<div class="gallery_wrap">
  <ul>
    <li>
  	   <?echo latest('theme/mylatest2', 'notice', 4, 23);?>
    </li>
    <li>
  	   <?echo latest('theme/mylatest2', 'gallery', 4, 23);?>
    </li>
    <li>
  	   <?echo latest('theme/mylatest2', 'free',4, 18);?>
    </li>
    <li>
  	   <?echo latest('theme/mylatest2', 'qa',4, 23);?>
    </li>
  </ul>
</div>
<div class="latest_wr" style="display:none;">
<!-- 최신글 시작 { -->

    <?php
    //  최신글
    $sql = " select bo_table
                from `{$g5['board_table']}` a left join `{$g5['group_table']}` b on (a.gr_id=b.gr_id)
                where a.bo_device <> 'mobile' ";
    if(!$is_admin)
        $sql .= " and a.bo_use_cert = '' ";
    $sql .= " and a.bo_table not in ('notice', 'gallery') ";     //공지사항과 갤러리 게시판은 제외
    $sql .= " order by b.gr_order, a.bo_order ";
    $result = sql_query($sql);
    for ($i=0; $row=sql_fetch_array($result); $i++) {
        if ($i%2==1) $lt_style = "margin-left:2%";
        else $lt_style = "";
    ?>
    <div style="float:left;<?php echo $lt_style ?>" class="lt_wr">
        <?php
        // 이 함수가 바로 최신글을 추출하는 역할을 합니다.
        // 사용방법 : latest(스킨, 게시판아이디, 출력라인, 글자수);
        // 테마의 스킨을 사용하려면 theme/mylatest 과 같이 지정
        echo latest('theme/mylatest', $row['bo_table'], 6, 24);
        ?>
    </div>
    <?php
    }
    ?>
    <!-- } 최신글 끝 -->

</div>

<div class="latest_wr" style="display:none;">
    <!--  사진 최신글2 { -->
    <?php
    // 이 함수가 바로 최신글을 추출하는 역할을 합니다.
    // 사용방법 : latest(스킨, 게시판아이디, 출력라인, 글자수);
    // 테마의 스킨을 사용하려면 theme/basic 과 같이 지정
    echo latest('theme/pic_basic', 'gallery', 5, 23);
    ?>
    <!-- } 사진 최신글2 끝 -->
</div>

<?php
include_once(G5_THEME_PATH.'/tail.php');
?>
