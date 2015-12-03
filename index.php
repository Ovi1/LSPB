
<?php
//No Direct Access
defined('_JEXEC') or die;
//Include Logic
include('logic.php');
?>
<!DOCTYPE html>
<html>
  <head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width,initial-scale=1">
    <!-- Joomla Head -->
  <jdoc:include type="head" />
  <!-- Custom CSS -->
  <link href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/css/style.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons"rel="stylesheet">
</head>
<body>
  <!-- Menu Module -->
<jdoc:include type="modules" name="menu" style="none" />

<?php if ($this->countModules('showcase')) : ?>
  <jdoc:include type="modules" name="showcase" style="none" />
<?php endif; ?>
  <div class="row">
<div class="container">
    <?php echo (isset($sidebar) ? '<div class="col-md-8">' : '<div class="col-md-12">'); ?>
    <jdoc:include type="message" />
    <?php if ($show_frontpage_component == 0 && $menu->getActive() == $menu->getDefault()) : ?>
    <?php else : ?>
      <jdoc:include type="component" />
    <?php endif; ?>
      
    <?php if (isset($sidebar)) : ?>
    <div class="col-md-4">
      <jdoc:include type="modules" name="sidebar" style="xhtml" />
    </div>
  <?php endif; ?>
      
  <?php if ($this->countModules('box1') || $this->countModules('box2') || $this->countModules('box3')) : ?>
    <!-- Example row of columns -->
    <div class="row">
      <?php if ($this->countModules('box1')) : ?>
        <div class="col-lg-4">
          <jdoc:include type="modules" name="box1" style="none" />
        </div>
      <?php endif; ?>
      <?php if ($this->countModules('box2')) : ?>
        <div class="col-lg-4">
          <jdoc:include type="modules" name="box2" style="none" />
        </div>
      <?php endif; ?>
      <?php if ($this->countModules('box3')) : ?>
        <div class="col-lg-4">
          <jdoc:include type="modules" name="box3" style="none" />
        </div>
      <?php endif; ?>
    </div>
  <?php endif; ?>
</div>
</div>

  <!-- Content -->
    <div class="row">
    <div class="container">
    <div class="col-md-12">
    <jdoc:include type="modules" name="content" style="xhtml" />
    
    </div>
  </div>
  </div>

<div class="container-fluid">
  <footer class="footer">
    <p><?php echo $copyright; ?></p>
  </footer>
</div>

	<!--<script defer src="templates/<?php echo $this->template ?>/js/jquery.js"></script>-->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>-->
<!--Latest compiled and minified JavaScript--> 
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<!--<script defer src="templates/<?php echo $this->template ?>/js/script.js"></script>

<!-- end scripts-->

<!--[if lt IE 7 ]>
  <script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
  <script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
<![endif]-->

</body>
</html>


