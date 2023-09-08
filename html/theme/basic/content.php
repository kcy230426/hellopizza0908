

<?php echo latest('pic_list','mainSlider', 3, 50); ?>

<?php echo latest('pic_block','main_twe_thumb', 2, 50); ?>

<?php echo latest('pic_block_cardevent','eventCard',8,50);?>

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
        <li>
            <a href="#none">
                <img src="" alt="">
            </a>
            <div class="name">삼성카드</div>
            <div class="content">최대<span> 30</span>%</div>
        </li>
        <li>
            <a href="#none">
                <img src="" alt="">
            </a>
            <div class="name">카드의 정석</div>
            <div class="content">최대<span> 20</span>%</div>
        </li>
        <li>
            <a href="#none">
                <img src="" alt="">
            </a>
            <div class="name">삼성카드</div>
            <div class="content">최대<span> 15</span>%</div>
        </li>
        <li>
            <a href="#none">
                <img src="" alt="">
            </a>
            <div class="name">NH채움카드</div>
            <div class="content">최대<span> 15</span>%</div>
        </li>
        <li>
            <a href="#none">
                <img src="" alt="">
            </a>
            <div class="name">국민행복카드</div>
            <div class="content">최대<span> 15</span>%</div>
        </li>
        <li>
            <a href="#none">
                <img src="" alt="">
            </a>
            <div class="name">신한카드</div>
            <div class="content">최대<span> 20</span>%</div>
        </li>
        <li>
            <a href="#none">
                <img src="" alt="">
            </a>
            <div class="name">현대카드</div>
            <div class="content">최대<span> 40</span>%</div>
        </li>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </ul>
</section> -->

<section id="events">
    <ul class="eventbox d-flex justify-content-center align-items-center">
        <li class="first">
            <?php echo latest('pic_list_pickMenu', 'pickMenu', 1, 50);?>
        </li>
        <li class="second d-flex justify-content-center flex-wrap">
            <?php echo latest('pic_block_eventList', 'eventList', 4, 50);?>
        </li>
    </ul>
</section>

<script>
    // $(function(){
    //     setInterval(function(){
    //         const hundred = -100 +"%"
    //         $("#slide .slidebox").animate({marginLeft:hundred},400,function(){
    //             $(this).find("li").eq(0).appendTo($(this));
    //             $(this).css("marginLeft",0)
    //         })
    //     },3000)
    // })
</script>