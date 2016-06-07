
<div id="footerBox">
    <div class="body-content">
        <div id="footer-widgets">

            <div id="footer-widget1">
                <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-1')) : ?>
                <?php endif; ?>
            </div>

            <div id="footer-widget2">
                <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-2')) : ?>
                <?php endif; ?>
            </div>

            <div id="footer-widget3">
                <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-3')) : ?>
                <?php endif; ?>
            </div>


        </div>

    </div>
</div>

<div class="orangeBox">&COPY; 2016 SunsetCoders</div>