

</div><!-- /.container -->
</div><!-- wrap -->


<footer>

<!--    <div class="navbar">-->
<!--        <div class="navbar-inner">-->
<!--            <form role="search" class="navbar-form pull-left" method="get" id="searchform" action="--><?php //echo home_url( '/' ); ?><!--">-->
<!--                <input type="text" class="span2" placeholder="Search..." value="" name="s" id="s" />-->
<!--                <input type="submit" class="btn btn-default" id="searchsubmit" value="Search" />-->
<!--            </form>-->
<!--        </div>-->
<!--    </div>-->

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="pull-left">
                    <p>&copy; <?php _e(date("Y")); ?> <?php bloginfo("name"); ?> &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
                </div>
                <div class="pull-right">
                    <p><a href="#top">Back to top</a></p>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="<?php echo get_stylesheet_directory_uri(); ?>/dist/js/bootstrap.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/holder.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/inc/jquery/jquery-hover.js"></script>

<!-- Add mousewheel plugin (this is optional) -->
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/fancybox/lib/jquery.mousewheel-3.0.6.pack.js"></script>
<!-- Add fancyBox -->
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/fancybox/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/fancybox/source/jquery.fancybox.pack.js?v=2.1.5"></script>
<!-- Optionally add helpers - button, thumbnail and/or media -->
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/fancybox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" type="text/css" media="screen" />
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/fancybox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" type="text/css" media="screen" />
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/fancybox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>

<script type="text/javascript">
    jQuery(function($){

        $("a[href='#top']").click(function() {
            $("html, body").animate({ scrollTop: 0 }, "slow");
            return false;
        });

        $.fn.activateClass = function(){
            $(this)
                .first()
                .addClass("active");
        };

        $(".carousel-inner .item").activateClass();
        $(".carousel-indicators li").activateClass();
        $("#menu-main-menu .menu-item").DropDownAddClass();

        $('.gallery-item').each(function(){
            $(this).addClass('img-responsive');
        });

        $(".gallery-icon")
            .each(function(){
                $(this)
                    .find("a[href]")
                    .addClass("fancybox")
                    .attr("rel", "galleries");
            });
        $(".fancybox").fancybox({
            helpers : {
                title : { type : "inside" }
            },
            beforeLoad: function() {
                this.title = $  (this.element)
                    .find("img")
                    .attr("alt");
            }
        });
    });
</script>

<?php wp_footer(); ?>

</body>
</html>