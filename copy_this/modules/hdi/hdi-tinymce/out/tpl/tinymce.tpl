<!-- TinyMCE -->
<script type="text/javascript">
	var tinyMCE = null;
	function copyLongDescFromTinyMCE(sIdent) {
		var editor = tinyMCE.get('editor_' + sIdent);
		if (tinyMCE && editor) {
			editor.show();
			content = editor.getContent();
			if (content !== null) {
				// restore smarty code that has been masked by htmlentities:
				var aSmartyParts = content.split("[" + "{");

				if (aSmartyParts.length > 1) {
					for (var i = 0; i < aSmartyParts.length; i++) {
						aSubParts = aSmartyParts[i].split("}" + "]");
						if (aSubParts.length > 1)
							aSubParts[0] = aSubParts[0].replace(/&gt;/gi, ">").replace(/&lt;/gi, "<").replace(/&amp;/gi, "&").replace(/&quot;/gi, '"');
						aSmartyParts[i] = aSubParts.join("}" + "]");
					}
					content = aSmartyParts.join("[" + "{");
				}
				document.getElementsByName('editval[' + sIdent + ']').item(0).value = content;
				return true;
			}
		}
		return false;
	}

	var origCopyLongDesc = copyLongDesc;
	copyLongDesc = function(sIdent) {
		if ( copyLongDescFromTinyMCE( sIdent ) ) return;
		origCopyLongDesc( sIdent );
	}
</script>
<script type="text/javascript" src="[{$oViewConf->getModuleUrl('hdi-tinymce','tiny_mce/tiny_mce.js') }]"></script>
<script type="text/javascript">
	tinyMCE.init({
		// General options
		height: '[{$cfg->getConfigParam("sTinyMCE_height")}]',
		relative_urls: [{if $cfg->getConfigParam("bTinyMCE_relative_urls") == 1}]true[{else}]false[{/if}],
		remove_script_host: false,
		document_base_url: '[{$oViewConf->getBaseDir()}]',
		mode: "textareas",
		theme: "advanced",
		plugins: "[{if $cfg->getConfigParam("bTinyMCE_autolink")}]autolink,[{/if}][{if $cfg->getConfigParam("bTinyMCE_lists")}]lists,[{/if}][{if $cfg->getConfigParam("bTinyMCE_pagebreak")}]pagebreak,[{/if}][{if $cfg->getConfigParam("bTinyMCE_style")}]style,[{/if}][{if $cfg->getConfigParam("bTinyMCE_layer")}]layer,[{/if}][{if $cfg->getConfigParam("bTinyMCE_table")}]table,[{/if}][{if $cfg->getConfigParam("bTinyMCE_save")}]save,[{/if}][{if $cfg->getConfigParam("bTinyMCE_advhr")}]advhr,[{/if}][{if $cfg->getConfigParam("bTinyMCE_advimage")}]advimage,[{/if}][{if $cfg->getConfigParam("bTinyMCE_advlink")}]advlink,[{/if}][{if $cfg->getConfigParam("bTinyMCE_emotions")}]emotions,[{/if}][{if $cfg->getConfigParam("bTinyMCE_iespell")}]iespell,[{/if}][{if $cfg->getConfigParam("bTinyMCE_inlinepopups")}]inlinepopups,[{/if}][{if $cfg->getConfigParam("bTinyMCE_insertdatetime")}]insertdatetime,[{/if}][{if $cfg->getConfigParam("bTinyMCE_preview")}]preview,[{/if}][{if $cfg->getConfigParam("bTinyMCE_media")}]media,[{/if}][{if $cfg->getConfigParam("bTinyMCE_searchreplace")}]searchreplace,[{/if}][{if $cfg->getConfigParam("bTinyMCE_print")}]print,[{/if}][{if $cfg->getConfigParam("bTinyMCE_contextmenu")}]contextmenu,[{/if}][{if $cfg->getConfigParam("bTinyMCE_paste")}]paste,[{/if}][{if $cfg->getConfigParam("bTinyMCE_directionality")}]directionality,[{/if}][{if $cfg->getConfigParam("bTinyMCE_fullscreen")}]fullscreen,[{/if}][{if $cfg->getConfigParam("bTinyMCE_noneditable")}]noneditable,[{/if}][{if $cfg->getConfigParam("bTinyMCE_visualchars")}]visualchars,[{/if}][{if $cfg->getConfigParam("bTinyMCE_nonbreaking")}]nonbreaking,[{/if}][{if $cfg->getConfigParam("bTinyMCE_xhtmlxtras")}]xhtmlxtras,[{/if}][{if $cfg->getConfigParam("bTinyMCE_template")}]template,[{/if}][{if $cfg->getConfigParam("bTinyMCE_wordcount")}]wordcount,[{/if}][{if $cfg->getConfigParam("bTinyMCE_advlist")}]advlist,[{/if}][{if $cfg->getConfigParam("bTinyMCE_autosave")}]autosave,[{/if}][{if $cfg->getConfigParam("bTinyMCE_visualblocks")}]visualblocks[{/if}][{if $cfg->getConfigParam("sTinyMCE_customplugins")}][{$cfg->getConfigParam("sTinyMCE_customplugins")}][{/if}]",
		// Theme options
		theme_advanced_buttons1: "newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect",
		theme_advanced_buttons2: "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3: "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4: "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft,visualblocks,|,image,insertimage,|,dDesc",
		theme_advanced_toolbar_location: "top",
		theme_advanced_toolbar_align: "left",
		theme_advanced_statusbar_location: "bottom",
		theme_advanced_resizing: true,
		// Example content CSS (should be your site CSS)
		//content_css : "modules/tinymce/style.css",

		// Drop lists for link/image/media/template dialogs
		//template_external_list_url : "lists/template_list.js",
		//external_link_list_url : "lists/link_list.js",
		//external_image_list_url : "lists/image_list.js",
		//media_external_list_url : "lists/media_list.js",
	});
</script>
<textarea id='editor_[{$sField}]' style='width:[{$iWidth}]; height:[{$iHeight}];'>[{$sContent}]</textarea>
[{assign var=tinyMCE value=1 }]
<!-- /TinyMCE -->
