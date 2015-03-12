<div class="container">
    <div class="col-lg-12">
           <div >
       
	<h5><a href="/"><?php echo h($profiles['User']['username']); ?></a> <span><?php echo h($profiles['User']['email']); ?></span></h5>
        <div class="col-lg-4 user_account">
		<ul >
			<li class="user" ><a href="/users/account/" title="Min Konto">Min Konto</a></li>
			<li ><a href="/users/edit/" title="Vis">Vis</a></li>
			<li><a href="/users/registe/" title="Rediger">Rediger</a></li>
			<li><a href="/users/changepassword/" title="Rediger Password">Rediger Password</a></li>
			<li><a href="" title="Ordrehistorik">Ordrehistorik</a></li>
		</ul>
	</div>

           </div>
	<div  class="content">
 
            <div style="margin-left:20px;" class="col-lg-7 view">
		<h4><?php echo h($profiles['User']['username']); ?></h4>
		<div >
                      <?php echo $this->Form->create('User', array('action' => 'edit')); ?>
			<ul class="test" >
				<li>
                                
                                   <label for="Email">Email:</label>
				<input type="text" name="data[User][firstname]" class="form-control" value="<?php echo h($profiles['User']['email']); ?>" placeholder="firstname"/></span>
				</li>
                                  <input type="hidden" name="data[User][id]" class="form-control" value="<?php echo h($profiles['User']['id']); ?>" placeholder=""/></span>
				<li>
                                       <span><label><?php echo __("First Name::")?></label>
                                        <input type="text" name="data[User][firstname]" class="form-control" value="<?php echo h($profiles['User']['firstname']); ?>" placeholder="firstname"/></span>
                                 
				</li>
				<li>
                                       <span><label><?php echo __("Sirname:")?></label>
                                        <input type="text" name="data[User][sirname]" class="form-control" value="<?php echo h($profiles['User']['sirname']); ?>" placeholder="sirname"/></span>
                                  
				</li>
				<li>
                                       <span><label><?php echo __("Company Name:")?></label>
                                        <input type="text" name="data[User][company_name]" class="form-control" value="<?php echo h($profiles['User']['company_name']); ?>" placeholder="company_name"/></span>
                                  
				</li>
				<li>
                                       <span><label><?php echo __("Addrese:")?></label>
                                        <input type="text" name="data[User][address]" class="form-control" value="<?php echo h($profiles['User']['address']); ?>" placeholder="address"/></span>
                                    
					
				</li>
				<li>
                                       <span><label><?php echo __("Postcode:")?></label>
                                        <input type="text" name="data[User][postcode]" class="form-control" value="<?php echo h($profiles['User']['postcode']); ?>" placeholder="postcode"/></span>
                                    
				</li>
				<li>
                                       <span><label><?php echo __("City:")?></label>
                                        <input type="text" name="data[User][city]" class="form-control" value="<?php echo h($profiles['User']['city']); ?>" placeholder="city"/></span>
                                    
				</li>
				<li>
                                       <span><label><?php echo __("Country:")?></label>
                                        <input type="text" name="data[User][country]" class="form-control" value="<?php echo h($profiles['User']['country']); ?>" placeholder="country"/></span>
                                    
				
				</li>
				<li>
                                    
                                       <span><label><?php echo __("Tel.No:")?></label>
                                        <input type="text" name="data[User][contact_no]" class="form-control" value="<?php echo h($profiles['User']['contact_no']); ?>" placeholder="contact_no"/></span>
				
				</li>
				<li>
                                       <span><label><?php echo __("Fax No:")?></label>
                                        <input type="text" name="data[User][fax_no]" class="form-control" value="<?php echo h($profiles['User']['fax_no']); ?>" placeholder="fax_no"/></span>
                                    
				</li>
				<li>
					 <?php echo $this->Form->end(__('Submit')); ?>
					
				</li>
			</ul>
                    
                        <?php echo $this->Form->end(); ?>
		</div>
            </div>

	</div>
    </div>
</div>

<style>
    .user{
     
    }
    .view{border:1px solid #ec6707;  height: 100%; 
      
    }
    ul
{
list-style-type: none;
}
.user_account{
    height: 100%;   border:1px solid #ec6707;
}
li {
  margin: 10px 0;
    background: url("http://www.designselvskilte.dk/public/styles/../images/title_bg.png") repeat-x scroll left top rgba(0, 0, 0, 0);
}
.gameplay-baseball-field{padding-right: 10px;
  padding-left: 10px;}
.content h4 {
    background: url("http://www.designselvskilte.dk/public/styles/../images/title_bg.png") repeat-x scroll left center rgba(0, 0, 0, 0);
    color: #000;
    font: bold 12px/41px Arial;
    height: 41px;
    margin: 0;
    padding-left: 20px;
}

test ul .user {
    list-style-image: url("http://www.designselvskilte.dk/public/styles/../images/user_account.png");
    margin-left: 40px;
}


    </style>