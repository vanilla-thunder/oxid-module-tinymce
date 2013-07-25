[{*
  * HDI TinyMCE
  * Copyright (C) 2012  HEINER DIRECT GmbH & Co. KG
  *  info:  info@heiner-direct.com
  * 
  * This program is free software;
  * you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation;
  * either version 3 of the License, or (at your option) any later version.
  * 
  * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY;
  * without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
  * You should have received a copy of the GNU General Public License along with this program; if not, see <http://www.gnu.org/licenses/>
  *}]
[{$smarty.block.parent}]
[{* toggle TinyMCE Editor *}]

[{if $tinyMCE }]
	<li style="margin-left: 50px;"><a style="border: 1px solid #0089EE; color: #0089EE;padding: 3px 10px;" href="javascript:;" onclick="tinymce.execCommand('mceToggleEditor',false,'editor_[{$sField}]');"><span>TinyMCE zeigen/verstecken</span></a></li>
[{/if}]