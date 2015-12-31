<?php

/**
 * Add socialnav hook to controllers
 *
 * @author ilateral (http://www.ilateral.co.uk)
 * @package SocialNav
 */
class SocialNavControllerExtension extends Extension
{

    public function SocialNav()
    {
        return SocialNav::create();
    }
}
