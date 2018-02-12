<?php

namespace ilateral\SilverStripe\SocialNav\Extensions;

use SilverStripe\Core\Extension;
use ilateral\SilverStripe\SocialNav\SocialNav;

/**
 * Add socialnav hook to controllers
 *
 * @author ilateral (http://www.ilateral.co.uk)
 * @package SocialNav
 */
class ControllerExtension extends Extension
{

    public function SocialNav()
    {
        return SocialNav::create();
    }
}
