   
    <div class="main_container">
    	<div class="container">
            <div class="toppro_menu">
            	<ul>      
                	<li><a href="#"><?php echo __("Home")?></a><i class="fa fa-angle-right"></i></li>
                    <li><a href="#"><?php echo __("Print & Graphic Design")?></a></li>
                </ul>
            </div>
            
            <div class="category_yourself">
            	<div class="row">
                	<div class="col-sm-4">
                    	<div class="cate_yourself">
                        	<?php echo $this->Html->image('../files/logos/'.$category['Article']['image']
                            ,array('alt'=>'Image','height'=>'200px','width'=>'200px')); ?>
                        </div>
                    </div>
                    
                   <div class="col-sm-8">
                   		<div class="cate_right">
                        	<h1><?php echo ($category['Article']['article_name']); ?></h1>
                            <p><?php //echo h($category['Article']['description']); ?><?php echo __("With our own developed drawing program you can design your own paper poster to the shop, exhibition room, company, etc. Use your creativity and upload images, add text, add shapes, change colors - it is YOU who decides!
The product is printed with a 6 colored solvent photo printer from Roland that provides a crisp layout with durability in outdoor quality.")?></p>
							<div class="row">
                            	<div class="col-sm-6">
                                	<div class="cate_box">
                                    	<span><img src="<?php echo $this->webroot;?>/img/design2.png" alt=""></span>
                                        <p><?php echo __("Here you can design your own sign - get creative with!")?></p>
                                        <a href="<?php echo $this->Html->url('/Pdetails/material/'. $category['Article']['article_name']);?>"><?php echo __("Design")?></a>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                	<div class="cate_box">
                                    	<span><img src="<?php echo $this->webroot;?>/img/template-icon.png" alt=""></span>
                                        <p><?php echo __("Select design and customize the design program subsequent")?></p>
                                        <a href="<?php echo $this->Html->url('/products/product/'.$category['Article']['article_name']
                                            ); ?>"><?php echo __("template")?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
    	<div class="gallery">
            <div class="container">
                <div class="row">
                    <h1><?php echo __("Gallery")?></h1>
                    <p><?php echo __("See our customer's design or search for inspiration in our galleries. Inspration and get some ideas.")?> </p>
                    <div class="col-sm-2">
                    	<div class="gallery_box">
                        	<a href="#"><img src="<?php echo $this->webroot;?>img/gall1.jpg" alt=""></a>
                        </div>
                    </div>
                    <div class="col-sm-2">
                    	<div class="gallery_box">
                        	<a href="#"><img src="<?php echo $this->webroot;?>img/gall2.jpg" alt=""></a>
                        </div>
                    </div>
                    <div class="col-sm-2">
                    	<div class="gallery_box">
                        	<a href="#"><img src="<?php echo $this->webroot;?>img/gall3.jpg" alt=""></a>
                        </div>
                    </div>
                    <div class="col-sm-2">
                    	<div class="gallery_box">
                        	<a href="#"><img src="<?php echo $this->webroot;?>img/gall4.jpg" alt=""></a>
                        </div>
                    </div>
                    <div class="col-sm-2">
                    	<div class="gallery_box">
                        	<a href="#"><img src="<?php echo $this->webroot;?>img/gall5.jpg" alt=""></a>
                        </div>
                    </div>
                    <div class="col-sm-2">
                    	<div class="gallery_box">
                        	<a href="#"><img src="<?php echo $this->webroot;?>img/gall6.jpg" alt=""></a>
                        </div>
                    </div>
                    <div class="col-sm-2">
                    	<div class="gallery_box">
                        	<a href="#"><img src="<?php echo $this->webroot;?>img/gall7.jpg" alt=""></a>
                        </div>
                    </div>
                    <div class="col-sm-2">
                    	<div class="gallery_box">
                        	<a href="#"><img src="<?php echo $this->webroot;?>img/gall8.jpg" alt=""></a>
                        </div>
                    </div>
                    <div class="col-sm-2">
                    	<div class="gallery_box">
                        	<a href="#"><img src="<?php echo $this->webroot;?>img/gall9.jpg" alt=""></a>
                        </div>
                    </div>
                    <div class="col-sm-2">
                    	<div class="gallery_box">
                        	<a href="#"><img src="<?php echo $this->webroot;?>img/gall10.jpg" alt=""></a>
                        </div>
                    </div>
                    <div class="col-sm-2">
                    	<div class="gallery_box">
                        	<a href="#"><img src="<?php echo $this->webroot;?>img/gall11.jpg" alt=""></a>
                        </div>
                    </div>
                    <div class="col-sm-2">
                    	<div class="gallery_box">
                        	<a href="#"><img src="<?php echo $this->webroot;?>img/gall12.jpg" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
    	</div>
    </div>













































  

