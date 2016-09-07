var fs = require('fs'),
    p = require('./package.json'),
    r = require("request"),
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
shell("rm -rf _module/application");
shell("rm -rf _module/fileman");
shell("rm -rf _module/plugins");
shell("rm -rf _module/tinymce");
shell("rm -rf _master/copy_this/modules/bla/bla-tinymce");
console.log("");
console.log("     cleanup finished");

// oxversion
r('http://mb-dev.de/v/?raw=1&v=' + p.version).pipe(fs.createWriteStream('_module/version.jpg'));

// copy files
shell("cp -r application _module/");
shell("cp -r fileman _module/");
shell("cp -r plugins _module/");
shell("cp -r tinymce _module/");
shell("cp metadata.php _module/metadata.php");
shell("cp README.md _module/README.md");
shell("cp changelog _module/changelog");
shell("cp LICENSE _module/LICENSE");
console.log("     new files copied");

// compile some files
var replaces = {
    'MODULE': p.description,
    'VERSION': p.version,
    'AUTHOR': p.author,
    'COMPANY': p.company,
    'EMAIL': p.email,
    'URL': p.url,
    'YEAR': new Date().getFullYear()
};

for(var x in replaces)
{
    replace({
        regex: "###_"+x+"_###",
        replacement: replaces[x],
        paths: ['./_module'],
        recursive: true,
        silent: true
    });
}



process.on('exit', function (code) {
    console.log("     replacing complete");
    // copy module to master
    shell("cp -r _module _master/copy_this/modules/bla/bla-tinymce");
    shell("rm -rf _master/copy_this/modules/bla/bla-tinymce/.git");
    shell("cp _module/README.md _master/README.md");
    console.log("");
    console.log("     build complete! made my day!");
    console.log("");
});