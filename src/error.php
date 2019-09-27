<?php declare(strict_types=1);
/**
 * @copyright 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license   GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die();

JLoader::import('joomla.filesystem.file');

$params = JFactory::getApplication()->getTemplate(true)->params;
$logo = $params->get('logo');
$showRightColumn = 0;
$showleft = 0;
$showbottom = 0;

// get params
$color = $params->get('templatecolor');
$navposition = $params->get('navposition');

//get language and direction
$doc = JFactory::getDocument();
$this->language = $doc->language;
$this->direction = $doc->direction;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="language" content="<?php echo $this->language; ?>" />
    <title><?php echo $this->error->getCode(); ?> - <?php echo $this->title; ?></title>
<?php if ($this->error->getCode() >= 400 && $this->error->getCode() < 500) {
    echo sprintf(
        '<link rel="stylesheet" href="%s/templates/system/css/system.css" type="text/css" />',
        $this->baseurl
    );
    echo sprintf(
        '<link rel="stylesheet" href="%s/templates/%s/css/position.css" type="text/css" media="screen,projection" />',
        $this->baseurl,
        $this->template
    );
    echo sprintf(
        '<link rel="stylesheet" href="%s/templates/%s/css/layout.css" type="text/css" media="screen,projection" />',
        $this->baseurl,
        $this->template
    );
    echo sprintf(
        '<link rel="stylesheet" href="%s/templates/%s/css/print.css" type="text/css" media="Print" />',
        $this->baseurl,
        $this->template
    );
    echo sprintf(
        '<link rel="stylesheet" href="%s/templates/%s/css/%s.css" type="text/css" />',
        $this->baseurl,
        $this->template,
        htmlspecialchars($color)
    ); ?>
    <?php
    $files = JHtml::_('stylesheet', 'templates/' . $this->template . '/css/general.css', null, false, true);
    if ($files) :
        if (!is_array($files)) :
            $files = [$files];
    endif;
    foreach ($files as $file) : ?>
    <link rel="stylesheet" href="<?php echo $file; ?>" type="text/css" />
    <?php endforeach;
    endif; ?>
    <link rel="stylesheet" href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/css/<?php echo htmlspecialchars(
        $color
    ); ?>.css" type="text/css" />
        <?php if ($this->direction == 'rtl') : ?>
            <link rel="stylesheet" href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/css/template_rtl.css" type="text/css" />
            <?php if (file_exists(sprintf('%s/templates/%s/css/%s_rtl.css', JPATH_SITE . $this->template, $color))) : ?>
                <link rel="stylesheet" href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/css/<?php echo $color; ?>_rtl.css" type="text/css" />
            <?php endif; ?>
        <?php endif; ?>
        <!--[if lte IE 6]>
            <link href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/css/ieonly.css" rel="stylesheet" type="text/css" />
        <![endif]-->
        <!--[if IE 7]>
            <link href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/css/ie7only.css" rel="stylesheet" type="text/css" />
        <![endif]-->
        <!--[if lt IE 9]>
            <script src="<?php echo $this->baseurl; ?>/media/jui/js/html5.js"></script>
        <![endif]-->
</head>
<body>
    <div id="all">
        <div id="back">
            <div id="header">
                <a href="<?php echo $this->baseurl; ?>" title="Domů">
                    <img src="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/images/3jezy-error.png" alt="Shit Happens!!">
                </a>
                <span style="position:absolute; float:left; top:25px; left:60px;">
                    <a href="<?php echo $this->baseurl; ?>">
                        <img alt="logo" src="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/images/3jezy-logo.png">
                    </a>
                </span>
                <span style="position:absolute; float:left; top:36px; left:220px;">
                    <h1 style="font-weight:bold;color:white; font-size: 2.2em;"> | Napříč Prahou - přes tři jezy</h1>
                </span>
                <ul class="skiplinks">
                    <li>
                        <a href="#wrapper2" class="u2">
                            <?php echo JText::_('TPL_3JEZY_SKIP_TO_ERROR_CONTENT'); ?>
                        </a>
                    </li>
                    <li>
                        <a href="#nav" class="u2">
                            <?php echo JText::_('TPL_3JEZY_ERROR_JUMP_TO_NAV'); ?>
                        </a>
                    </li>
                </ul>
                <div id="line"></div>
            </div><!-- end header -->
        <div id="contentarea2" >
                    <!-- end navi -->
            <div id="wrapper2">
            <div id="errorboxbody">
                        <h2><?php echo JText::_('JERROR_AN_ERROR_HAS_OCCURRED'); ?><br />
                                <?php echo JText::_('JERROR_LAYOUT_PAGE_NOT_FOUND'); ?></h2>
                                <?php if (JModuleHelper::getModule('search')) : ?>
                                    <div id="searchbox">
                                    <h3 class="unseen"><?php echo JText::_('TPL_3JEZY_SEARCH'); ?></h3>
                                    <p><?php echo JText::_('JERROR_LAYOUT_SEARCH'); ?></p>
                                    <?php
                                    $module = JModuleHelper::getModule('search');
    echo JModuleHelper::renderModule($module); ?>
                                    </div>
                                <?php endif; ?>
                                <div>
                                </div>

                        <h3><?php echo JText::_('JERROR_LAYOUT_PLEASE_CONTACT_THE_SYSTEM_ADMINISTRATOR'); ?></h3>
                        <h2>#<?php echo $this->error->getCode(); ?>&nbsp;<?php echo $this->error->getMessage(); ?></h2> <br />
            </div><!-- end wrapper -->
        </div><!-- end contentarea -->
                        <?php if ($this->debug) :
                            echo $this->renderBacktrace();
    endif; ?>
            </div>  <!--end all -->
        </div>
    </div>
    <footer>
    </footer>
</body>
</html>
<?php
} else { ?>
<?php if (!isset($this->error)) {
        $this->error = JError::raiseWarning(404, JText::_('JERROR_ALERTNOAUTHOR'));
        $this->debug = false;
    } ?>
    <link rel="stylesheet" href="<?php echo $this->baseurl; ?>/templates/system/css/error.css" type="text/css" />
</head>
<body>
    <div class="error">
        <div id="outline">
        <div id="errorboxoutline">
            <div id="errorboxheader"> <?php echo $this->title; ?></div>
            <div id="errorboxbody">
            <p><strong><?php echo JText::_('JERROR_LAYOUT_NOT_ABLE_TO_VISIT'); ?></strong></p>
                <ol>
                    <li><?php echo JText::_('JERROR_LAYOUT_AN_OUT_OF_DATE_BOOKMARK_FAVOURITE'); ?></li>
                    <li><?php echo JText::_('JERROR_LAYOUT_SEARCH_ENGINE_OUT_OF_DATE_LISTING'); ?></li>
                    <li><?php echo JText::_('JERROR_LAYOUT_MIS_TYPED_ADDRESS'); ?></li>
                    <li><?php echo JText::_('JERROR_LAYOUT_YOU_HAVE_NO_ACCESS_TO_THIS_PAGE'); ?></li>
                    <li><?php echo JText::_('JERROR_LAYOUT_REQUESTED_RESOURCE_WAS_NOT_FOUND'); ?></li>
                    <li><?php echo JText::_('JERROR_LAYOUT_ERROR_HAS_OCCURRED_WHILE_PROCESSING_YOUR_REQUEST'); ?></li>
                </ol>
            <p>
                <strong>
                    <?php echo JText::_('JERROR_LAYOUT_PLEASE_TRY_ONE_OF_THE_FOLLOWING_PAGES'); ?>
                </strong>
            </p>
            <ul>
                <li>
                    <a href="<?php echo $this->baseurl; ?>/index.php" title="
                        <?php echo JText::_('JERROR_LAYOUT_GO_TO_THE_HOME_PAGE'); ?>
                    ">
                        <?php echo JText::_('JERROR_LAYOUT_HOME_PAGE'); ?>
                    </a>
                </li>
                <li>
                    <a href="<?php echo $this->baseurl; ?>/index.php?option=com_search" title="
                    <?php echo JText::_('JERROR_LAYOUT_SEARCH_PAGE'); ?>
                    ">
                        <?php echo JText::_('JERROR_LAYOUT_SEARCH_PAGE'); ?>
                    </a>
                </li>
            </ul>
            <p><?php echo JText::_('JERROR_LAYOUT_PLEASE_CONTACT_THE_SYSTEM_ADMINISTRATOR'); ?>.</p>
            <div id="techinfo">
            <p><?php echo $this->error->getMessage(); ?></p>
            <p>
                <?php if ($this->debug) :
                    echo $this->renderBacktrace();
                endif; ?>
            </p>
            </div>
            </div>
        </div>
        </div>
    </div>
</body>
</html>

<?php } ?>
