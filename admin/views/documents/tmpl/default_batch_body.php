<?php
/**
 * @package     Firedrive
 * @author      Giovanni Mansillo
 * @license     GNU General Public License version 2 or later; see LICENSE.md
 * @copyright   Firedrive
 */
defined('_JEXEC') or die;

$published = $this->state->get('filter.published');
?>

<div class="container-fluid">
    <div class="row-fluid">
        <div class="control-group span6">
            <div class="controls">
				<?php echo JLayoutHelper::render('joomla.html.batch.language'); ?>
            </div>
        </div>
    </div>
    <div class="row-fluid">
		<?php if ($published >= 0) : ?>
            <div class="control-group span6">
                <div class="controls">
					<?php echo JLayoutHelper::render('joomla.html.batch.item', 'com_firedrive'); ?>
                </div>
            </div>
		<?php endif; ?>
    </div>
</div>
