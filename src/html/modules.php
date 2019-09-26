<?php
/**
 * @package    Joomla.Site
 * @subpackage Templates.3jezy.2017
 *
 * @copyright 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license   GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die();

/**
 * 3jezyDivision chrome.
 *
 * @since 1.0
 */
function modChrome_3jezyDivision($module, $params, $attribs)
{
    $headerLevel = isset($attribs['headerLevel']) ? (int) $attribs['headerLevel'] : 3;
    if (!empty($module->content)) {
        $html = sprintf('<div class="moduletable%s">', htmlspecialchars($params->get('moduleclass_sfx')));
        if ($module->showtitle) {
            $html .= sprintf('<h%s>%s</h%s>', $headerLevel, $module->title, $headerLevel);
        }
        $html .= $module->content . '</div>';
        echo $html;
    }
}

/**
 * 3jezyHide chrome.
 *
 * @since 1.0
 */
function modChrome_3jezyHide($module, $params, $attribs)
{
    $headerLevel = isset($attribs['headerLevel']) ? (int) $attribs['headerLevel'] : 3;
    $state = isset($attribs['state']) ? (int) $attribs['state'] : 0;

    if (!empty($module->content)) {
        $html = sprintf('<div class="moduletable_js %s">', htmlspecialchars($params->get('moduleclass_sfx')));
        if ($module->showtitle) {
            $html .= '<h' . $headerLevel . ' class="js_heading"> ' . $module->title;
            $html .=
                '<a href="#" title="' .
                JText::_('TPL_3JEZY2017_CLICK') .
                '"
                onclick="auf(\'module_' .
                $module->id .
                '\'); return false"
                class="opencloselink" id="link_' .
                $module->id .
                '">';
            $html .= '<span class="no">';
            $html .= '<img src="templates/3jezy2017/images/plus.png" alt="';
            if ($state == 1) {
                $html .= JText::_('TPL_3JEZY2017_ALTOPEN');
            } else {
                $html .= JText::_('TPL_3JEZY2017_ALTCLOSE');
            }
            $html .= '" /></span></a></h' . $headerLevel . '>';
        }
        $html .= '<div class="module_content ';
        if ($state == 1) {
            $html .= 'open';
        }
        $html .= '" id="module_' . $module->id . '" tabindex="-1">' . $module->content;
        $html .= '</div></div>';
        echo $html;
    }
}

/**
 * 3jezyTabs chrome.
 *
 * @since 1.0
 */
function modChrome_3jezyTabs($module, $params, $attribs)
{
    $area = isset($attribs['id']) ? (int) $attribs['id'] : '1';
    $area = 'area-' . $area;

    static $modulecount;
    static $modules;

    if ($modulecount < 1) {
        $modulecount = count(JModuleHelper::getModules($attribs['name']));
        $modules = array();
    }

    if ($modulecount == 1) {
        $temp = new stdClass();
        $temp->content = $module->content;
        $temp->title = $module->title;
        $temp->params = $module->params;
        $temp->id = $module->id;
        $modules[] = $temp;
        // list of moduletitles
        echo '<div id="' . $area . '" class="tabouter"><ul class="tabs">';

        foreach ($modules as $rendermodule) {
            echo sprintf(
                '<li class="tab"><a href="#" id="link_%s" class="linkopen" onclick="tabshow(\'module_%s\');return false">%s</a></li>',
                $rendermodule->id,
                $rendermodule->id,
                $rendermodule->title
            );
        }
        echo '</ul>';
        $counter = 0;
        // modulecontent
        foreach ($modules as $rendermodule) {
            $counter++;

            echo '<div tabindex="-1" class="tabcontent tabopen" id="module_' . $rendermodule->id . '">';
            echo $rendermodule->content;
            if ($counter != count($modules)) {
                echo sprintf(
                    '<a href="#" class="unseen" onclick="nexttab(\'module_%s\');return false;" id="next_%s">%s</a>',
                    $rendermodule->id,
                    $rendermodule->id,
                    JText::_('TPL_3JEZY2017_NEXTTAB')
                );
            }
            echo '</div>';
        }
        $modulecount--;
        echo '</div>';
    } else {
        $temp = new stdClass();
        $temp->content = $module->content;
        $temp->params = $module->params;
        $temp->title = $module->title;
        $temp->id = $module->id;
        $modules[] = $temp;
        $modulecount--;
    }
}
