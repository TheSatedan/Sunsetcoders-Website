<?php
/*
  Plugin Name: SunsetPortfolio
  Plugin URI: http://www.sunsetcoders.com/wordpress-plugins/SunsetPortfolio
  Description: Click to Expand/Collapse Portfolio Viewer.
  Version: 1.0
  Author: Sunsetcoders Development Team
  Author URI: http://www.sunsetcoders.com/wordpress-plugins/SunsetPortfolio
 */

?>
    <script>
        function zoom() {
            var NAME = document.getElementById("imgs");

            if (menu == 1) {

                menu = 0;
                $("#imgs").animate(
                    {'width': '150px', 'height': '250px'}, 150
                );

            } else {
                $("#imgs").animate(
                    {'width': '100px', 'height': '150px'}, 150
                );
            }
        }
    </script>

<?php

add_action('wp_enqueue_scripts', 'portfolio_register');

function portfolio_register()
{
    wp_register_style('sunset-portfolio', plugin_dir_url(__FILE__) . 'sunset-portfolio.css');
    wp_enqueue_style('sunset-portfolio');
}

add_action('admin_menu', 'portfolio_register_menu');

function portfolio_register_menu()
{
    add_menu_page('Show-PortFolio', 'SunsetPortfolio', 'administrator', 'my-portfolio-settings', 'showPortfolioArea', 'dashicons-admin-generic');
}

function showPortfolioArea()
{

    echo 'Admin area';
}

add_shortcode('SunsetPortfolio', 'showPortfolio');

function showPortfolio()
{

    global $wpdb;

    $result = $wpdb->get_results("SELECT * FROM wp_portfolio");
    ?>

    <div id="PortfolioBox">
        <div class="body-content">

            <div class="container">
                <div class="header">View Portfolio</div>
                <div class="content">

                    <?php
                    foreach ($result as $row) {
                        ?>
                        <div onclick="window.open('<?php echo $row->portfolioHyperlink; ?>','new_window');"
                            class="portfolioCell"><?php echo '<h3><a class="pageOwner" href="' . $row->portfolioHyperlink . '" target=_blank>' . $row->portfolioName . '</a></h3><br><img class="grow" src="wp-content/uploads/' . $row->portfolioImage . '"><br><br><br>' . $row->portfolioDescription; ?></div>
                        <hr>
                        <?php

                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <?php

}
