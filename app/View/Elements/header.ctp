  <!-- Fixed navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
<!--          <a class="navbar-brand" href="<?php// echo $this->Html->url(array('controller' => 'Pages', 'action' => 'home')); ?>"><img src="<?php //echo $this->webroot;?>/img/logo.png" alt="" title="Logo"></a>-->
        </div>
        <div id="navbar" class="navbar-collapse collapse">
<ul class="nav navbar-nav navbar-right" >
<li>
 <a  href="<?php echo $this->Html->url('/lang/index/eng'); ?>"><img style="width:50px;height:30px;" src="<?php echo $this->webroot;?>img/abc.png" alt="" ></a>
</li>
 <li>
 <a  href="<?php echo $this->Html->url('/lang/index/dan'); ?>"><img style="width:50px;height:30px;" src="<?php echo $this->webroot;?>img/Denmark_lang.png" alt="" ></a>
               </li>                 
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="<?php echo $this->Html->url(array('controller' => 'Pages', 'action' => 'home')); ?>" class="active">Hjem</a></li>
            <li><a href="<?php echo $this->Html->url(array('controller' => 'Pages', 'action' => 'aboutus')); ?>">Om os</a></li>
            <li><a href="<?php echo $this->Html->url(array('controller' => 'Pages', 'action' => 'cases')); ?>">Cases</a></li>
			<li><a href="<?php echo $this->Html->url(array('controller' => 'Pages', 'action' => 'inspiration')); ?>">Inspiration</a></li>
			<li><a href="<?php echo $this->Html->url(array('controller' => 'Contacts', 'action' => 'contact')); ?>"><?php echo __("Kontakt"); ?></a></li>
                    <?php if ($loged == true) { ?>
                        <li><a title="Contact" href="<?php echo $this->Html->url(array('controller' => 'Users', 'action' => 'userlogout')); ?>"><?php echo __("Logout"); ?></a></li>
      <li><a title="Contact" href="<?php echo $this->Html->url(array('controller' => 'Users', 'action' => 'account')); ?>"><?php echo __("Min konto"); ?></a></li>
                    <?php } else { ?>
                        <li><a title="Contact" href="<?php echo $this->Html->url('/userlogin'); ?>"><?php echo __("Login"); ?></a></li>
                    <?php } ?>
            <li><a href="<?php echo $this->Html->url(array('controller' => 'Pages', 'action' => 'salesdelivery')); ?>"> Salg Leveringsbetingelser</a></li>
 </ul>


 
        </div><!--/.nav-collapse -->

      </div>

    </nav>