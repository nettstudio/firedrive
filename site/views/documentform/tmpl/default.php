<?php
/**
 * @package     Firedrive
 * @author      Giovanni Mansillo
 * @license     GNU General Public License version 2 or later; see LICENSE.md
 * @copyright   Firedrive
 */
// no direct access
defined('_JEXEC') or die;

JLoader::register('FiredriveHelper', JPATH_ADMINISTRATOR . '/components/com_firedrive/helpers/firedrive.php');

JHtml::_('behavior.keepalive');
JHtml::_('behavior.tooltip');
JHtml::_('formbehavior.chosen', 'select');

$doc = JFactory::getDocument();
$doc->addScriptDeclaration('
	jQuery(document).ready(function ($){
		var input = document.getElementById("jform_select_file");
		if(typeof input !== "undefined"){
			input.classList.add("required");
		}
	});
');

$user         = JFactory::getUser();
$canManage    = $user->authorise('core.manage', 'com_firedrive');
$canEditState = $user->authorise('core.edit.state', 'com_firedrive');
?>

<div class="firedrive-edit front-end-edit">

	<?php echo $this->params->get('page_intro'); ?>

    <form
            enctype="multipart/form-data"
            id="form-documentform"
            method="post"
            class="form-validate"
            action="<?php echo JRoute::_('index.php?option=com_firedrive'); ?>"
    >
        <input type="hidden" name="jform[id]" value="<?php echo $this->item->id; ?>"/>

        <fieldset>

			<?php echo $this->form->renderField('title'); ?>

			<?php if ($this->params->get('default_category', "") == ""): ?>
				<?php echo $this->form->renderField('catid'); ?>
			<?php else: ?>
                <input type="hidden" name="catid" value="<?php echo $this->params->get('default_category'); ?>" />
            <?php endif; ?>

			<?php echo $this->form->renderField('select_file'); ?>

			<?php echo $this->form->renderField('description'); ?>

        </fieldset>

        <button type="submit" class="btn button btn-primary">
            <span class="icon-ok"></span> <?php echo JText::_('JSUBMIT'); ?>
        </button>

        <a class="btn button btn-default"
           href="<?php echo JRoute::_('index.php?option=com_firedrive'); ?>"
           title="<?php echo JText::_('JCANCEL'); ?>">
            <span class="icon-cancel"></span>
			<?php echo JText::_('JCANCEL'); ?>
        </a>

        <input type="hidden" name="MAX_FILE_SIZE" value="2000000">
        <input type="hidden" name="option" value="com_firedrive"/>
        <input type="hidden" name="task" value="documentform.save"/>
		<?php echo JHtml::_('form.token'); ?>
    </form>

	<?php echo FiredriveHelper::getFdkey(); ?>

</div>
