/**
 * ___NAME___
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
 *
 * ___AUTHOR___
 */

tinymce.PluginManager.add('roxy', function(editor)
{
    tinymce.activeEditor.settings.file_browser_callback = roxyFilemanager;

    function roxyFilemanager (id, value, type, win)
    {

        var url = editor.settings.external_filemanager_path+'index.html';
        if (url.indexOf("?") < 0) { url += "?type=" + type; }
        else { url += "&type=" + type; }

        url += '&input=' + id + '&value=' + win.document.getElementById(id).value;
        if(tinyMCE.activeEditor.settings.language) { url += '&langCode=' + tinyMCE.activeEditor.settings.language; }
        if(tinyMCE.activeEditor.settings.filemanager_access_key) { url += '&akey=' + tinyMCE.activeEditor.settings.filemanager_access_key; }

        tinymce.activeEditor.windowManager.open({
            title: 'Filemanager',
            file: url,
            width: window.innerWidth,
            height: window.innerHeight-40,
            resizable: false,
            maximizable: false,
            plugins: "media",
            inline: 1
        }, {
            window: win,
            input: id
        });
    }
});