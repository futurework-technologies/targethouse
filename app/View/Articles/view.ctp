<div class="navbar navbar-default" role="navigation">
    <?php echo $this->element('/admin/header'); ?>
</div>

<div class="sidebar-nav">
    <?php echo $this->element('/admin/sidebar'); ?>
</div>

<div class="content">

 


    <div class="container-fluid">
			<div class="pro_info">
            
            	<h1>Design yourself products</h1>
            	<div class="title_n"><?php echo h($user['Category']['categorie_name']); ?></div>
            	<div class="col-sm-2">
                	<div class="pro_info_left">
                    	<?php echo $this->Html->image('../files/logos/'.$user['Category']['image']
                            ,array('alt'=>'Staticpage Image','height'=>'70px','width'=>'100px')); ?>
                    </div>
                </div>
                <div class="col-sm-10">
                	<div class="pro_info_right">
                    	<p><?php echo h($user['Category']['description']); ?></p>

						<div class="pro_des_box">
                        	<div class="pro_des_inn">
                            	<div class="col-sm-2">
                                	<a href="#"><button class="btn btn-success" type="button">DESIGN SELV</button></a>
                                </div>
                                <div class="col-sm-9">
                                	<span>Med vores eget udviklede tegneprogram kan du designe</span>
                                </div>
                                <div class="col-sm-1">
                                	<a href="#"><img src="images/tool.png" alt=""></a>
                                </div>
                            </div>
                           <div class="pro_des_inn">
                            	<div class="col-sm-2">
                                	<a href="#"><button class="btn btn-success" type="button">SKABELONER</button></a>
                                </div>
                                <div class="col-sm-9">
                                	<span>Med vores eget udviklede tegneprogram kan du designe</span>
                                </div>
                                <div class="col-sm-1">
                                	<a href="#"><img src="images/bag.png" alt=""></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
           	
            </div>
            
    </div> 












</div>