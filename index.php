<?php
//No Direct Access
defined('_JEXEC') or die;
//Include Logic
include('logic.php');
?>
<?php
$app = JFactory::getApplication();
$user = JFactory::getUser();
//$model = $this->getModel();
$userid = $app->input->get('id', 0, 'int');
if (empty($userid)) {  // get the current userid if not passed
    $userid = $user->id;
}

$config = JblanceHelper::getConfig();
$link_dashboard = JRoute::_('index.php?option=com_jblance&view=user&layout=dashboard');
$link_logout = JRoute::_('index.php?option=com_users&task=user.logout&' . JSession::getFormToken() . '=1&return=' . base64_encode($link_home));


$language = JFactory::getLanguage();
$extension = 'com_jblance';
$base_dir = JPATH_SITE;
$language_tag = $language->getTag(); // loads the current language-tag
$language->load($extension, $base_dir, $language_tag, true);

$itemid = JRequest::getVar('Itemid');
$menu = &JSite::getMenu();
$active = $menu->getItem($itemid);
$params = $menu->getParams($active->id);
$pageclass = $params->get('pageclass_sfx');


jbimport('fbconnect');

$fb = new FbconnectHelper();
$user_info = $fb->initFbLogin();

//check if app key/secret is empty. If empty, do not show the FB connect button
$showFbConnect = true;
$app_id = $config->fbApikey;
$app_sec = $config->fbAppsecret;
if (empty($app_id) || empty($app_sec)) {
    $showFbConnect = false;
}
?>
<?php unset($this->_scripts[JURI::root(true) . '/media/jui/js/bootstrap.min.js']); ?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <!-- Joomla Head -->
    <jdoc:include type="head" />
    <link href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/css/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!--Latest compiled and minified JavaScript-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>

<body class="<?php echo $pageclass ? htmlspecialchars($pageclass) : 'default'; ?>" >
    <!-- Menu Module -->
<jdoc:include type="modules" name="menu" style="none" />
<!--lang-->
<jdoc:include type="modules" name="language" style="none" />


<?php if ($this->countModules('showcase')) : ?>
    <jdoc:include type="modules" name="showcase" style="none" />
<?php endif; ?>
<?php echo (isset($sidebar) ? '<div class="col-md-8">' : '<div class="content">'); ?>

<?php
if (!$user->guest) {
    //
} else {

    echo '<button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#userlogin">';
    echo JText::_('COM_JBLANCE_LOGIN') . '/';
    echo JText::_('COM_JBLANCE_REGISTER');
    echo '</button>';
}
?>
</div>

<div class="container">
    <jdoc:include type="message" />
</div>

<?php if ($show_frontpage_component === 0 && $menu->getActive() === $menu->getDefault()) : ?>
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
            <div class="col-md-4">
                <jdoc:include type="modules" name="box1" style="none" />
            </div>
        <?php endif; ?>
        <?php if ($this->countModules('box2')) : ?>
            <div class="col-md-4">
                <jdoc:include type="modules" name="box2" style="none" />
            </div>
        <?php endif; ?>
        <?php if ($this->countModules('box3')) : ?>
            <div class="col-md-4">
                <jdoc:include type="modules" name="box3" style="none" />
            </div>
        <?php endif; ?>
    </div>
<?php endif; ?>

<!-- Content -->
<?php if ($this->countModules('content')) : ?>
    <div class="container">
        <jdoc:include type="modules" name="content" style="xhtml" />
    </div>
<?php endif; ?>

<!-- Content-fluid -->
<?php if ($this->countModules('content-fluid')) : ?>

    <div class="container-fluid">
        <jdoc:include type="modules" name="content-fluid" style="xhtml" />
    </div>
<?php endif; ?>

<footer class="footer">
    <?php if ($this->countModules('foot-top')) : ?>
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
    <a href="http://www.ovi-web.lt" target="_blank">
    <img class="ovi" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template?>/images/ovi.png">
    </a>
</footer>


<!-- Modal -->
<div class="modal fade" id="userlogin" tabindex="-1" role="dialog" aria-labelledby="userlogin">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><?php echo JText::_('COM_JBLANCE_MEMBERS_LOGIN'); ?></h4>
            </div>
            <div class="modal-body">
                <!-- if user is guest -->
                <?php if ($user->guest) : ?>
                    <div class="jb-loginform">
                        <form action="<?php echo JRoute::_('index.php'); ?>" method="post" name="login" id="form-login">
                            <div class="form-group">
                                <div class="input-group">
                                    <label class="sr-only" for="username"><?php echo JText::_('COM_JBLANCE_USERNAME'); ?>:</label>
                                    <span class="input-group-addon"><i class="material-icons">account_circle</i></span>
                                    <input type="text" class="form-control" name="username" id="username" />
                                    <span class="input-group-btn">
                                        <a href="<?php echo JRoute::_('index.php?option=com_users&view=remind'); ?>" class="btn" title="<?php echo JText::_('COM_JBLANCE_FORGOT_YOUR_USERNAME') . '?'; ?>" tabindex="-1">
                                            <i class="material-icons">help</i>
                                        </a>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <label class="sr-only" for="password"><?php echo JText::_('COM_JBLANCE_PASSWORD'); ?>:</label>
                                    <span class="input-group-addon"><i class="material-icons">lock</i></span>
                                    <input type="password" class="form-control" name="password" id="password" />
                                    <span class="input-group-btn">
                                        <a href="<?php echo JRoute::_('index.php?option=com_users&view=reset'); ?>" class="btn " title="<?php echo JText::_('COM_JBLANCE_FORGOT_YOUR_PASSWORD') . '?'; ?>" tabindex="-1">
                                            <i class="material-icons">help</i>
                                        </a>
                                    </span>
                                </div>
                            </div>
                            <div class="input-group">
                                <div class="form-group">
                                    <div class="checkbox-inline">
                                        <input type="checkbox" alt="Remember me" value="yes" id="remember" name="remember" /><?php echo JText::_('COM_JBLANCE_REMEMBER_ME'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="btn-group">
                                <button type="submit" value="<?php echo JText::_('COM_JBLANCE_LOGIN'); ?>" name="submit" id="submit" class="btn btn-primary"><?php echo JText::_('COM_JBLANCE_LOGIN'); ?></button>
                                <?php if ($user_info['loginUrl'] != '' && $showFbConnect) { ?>

                                    <a class="btn btn-fb" href="<?php echo $user_info['loginUrl']; ?>"><?php echo JText::_('COM_JBLANCE_SIGN_IN_WITH_FACEBOOK'); ?><img class="fb" src="components/com_jblance/images/fb.png"></a> 

                                <?php }
                                ?>
                            </div>
                            <input type="hidden" name="option" value="com_users" />
                            <input type="hidden" name="task" value="user.login" />
                            <input type="hidden" name="return" value="<?php echo base64_encode($link_dashboard); ?>"/>
                            <?php echo JHtml::_('form.token'); ?>
                        </form>
                    </div>
                <?php else : ?>
                    <div class="logedin">
                        <div class="col-xs-4 col-sm-4 col-md-3 col-lg-3">
                            <?php
                            $att = "class='img-thumbnail img-responsive'";
                            $avatar = JblanceHelper::getLogo($userid, $att);
                            echo $avatar;
                            ?>
                        </div>
                        <h4><?php echo JText::sprintf('COM_JBLANCE_WELCOME_USER', $user->name); ?></h4>
                        <jdoc:include type="modules" name="balance" style="none" />
                    </div>
                <?php endif; ?>
            </div>
            <div class="modal-footer">
                <?php
                if (!$user->guest) {
                    echo "<a  href='$link_logout' class=\"btn btn-danger\"><i class=\"material-icons\">exit_to_app</i></a>";
                } else {

                    echo '<a class="btn btn-success btn-block" href="component/users/?view=registration">';
                    echo JText::_('COM_JBLANCE_REGISTER');
                    echo '</a>';
                }
                ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>
