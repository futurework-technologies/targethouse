   
    <div class="main_container">
    
    <div class="contact_us">
    	<div class="container">
        	<div class="row"><div class="col-sm-12">
                        	<div class="contact_map">
                            <h1><?php echo __("Contact")?></h1>
                            <p><?php echo __("Get in touch with us and explore more about our products")?></p>
                            	<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3385.150815146404!2d115.86076!3d-31.956804999999996!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2a32bb29a5ec1db7%3A0xc805b6eb17146df2!2sCity+of+Perth!5e0!3m2!1sen!2sin!4v1417761508222" width="600" height="283" frameborder="0" style="border:0"></iframe>
                            </div>
                        </div>
                        </div>
                
                
                	
                    
                	<div class="col-sm-4">
                    <div class="row">
                    <div class="contactus_top">
                    <h2><?php echo __("Landmark")?></h2>
                    	<ul class="footer_box_about_us">
                                <li><p><i class="fa fa-map-marker"></i><?php echo __("Address: #20-40 - Tower G45")?> <br><?php echo __("Gound Floor - London UK")?></p></li>
                                <li><p><i class="fa fa-info-circle"></i><?php echo __("info@wd-demo.com")?></p></li>
                                <li><p><i class="fa fa-wechat"></i><?php echo __("skype.mdemo")?></p></li>
                                <li><p><i class="fa fa-phone"></i><?php echo __("+444 (Phone) 123456")?></p></li>
                                <li><p><i class="fa fa-fax"></i><?php echo __("+123 (FAX) 0011223")?></p></li>
                            </ul>
                    </div>
                </div>
                </div>

                
               
                    	<div class="col-sm-8">
                         <div class="row">
                      
                         <div class="contact_form">
                        	<div class="contact_form1">
                                <?php echo $this->Form->create('Conatct'); ?>
                                    <span class="col-sm-6"><input name="data[Contact][name]" type="text" placeholder="Name" required="true"></span>
                                    <span class="col-sm-6"><input name="data[Contact][email]" type="text" placeholder="Email" required="true"></span>
                                    <span class="col-sm-6"><input name="data[Contact][subject]" type="text" placeholder="Subject" required="true"></span>
                                    <span class="col-sm-6"><input name="data[Contact][contact_no]" type="text" placeholder="Phone no" required="true"></span>
                                    <span class="col-sm-12"><textarea name="data[Contact][message]" cols="" placeholder="Message" rows="" required="true"><?php echo __("Message...")?></textarea></span>
                                <span class="col-sm-12"><input type="submit" name="submit" value="submit"></span>
                                 </form>
                            </div>
                        </div>
                         </div>
                </div>
        </div>
    </div>
    
    
    
    </div>
    
    
    