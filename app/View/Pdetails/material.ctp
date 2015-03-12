    <div class="pro_design">
    <div class="container-fluid">
               <div class="toppro_menu">
               
            	<ul>      
                	<li><a href="#">Home</a><i class="fa fa-angle-right"></i></li>
                    <li><a href="#">Print & Graphic Design</a></li>
                </ul>
                <h1>Select Materiale</h1>
            </div>
            
            <div class="choose_material">
                 <?php foreach($flakater as $product){?>
            	<div class="col-sm-4">
                    
                
                <div class="choose_m_inn">
                	<div class="row">
                    	<div class="col-sm-4">
                        	<img src="<?php echo $this->webroot;?>img/iimm1.jpg" alt="">
                      
                        </div>
                        <div class="col-sm-8">
                            <h2><a href="<?php echo $this->Html->url('/Pdetails/submit_form/'. $product['Pdetail']['id']);?>"><?php echo ($product['Pdetail']['Material']); ?></a></h2>
                            <p><?php echo ($product['Pdetail']['description']); ?> </p>
                        </div>
                    </div>
                </div>
                   
                </div>
                
               <?php } ?>
                
               
                
            
            </div>
            
        </div>
    </div>