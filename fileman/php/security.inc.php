<?php

/*
 * ___COMPANY___ - ___MODULE___
 * Copyright (C) ___YEAR___  ___COMPANY___
 * info:  ___EMAIL___
 *
 * GNU GENERAL PUBLIC LICENSE  
 *
 * This program is free software;
 * you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation;
 * either version 3 of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY;
 *  without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License along with this program; if not, see <http://www.gnu.org/licenses/>
 */
//die(dirname(__FILE__).'/../../../../../bootstrap.php');
//define('OX_IS_ADMIN', true);
//require_once dirname(__FILE__).'/../../../../../bootstrap.php';

function checkAccess($action)
{
    //if(!session_id()) die("Access Denied!");
    //if(!session_id()) session_start();
    //if(isset($_GET['akey'])) $_SESSION['akey'] = strip_tags(preg_replace( "/[^a-zA-Z0-9\._-]/", '', $_GET['akey']));
	if($_COOKIE['filemanagerkey'] !== md5($_SERVER['DOCUMENT_ROOT'].$_COOKIE['admin_sid'])) die('Access Denied!!');
//oxRegistry::getConfig()->setAdminMode(true);

//    var_dump(oxRegistry::getSession()->checkSessionChallenge());
//    var_dump(count(oxRegistry::get("oxUtilsServer")->getOxCookie()));
//    var_dump(oxRegistry::getUtils()->checkAccessRights());
}