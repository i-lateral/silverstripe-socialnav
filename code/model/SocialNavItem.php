<?php

/**
 * Represents an item in the Social Nav
 *
 * @author ilateral (http://www.ilateral.co.uk)
 * @package SocialNav
 */
class SocialNavLink extends DataObject
{

    public static $db = array(
        "Service" => "Varchar",
        "Title" => "Varchar",
        "URL" => "Varchar(255)",
        "ExtraClasses" => "Varchar"
    );

    public static $has_one = array(
        "Parent" => "SiteConfig"
    );

    public static $casting = array(
        "ConvertedService" => "Varchar"
    );

    public static $summary_fields = array(
        "Service",
        "Title",
        "URL"
    );

    public function getConvertedService()
    {
        return Convert::raw2url($this->Service);
    }

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fields->removeByName("ParentID");

        $service_names = SocialNav::config()->service_names;

        $service_field = DropdownField::create("Service")
            ->setSource($service_names)
            ->setEmptyString(_t("SocialNav.SelectService", "Select social media service"));

        $fields->replaceField("Service", $service_field);

        return $fields;
    }

    public function getCMSValidator()
    {
        return new RequiredFields(array(
            "Service",
            "URL"
        ));
    }
}
