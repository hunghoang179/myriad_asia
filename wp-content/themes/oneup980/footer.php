<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content.
 *
 * @package WordPress
 * @subpackage Theme
 * @since 1.0
 */
?>
</div>
<?php $t = & peTheme(); ?>
<?php $layout = & $t->layout; ?>

<?php do_action("pe_theme_before_footer"); ?>
<div class="footer" id="footer">
    <section class="foot-lower">
        <div class="pe-container">
            <div class="row">
                <?php
                if (is_home() || is_front_page()) :
                    ?>
                    <div class="col-sm-6  font-footer">
                        <p><i class="fa fa-map-marker"></i> 12th floor, DC building, 144 Doi Can Str, Ba Dinh Dist, Ha Noi, VIETNAM</p>
                        <p><i class="fa fa-phone"></i> + 84 4 37 15 30 12</p>
                        <p><i class="fa fa-envelope"></i> <a href="mailto:info@silkevasion.com"> info@silkevasion.com</a></p>
                        <p><i class="fa fa-skype"></i> <a href="skype:phamdackham?call" >Myriad Asia</a></p>
                        <div class="social-media-wrap">
                            <div class="social-media">
                                <span class="social-fix" >Suivez-nous</span> <?php $t->content->socialLinks($t->options->get("footerSocialLinks"), "bottom"); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="box-before-ft">
                            <span>
                                <?php echo do_shortcode('[cml_text en="consulter la brochure" fr="consulter la brochure"]') ?>
                            </span>
                        </div>
                        <div class="box-after-ft">
                            Retrouvez-nous
                            <div class="logo-fix">
                                <a href="#">
                                    <img  src="<?php echo content_url(); ?>/themes/oneup980/img/skin/ft-logo.png"></a>
                                <a href="#">
                                    <img src="<?php echo content_url(); ?>/themes/oneup980/img/skin/ft-logo-1.png">
                                </a>
                                <a href="#">
                                    <img src="<?php echo content_url(); ?>/themes/oneup980/img/skin/ft-logo-1.png">
                                </a>
                            </div> 
                        </div>

                        <div id="subscribe-css">
                            <div class="subscribe-wrapper">
                                Inscription à la newsletter
                                <div class="subscribe-form">
                                    <form action="http://feedburner.google.com/fb/a/mailverify?uri=Ichiasebiz-BlogChiaSKinThcIt" class="subscribe-form" method="post" onsubmit="window.open('http://feedburner.google.com/fb/a/mailverify?uri=Ichiasebiz-BlogChiaSKinThcIt', 'popupwindow', 'scrollbars=yes,width=550,height=520');
                                                return true" target="popupwindow">
                                        <input name="uri" type="hidden" value="Ichiasebiz-BlogChiaSKinThcIt" /><input name="loc" type="hidden" value="en_US" /><input autocomplete="off" class="subscribe-css-email-field" name="email" placeholder="Enter your email" /><input class="subscribe-css-email-button" title="" type="submit" value="Subscribe Now !" /></form>
                                </div>
                            </div>
                            <div style="float: right; margin-top: 20px; text-decoration: underline; font-size: 20px;">Conditions générales de vente</div>
                        </div>
                        <div class="logo-foot">

                        </div>
                    </div>
                <?php endif; ?>
                <div class="" id="footer1"><div class="wrap">
                        <div class="creds"> <?php echo $t->options->get("footerCopyright"); ?></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
</div>
<!--<div id="footer_higher">
    <div id="footer_button"> Click Me To Open Footer... </div>
	<div id="footer_content">
		<div class="footbox">Footer box</div>
		<div class="footbox">Footer box</div>
		<div class="footbox">Footer box</div>
		<div class="clear"></div>
	</div>
</div>-->
<?php if (is_page($page = 568)): ?>    
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/bootstrap/jquery.hoverdir.js"></script>	
    <script type="text/javascript">
        $(function () {
            $(' #da-thumbs > .efect-x ').each(function () {
                $(this).hoverdir();
            });

        });
    </script>

<?php endif; ?>
<script>
    (function () {

        // Append a close trigger for each block
        $('.menu .content-country').append('<span class="close">x</span>');
        // Show window
        function showContent(elem) {
            hideContent();
            elem.find('.content-country').addClass('expanded');
            elem.addClass('cover');
        }
        // Reset all
        function hideContent() {
            $('.menu .content-country').removeClass('expanded');
            $('.menu li').removeClass('cover');
        }

        // When a li is clicked, show its content window and position it above all
        $('.menu li').click(function () {
            showContent($(this));
        });
        // When tabbing, show its content window using ENTER key
        $('.menu li').keypress(function (e) {
            if (e.keyCode == 13) {
                showContent($(this));
            }
        });

        // When right upper close element is clicked  - reset all
        $('.menu .close').click(function (e) {
            e.stopPropagation();
            hideContent();
        });
        // Also, when ESC key is pressed - reset all
        $(document).keyup(function (e) {
            if (e.keyCode == 27) {
                hideContent();
            }
        });

    })();
</script>
<script type="text/javascript">
    // Create a clone of the menu, right next to original.
$('.sticky-scroll').addClass('original').clone().insertAfter('.sticky-scroll').addClass('cloned').css('position','fixed').css('top','0').css('margin-top','0').css('z-index','500').removeClass('original').hide();

scrollIntervalID = setInterval(stickIt, 10);


function stickIt() {

  var orgElementPos = $('.original').offset();
  orgElementTop = orgElementPos.top;               

  if ($(window).scrollTop() >= (orgElementTop)) {
    // scrolled past the original position; now only show the cloned, sticky element.

    // Cloned element should always have same left position and width as original element.     
    orgElement = $('.original');
    coordsOrgElement = orgElement.offset();
    leftOrgElement = coordsOrgElement.left;  
    widthOrgElement = orgElement.css('width');
    $('.cloned').css('left',leftOrgElement+'px').css('top',0).css('width',widthOrgElement).show();
    $('.original').css('visibility','hidden');
  } else {
    // not scrolled past the menu; only show the original menu.
    $('.cloned').hide();
    $('.original').css('visibility','visible');
  }
}
</script>
<?php $t->footer->wp_footer(); ?>

</body>
</html>