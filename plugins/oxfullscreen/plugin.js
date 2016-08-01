/**
 * TinyMCE Editor for OXID eShop CE
 * info:  oxid@bestlife.ag *
 * fullscreen plugin adapted for oxids f*cking framesets
 *
 * Released under LGPL License.
 * Copyright (c) 2016 Ephox Corp. All rights reserved
 *
 * inspired by fullscreen plugin by Ephox Corp:
 * https://github.com/tinymce/tinymce/blob/master/js/tinymce/plugins/fullscreen/plugin.js
 */

/*global tinymce:true */

tinymce.PluginManager.add('oxfullscreen', function(editor) {
	var fullscreenState = false, DOM = tinymce.DOM, iframeWidth, iframeHeight, resizeHandler;
	var containerWidth, containerHeight, scrollPos;

	if (editor.settings.inline) {
		return;
	}

	function getWindowSize() {
		var w, h, win = window, doc = document;
		var body = doc.body;

		// Old IE
		if (body.offsetWidth) {
			w = body.offsetWidth;
			h = body.offsetHeight;
		}

		// Modern browsers
		if (win.innerWidth && win.innerHeight) {
			w = win.innerWidth;
			h = win.innerHeight;
		}

		return {w: w, h: h};
	}

	function getScrollPos() {
		var vp = tinymce.DOM.getViewPort();

		return {
			x: vp.x,
			y: vp.y
		};
	}

	function setScrollPos(pos) {
		scrollTo(pos.x, pos.y);
	}

	function toggleFullscreen() {
		var body = document.body, documentElement = document.documentElement, editorContainerStyle;
		var editorContainer, iframe, iframeStyle;

		function resize() {
			DOM.setStyle(iframe, 'height', getWindowSize().h - (editorContainer.clientHeight - iframe.clientHeight));
		}

		fullscreenState = !fullscreenState;

		editorContainer = editor.getContainer();
		editorContainerStyle = editorContainer.style;
		iframe = editor.getContentAreaContainer().firstChild;
		iframeStyle = iframe.style;

		if (fullscreenState) {
		    // changeing frameset size to 5%, *
		    parent.document.getElementsByTagName("frameset")[0].setAttribute("rows","1px,*");
		    
			scrollPos = getScrollPos();
			iframeWidth = iframeStyle.width;
			iframeHeight = iframeStyle.height;
			iframeStyle.width = iframeStyle.height = '100%';
			containerWidth = editorContainerStyle.width;
			containerHeight = editorContainerStyle.height;
			editorContainerStyle.width = editorContainerStyle.height = '';

			DOM.addClass(body, 'mce-fullscreen');
			DOM.addClass(documentElement, 'mce-fullscreen');
			DOM.addClass(editorContainer, 'mce-fullscreen');

			DOM.bind(window, 'resize', resize);
			resize();
			resizeHandler = resize;
		} else {
		    // changing frameset size back to 40% , *
		    parent.document.getElementsByTagName("frameset")[0].setAttribute("rows","40%,*");
		    
			iframeStyle.width = iframeWidth;
			iframeStyle.height = iframeHeight;

			if (containerWidth) {
				editorContainerStyle.width = containerWidth;
			}

			if (containerHeight) {
				editorContainerStyle.height = containerHeight;
			}

			DOM.removeClass(body, 'mce-fullscreen');
			DOM.removeClass(documentElement, 'mce-fullscreen');
			DOM.removeClass(editorContainer, 'mce-fullscreen');
			DOM.unbind(window, 'resize', resizeHandler);
			setScrollPos(scrollPos);
		}

		editor.fire('FullscreenStateChanged', {state: fullscreenState});
	}

	editor.on('init', function() {
		editor.addShortcut('Ctrl+Shift+F', '', toggleFullscreen);
	});

	editor.on('remove', function() {
		if (resizeHandler) {
			DOM.unbind(window, 'resize', resizeHandler);
		}
	});

	editor.addCommand('mceFullScreen', toggleFullscreen);

	editor.addMenuItem('fullscreen', {
		text: 'Fullscreen',
		shortcut: 'Meta+Alt+F',
		selectable: true,
		onClick: function() {
			toggleFullscreen();
			editor.focus();
		},
		onPostRender: function() {
			var self = this;

			editor.on('FullscreenStateChanged', function(e) {
				self.active(e.state);
			});
		},
		context: 'view'
	});

	editor.addButton('fullscreen', {
		tooltip: 'Fullscreen',
		shortcut: 'Meta+Alt+F',
		onClick: toggleFullscreen,
		onPostRender: function() {
			var self = this;

			editor.on('FullscreenStateChanged', function(e) {
				self.active(e.state);
			});
		}
	});

	return {
		isFullscreen: function() {
			return fullscreenState;
		}
	};
});