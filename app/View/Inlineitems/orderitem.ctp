<div class="navbar navbar-default" role="navigation">
    <?php echo $this->element('/admin/header'); ?>
</div>

<div class="sidebar-nav">
    <?php echo $this->element('/admin/sidebar'); ?>
</div>

<div class="content">
    <div class="header">

        <h1 class="page-title"><?php echo __("Order Item")?></h1>
       

    </div>

    <div class="main-content">
        <p>
            <?php $x = $this->Session->flash(); ?>
            <?php if ($x) { ?>
            <div class="alert success">
                <span class="icon"></span>
                <strong></strong><?php echo $x; ?>
            </div>
        <?php } ?>
        </p>
        <div class="btn-toolbar list-toolbar">

            <div class="search_username">
                <button type="submit" class="btn btn-primary" style="float: right;"><i class="fa fa-search"></i></button>
                <input type="text" name="keyword" value="<?php if (@$keyword) {
                echo $keyword;
            } ?>" placeholder="Search Your Inlineitem title" class="form-control" style="width: 17%;float: right;"/>
            </div>
            </form>
            <div class="btn-group">
            </div>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th><?php echo $this->Paginator->sort('Id'); ?></th>
                    <th><?php echo $this->Paginator->sort('Image'); ?></th>
                    <th><?php echo $this->Paginator->sort('Consumer Price'); ?></th>
                    <th><?php echo $this->Paginator->sort('Order ID'); ?></th>
                    <th><?php echo $this->Paginator->sort('Product ID'); ?></th>
                    <th><?php echo $this->Paginator->sort('Self Creat Product ID'); ?></th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($items as $product) { ?>

                    <tr>
                        <td><?php echo h($product['Inlineitem']['id']); ?>&nbsp;</td>
                            <td><img src="<?php echo $this->Html->url('/' . $product['Inlineitem']['image'], array('alt' => 'Image', 'height' => '70px', 'width' => '100px')); ?>">&nbsp;</td>  
                        <td><?php echo h($product['Inlineitem']['Consumer_price']); ?>&nbsp;</td>
                        <td><?php echo h($product['Inlineitem']['order_id']); ?>&nbsp;</td>
                        <td><?php echo h($product['Inlineitem']['pdetail_id']); ?>&nbsp;</td>
                        <td><?php echo h($product['Inlineitem']['product_id']); ?>&nbsp;</td>

                                                                             
                      <td class="actions">
                                    <!-- Button trigger modal -->
                                    <button  class="btn1" data-id="<?php echo h($product['Inlineitem']['id']); ?>">print</button>
                                    
                            /<?php //echo $this->Html->link(__('View'), array('action' => 'view', $product['Inlineitem']['id'])); ?>
                            <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $product['Inlineitem']['id']), array(), __('Are you sure you want to delete # %s?', $product['Inlineitem']['id'])); ?>
                        </td>
                    </tr>

    <!--            <p class="not_found">NOT FOUND</p>-->
                <?php } ?>
            </tbody>
        </table>
        
        <!-- Button trigger modal -->
   
        <div id="element_to_pop_up">
            <table>
                
                <button onclick="myFunction()"><?php echo __("Print this page")?></button>

<script>
function myFunction() {
    window.print();
}
</script>
                
               <tr>
                    <td><h2><?php echo __("Product Order Detail")?></h2></td>
                </tr>
                <th><?php echo __("id")?></th><th><?php echo __("image")?></th><th><?php echo __("consumer price")?></th><th><?php echo __("Order id")?></th><th><?php echo __("product id")?></th>
              
                <tr>
                    <td class="inlineid"></td>
                    <td class="img"></td>
                    <td class="Order"></td>
                    <td class="product"></td>
                    <td class="inlineid"></td>
                </tr>
                  <tr>
                         <td> <h2><?php echo __("Product Detail")?></h2></td>
                     </tr>
                <th><?php echo __("Product id")?></th><th><?php echo __("Product Name")?></th><th>vProduct image")?></th><th><?php echo __("Product Description")?></th><th><?php echo __("Article")?></th><th><?php echo __("Background Color")?></th><th><?php echo __("Height")?></th><th><?php echo __("Width")?></th>
               
                  
                     <tr>
                    <td class="pid"></td>
                     <td class="pimg"></td>
                    <td class="pname"></td>
                    <td class="pdes"></td>
                    <td class="part"></td>
                    <td class="pback"></td>
                    <td class="height"></td>
                    <td class="width"></td>
                </tr> 
                 <tr>
                         <td><h2><?php echo __("Self Created Item Detail")?></h2></td>
                     </tr>
               <th><?php echo __("Pdetail id")?></th><th><?php echo __("Article")?></th><th><?php echo __("Material")?></th><th><?php echo __("Size")?></th><th><?php echo __("Color")?></th><th>Height")?></th><th>Width")?></th>
            
                   
                     <tr>
                    <td class="pdid"></td>
                     <td class="pda"></td>
                    <td class="pdm"></td>
                    <td class="pds"></td>
                    <td class="pdc"></td>
                    <td class="pdh"></td>
                    <td class="pdw"></td>
                </tr> 
            </table>  
        </div>
        
        
        
    <?php echo $this->Html->script('jquery.bpopup.min');?>   
<script type="text/javascript">
   $(document).ready(function(){
       $('.btn1').on("click",function(){
           var v=$(this).data().id;
           console.log(v)
           $.post("<?php echo $this->Html->url('/Inlineitems/test');?>",{"data":v},function(d){
               var img="<?php echo $this->Html->url('/');?>" + d.Inlineitem.image;
               $('.img').html('<img src="'  + img + '"/>');       
               var pimg="<?php echo $this->Html->url('/files/logos/');?>" + d.Product.product_image;
               $('.pimg').html('<img src="'  + pimg + '"/>');
               
               $('.inlineid').html(d.Inlineitem.id);
               $('.consumer').html(d.Inlineitem.Consumer_price);
               $('.Order').html(d.Inlineitem.order_id);
               $('.product').html(d.Inlineitem.product_id);
               $('.pid').html(d.Product.id);
               $('.pname').html(d.Product.product_name);
               $('.pdes').html(d.Product.product_description);
               $('.part').html(d.Product.Article);
               $('.pback').html(d.Product.back_color);
               $('.height').html(d.Product.height);
               $('.width').html(d.Product.width);
                $('.pdid').html(d.Pdetail.id);
               $('.pda').html(d.Pdetail.Article);
               $('.pdm').html(d.Pdetail.Material);
               $('.pds').html(d.Pdetail.Size);
               $('.pdc').html(d.Pdetail.Color);
               $('.pdh').html(d.Pdetail.height);
               $('.pdw').html(d.Pdetail.width);
                $('#element_to_pop_up').bPopup();
           
         
         });  
       });
   }); 
</script>      
        
        
      
        <ul class="pagination">
            <li><?php
                echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
                echo $this->Paginator->numbers(array('separator' => ''));
                echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
                ?>
            </li>
        </ul>
        <button onclick="$('#mbc').submit();" value="Delete" class="btn btn-primary" style="margin-right: 101px;float: right;margin-top: 23px;">DeleteAll</button>
    </div>

</div>
<style type="text/css">

    .search_username{
        margin-top: -32px;
    }
    
    #element_to_pop_up { 
    background-color:#fff;
    border-radius:15px;
    color:#000;
    display:none; 
    padding:20px;
    min-width:400px;
    min-height: 180px;
}
.b-close{
    cursor:pointer;
    position:absolute;
    right:10px;
    top:5px;
}
</style>
