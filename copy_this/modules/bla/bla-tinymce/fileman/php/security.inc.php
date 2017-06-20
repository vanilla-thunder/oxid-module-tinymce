<?php

/*
 * bestlife AG - ___MODULE___
 * Copyright (C) 2017  bestlife AG
 * info:  oxid@bestlife.ag
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

function checkAccess($action)
{
    //if(!session_id()) die("Access Denied!");
    //if(!session_id()) session_start();
    //if(isset($_GET['akey'])) $_SESSION['akey'] = strip_tags(preg_replace( "/[^a-zA-Z0-9\._-]/", '', $_GET['akey']));
	if($_COOKIE['filemanagerkey'] !== md5($_SERVER['DOCUMENT_ROOT'].$_COOKIE['admin_sid'])) die('Access Denied!!');
}