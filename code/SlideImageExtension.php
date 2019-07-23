<?php

/**
 * Optional extension to provide better upgradeability to version 4.0.
 */
class SlideImageExtension extends DataExtension 
{

	private static $has_one = array(
        'SlideLink' => 'Link',
	);
    
	public function updateCMSFields(FieldList $fields)
    {
        $fields->removeByName('SlideLinkID');
		// Page link
        $fields->replaceField(
            'PageLinkID',
            LinkField::create('SlideLinkID', $this->owner->fieldLabel('SlideLinkID'))
        );
    }
    
    public function HasCaption()
    {
        return (!empty($this->owner->Headline) || !empty($this->owner->Description));
    }
}
