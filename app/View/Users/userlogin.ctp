    
    <div class="main_container">
    	<div class="container">
            
            
            <div class="checkout">
            
            	<div class="row">
                	<div class="col-sm-4">
                    	<div class="checkout_box">
                        	<h2>   <?php echo __("New customer")?></h2>
                            <div class="checkout_inn">
                            	<p> <?php echo __("By creating an account on designselvskilte.dk you can see your orders, 
                                save your designs and reordering.")?></p>
                                <span><label> <?php echo __("E-mail:")?></label>
                                <input name="" type="text"></span>
                                
                                	<div class="checkbox">
                                        <input id="check1" type="checkbox" name="check" value="check1">
                                        <label for="check1">  <?php echo __("I want to receive newsletters from the website")?> </label>
                                       
                                    </div>
                                    <input name="" type="submit" value="Register">
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-sm-4">
                    	<div class="checkout_box">
                        	<h2> <?php echo __("Already a customer")?></h2>
                                 <?php echo $this->Form->create('User'); ?>
                            <div class="checkout_inn">
                            	<p> <?php echo __("Welcome back to designselvskilte.dk. Please login and enjoy the many features!")?></p>
                                <span><label> <?php echo __("Username:")?></label>
                                    <input type="text" name="data[User][username]" class="form-control" value="" placeholder="username"/></span>
                                
                                <span>
                                    <label> <?php echo __("Password:")?></label>
                                     <input type="password" name="data[User][password]" class="form-control" value="" placeholder="Password"/>
                                </span>
                                
                                	<div class="checkbox">
                                        <input id="check2" type="checkbox" name="check" value="check1">
                                        <label for="check2">  <?php echo __("Remember me")?></label>
                                       
                                    </div>
                                    <input name="" type="submit" value="Login">
                                    <p> <?php echo __("Forgot your password?")?> <a class="click" href="#"> <?php echo __(" Click here.")?></a></p>
                            </div>
                                    <?php echo $this->Form->end();?>
                        </div>
                    </div>
                    
                    <div class="col-sm-4">
                    	<div class="checkout_box">
                        	<h2> <?php echo __("Social media")?></h2>
                            <div class="checkout_inn">
                            	<p> <?php echo __("You can use your username and password from your social media when you need to act on www.designselvskilte.dk. It is safe, easy and fast.")?></p>
                                <a href="#"><img src="<?php echo $this->webroot;?>/img/facebook.png" alt=""></a>
                                <a href="#"><img src="<?php echo $this->webroot;?>/img/google_plus.png" alt=""></a>
                            </div>
                        </div>
                    </div>
                    
                    
                </div>
            	
            	
                
           	
            </div>
            
        </div>
    
    	
    </div>































