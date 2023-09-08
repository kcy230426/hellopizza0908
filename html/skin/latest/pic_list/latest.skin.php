<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');


$thumb_width = 1920;
$thumb_height = 400;
$list_count = (is_array($list) && $list) ? count($list) : 0;
?>

<div id="slide" class="swiper <?php echo $bo_table; ?>">
    <div class="swiper-wrapper">
    <?php
    for ($i=0; $i<$list_count; $i++) {
        
        $img_link_html = '';
        
        $wr_href = get_pretty_url($bo_table, $list[$i]['wr_id']);

        
            $thumb = get_list_thumbnail($bo_table, $list[$i]['wr_id'], $thumb_width, $thumb_height, false, true);
         

            if($thumb['src']) { //  첨부파일이 있다면
                $img = $thumb['ori']; // 오리지널 파일의 경로 저장
            } else {
                $img = G5_IMG_URL.'/no_img.png';
                $thumb['alt'] = '이미지가 없습니다.';
            }
            $img_content = '<img src="'.$img.'" alt="'.$thumb['alt'].'" class="img-fluid">';
            $img_link_html = '<a href="'.$wr_href.'" class="lt_img" >'.run_replace('thumb_image_tag', $img_content, $thumb).'</a>';
       
    ?>
       
       
        <div class="swiper-slide" style="background:url('<?php echo $img; ?>') no-repeat center; background-size:cover">
            <?php echo "<a href=\"".$wr_href."\" class='d-flex h-100'>" ?>
                <div class="wrap">
                    <div class="box">
                        <h3><?php echo  $list[$i]['wr_subject']; ?></h3>
                        <div><?php echo  $list[$i]['wr_content']; ?></div>
                    </div>
                </div>
            </a>
        </div>
    <?php }  ?>
    <?php if ($list_count == 0) { //게시물이 없을 때  ?>
    <div class="empty_li">게시물이 없습니다.</div>
    <?php }  ?>
    </div>
    <!-- <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div> -->
    <div class="swiper-pagination"></div>

</div>
<script>
    const swiper<?php echo $bo_table; ?> = new Swiper('.swiper.<?php echo $bo_table; ?>', {
            loop: true,
            autoplay: {
                delay: 3500,
                disableOnInteraction: false,
            },
              pagination: {
                el: '.swiper.<?php echo $bo_table; ?> .swiper-pagination',
              },
              navigation: {
                nextEl: '.swiper.<?php echo $bo_table; ?> .swiper-button-next',
                prevEl: '.swiper.<?php echo $bo_table; ?> .swiper-button-prev',
              },

            // And if we need scrollbar
            //   scrollbar: {
            //     el: '.swiper.<?php //echo $bo_table; ?> .swiper-scrollbar',
            //   },
    });
</script>
