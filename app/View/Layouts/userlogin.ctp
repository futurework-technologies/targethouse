<!DOCTYPE html>
<html class="bg-black">
    <head>
        <?php echo $this->Html->charset(); ?>
        <title>Fantazi| <?php echo @$title_for_layout; ?></title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <?php
        echo $this->Html->css(array(
            'site', 'bootstrap.min', 'responsive', 'open-sans'
        ));
        ?>
        <?php
        echo $this->Html->script(array(
            '//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js',
            'bootstrap.min', 'npm', 'bootstrap'
        ));
        ?>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body >
        <?php
        echo $this->element('header');
        ?>
        <div class="main_container">
            <div class="container">


                <div class="checkout">

                    <div class="row">
                        <div class="col-sm-4">
                            <div class="checkout_box">
                                <h2><?php echo __("New customer")?></h2>
                                <?php echo $this->Form->create('User', array('action' => 'register')); ?>
                                <div class="checkout_inn">
                                    <p><?php echo __("By creating an account on fantazi.dk you can see your orders, 
                                        save your designs and reordering.")?></p>
                                    <span><label><?php echo __("E-mail:")?></label>
                                        <input type="email" name="data[User][email]" class="form-control" value="" placeholder="email"/></span>

                                    <div class="checkbox">
                                        <input type="hidden" name="data[User][status]" class="form-control"  value="1" /> 
                                        <label><input type="checkbox"name="data[User][newsletter]" value="1"/><?php echo __("I want to receive newsletters from the website")?></label>

                                        </label>

                                    </div> 
                                    <input name="" type="submit" value="Register">
                                </div>
                                </form>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="checkout_box">
                                <h2><?php echo __("Already a customer")?></h2>
                                <?php echo $this->Form->create('User', array('action' => 'userlogin')); ?>
                                <div class="checkout_inn">
                                    <p><?php echo __("Welcome back to fantazi.dk. Please login and enjoy the many features!")?></p>
                                    <span><label><?php echo __("Email:")?></label>
                                        <input type="email" name="data[User][email]" class="form-control" value="" placeholder="email"/></span>

                                    <span>
                                        <label><?php echo __("Password:")?></label>
                                        <input type="password" name="data[User][password]" class="form-control" value="" placeholder="Password"/>
                                    </span>

                                    <div class="checkbox">
<!--                                        <input id="check2" type="checkbox" name="check" value="check1">-->
                                        <!--                                        <label for="check2"> Remember me</label>-->

                                    </div>
                                    <input name="" type="submit" value="Login">
<!--                                    <p>Forgot your password? <a class="click" href="#"> Click here.</a></p>-->
                                </div>
                                <?php echo $this->Form->end(); ?>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="checkout_box">
                                <h2><?php echo __("Social media")?></h2>
                                <div class="checkout_inn">
                                    <p><?php echo __("You can use your username and password from your social media when you need to act on www.fantazi.dk. It is safe, easy and fast.")?></p>
                                    <a href="#"><img onclick="fb_login()" src="<?php echo $this->webroot; ?>img/facebook.png" alt=""></a>
                                    <a href="<?php echo $this->Html->url(array('controller' => 'Web', 'action' => 'gauth')); ?>"><img src="<?php echo $this->webroot; ?>img/google_plus.png" alt=""></a>
                                
                                    
                              </div>
                            </div>
                        </div>


                    </div>




                </div>

            </div>


        </div>

        <?php
        echo $this->element('footer');
        ?>
        <div style="display: none">
            <div id="fb-root"></div>
        </div>
        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <?php echo $this->Html->script(array('admin/bootstrap.min')); ?>

        <script>
                                        window.fbAsyncInit = function() {
                                            FB.init({
                                                appId: '1605681029650612',
                                                oauth: true,
                                                status: true, // check login status
                                                cookie: true, // enable cookies to allow the server to access the session
                                                xfbml: true // parse XFBML
                                            });
                                        };
                                        function fb_login() {
                                            FB.login(function(response) {

                                                if (response.authResponse) {
                                                    console.log('Welcome!  Fetching your information.... ');
                                                    access_token = response.authResponse.accessToken; //get access token
                                                    user_id = response.authResponse.userID; //get FB UID

                                                    FB.api('/me', function(response) {
                                                        FB.api("/me/picture?width=180&height=180", function(r)
                                                        {
                                                            response.profile_pic = r.data.url;

                                                            console.log(response);
                                                            $.post("/users/fblogin", {"data": response}, function(d) {
                                                               window.location.href="http://www.targethouse.dk/";
                                                            });

                                                        });

                                                    });

                                                } else {
                                                    //user hit cancel button
                                                    console.log('User cancelled login or did not fully authorize.');

                                                }
                                            }, {
                                                scope: 'publish_stream,email,user_location'
                                            });
                                        }
                                        (function() {
                                            var e = document.createElement('script');
                                            e.src = document.location.protocol + '//connect.facebook.net/en_US/all.js';
                                            e.async = true;
                                            document.getElementById('fb-root').appendChild(e);
                                        }());

        </script>
        
        
        
    </body>
</html>