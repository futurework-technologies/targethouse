<!DOCTYPE html>
<html class="bg-black">
    <head>
        <?php echo $this->Html->charset(); ?>
        <title>Fantazi| <?php echo @$title_for_layout; ?></title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <?php 
            echo $this->Html->css(array(
                'admin/bootstrap.min',
                'admin/font-awesome.min',
                'admin/ionicons.min',
                'admin/AdminLTE'
            ));
        ?>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="bg-black">

        <div class="form-box" id="login-box">
            <div class="header">Register</div>
            <div style="text-align: center;"><?php echo $this->Session->flash(); ?></div>
            <?php echo $this->Form->create('User'); ?>
                <div class="body bg-gray">
                    <div class="form-group">
                        <input type="text" name="data[User][username]" class="form-control" value="" placeholder="username"/>
                    </div>
                    <div class="form-group">
                        <input type="email" name="data[User][email]" class="form-control" value="" placeholder="email"/>
                    </div>
                    <div class="form-group">
                        <input type="password" name="data[User][password]" class="form-control" value="" placeholder="password"/>
                    </div>
                    <div class="form-group">
                        <input type="password" name="data[User][contact_no]" class="form-control" value="" placeholder="contact no"/>
                    </div>
                    <div class="form-group">
                        <input type="text" name="data[User][company_name]" class="form-control" value="" placeholder="company name"/>
                    </div>
                    <div class="form-group">
                        <input type="text" name="data[User][weburl]" class="form-control" value="" placeholder="Website url"/>
                    </div>
                      <div class="form-group">
                        <input type="text" name="data[User][gender]" class="form-control" value="" placeholder="Gender"/>
                    </div>
                       <div class="form-group">
                        <input type="hidden" name="data[User][status]" class="form-control"  value="1" /> 
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="data[User][newsletter]" value="1" /> Apply for news letter.
                    </div>
                   
                </div>
                <div class="footer">                                                               
                    <button type="submit" class="btn bg-olive btn-block">Submit</button>  
                    
                   <p><a href="#">I forgot my password</a></p>
                    
                    <!--<a href="register.html" class="text-center">Register a new membership</a>-->
                </div>
            <?php echo $this->Form->end();?>

            <!--<div class="margin text-center">
                <span>Sign in using social networks</span>
                <br/>
                <button class="btn bg-light-blue btn-circle"><i class="fa fa-facebook"></i></button>
                <button class="btn bg-aqua btn-circle"><i class="fa fa-twitter"></i></button>
                <button class="btn bg-red btn-circle"><i class="fa fa-google-plus"></i></button>

            </div>-->
        </div>


        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <?php echo $this->Html->script(array('admin/bootstrap.min')); ?>
        

    </body>
</html>