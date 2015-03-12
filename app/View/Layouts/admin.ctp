<?php
/**
 *
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo 'Fantazi'; ?> :
		<?php echo $title_for_layout; ?>
	</title>
   <meta name="google-translate-customization" content="fb1bb5058109aec3-f61bd9eecf6f624a-gcfedbdd1d30cd743-e"></meta>
	<?php
		echo $this->Html->meta('icon');

            echo $this->Html->css(array(
                '/admin/lib/bootstrap/css/bootstrap.css',
                '/admin/lib/font-awesome/css/font-awesome.css',
                '/admin/stylesheets/theme',
                '/admin/stylesheets/premium'));

            echo $this->Html->script(array('/admin/lib/bootstrap/js/bootstrap.min',
                '/admin/lib/bootstrap/js/bootstrap',
                '/admin/js/customcheckall'));

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
</head>
<body class=" theme-blue">
		

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
    
   
    
   
		
</body>
</html>
