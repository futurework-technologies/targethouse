<div class="main_container">
    <div class="banner">
    	<h1>vi i TargetHouse har siden </h1>
        <img src="<?php echo $this->webroot;?>img/divider.png" alt="">

<p>1994 arbejdet med et totalkoncept. Dette giver dig en tryghed for at opnå <br/> den optimale synergi på dine reklame- og marketingindkøb.<br/>

Du har nu mulighed for selv at kreere og bestille dine produkter direkte via vores online design-selv-system, <br/>selvfølgelig til en bedre pris.<br/>

Du har selvfølgelig stadig muligheden for også at tilkøbe personlig rådgivning og hjælp til <br/>dit grafiske designa</p>
  

		<div class="btn">
		<a href="#new">TILKØB RÅDGIVNING</a>
        <a href="#new1">design selv</a>
        </div>
  
     <?php $count = 0;foreach($products as $product){?>
    <div  class="products">
        <div style="margin-top:50px;" class="container-fluid">
            <h1>Design dine egne produkter<a href="all_product.html"><i class="fa fa-plus"></i> <br> <span>Vis flere produkter</span></a></h1>
            <div class="col-sm-2 col-xs-6">
            	<a href="#">
                <div class="pro_box pro_box1">
                <div class="arrow-right"></div>
                    <strong><?php echo $product['Category']['categorie_name'];?></strong>
                </div>
               	</a>
            </div>
             <?php foreach($product['Article'] as $Sub){?>
            <div class="col-sm-2 col-xs-6">
            	<a href="<?php echo $this->Html->url('/pdetails/detail/'. $Sub['id']);?>">
                <div class="pro_box">
                	<div class="pro_img"> <?php echo $this->Html->image('../files/logos/'.$Sub['image']
                            ,array('alt'=>'Detail Image')); ?></div>
                    <p><?php echo $Sub['article_name'];?></p>
                    <span>Learn More</span>
                </div>
               	</a>
            </div>
			    <?php } ?>
            
          </div>
    </div>
      <?php } ?>
 
    
    <!----------------------how to do------------------------->
    
    <section id="new1">
    <div class="howto">
    	<div class="container-fluid">
        	<h1>how to do</h1>
            
            <div class="step">
            	<div class="col-sm-1"></div>
                <div class="col-sm-2 col-xs-6">
                	<div class="step_box">
                    	<div class="step_img"><a href="#"><img src="<?php echo $this->webroot;?>img/i1.png" alt=""></a></div>
                        <p>1)  VÆLG PRODUKT</p>
                    </div>
                      </div>
                    <div class="col-sm-2 col-xs-6">
                    <div class="step_box">
                    	<div class="step_img"><a href="#"><img src="<?php echo $this->webroot;?>img/i2.png" alt=""></a></div>
                        <p>2) VÆLG MATERIALE </p>
                    </div>
                    </div>
                    <div class="col-sm-2 col-xs-6">
                    <div class="step_box">
                    	<div class="step_img"><a href="#"><img src="<?php echo $this->webroot;?>img/i3.png" alt=""></a></div>
                        <p>3) Upload Design</p>
                    </div>
                    </div>
                    <div class="col-sm-2 col-xs-6">
                    <div class="step_box">
                    	<div class="step_img"><a href="#"><img src="<?php echo $this->webroot;?>img/i4.png" alt=""></a></div>
                        <p>4)  Vi producerer</p>
                    </div>
                    </div>
                    <div class="col-sm-2 col-xs-6">
                    <div class="step_box">
                    	<div class="step_img"><a href="#"><img src="<?php echo $this->webroot;?>img/i5.png" alt=""></a></div>
                        <p>5)  Vi Leverer</p>
                    </div>
                    </div>
               
                <div class="col-sm-1"></div>
            </div>
            
            <div class="video">
            	<div class="col-sm-3"></div>
            	<div class="col-sm-6">
                	<div class="video_inn">
                    	<iframe width="610" height="343" src="https://www.youtube.com/embed/jsCYwPDIYuA" frameborder="0" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="col-sm-3"></div>
            </div>
        </div>
    </div> 
    </section>
    <!----------------------category------------------------->
    <section id="new">
    <div class="category">
    	<div class="container-fluid">
        <h1>Category</h1>
        	<div class="home_design_box">
    	<div class="col-sm-3">
        	<div class="home_category_box_in">
            	<a href="category.html"><div class="home_category_box_img">
                	<img src="<?php echo $this->webroot;?>img/category1.png" alt="">
                    <p>Tryk &amp; Grafisk Design</p>
                </div></a>
            </div>
    	</div>
        <div class="col-sm-3">
        	<div class="home_category_box_in">
            	<a href="category.html"><div class="home_category_box_img">
                	<img src="<?php echo $this->webroot;?>img/category2.png" alt="">
                    <p>Medieplanlaegning</p>
                </div></a>
            </div>
    	</div>
        <div class="col-sm-3">
        	<div class="home_category_box_in">
            	<a href="category.html"><div class="home_category_box_img">
                	<img src="<?php echo $this->webroot;?>img/category3.png" alt="">
                    <p>Profil &amp; Jobtoi</p>
                </div></a>
            </div>
    	</div>
        <div class="col-sm-3">
        	<div class="home_category_box_in">
            	<a href="category.html"><div class="home_category_box_img">
                	<img src="<?php echo $this->webroot;?>img/category4.png" alt="">
                    <p>Stro &amp; Gaveartilier</p>
                </div></a>
            </div>
    	</div>
        <div class="col-sm-3">
        	<div class="home_category_box_in">
            	<a href="category.html"><div class="home_category_box_img">
                	<img src="<?php echo $this->webroot;?>img/category5.png" alt="">
                    <p>Emballagedesign</p>
                </div></a>
            </div>
    	</div>
        <div class="col-sm-3">
        	<div class="home_category_box_in">
            	<a href="category.html"><div class="home_category_box_img">
                	<img src="<?php echo $this->webroot;?>img/category6.png" alt="">
                    <p>Skilte &amp; bilreklame</p>
                </div></a>
            </div>
    	</div>
        <div class="col-sm-3">
        	<div class="home_category_box_in">
            	<a href="category.html"><div class="home_category_box_img">
                	<img src="<?php echo $this->webroot;?>img/category7.png" alt="">
                    <p>Webdesign &amp; hosting</p>
                </div></a>
            </div>
    	</div>
        <div class="col-sm-3">
        	<div class="home_category_box_in">
            	<a href="category.html"><div class="home_category_box_img">
                	<img src="<?php echo $this->webroot;?>img/category8.png" alt="">
                    <p>TV &amp; radioreklamer</p>
                </div></a>
            </div>
    	</div>
    </div>
        </div>
    </div>
    </section>
    
    </div>