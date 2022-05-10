<?php
/**
 * @package    db8form
 *
 * @author     Peter Martin <joomla@db8.nl>
 * @copyright  Copyright 2022 by Peter Martin / db8.nl
 * @license    http://www.gnu.org/licenses/gpl-3.0.html GNU/GPL
 * @link       https://db8.nl
 */

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Plugin\CMSPlugin;

/**
 * Override Joomla's edit form
 *
 * @since  1.0.0
 */
class PlgContentDb8form extends CMSPlugin
{
	/**
	 * @var    \Joomla\CMS\Application\SiteApplication
	 *
	 * @since  1.0.0
	 */

	/**
	 * Set as required the passwords fields when mail to user is set to No
	 *
	 * @param   \Joomla\CMS\Form\Form  $form  The form to be altered.
	 * @param   mixed                  $data  The associated data for the form.
	 *
	 * @return  boolean
	 *
	 * @throws Exception
	 * @since   1.0.0
	 */
	public function onContentPrepareForm($form, $data)
	{
		// Change form for Content > Article Edit
		if ($form->getName() === 'com_content.article')
		{
			// Check if the current User Group is configured in the Plugin Parameters
			$partOfGroups = array_intersect(
				Factory::getApplication()->getIdentity()->groups,
				$this->params->get('userGroups')
			);

			if ($partOfGroups)
			{
				// Disable "Featured"
				//$form->setFieldAttribute('featured', 'disabled', 'true');

				// Hide "Featured" label and field
				//$document = $app->getDocument();
				//$document->addStyleDeclaration('.label#jform_featured-lbl, .fieldset#jform_featured{display: none!important;}

				// Make "Note" required
				//$form->setFieldAttribute('note', 'required', 'true');
			}

			return true;
		}

		return true;
	}
}
