
<head>
<title> Target House | grafisk design sydfyn , designe din egne t-shirts og logo på Sydfyn</title>

<meta name="keywords" content=" designe din egne t-shirt  på Sydfyn, design dit eget logo og banner, Media planner & reklame, design dine egne visitkort, logo design at sydfyn ">

 

<meta name="description" content=" Grafisk design sydfyn, designe din egne t-shirt  på Sydfyn | Target House  A Grafisk bureau på Sydfyn med fokus på digitalt og trykt design, helps you to design your logo and banner or Media planner & reklame.">
<meta name="google-site-verification" content="1nnFe5uf6_duqsj2INrn-Pf1Mq98la62Xqbg_ty1bk4" />
<meta name="alexaVerifyID" content="HR67ELuV7qAP7RMfFoHXpa4lRXY"/>
    <?php
    echo $this->Html->css(array(
        'site', 'bootstrap.min', 'responsive', 'open-sans','font-awesome','stylesheet'
    ));
    ?>
    <?php
    echo $this->Html->script(array(
        '//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js',
        'bootstrap.min', 'npm', 'bootstrap','ie-emulation-modes-warning'
    ));
    ?>




	  <script>
    	/*!
 * jquery.scrollto.js 0.0.1 - https://github.com/yckart/jquery.scrollto.js
 * Scroll smooth to any element in your DOM.
 *
 * Copyright (c) 2012 Yannick Albert (http://yckart.com)
 * Licensed under the MIT license (http://www.opensource.org/licenses/mit-license.php).
 * 2013/02/17
 **/
/*$.scrollTo = $.fn.scrollTo = function(x, y, options){
    if (!(this instanceof $)) return $.fn.scrollTo.apply($('html, body'), arguments);

    options = $.extend({}, {
        gap: {
            x: 0,
            y: 0,
        },
        animation: {
            easing: 'swing',
            duration:600,
            complete: $.noop,
            step: $.noop
        }
    }, options);

    return this.each(function(){
        var elem = $(this);
        elem.stop().animate({
            //scrollLeft: !isNaN(Number(x)) ? x : $(y).offset().left + options.gap.x,
            //scrollTop: !isNaN(Number(y)) ? y : $(y).offset().top + options.gap.y
        }, options.animation);
    });
};*/
$(function(){
    var target, scroll;

    $("#new").on("click", function(e) {
		alert('hello');
		return false;
        if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
            target = $(this.hash);
            target = target.length ? target : $("[id=" + this.hash.slice(1) + "]");

            if (target.length) {
                if (typeof document.body.style.transitionProperty === 'string') {
                    e.preventDefault();
                  
                    var avail = $(document).height() - $(window).height();

                    scroll = target.offset().top;
                  
                    if (scroll > avail) {
                        scroll = avail;
                    }

                    $("html").css({
                        "margin-top" : ( $(window).scrollTop() - scroll ) + "px",
                        "transition" : "1s ease-in-out"
                    }).data("transitioning", true);
                } else {
                    $("html, body").animate({
                        scrollTop: scroll
                    }, 1000);
                    return;
                }
            }
        }
    });

    $("html").on("transitionend webkitTransitionEnd msTransitionEnd oTransitionEnd", function (e) {
        if (e.target == e.currentTarget && $(this).data("transitioning") === true) {
            $(this).removeAttr("style").data("transitioning", false);
            $("html, body").scrollTop(scroll);
            return;
        }
    });
});
</script>
	
	<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
 
  ga('create', 'UA-59527256-1', 'auto');
  ga('send', 'pageview');
 
</script>
	
</head>

  <body role="document">

    <?php
    echo $this->element('header');
    ?>
    <?php
//               if($this->request->param('action') == "display"){
//                echo $this->element('banner');  
//                }
//            
    ?>








    <div id="maincontent" class="nopadding">
<?php echo $this->fetch('content'); ?>
    </div>




    <?php
    echo $this->element('footer');
    ?>




</div>

<div tabindex="-1" aria-hidden="true" class="modal" id="vtcore-contact-modal-box">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                <h4 class="modal-title">Fill <strong>Contact Form</strong></h4>
            </div>
            <div class="modal-body">
                <div class="wpcf7" id="wpcf7-f16-o1" lang="en-US" dir="ltr">
                    <div class="screen-reader-response"></div>
                    <form name="" action="/#wpcf7-f16-o1" method="post" class="wpcf7-form" novalidate="novalidate">
                        <div style="display: none;">
                            <input type="hidden" name="_wpcf7" value="16" />
                            <input type="hidden" name="_wpcf7_version" value="4.0.1" />
                            <input type="hidden" name="_wpcf7_locale" value="en_US" />
                            <input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f16-o1" />
                            <input type="hidden" name="_wpnonce" value="b975f6c08c" />
                        </div>
                        <p><span class="wpcf7-form-control-wrap fullname"><input type="text" name="fullname" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="Your Name" /></span><br />
                            <span class="wpcf7-form-control-wrap email"><input type="email" name="email" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" aria-required="true" aria-invalid="false" placeholder="Email Address" /></span><br />
                            <span class="wpcf7-form-control-wrap message"><textarea name="message" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="Message"></textarea></span><br />
                            <input type="submit" value="Send &rarr;" class="wpcf7-form-control wpcf7-submit btn btn-primary" /></p>
                        <div class="wpcf7-response-output wpcf7-display-none"></div>
                    </form>
                </div>
            </div>
            <div class="modal-footer"></div>
        </div>
    </div>
</div>

<div class="revsliderstyles">
    <style type="text/css">.tp-caption.large_bold_darkblue{font-size:58px;line-height:60px;font-weight:800;font-family:"Open Sans";color:rgb(52,73,94);text-decoration:none;background-color:transparent;border-width:0px;border-color:rgb(255,214,88);border-style:none}.tp-caption.medium_bg_darkblue{font-size:20px;line-height:20px;font-weight:800;font-family:"Open Sans";color:rgb(255,255,255);text-decoration:none;background-color:rgb(52,73,94);padding:10px;border-width:0px;border-color:rgb(255,214,88);border-style:none}.tp-caption.medium_bold_orange{font-size:24px;line-height:30px;font-weight:800;font-family:"Open Sans";color:rgb(243,156,18);text-decoration:none;background-color:transparent;border-width:0px;border-color:rgb(255,214,88);border-style:none}.tp-caption.large_bold_white{font-size:58px;line-height:60px;font-weight:800;font-family:"Open Sans";color:rgb(255,255,255);text-decoration:none;background-color:transparent;border-width:0px;border-color:rgb(255,214,88);border-style:none}.tp-caption.large_bold_darkblue{font-size:58px;line-height:60px;font-weight:800;font-family:"Open Sans";color:rgb(52,73,94);text-decoration:none;background-color:transparent;border-width:0px;border-color:rgb(255,214,88);border-style:none}.tp-caption.medium_bg_darkblue{font-size:20px;line-height:20px;font-weight:800;font-family:"Open Sans";color:rgb(255,255,255);text-decoration:none;background-color:rgb(52,73,94);padding:10px;border-width:0px;border-color:rgb(255,214,88);border-style:none}.tp-caption.medium_bold_orange{font-size:24px;line-height:30px;font-weight:800;font-family:"Open Sans";color:rgb(243,156,18);text-decoration:none;background-color:transparent;border-width:0px;border-color:rgb(255,214,88);border-style:none}.tp-caption.large_bold_white{font-size:58px;line-height:60px;font-weight:800;font-family:"Open Sans";color:rgb(255,255,255);text-decoration:none;background-color:transparent;border-width:0px;border-color:rgb(255,214,88);border-style:none}.tp-caption.large_bold_darkblue{font-size:58px;line-height:60px;font-weight:800;font-family:"Open Sans";color:rgb(52,73,94);text-decoration:none;background-color:transparent;border-width:0px;border-color:rgb(255,214,88);border-style:none}.tp-caption.medium_bg_darkblue{font-size:20px;line-height:20px;font-weight:800;font-family:"Open Sans";color:rgb(255,255,255);text-decoration:none;background-color:rgb(52,73,94);padding:10px;border-width:0px;border-color:rgb(255,214,88);border-style:none}.tp-caption.medium_bold_orange{font-size:24px;line-height:30px;font-weight:800;font-family:"Open Sans";color:rgb(243,156,18);text-decoration:none;background-color:transparent;border-width:0px;border-color:rgb(255,214,88);border-style:none}.tp-caption.large_bold_white{font-size:58px;line-height:60px;font-weight:800;font-family:"Open Sans";color:rgb(255,255,255);text-decoration:none;background-color:transparent;border-width:0px;border-color:rgb(255,214,88);border-style:none}.large_bold_darkblue{font-size:58px;line-height:60px;font-weight:800;font-family:"Open Sans";color:rgb(52,73,94);text-decoration:none;background-color:transparent;border-width:0px;border-color:rgb(255,214,88);border-style:none}.medium_bg_darkblue{font-size:20px;line-height:20px;font-weight:800;font-family:"Open Sans";color:rgb(255,255,255);text-decoration:none;background-color:rgb(52,73,94);padding:10px;border-width:0px;border-color:rgb(255,214,88);border-style:none}.medium_bold_orange{font-size:24px;line-height:30px;font-weight:800;font-family:"Open Sans";color:rgb(243,156,18);text-decoration:none;background-color:transparent;border-width:0px;border-color:rgb(255,214,88);border-style:none}.large_bold_white{font-size:58px;line-height:60px;font-weight:800;font-family:"Open Sans";color:rgb(255,255,255);text-decoration:none;background-color:transparent;border-width:0px;border-color:rgb(255,214,88);border-style:none}.large_bold_darkblue{font-size:58px;line-height:60px;font-weight:800;font-family:"Open Sans";color:rgb(52,73,94);text-decoration:none;background-color:transparent;border-width:0px;border-color:rgb(255,214,88);border-style:none}.medium_bg_darkblue{font-size:20px;line-height:20px;font-weight:800;font-family:"Open Sans";color:rgb(255,255,255);text-decoration:none;background-color:rgb(52,73,94);padding:10px;border-width:0px;border-color:rgb(255,214,88);border-style:none}.medium_bold_orange{font-size:24px;line-height:30px;font-weight:800;font-family:"Open Sans";color:rgb(243,156,18);text-decoration:none;background-color:transparent;border-width:0px;border-color:rgb(255,214,88);border-style:none}.large_bold_white{font-size:58px;line-height:60px;font-weight:800;font-family:"Open Sans";color:rgb(255,255,255);text-decoration:none;background-color:transparent;border-width:0px;border-color:rgb(255,214,88);border-style:none}.large_bold_darkblue{font-size:58px;line-height:60px;font-weight:800;font-family:"Open Sans";color:rgb(52,73,94);text-decoration:none;background-color:transparent;border-width:0px;border-color:rgb(255,214,88);border-style:none}.medium_bg_darkblue{font-size:20px;line-height:20px;font-weight:800;font-family:"Open Sans";color:rgb(255,255,255);text-decoration:none;background-color:rgb(52,73,94);padding:10px;border-width:0px;border-color:rgb(255,214,88);border-style:none}.medium_bold_orange{font-size:24px;line-height:30px;font-weight:800;font-family:"Open Sans";color:rgb(243,156,18);text-decoration:none;background-color:transparent;border-width:0px;border-color:rgb(255,214,88);border-style:none}.large_bold_white{font-size:58px;line-height:60px;font-weight:800;font-family:"Open Sans";color:rgb(255,255,255);text-decoration:none;background-color:transparent;border-width:0px;border-color:rgb(255,214,88);border-style:none}</style>
</div>
<script type='text/javascript' src='http://www.fantazi.dk/wp-content/plugins/contact-form-7/includes/js/jquery.form.min.js?ver=3.51.0-2014.06.20'></script>
<script type='text/javascript'>
    /* <![CDATA[ */
    var _wpcf7 = {"loaderUrl": "http:\/\/www.fantazi.dk\/wp-content\/plugins\/contact-form-7\/images\/ajax-loader.gif", "sending": "Sending ..."};
    /* ]]> */
</script>
<script type='text/javascript' src='http://www.fantazi.dk/wp-content/plugins/contact-form-7/includes/js/scripts.js?ver=4.0.1'></script>
<script type='text/javascript' src='http://www.fantazi.dk/wp-content/plugins/js_composer/assets/js/js_composer_front.js?ver=4.3.3'></script>

</body>
</html>