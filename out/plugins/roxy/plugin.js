/**
 * vanilla-thunder/oxid-module-tinymce
 * TinyMCE 5 Integration for OXID eShop V6.2
 *
 * This program is free software;
 * you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation;
 * either version 3 of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY;
 *  without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License along with this program; if not, see <http://www.gnu.org/licenses/>
 */

/*global tinymce:true */

(function () {
    'use strict';
    var PluginManager = tinymce.util.Tools.resolve('tinymce.PluginManager');
    PluginManager.add('roxy', function (editor) {

        editor.settings.file_picker_callback = function ($callback, $value, $meta) {
            console.log($callback);
            console.log($value);
            console.log($meta);
            //var selectedimage =

            var url = editor.settings.filemanager_url
                + "&type=" + $meta.filetype
                + '&value=' + $value
                + '&selected=' + $value;


            if (editor.settings.language) {
                url += '&langCode=' + editor.settings.language;
            }
            if (editor.settings.filemanager_access_key) {
                url += '&akey=' + editor.settings.filemanager_access_key;
            }

            editor.windowManager.openUrl({
                title: 'Filemanager',
                url: url,
                width: window.innerWidth,
                height: window.innerHeight - 40
            });

            //$callback('myimage.jpg', {alt: 'My alt text'});
        };
    });
}());