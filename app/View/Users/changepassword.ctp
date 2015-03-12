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
                       <?php echo $this->Form->create('User',array('id'=>'tab')); ?>
                    <div class="form-group">
                        <label>Old Password:</label>
                        <?php echo $this->Form->input("old_password",array("label"=>false,"type"=>"password",'Placeholder'=>'Old Password...'));?>
                    </div>
                    <div class="form-group">
                        <label>New Password:</label>
                        <?php echo $this->Form->input("new_password",array("label"=>false,"type"=>"password",'Placeholder'=>'New Password...'));?>
                    </div>
                    <div class="form-group">
                        <label>Confirm Password:</label>
                        <?php echo $this->Form->input("cpassword",array("label"=>false,"type"=>"password",'Placeholder'=>'confirm Password...'));?>
                    </div>   
                <div class="btn-toolbar list-toolbar">
                    <button type="submit" class="btn btn-primary" name="submit"><i class="fa fa-save"></i> Save</button>
                </div>
                    </form>
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