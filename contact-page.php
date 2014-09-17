<?php
/* Template Name: contact page */
get_header();
?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div class="yellow">
        <div class="container">
            <div class="row">
                <div class="page-title-wrapper">
                    <?php echo the_content(); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row page-content">
            <div class="col-md-12">
                <div id="contact">

                    <div id="message"></div>

                    <form method="post" action="<?php echo get_stylesheet_directory_uri(); ?>/contact/classes/contact.php" name="contactform" id="contactform">
                        <fieldset>
                            <legend>Please fill in the following form to contact us</legend>

                            <label for="name" accesskey="U"><span class="required">*</span> Your Name</label>
                            <input name="name" type="text" id="name" size="30" value="" class="form-control" />

                            <br />
                            <label for="email" accesskey="E"><span class="required">*</span> Email</label>
                            <input name="email" type="text" id="email" size="30" value="" class="form-control" />

                            <br />
                            <label for="phone" accesskey="P">Phone</label>
                            <input name="phone" type="text" id="phone" size="30" value="" class="form-control" />

                            <br />
                            <label for="subject" accesskey="S">Choose Subject</label>
                            <select name="subject" id="subject">
                                <option value="Web Design/Programming">Web Design/Programming</option>
                                <option value="Photography">Photography</option>
                                <option value="Video Editing">Video Editing</option>
                            </select>

                            <br />
                            <label for="comments" accesskey="C"><span class="required">*</span> Your comments</label>
                            <textarea name="comments" cols="40" rows="3" id="comments" class="form-control"></textarea>

<!--                            <br />-->
<!--                            <label for="agree" class="checkbox" accesskey="A"><span class="required">*</span> Agree to terms?</label>-->
<!--                            <input type="checkbox" class="checkbox" name="agree" id="agree">-->

                            <br /><br />
                            <p><span class="required">*</span> Are you human?</p>

                            <label for="verify" accesskey="V">&nbsp;&nbsp;&nbsp;<img src="<?php echo get_stylesheet_directory_uri(); ?>/contact/classes/image.php" alt="Image verification" border="0"/></label>
                            <input name="verify" type="text" id="verify" size="6" value="" style="width: 50px;" /><br /><br />
                            <input type="submit" class="submit" id="submit" value="Submit" />

                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endwhile; endif; ?>

<?php get_footer(); ?>

<link href="<?php echo get_stylesheet_directory_uri(); ?>/contact/assets/css/contact.css" rel="stylesheet" type="text/css" /> <!-- AJAX Contact Form Stylesheet -->

<!--<script type="text/javascript" src="//code.jquery.com/jquery-latest.js"></script>-->
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/contact/assets/js/jquery.jigowatt.js"></script><!-- AJAX Form Submit -->