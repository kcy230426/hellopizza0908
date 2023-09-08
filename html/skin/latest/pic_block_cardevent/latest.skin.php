<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$latest_skin_url.'/style.css">', 0);
$thumb_width = 120;
$thumb_height = 120;
$list_count = (is_array($list) && $list) ? count($list) : 0;
?>

<!-- <section id="cards" class="d-flex align-items-center flex-column">
    <h3>미피를 더욱 합리적인 가격으로!</h3>
    <h2>카드별 <span>할인혜택</span></h2>
    
    <ul class="cardbox d-flex justify-content-center">
        <li>
            <a href="#none">
                <img src="" alt="">
            </a>
            <div class="name">삼성카드</div>
            <div class="content">최대<span> 30</span>%</div>
        </li>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </ul>
</section> -->



<section id="cards" class="d-flex align-items-center flex-column">
    <h3>미피를 더욱 합리적인 가격으로!</h3>
    <h2>카드별 <span>할인혜택</span></h2>
    <div class="swiper">
        <div class="swiper-wrapper">
        <?php
        for ($i=0; $i<$list_count; $i++) {
        $thumb = get_list_thumbnail($bo_table, $list[$i]['wr_id'], $thumb_width, $thumb_height, false, true);

        if($thumb['src']) {
            $img = $thumb['ori'];
        } else {
            $img = G5_IMG_URL.'/no_img.png';
            $thumb['alt'] = '이미지가 없습니다.';
        }
        $img_content = '<img src="'.$img.'" alt="'.$thumb['alt'].'" >';
        $wr_href = get_pretty_url($bo_table, $list[$i]['wr_id']);
        ?>
                <div class="swiper-slide">
                    <?php echo "<a href=\"".$wr_href."\">"?>
                      <?php echo"<img src='$img'>"?>   
                    </a>
                    <div class="name"><?php echo $list[$i]['wr_subject']?></div>
                    <div class="content"><?php echo $list[$i]['wr_content']?></div>
                </div>
        <?php }  ?>
    </div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>
    <?php if ($list_count == 0) { //게시물이 없을 때  ?>
    <div class="empty_li">main_twe_thumb 게시판에서 첨부파일 출력</div>
    <?php }  ?>
 
</section>


    <script>
    var swiper = new Swiper("#cards .swiper", {
      // loop:true,
      slidesPerView: 6,
      loopAdditionalSlides : 1,
      // centeredSlides: true,
      spaceBetween: 0,
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
    });

    // var appendNumber = 1;
    // var prependNumber = 2;
    // document
    //   .querySelector(".prepend-2-slides")
    //   .addEventListener("click", function (e) {
    //     e.preventDefault();
    //     swiper.prependSlide([
    //       '<div class="swiper-slide">Slide ' + --prependNumber + "</div>",
    //       '<div class="swiper-slide">Slide ' + --prependNumber + "</div>",
    //     ]);
    //   });
    // document
    //   .querySelector(".prepend-slide")
    //   .addEventListener("click", function (e) {
    //     e.preventDefault();
    //     swiper.prependSlide(
    //       '<div class="swiper-slide">Slide ' + --prependNumber + "</div>"
    //     );
    //   });
    // document
    //   .querySelector(".append-slide")
    //   .addEventListener("click", function (e) {
    //     e.preventDefault();
    //     swiper.appendSlide(
    //       '<div class="swiper-slide">Slide ' + ++appendNumber + "</div>"
    //     );
    //   });
    // document
    //   .querySelector(".append-2-slides")
    //   .addEventListener("click", function (e) {
    //     e.preventDefault();
    //     swiper.appendSlide([
    //       '<div class="swiper-slide">Slide ' + ++appendNumber + "</div>",
    //       '<div class="swiper-slide">Slide ' + ++appendNumber + "</div>",
    //     ]);
    //   });
  </script>

