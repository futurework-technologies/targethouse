

  


    <div class="container-fluid">
			<div class="pro_info">
            
            	<h1>Design yourself products</h1>
            	<div class="title_n"><?php echo ($category['Category']['categorie_name']); ?></div>
            	<div class="col-sm-2">
                	<div class="pro_info_left">
                    	<?php echo $this->Html->image('../files/logos/'.$category['Category']['image']
                            ,array('alt'=>'Image','height'=>'70px','width'=>'100px')); ?>
                    </div>
                </div>
                <div class="col-sm-10 padding">
                	<div class="pro_info_right">
                    	<p><?php echo h($category['Category']['description']); ?></p>

						<div class="pro_des_box">
                        	<div class="pro_des_inn">
                            	<div class="col-sm-2">
                                	<a href="<?php echo $this->Html->url('/pages/selfcreate/') ?>"><button class="btn btn-success" type="button">DESIGN SELV</button></a>
                                </div>
                                <div class="col-sm-9">
                                	<span>Med vores eget udviklede tegneprogram kan du designe</span>
                                </div>
                                <div class="col-sm-1">
                                	<a href="#"><img src="<?php echo $this->webroot;?>/img/tool.png"  alt="" ></a>
                                </div>
                            </div>
                           <div class="pro_des_inn">
                            	<div class="col-sm-2">
                                	<a href="<?php echo $this->Html->url('/products/product/'.$category['Category']['categorie_name']
                                            ); ?>"><button class="btn btn-success" type="button">SKABELONER</button></a>
                                </div>
                                <div class="col-sm-9">
                                	<span>Med vores eget udviklede tegneprogram kan du designe</span>
                                </div>
                                <div class="col-sm-1">
                                    <a href=""><img src="<?php echo $this->webroot;?>/img/bag.png"  alt="" ></a>
                                </div>
                            </div>
                        </div>
                    </div>
               
                
                            <div class="design_main_b">

<div class="col-sm-2"><div class="design_bb"><a href="#"><img src="<?php echo $this->webroot;?>/img/06553223.png"  alt="" ></a></div></div>
<div class="col-sm-2"><div class="design_bb"><a href="#"><img src="<?php echo $this->webroot;?>/img/31093234.png"  alt="" ></a></div></div>
<div class="col-sm-2"><div class="design_bb"><a href="#"><img src="<?php echo $this->webroot;?>/img/33063525.png"  alt="" ></a></div></div>
<div class="col-sm-2"><div class="design_bb"><a href="#"><img src="<?php echo $this->webroot;?>/img/55015694.png"  alt="" ></a></div></div>
<div class="col-sm-2"><div class="design_bb"><a href="#"><img src="<?php echo $this->webroot;?>/img/31384601.png"  alt="" ></a></div></div>
<div class="col-sm-2"><div class="design_bb"><a href="#"><img src="<?php echo $this->webroot;?>/img/55489438.png"  alt="" ></a></div></div>

</div> </div>
                
           	
            </div>
            
    </div> 
