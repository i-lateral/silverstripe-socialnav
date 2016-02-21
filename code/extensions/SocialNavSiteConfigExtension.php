<?php

/**
 * Add additional variables to default siteconfig
 *
 * @author ilateral (http://www.ilateral.co.uk)
 * @package SocialNav
 */
class SocialNavSiteConfigExtension extends DataExtension
{

    public static $has_many = array(
        'SocialNavLinks' => 'SocialNavLink'
    );

    public function updateCMSFields(FieldList $fields)
    {
        $fields->removeByName('SocialNavLinks');

        // Setup compressed postage options
        $socialnav_fields = ToggleCompositeField::create(
            'SocialNavFields',
            'Social Nav',
            array(
                GridField::create(
                    'SocialNavLinks',
                    '',
                    $this->owner->SocialNavLinks(),
                    GridFieldConfig_RecordEditor::create()
                )
            )
        );

        // Add config sets
        $fields->addFieldToTab('Root.Main', $socialnav_fields);
    }
}
