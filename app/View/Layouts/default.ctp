<!DOCTYPE html>
<html>
    <head>
        <?php echo $this->Html->charset(); ?>
        <title>PickMeal | <?php echo @$title_for_layout; ?></title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <?php 
            echo $this->Html->css(array(
                'cake.generic',
                'admin/bootstrap.min',
                'admin/font-awesome.min',
                'font-awesome.min',
                'admin/ionicons.min',
                'admin/AdminLTE', 
                'admin/bootstrap-wysihtml5/bootstrap3-wysihtml5.min'
            ));
            echo $this->Html->script(array(
                    'http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js',
                    //'app/swt'
                ));
        ?>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        
    </head>
    <body class="skin-blue">
        <?php echo $this->element('admin/header'); ?>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <?php echo $this->element('admin/leftsidebar'); ?>
            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <?php echo $this->fetch('cheader'); ?>
                

                <!-- Main content -->
                <section class="content">

                    <?php echo $this->fetch('content'); ?>

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <?php
        
            $this->Combinator->add_libs('js', array(
                'admin/bootstrap.min',
                'admin/AdminLTE/app',
                'admin/AdminLTE/demo'
            )); 
            echo $this->Combinator->scripts('js'); // Output Javascript files
            
            echo $this->fetch('endjs');
        ?>
        <style type="text/css">
            .pagination span{
                background: #0075b0;
                color: #fff;
                padding:4px; 
            }
        </style>
        <script type="text/javascript">
            for(i in swt){
                (new Image()).src = "/swatch/"+swt[i].file;
                (new Image()).src = "/tom/"+i+".png";
              }
        </script>
    </body>
</html>
