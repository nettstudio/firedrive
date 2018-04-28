<?php

/**
 * @package     Joomla.Site
 * @subpackage  com_simplefilemanager
 *
 * @copyright   Copyright (C) 2005 - 2018 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die;

$this->subtemplatename = 'items';
echo JLayoutHelper::render('joomla.content.category_default', $this);
echo JText::_('COM_SIMPLEFILEMANAGER_CREDITS');
