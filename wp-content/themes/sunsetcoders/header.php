<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta property="og:url" content="https://www.facebook.com/SunsetCoders-1506905832879695/"/>
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="Sunsetcoders"/>
    <meta property="og:description" content="Sunsetcoders - We are all about making an Impact"/>
    <meta property="og:image" content="http://www.your-domain.com/path/image.jpg"/>
    <script type="text/javascript" src="//code.jquery.com/jquery-1.9.1.js"></script>
    <script type='text/javascript'>//<![CDATA[
        $(window).load(function () {
            $(".header").click(function () {

                $header = $(this);
                //getting the next element
                $content = $header.next();
                //open up the content needed - toggle the slide- if visible, slide up, if not slidedown.
                $content.slideToggle(500, function () {
                    //execute this after slideToggle is done
                    //change text of header based on visibility of content div
                    $header.text(function () {
                        //change text based on condition
                        return $content.is(":visible") ? "Hide Portfolio" : "View Portfolio";
                    });
                });

            });
        });//]]>

    </script>

    <title>SunsetCoders</title>
    <link href='<?php bloginfo('stylesheet_url'); ?>' rel='stylesheet' type='text/css'>

    <![endif]-->
    <?php wp_head(); ?>
</head>

<body>
<div class="orangeBox">&nbsp;</div>
<div class="HeaderBox">
    <div class="body-content">
        <div class="leftHeader">
        <div class="paddingBox">
            <img src="<?php header_image(); ?>" alt="" height="120"/>
        </div>
            </div>
        <div class="rightHeader">

            <div id="header-widget1">
                <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('header-1')) : ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>