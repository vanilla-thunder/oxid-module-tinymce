/*!
 * Add-on for including N1ED into your TinyMCE 5
 * Developer: N1ED
 * Website: https://n1ed.com/
 * License: GPL v3
 */


//
//   HOW TO INSTALL THIS ADD-ON
//
//   1. Copy the plugin as "tinymce/plugins/n1ed/plugin.js"
//   2. Add "n1ed" into "plugins" config option
//   3. Done!
//
//
//   VISUAL CONFIGURATION
//
//   If you want to configure all N1ED add-ons visually,
//   just go into your dashboard at:
//
//       https://n1ed.com/dashboard
//
//   Once configured N1ED using Dashboard please set your personal API key to use it:
//
//      apiKey: "APIKEY12"
//


var apiKey = tinymce.settings.apiKey || "N1EDDFLT";

// Load Ecosystem plugin manually due to
// TinyMCE will not accept external_plugins option on the fly
tinymce.PluginManager.load('N1EDEco',  "https://cloud.n1ed.com/cdn/" + apiKey + "/latest/tinymce/plugins/N1EDEco/plugin.js");

tinymce.PluginManager.add(
    "n1ed",
    function() {},
    ["N1EDEco"] // We can not move N1EDEco in this file due to we need to dynamically
                // embed configuration from your Dashboard into it.
                // So N1EDEco add-on can be loaded only from CDN
);