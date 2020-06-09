/*jslint node:true, curly:false */
"use strict";

var fs = require('fs-extra'),
    oxmodule = require('./package.json'),
    replace = require('replace');



// cleanup
fs.moveSync('_module','__module');
fs.mkdirSync('_module');
fs.moveSync('__module/.git','_module/.git');
fs.removeSync('__module');
fs.emptyDirSync('_master/copy_this/modules/'+ oxmodule.vendor + '/' + oxmodule.name);

console.log("");
console.log("     cleanup finished");

// copy files
try {
    fs.copySync('application', '_module/application');
    fs.copySync('fileman', '_module/fileman');
    fs.copySync('plugins', '_module/plugins');
    fs.copySync('tinymce', '_module/tinymce');
    fs.copySync('LICENSE', '_module/LICENSE');
    fs.copySync('metadata.php', '_module/metadata.php');
    fs.copySync('README.md', '_module/README.md');
    fs.copySync('tinymce.png', '_module/tinymce.png');
    console.log("     new files copied");
} catch (err) {
    console.log(err);
}
// compile some files
var replaces = {
    'empalte': 'emplate',
    'NAME': oxmodule.name,
    'DESCRIPTION': oxmodule.description,
    'VERSION': oxmodule.version + ' ( ' + new Date().toISOString().split('T')[0] + ' )',
    'AUTHOR': oxmodule.author,
    'VENDOR': oxmodule.vendor,
    'COMPANY': oxmodule.company,
    'EMAIL': oxmodule.email,
    'URL': oxmodule.url,
    'YEAR': new Date().getFullYear()
};

for (var x in replaces) {
    if (!replaces.hasOwnProperty(x)) continue;
    replace({
        regex: "___" + x + "___",
        replacement: replaces[x],
        paths: ['./_module'],
        recursive: true,
        silent: true
    });
}

process.on('exit', function (code) {
    console.log("     replacing complete");
    // copy module to master
    try {
        fs.mkdirsSync('_master/copy_this/modules/' + oxmodule.vendor);
        fs.copySync('_module', '_master/copy_this/modules/' + oxmodule.vendor + '/' + oxmodule.name);
        fs.removeSync('_master/copy_this/modules/' + oxmodule.vendor + '/' + oxmodule.name + '/.git');
        fs.copySync('_module/README.md', '_master/README.md');
        fs.copySync('LICENSE', '_master/LICENSE');
        console.log("");
        console.log("     build complete! made my day!");
        console.log("");
    } catch (err) {
        console.log(err);
    }
});