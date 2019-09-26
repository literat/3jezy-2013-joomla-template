<?php
/**
 * @package    Joomla.Site
 * @subpackage Templates.beez3
 *
 * @copyright 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license   GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die();

$doc = JFactory::getDocument();
$color = $this->params->get('templatecolor');

$doc->addStyleSheet($this->baseurl . '/templates/system/css/system.css');
$doc->addStyleSheet(
    $this->baseurl . '/templates/' . $this->template . '/css/template.css',
    $type = 'text/css',
    $media = 'screen,projection'
);
$doc->addStyleSheet(
    $this->baseurl . '/templates/' . $this->template . '/css/position.css',
    $type = 'text/css',
    $media = 'screen,projection'
);
$doc->addStyleSheet(
    $this->baseurl . '/templates/' . $this->template . '/css/layout.css',
    $type = 'text/css',
    $media = 'screen,projection'
);
$doc->addStyleSheet(
    $this->baseurl . '/templates/' . $this->template . '/css/print.css',
    $type = 'text/css',
    $media = 'print'
);

$files = JHtml::_('stylesheet', 'templates/' . $this->template . '/css/general.css', null, false, true);
if ($files) :
    if (!is_array($files)) :
        $files = array($files);
    endif;
    foreach ($files as $file) :
        $doc->addStyleSheet($file);
    endforeach;
endif;

$doc->addStyleSheet(sprintf('templates/%s%/css/%s.css', $this->template, htmlspecialchars($color)));
if ($this->direction == 'rtl') {
    $doc->addStyleSheet(sprintf('%s/templates/%s/css/template_rtl.css', $this->baseUrl, $this->template));
    if (file_exists(sprintf('%s/templates/%s/css/%s_rtl.css', JPATH_SITE, $this->template, $color))) {
        $doc->addStyleSheet(
            sprintf('%s/templates/%s/css/%s_rtl.css', $this->baseurl, $this->template, htmlspecialchars($color))
        );
    }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
    <jdoc:include type="head" />

<!--[if lte IE 6]>
    <link href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/css/ieonly.css" rel="stylesheet" type="text/css" />
<![endif]-->
<!--[if lt IE 9]>
    <script src="<?php echo $this->baseurl; ?>/media/jui/js/html5.js"></script>
<![endif]-->
</head>
<body class="contentpane">
    <div id="all">
        <div id="main">
            <jdoc:include type="message" />
            <jdoc:include type="component" />
        </div>
    </div>
</body>
</html>
