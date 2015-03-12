
<div class="container-fluid">
			<div class="pro_info">
            
            	<h1>Design yourself products</h1>
            	<div class="title_n"><?php echo ($category['Subcategory']['name']); ?></div>
            	<div class="col-sm-2">
                	<div class="pro_info_left">
                    	<?php echo $this->Html->image('../files/logos/'.$category['Subcategory']['image']
                            ,array('alt'=>'Image','height'=>'70px','width'=>'100px')); ?>
                    </div>
                </div>
                <div class="col-sm-10 padding">
                	<div class="pro_info_right">
                    	<p><?php echo h($category['Subcategory']['description']); ?></p>

						<div class="pro_dces_box">
                        	<div class="pro_des_inn">
                            	<div class="col-sm-2">
                                	<a href="<?php echo $this->Html->url('/pdetails/submit_form/'. $Sub['id']);?>"><button class="btn btn-success" type="button">DESIGN SELV</button></a>
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
                                	<a href="<?php echo $this->Html->url('/products/product/'.$category['Subcategory']['name']
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
                    
                
                
           	
            </div>
            
    </div> 
