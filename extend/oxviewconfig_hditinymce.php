<?php

/**
 * HDI TinyMCE
 * Copyright (C) 2012-2013  HEINER DIRECT GmbH & Co. KG
 * info:  oxid@heiner-direct.com
 *
 * This program is free software;
 * you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation;
 * either version 3 of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY;
 * without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License along with this program; if not, see <http://www.gnu.org/licenses/>
 */

class oxviewconfig_hditinymce extends oxviewconfig_hditinymce_parent
{
    public function getExtPlugins()
    {
        $aPlugins = oxRegistry::getConfig()->getConfigParam("aTinyMCE_external_plugins");
        if(function_exists("getExtPlugins")) $aPlugins = array_merge(parent::getExtPlugins(), $aPlugins);
        return $aPlugins;
    }

    public function getExtControls()
    {
        $sExtControls = oxRegistry::getConfig()->getConfigParam("sTinyMCE_external_controls");
        if(function_exists("getExtPlugins")) $sExtControls = parent::getExtControls()." ". $sExtControls;
        return $sExtControls;
    }

    public function getExtConfig()
    {
        $sExtConfig = implode(oxRegistry::getConfig()->getConfigParam("aTinyMCE_external_config"), "\n");
        if(function_exists("getExtConfig")) $sExtConfig = parent::getExtConfig()."\n". $sExtConfig;
        return $sExtConfig;
    }
}