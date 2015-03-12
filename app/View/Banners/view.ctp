

<div class="content">
    <div class="header">

        <h1 class="page-title">View News</h1>

    </div>
    <div class="main-content"> 
   


        <div class="row">
            <div class="col-md-4">
             
                <div class="form-group">
                    
                         <div class="form-group">
                    <label><h4><?php echo h($user['Banner']['title']); ?></h4></label><br>
                   
                </div>
                    <label><h4>Image:</h4></label><br>
                         <img src="<?php echo $this->Html->url('/files/logos/' . $user['Banner']['image'], array('alt' => 'Image', 'height' => '70px', 'width' => '100px')); ?>">  
                </div>
           
                <div class="form-group">
                   
                    <p> <?php echo h($user['Banner']['description']); ?></p>
                </div>
              
              
                </div>
            </div>
        </div>
    </div>