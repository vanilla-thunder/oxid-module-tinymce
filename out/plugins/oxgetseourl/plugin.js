/**
 * fullscreen plugin adapted for oxids f*cking framesets
 *
 * Released under LGPL License.
 * Copyright (c) 2016 Ephox Corp. All rights reserved
 *
 * inspired by fullscreen plugin by Ephox Corp:
 * https://github.com/tinymce/tinymce/blob/master/js/tinymce/plugins/link/plugin.js
 */

/*global tinymce:true */

tinymce.PluginManager.add('oxgetseourl', function(editor) {
	
	function showDialog() {
		console.log("yolo");
	}

	editor.addButton('yolo', {
		icon: 'link',
		tooltip: 'yolo',
		onclick: showDialog
	});
	

});