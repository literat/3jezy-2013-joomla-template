<?php declare(strict_types=1);
/**
 * @copyright   Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die();

require_once JPATH_SITE . '/components/com_content/helpers/route.php';

function contactArticles($article)
{
    return JHtml::_(
        'link',
        JRoute::_(ContentHelperRoute::getArticleRoute($article->slug, $article->catslug)),
        htmlspecialchars($article->title, ENT_COMPAT, 'UTF-8')
    );
}

?>
<?php if ($this->params->get('show_articles')) : ?>
<div class="contact-articles">

    <ol>
        <?php foreach ($this->item->articles as $article) : ?>
            <li>
                <?php echo contactArticles($article); ?>
            </li>
        <?php endforeach; ?>
    </ol>
</div>
<?php endif; ?>
