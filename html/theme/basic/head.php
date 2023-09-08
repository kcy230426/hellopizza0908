<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MOBILE_PATH.'/head.php');
    return;
}

include_once(G5_THEME_PATH.'/head.sub.php');
include_once(G5_LIB_PATH.'/latest.lib.php');
include_once(G5_LIB_PATH.'/outlogin.lib.php');
include_once(G5_LIB_PATH.'/poll.lib.php');
include_once(G5_LIB_PATH.'/visit.lib.php');
include_once(G5_LIB_PATH.'/connect.lib.php');
include_once(G5_LIB_PATH.'/popular.lib.php');
?>

<!-- 상단 시작 { -->
    <?php
    if(defined('_INDEX_')) { // index에서만 실행
        include G5_BBS_PATH.'/newwin.inc.php'; // 팝업레이어
    }
    ?>
<div id="hd" class="fixed-top bg-white">
    <h1 id="hd_h1"><?php echo $g5['title'] ?></h1>
    <div id="skip_to_container"><a href="#container">본문 바로가기</a></div>


    <div id="tnb">
    	<div class="inner overflow-hidden">
            
			<ul id="hd_qnb">           

               
                    <li>
                    <?php if ($is_member) {  ?>
                        <a href="<?php echo G5_BBS_URL ?>/logout.php">로그아웃</a>
                        <?php if ($is_admin) {  ?>
                        <a href="<?php echo correct_goto_url(G5_ADMIN_URL); ?>" class="ml15">관리자</a>
                        <?php }  ?>
                    <?php }else{ ?>
                        <a href="<?php echo G5_BBS_URL ?>/login.php">로그인</a>
                    <?php } ?>                        
                    </li>
                    <li>
                        
                    
                    <?php if ($is_member) {  ?>
                        <a href="<?php echo G5_BBS_URL ?>/member_confirm.php?url=<?php echo G5_BBS_URL ?>/register_form.php">정보수정</a>
                   
                    <?php }else{ ?>
                        <a href="<?php echo G5_BBS_URL ?>/register.php">회원가입</a>
                    <?php } ?>     
                
                   </li>
                    <li><a href="<?php echo G5_BBS_URL ?>/new.php">공지사항</a></li>
                    <li><a href="<?php echo G5_BBS_URL ?>/faq.php">FAQ</a></li>
               

	        </ul>
		</div>
    </div>
    <div id="hd_wrapper">
        <div class="d-flex justify-content-between align-items-center">
            <?php echo latest('pic_logo', 'mainLogo', 1,50) ?>                  
            <nav id="gnb">
                <h2>메인메뉴</h2>
                <div>
                    <ul id="gnb_1dul">
                        <div class="gnb_ads position-relative">
                            <div class="position-absolute bg-white">
                                <div class="content">
                                    <?php echo latest('pic_list_gnbAds','gnbAds',1,50)?>
                                </div>
                            </div>
                        </div>    
                        <?php
                        $menu_datas = get_menu_db(0, true);
                        $gnb_zindex = 999; // gnb_1dli z-index 값 설정용
                        $i = 0;
                        foreach( $menu_datas as $row ){
                            if( empty($row) ) continue;
                            $add_class = (isset($row['sub']) && $row['sub']) ? 'gnb_al_li_plus' : '';
                        ?>
                        <li class="gnb_1dli <?php echo $add_class; ?>" style="z-index:<?php echo $gnb_zindex--; ?>">
                            <a href="<?php echo $row['me_link']; ?>" target="_<?php echo $row['me_target']; ?>" class="gnb_1da"><?php echo $row['me_name'] ?></a>
                            <?php
                            $k = 0;
                            foreach( (array) $row['sub'] as $row2 ){

                                if( empty($row2) ) continue; 

                                if($k == 0)
                                    echo '<ul class="gnb_2dul_box">'.PHP_EOL;
                            ?>
                                <li class="gnb_2dli"><a href="<?php echo $row2['me_link']; ?>" target="_<?php echo $row2['me_target']; ?>" class="gnb_2da"><?php echo $row2['me_name'] ?></a></li>
                            <?php
                            $k++;
                            }   //end foreach $row2

                            if($k > 0)
                                echo '</ul>'.PHP_EOL;
                            ?>
                        </li>
                        <?php
                        $i++;
                        }   //end foreach $row

                        if ($i == 0) {  ?>
                            <li class="gnb_empty">메뉴 준비 중입니다.<?php if ($is_admin) { ?> <a href="<?php echo G5_ADMIN_URL; ?>/menu_list.php">관리자모드 &gt; 환경설정 &gt; 메뉴설정</a>에서 설정하실 수 있습니다.<?php } ?></li>
                        <?php } ?>
                    </ul>
                    <div id="gnb_all">
                        <h2>전체메뉴</h2>
                        <ul class="gnb_al_ul">
                            <?php
                            
                            $i = 0;
                            foreach( $menu_datas as $row ){
                            ?>
                            <li class="gnb_al_li">
                                <a href="<?php echo $row['me_link']; ?>" target="_<?php echo $row['me_target']; ?>" class="gnb_al_a"><?php echo $row['me_name'] ?></a>
                                <?php
                                $k = 0;
                                foreach( (array) $row['sub'] as $row2 ){
                                    if($k == 0)
                                        echo '<ul>'.PHP_EOL;
                                ?>
                                    <li><a href="<?php echo $row2['me_link']; ?>" target="_<?php echo $row2['me_target']; ?>"><?php echo $row2['me_name'] ?></a></li>
                                <?php
                                $k++;
                                }   //end foreach $row2

                                if($k > 0)
                                    echo '</ul>'.PHP_EOL;
                                ?>
                            </li>
                            <?php
                            $i++;
                            }   //end foreach $row

                            if ($i == 0) {  ?>
                                <li class="gnb_empty">메뉴 준비 중입니다.<?php if ($is_admin) { ?> <br><a href="<?php echo G5_ADMIN_URL; ?>/menu_list.php">관리자모드 &gt; 환경설정 &gt; 메뉴설정</a>에서 설정하실 수 있습니다.<?php } ?></li>
                            <?php } ?>
                        </ul>
                        <button type="button" class="gnb_close_btn"><i class="fa fa-times" aria-hidden="true"></i></button>
                </div>
            </nav>
                <ul class="icongnb d-flex">
                    <li><a href="http://hellopizza.dothome.co.kr/bbs/member_confirm.php?url=http://hellopizza.dothome.co.kr/bbs/register_form.php"><i class="bi bi-person"></i><span class="sound_only">개인메뉴</span></a></li>
                    <li><a href="#none"><i class="bi bi-cart4"></i><span class="sound_only">장바구니</span></a></li>
                    <li><a href="/bbs/faq.php"><i class="bi bi-headset"></i><span class="sound_only">문의상담</span></a></li>
                </ul>
        </div>
       
    </div>
    

    <script>
    
    $(function(){
        $(".gnb_menu_btn").click(function(){
            $("#gnb_all, #gnb_all_bg").show();
        });
        $(".gnb_close_btn, #gnb_all_bg").click(function(){
            $("#gnb_all, #gnb_all_bg").hide();
        });
    });

    $(function(){
    $(window).scroll(function(){
        // 스크롤을 하면
        if($(window).scrollTop() > 250){
            // 스크롤의 위치가 80보다 커지면
            $("body").addClass("scroll");
            // body에 scroll 클래스를 삽입해라.
        }else{
            $("body").removeClass("scroll")
        };  })
    // $(".nav-link").click(function(){
    //     $(".nav-link").removeClass("bolding")
    //     $(this).addClass("bolding")
    // })
})

    // $(function handleScroll() {
    //     const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
    //     const body = document.querySelector('body');
    //     const threshold = 10; // 스크롤을 얼마나 내려야 클래스가 추가되는지 조정 가능

    //     if (scrollTop > threshold) {
    //         body.classList.add('on');
    //     } else {
    //         body.classList.remove('on');
    //     }
    // }
    // console.log("test2323")
    // function throttledHandleScroll() {
    //     throttle(handleScroll, 100);
    // }

    // window.addEventListener('scroll', throttledHandleScroll);

    // function removeScrollListener() {
    //     window.removeEventListener('scroll', throttledHandleScroll);
    // })

    </script>
   <?php echo latest('basic','mainAds', 1, 60)?> 
</div>
<!-- } 상단 끝 -->


<hr>

<!-- 콘텐츠 시작 { -->
<div id="wrapper">
    
    <?php if (!defined("_INDEX_")) { ?>
        <div class="container">
           <!-- <h2 id="container_title"><span title="<?php //echo get_text($g5['title']); ?>" class="sound_only"><?php //echo get_head_title($g5['title']); ?></span></h2> -->
    <?php }
