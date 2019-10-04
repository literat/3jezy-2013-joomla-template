<?php declare(strict_types=1);
/**
 * @copyright   Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
JText::script('TPL_3JEZY_ALTOPEN');
JText::script('TPL_3JEZY_ALTCLOSE');
JText::script('TPL_3JEZY_TEXTRIGHTOPEN');
JText::script('TPL_3JEZY_TEXTRIGHTCLOSE');
JText::script('TPL_3JEZY_FONTSIZE');
JText::script('TPL_3JEZY_BIGGER');
JText::script('TPL_3JEZY_RESET');
JText::script('TPL_3JEZY_SMALLER');
JText::script('TPL_3JEZY_INCREASE_SIZE');
JText::script('TPL_3JEZY_REVERT_STYLES_TO_DEFAULT');
JText::script('TPL_3JEZY_DECREASE_SIZE');
JText::script('TPL_3JEZY_OPENMENU');
JText::script('TPL_3JEZY_CLOSEMENU');
?>

<script type="text/javascript">
    var big = '<?php echo (int) $this->params->get('wrapperLarge'); ?>%';
    var small = '<?php echo (int) $this->params->get('wrapperSmall'); ?>%';
    var bildauf = '<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/images/plus.png';
    var bildzu = '<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/images/minus.png';
    var rightopen='<?php echo JText::_('TPL_3JEZY_TEXTRIGHTOPEN', true); ?>';
    var rightclose='<?php echo JText::_('TPL_3JEZY_TEXTRIGHTCLOSE', true); ?>';
    var altopen='<?php echo JText::_('TPL_3JEZY_ALTOPEN', true); ?>';
    var altclose='<?php echo JText::_('TPL_3JEZY_ALTCLOSE', true); ?>';
</script>
