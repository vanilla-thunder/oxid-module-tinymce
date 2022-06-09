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
    var PM = tinymce.util.Tools.resolve('tinymce.PluginManager');

    PM.add('oxfullscreen', function (editor) {
        editor.ui.registry.addToggleButton('fullscreen', {
            tooltip: 'Fullscreen',
            icon: 'fullscreen',
            shortcut: 'Meta+Alt+F',
            active: false,
            onAction: (api) => {
                const topframeset = top.document.getElementsByTagName("frameset");
                topframeset[0].setAttribute("cols", (topframeset[0].getAttribute("cols") === "200,*" ? "1px,*" : "200,*"));
                topframeset[1].setAttribute("rows", (topframeset[1].getAttribute("rows") === "54,*" ? "1px,*" : "54,*"));
                const parentframeset = parent.document.getElementsByTagName("frameset");
                parentframeset[0].setAttribute("rows", (parentframeset[0].getAttribute("rows") === "40%,*" ? "1px,*" : "40%,*"));
                api.setActive(!api.isActive());
            }
        });

        return {
            getMetadata: () => {
                return {
                    name: "TinyMCE Fullscreen Editing Plugin for OXID eShop",
                    url: "https://github.com/vanilla-thunder/oxid-module-tinymce"
                };
            }
        };
    });
}());