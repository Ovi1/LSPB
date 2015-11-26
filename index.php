
<?php
//No Direct Access
defined('_JEXEC') or die;
//Include Logic
include('logic.php');
?>
<!DOCTYPE html>
<html>
<head>
  <!-- Joomla Head -->
	<jdoc:include type="head" />
<!--  
	<meta charset="utf-8">-->
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width,initial-scale=1">

  <!-- Custom CSS -->
	<link href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/css/style.css" rel="stylesheet">
 </head>
<body>
   <!-- Menu Module -->
   <jdoc:include type="modules" name="menu" style="none" />

     <!-- Showcase Module -->
    <?php if($this->countModules('showcase')) : ?>
      <jdoc:include type="modules" name="showcase" style="none" />
    <?php endif; ?>

    <div class="container">
      <div class="row">
        <?php echo (isset($sidebar) ? '<div class="col-md-8">' : '<div class="col-md-12">'); ?>
            <!-- Messages -->
            <jdoc:include type="message" />
            
            <?php if($show_frontpage_component == 0 && $menu->getActive() == $menu->getDefault()) : ?>
                <!-- Do not show component -->
            <?php else : ?>
                
                <!-- Main Component -->
                <jdoc:include type="component" />
            <?php endif; ?>
        </div><!--/. col-md-12 or .col-md-8 -->

        <!-- Sidebar -->
        <?php if(isset($sidebar)) : ?>
            <div class="col-md-4">
                <jdoc:include type="modules" name="sidebar" style="xhtml" />
            </div>
        <?php endif; ?>
        
        
            <!-- Content -->
            <div class="col-md-12">
                <jdoc:include type="modules" name="content" style="xhtml" />
            </div>
        
    <?php if($this->countModules('box1') || $this->countModules('box2') || $this->countModules('box3')) : ?>
      <!-- Example row of columns -->
      <div class="row">
        <?php if($this->countModules('box1')) : ?>
          <div class="col-lg-4">
            <jdoc:include type="modules" name="box1" style="none" />
          </div>
        <?php endif; ?>
        <?php if($this->countModules('box2')) : ?>
          <div class="col-lg-4">
            <jdoc:include type="modules" name="box2" style="none" />
          </div>
        <?php endif; ?>
        <?php if($this->countModules('box3')) : ?>
          <div class="col-lg-4">
            <jdoc:include type="modules" name="box3" style="none" />
          </div>
        <?php endif; ?>
      </div>
    <?php endif; ?>
      </div> <!-- /container -->
      <div class="container-fluid">
        <footer class="footer">
          <p><?php echo $copyright; ?></p>
        </footer>
      </div>

  <!--jQuery (necessary for Bootstrap's JavaScript plugins)--> 
  
<!--<script defer src=<?php echo $this->template ?>templates/js/jquery.js"></script>-->
  
  <!-- Latest compiled and minified JavaScript 
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  
  <!--<script defer src="templates/<?php echo $this->template ?>/js/script.js"></script>-->

	<!-- end scripts-->
  
	<!--[if lt IE 7 ]>
		<script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
		<script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
	<![endif]-->
  
</body>
</html>


