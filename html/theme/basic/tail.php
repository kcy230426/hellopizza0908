<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MOBILE_PATH.'/tail.php');
    return;
}
?>

<?php if (!defined("_INDEX_")) { ?>
</div>
<?php } ?>

</div>
<!-- } 콘텐츠 끝 -->

<hr>

<!-- 하단 시작 { -->
<div id="ft">

    <div id="ft_wr">
        <div id="ft_company" class="ft_cnt">
	        <ul class="ft_info">
                <li class="d-flex justify-content-center align-items-center">
                    <h3><a href="#none" class="d-block"><img src="/img/f_logo.png" alt="하단로고" class="d-block"></a></h3>
                    <div class="imgbox"><img src="/img/prise.png" alt="수상"></div>
                    <div class="imgbox"><img src="/img/prise2.png" alt="수상"></div>
                    <!-- <div class="service">
                    <span class="round-border"><i class="bi bi-telephone-fill"></i></span><div class="d-inline-block">고객센터 1577-0000(주말 휴무)</div>
                    </div> -->
                </li>
                <li class="d-flex justify-content-center">
                    <div>서울시 서초구 효령로 ○○○ 대표이사 ○○○</div>
                    <div>사업자등록번호 ○○○-○○-○○○○○○</div>
                </li>
                <li class="d-flex justify-content-center">
                    <div class="service">
                    <span class="round-border"><i class="bi bi-telephone-fill"></i></span><div class="d-inline-block">고객센터 1577-0000(주말 휴무)</div>
                    </div>
                    <div>Copyright © KCY All rights reserved</div>
                </li>
            </ul>
	    </div>    
        <div id="ft_link" class="ft_cnt">
            <div class="ft_link_box">
                <div class="snsbox d-flex justify-content-center align-items-center">
                    <a href="#none"><i class="bi bi-twitter"></i></a>
                    <a href="#none"><i class="bi bi-facebook"></i></a>
                    <a href="#none"><i class="bi bi-instagram"></i></a>
                    <select name="sitemap" id="sitemap">
                        <option value="familysite">패밀리사이트</option>
                        <option value="helloburger">헬로우버거</option>
                    </select>
                </div>
                <div class="ftbox d-flex justify-content-center">
                    <a href="<?php echo get_pretty_url('content', 'privacy'); ?>">개인정보처리방침</a>
                    <a href="<?php echo get_pretty_url('content', 'provision'); ?>">이용약관</a>
                    <a href="<?php echo get_pretty_url('content', 'company'); ?>">창업안내</a>
                    <a href="<?php echo get_pretty_url('content', 'company'); ?>" class="nbbt">사이트맵</a>
                </div>
            </div>
        </div>
    <button type="button" id="top_btn">
    	<i class="bi bi-chevron-up" aria-hidden="true"></i><span class="sound_only">상단으로</span>
    </button>
    </div>
        <script>
        $(function() {
            $("#top_btn").on("click", function() {
                $("html, body").animate({scrollTop:0}, '500');
                return false;
            });
        });
        </script>

<?php
if(G5_DEVICE_BUTTON_DISPLAY && !G5_IS_MOBILE) { ?>
<?php
}

if ($config['cf_analytics']) {
    echo $config['cf_analytics'];
}
?>

<!-- } 하단 끝 -->

<script>
$(function() {
    // 폰트 리사이즈 쿠키있으면 실행
    font_resize("container", get_cookie("ck_font_resize_rmv_class"), get_cookie("ck_font_resize_add_class"));
});
</script>

<?php
include_once(G5_THEME_PATH."/tail.sub.php");