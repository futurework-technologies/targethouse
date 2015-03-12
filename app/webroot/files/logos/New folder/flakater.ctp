<div class="container-fluid">
			<div class="pro_o">
            
            	<h1>Design yourself products</h1>
            	
            	<div class="col-sm-3">
                	<div class="pro_o_left">
                    	<h1>Category</h1>
                        <ul>
                        	<li><a href="#">test1</a></li>
                            <li><a href="#">test2</a></li>
                            <li><a href="#">test3</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-9">
                	<div class="pro_o_right">
                            
                    <h1>Objekt 1 to 8 of 8 total  <span>Side: 1 </span></h1>
                      <?php foreach ($flakater as $flakate){ ?>
			<div class="col-sm-4">
                        <div class="pro_o_right_box">
                           <a href="/new/svgedit?url=<?php echo $this->webroot;?>files/logos/<?php echo $flakate['Product']['product_image'];?>"><?php echo $this->Html->image('../files/logos/'.$flakate['Product']['product_image']
                            ,array('alt'=>'Image','height'=>'70px','width'=>'100px')); ?></a></div>
                        </div>
                      <?php } ?>
                        </div>
                        
                       
                       
                        <h2><span>Side: 1 </span></h2>
                    </div>
                </div>
           	
            </div>
            
    </div>