/*jslint node:true, curly:false */
"use strict";

var fs = require('fs'),
    oxmodule  = require('./package.json'),
    replace = require('replace'),
    runner = require('child_process');


var shell = function (command) {
    runner.exec(command,
        function (err, stdout, stderr) {
            //if (err) console.log(err);
            //if (stderr) console.log(stderr);
        }
    );
};

// cleanup
shell("rm -rf _module/*");
shell("rm -rf _master/copy_this/modules/*");
console.log("");
console.log("     cleanup finished");

// copy files
shell("cp -r application _module/");
shell("cp -r fileman _module/");
shell("cp -r plugins _module/");
shell("cp -r tinymce _module/");
shell("cp LICENSE _module/LICENSE");
shell("cp metadata.php _module/metadata.php");
shell("cp README.md _module/README.md");
shell("cp tinymce.png _module/tinymce.png");
console.log("     new files copied");

// compile some files
var replaces = {
    'empalte':'emplate',
    'NAME': oxmodule.name,
    'DESCRIPTION': oxmodule.description,
    'VERSION': oxmodule.version+' ( '+new Date().toISOString().split('T')[0] + ' )',
    'AUTHOR': oxmodule.author,
    'VENDOR': oxmodule.vendor,
    'COMPANY': oxmodule.company,
    'EMAIL': oxmodule.email,
    'URL': oxmodule.url,
    'YEAR': new Date().getFullYear()
};

for(var x in replaces)
{
    if(!replaces.hasOwnProperty(x)) continue;
    replace({
        regex: "___"+x+"___",
        replacement: replaces[x],
        paths: ['./_module'],
        recursive: true,
        silent: true
    });
}

process.on('exit', function (code) {
    console.log("     replacing complete");
    // copy module to master
    shell("mkdir _master/copy_this/modules/"+oxmodule.vendor);
    shell("cp -rf _module _master/copy_this/modules/"+oxmodule.vendor+"/"+oxmodule.name);
    shell("rm -rf _master/copy_this/modules/"+oxmodule.vendor+"/"+oxmodule.name+"/.git");
    shell("cp _module/README.md _master/README.md");
    shell("cp LICENSE _master/LICENSE");
    console.log("");
    console.log("     build complete! made my day!");
    console.log("");
});