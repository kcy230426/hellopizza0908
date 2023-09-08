<?php
if (!defined('_INDEX_')) define('_INDEX_', true);
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MOBILE_PATH.'/index.php');
    return;
}

include_once(G5_THEME_PATH.'/head.php');
?>

<?php include_once(G5_THEME_PATH.'/content.php');?>

<!-- <?php //include_once(G5_THEME_PATH.'/popup.php');?> -->
<script>
    const popupis = $("#hd_pop .hd_pops").length;
    if(popupis > 0) {
        $("body").addClass('popupshow')
    }else{
        $("body").removeClass('popupshow')
    }
    $('.hd_pops_reject, .hd_pops_close').click(function(){
        $("body").removeClass('popupshow')
    })
 </script>   
<?php
include_once(G5_THEME_PATH.'/tail.php');