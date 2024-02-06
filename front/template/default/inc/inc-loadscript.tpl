<!-- Core -->
<script src="{$template}/assets/js/jquery-3.6.0.js"></script>
<script src="{$template}/assets/js/jquery-ui.js"></script>
<script src="{$template}/assets/js/jquery.easing.min.js"></script>
<script src="{$template}/assets/js/jquery.mCustomScrollbar.js"></script>
<!-- <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script> -->

<!-- Lazy -->
<script src="{$template}/assets/js/jquery.lazy.min.js"></script>
<script src="{$template}/assets/js/jquery.lazy.av.min.js"></script>
<script src="{$template}/assets/js/jquery.lazy.youtube.min.js"></script>

<!-- <script src="{$template}/assets/js/bootstrap.min.js"></script> -->
<script src="{$template}/assets/js/modernizr.min.js"></script>
<script src="{$template}/assets/js/popper.min.js"></script>
<script src="{$template}/assets/js/validator.min.js"></script>

<!-- AOS -->
<script src="{$template}/assets/js/aos.js"></script>

<script src="{$template}/assets/js/sweetalert2@11.js"></script>

<script src="{$template}/assets/js/swiper-bundle.min.js"></script>
<script src="{$template}/assets/js/select2.min.js"></script>
<script src="{$template}/assets/js/jquery.fancybox.min.js"></script>
<script src="{$template}/assets/js/clipboard.min.js"></script>

<!-- plugin -->
<script src="{$template}/assets/js/slick.min.js"></script>


<!-- bootstrap 4 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Custom -->
<script src="{$template}/assets/js/main.js{$lastModify}"></script>

<script type="text/javascript">
    var raf = window.requestAnimationFrame || window.mozRequestAnimationFrame || window.webkitRequestAnimationFrame || window.msRequestAnimationFrame;
</script>

{strip}
    {if {$assignjs|default:null}}
        {foreach $assignjs as $addAssetScript}
            {$addAssetScript}
        {/foreach}
    {/if}
{/strip}