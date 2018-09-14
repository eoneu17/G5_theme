<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$latest_skin_url.'/style.css">', 0);
?>

<div class="latest">
  <dl>
    <dt><? echo $bo_subject;?></dt>
    <a href="<?echo G5_BBS_URL ?>/board.php?bo_table=<? echo $bo_table;?>" class="more_btn">+</a>
      <dd>
				<ul id="noticeList">
          <? for($i=0;$i<count($list);$i++){ ?>
            <li>
                <a href="<?echo $list[$i]['href'];?>">
                  <h4 class="news_title"><span class="icon"></span> <? echo $list[$i]['subject'];?></h4>
                </a>
            </li>
          <?}?>
          <?if(count($list)==0){?>
            <li>게시물이 없습니다. </li>
          <? }?>
        </ul>
			</dd>
		</dl>
</div>
