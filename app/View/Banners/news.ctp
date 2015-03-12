    <div class="main_container">
    
    <div class="news">
    	<div class="container">
            
            
            
             <?php foreach($products as $product){?>
            
            
            <div class="news_box">
                <div class="col-sm-6">
                    <div class="news_left">
                        <h1><?php echo $product['Banner']['tittle'];?></h1>
                        <span><?php echo h($product['Banner']['timestamp']); ?></span>
                        <p><?php echo $product['Banner']['description'];?></p>
                        <a href="<?php echo $this->Html->url('/banners/view/'.$product['Banner']['id'] ); ?>" >View More...</a>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="news_right">
                        <?php echo $this->Html->image('../files/logos/'.$product['Banner']['image']
                            ,array('alt'=>'Detail Image')); ?>
                    </div>
                </div>
            </div>
             <?php } ?>
         
            
    	</div>
    </div>
    
    
    
    </div>