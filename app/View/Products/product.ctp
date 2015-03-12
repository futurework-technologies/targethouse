<div class="container-fluid">
			<div class="pro_o">
            
            	<h1><?php echo __("Design yourself products")?></h1>
            	
            	<div class="col-sm-3">
                	<div class="pro_o_left">
                    	<h1><?php echo __("Category")?></h1>
                        <ul>
                     <?php foreach ($product as $pcategory){ ?>
                            
                            <li><a href="<?php echo $this->Html->url('/pdetails/detail/'. $pcategory['Pdetail']['id']);?>" ><?php echo $pcategory['Pdetail']['Article'];?></a></li>
                            
                     <?php } ?>   
                            
                        </ul>
                    </div>
                </div>
                <div class="col-sm-9">
                	<div class="pro_o_right">
                            
                                    <h1><?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?> <div class="box_addd">
                         <?php
                echo $this->Paginator->prev('< ' . __('Previous'), array(), null, array('class' => 'prev disabled'));
              echo $this->Paginator->numbers(array('separator' => ''));
                echo $this->Paginator->next(__('Next') . ' >', array(), null, array('class' => 'next disabled'));
                ?>      
                                            
                   </div></h1>
                      <?php foreach ($flakater as $flakate){ ?>
			<div class="col-sm-4">
            <div class="product_main_b">
                        <div class="pro_o_right_box">
                           <a href="<?php echo $this->Html->url('/Products/product_detail/'. $flakate['Product']['id']);?>"><?php echo $this->Html->image('../files/logos/'.$flakate['Product']['product_image']
                            ,array('alt'=>'Image','height'=>'70px','width'=>'100px')); ?></a></div>
                           <div class="product_tittle"> <p><?php echo h($flakate['Product']['product_name']); ?></p></div>
                        </div>  </div>
                          
                      <?php } ?>
                        </div>
                        
                       
                       
                    
                    </div>
                </div>
           	
            </div>
            
    </div>