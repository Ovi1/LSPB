<?php
//No Direct Access
defined('_JEXEC') or die;
//Include Logic
include('logic.php');
?>

<?php
$itemid = JRequest::getVar('Itemid');
$menu = &JSite::getMenu();
$active = $menu->getItem($itemid);
$params = $menu->getParams($active->id);
$pageclass = $params->get('pageclass_sfx');
?>

<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <!--<script defer src="templates/<?php echo $this->template ?>/js/jquery.js"></script>-->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Joomla Head -->
  <jdoc:include type="head" />
  <!-- Custom CSS -->
  <link href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/css/style.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Latest compiled and minified JavaScript-->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <!--[if lt IE 7 ]>
    <script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
    <script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
  <![endif]-->
</head>

<body class="<?php echo $pageclass ? htmlspecialchars($pageclass) : 'default'; ?>" >
  <!-- Menu Module -->
<jdoc:include type="modules" name="menu" style="none" />

<?php if ($this->countModules('showcase')) : ?>
  <jdoc:include type="modules" name="showcase" style="none" />
<?php endif; ?>
    <?php echo (isset($sidebar) ? '<div class="col-md-8">' : '<div class="content">'); ?>
  <div class="container">
    <jdoc:include type="message" />
  </div>
    <?php if ($show_frontpage_component == 0 && $menu->getActive() == $menu->getDefault()) : ?>
    <?php else : ?>
    <div class="container">
      <jdoc:include type="component" />
    </div>
    <?php endif; ?>

    <?php if (isset($sidebar)) : ?>
      <div class="col-md-4">
        <jdoc:include type="modules" name="sidebar" style="xhtml" />
      </div>
    <?php endif; ?>

    <?php if ($this->countModules('box1') || $this->countModules('box2') || $this->countModules('box3')) : ?>
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

<!-- Content -->
<div class="container">
  <jdoc:include type="modules" name="content" style="xhtml" />
</div>

<!-- Content-fluid -->
<div class="container-fluid">
  <jdoc:include type="modules" name="content-fluid" style="xhtml" />
</div>

<footer class="footer">
  <?php if ($this->countModules ('foot-top')) :?>
    <div class="col-md-12">
    <div class="row">
    <jdoc:include type="modules" name="foot-top" style="none" />
  </div>
  </div>
<?php endif; ?>

<?php if ($this->countModules('foot-left')): ?>
  <div class="col-md-4">
     <jdoc:include type="modules" name="foot-left" style="none" />
   </div>
 <?php endif ?>

 <?php if ($this->countModules('foot-mid')): ?>
  <div class="col-md-4">
    <jdoc:include type="modules" name="foot-mid" style="none" />
  </div>
  <?php endif ?>

  <?php if ($this->countModules('foot-right')): ?>
  <div class="col-md-4">
    <jdoc:include type="modules" name="foot-right" style="none" />
  </div>
<?php endif ?>

<?php if ($this->countModules('foot-bottom')): ?>
  <div class="col-md-12">
    <div class="row">
    <jdoc:include type="modules" name="foot-bottom" style="none" />
    </div>
  </div>
<?php endif ?>

</footer>
</body>
</html>
