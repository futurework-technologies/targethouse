<div class="container-fluid">
    <div class="col-sm-3"></div>
<div class="col-sm-6 padding">
        <div style="text-align: center;"><?php echo $this->Session->flash(); ?></div>
    <h3> Apply for Newsletter </h3>
    <div class="pro_info_right" style="margin-bottom: 20px;"> 
<?php echo $this->Form->create('Subscriber',array('action'=>'subscriber')); ?>
  <div class="form-group">
    <label for="email">Email address:</label>
         <input type="enail" name="data[Subscriber][email]" class="form-control" required>
  </div>
  <div class="form-group">
    <label for="pwd">First Name:</label>
    <input type="text" name="data[Subscriber][fname]" class="form-control" required>
  </div>
<div class="form-group">
    <label for="pwd">Last Name:</label>
    <input type="text" name="data[Subscriber][lname]" class="form-control" required>
  </div>
  
  <button type="submit" class="btn btn-default">Submit</button>
   <?php echo $this->Form->end();?>

                        </div>
</div>
    <div class="col-sm-3"></div>
</div>

  <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <?php echo $this->Html->script(array('admin/bootstrap.min')); ?>
        