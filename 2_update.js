/*jslint node:true, curly:false */
"use strict";

var r = require('request'),
    c = require('cheerio'),
    fs = require('fs'),
    replace = require('replace'),
    AdmZip = require('adm-zip'),
    runner = require('child_process');


var shell = function (command) {
    runner.exec(command,
        function (err, stdout, stderr) {
            //if (err) console.log(err);
            //if (stderr) console.log(stderr);
        }
    );
};

var error = function (err) {
    console.error("          ############################################################");
    console.error("          # " + err);
    console.error("          ############################################################");
    process.exit();
};


var log = function (msg) {
    var shlomo = "                                                                        |";
    console.log("   |      " + msg + shlomo.substring(msg.length));
};


console.log("");
console.log("   ___________________________ updating TinyMCE started ___________________________");

r("http://www.tinymce.com/download/", function (err, res, body) {

    if (err || res.statusCode !== 200) error(err);

    if (fs.existsSync("tinymce")) {
        shell("rm -rf tinymce");
        log("");
        log("->  removing old tinymce");
    }

    var tinymceurl = c.load(body)('section.prod-package a.download-track').first().attr('href');
    log("");
    log("->  downloading newest TinyMCE");
    log("    " + tinymceurl);

    r(tinymceurl).pipe(
        fs.createWriteStream('tmp_tinymce.zip')
            .on('close', function () {
                log("");
                log("->  extracting TinyMCE");
                var tinymce = new AdmZip('tmp_tinymce.zip');
                tinymce.getEntries().forEach(function (e) {
                    if (e.entryName.indexOf("tinymce/js/tinymce/") === 0) {
                        tinymce.extractEntryTo(e.entryName, e.entryName.replace("tinymce/js/tinymce", "tinymce").replace(e.name, ""), false, true);
                    }
                });
                fs.unlink('tmp_tinymce.zip');
            })
    );

    log("");
    log("->  downloading latest language files:");
    log("    CS, DA, DE, FR, IT, NL, RU");
    r("https://tinymce-services.azurewebsites.net/1/i18n/download?langs=cs,da,nl,fr_FR,de,it,ru").pipe(
        fs.createWriteStream('tmp_languages.zip')
            .on('close', function () {
                log("");
                log("->  extracting language files");
                var languages = new AdmZip('tmp_languages.zip');
                languages.extractAllTo("tinymce/", true);
                fs.unlink('tmp_languages.zip');
            })
    );


});

r("http://www.roxyfileman.com/download", function (err, res, body) {
    if (err || res.statusCode !== 200) error(err);

    // (re)moving old tinymce files
    if (fs.existsSync("fileman")) {
        shell("rm -rf fileman");
        log("");
        log("->  removing old filemanager");
    }

    var roxyurl = 'http://www.roxyfileman.com' + c.load(body)('#content a.btnSpecial').eq(0).attr('href');
    log("");
    log("->  downloading newest Roxy Fileman");
    log("    " + roxyurl);

    r(roxyurl).pipe(
        fs.createWriteStream('tmp_fileman.zip')
            .on('close', function () {
                log("");
                log("->  extracting Roxy Fileman");
                var zip = new AdmZip('tmp_fileman.zip');
                zip.extractAllTo("./", true);
                fs.unlink('tmp_fileman.zip');

                log("");
                log("->  updating Filemanager config");
                // "FILES_ROOT":"" => "FILES_ROOT": "/out/pictures/wysiwigpro"
                replace({
                    regex: /\"FILES_ROOT\"\s*\:\s*""\,/,
                    replacement: '"FILES_ROOT": "/out/pictures/wysiwigpro",',
                    paths: ['./fileman/conf.json'],
                    recursive: false,
                    silent: true
                });
                // "INTEGRATION":"custom" => "INTEGRATION":"tinymce4",
                replace({
                    regex: /\"INTEGRATION\"\s*\:\s*"custom"\,/,
                    replacement: '"INTEGRATION": "tinymce4",',
                    paths: ['./fileman/conf.json'],
                    recursive: false,
                    silent: true
                });
                // "MAX_IMAGE_WIDTH":"1000" => "MAX_IMAGE_WIDTH":"2000",
                replace({
                    regex: /\"MAX_IMAGE_WIDTH\"\s*\:\s*"1000"\,/,
                    replacement: '"MAX_IMAGE_WIDTH": "2000",',
                    paths: ['./fileman/conf.json'],
                    recursive: false,
                    silent: true
                });
                // "MAX_IMAGE_HEIGHT":"1000" => "MAX_IMAGE_HEIGHT":"2000",
                replace({
                    regex: /\"MAX_IMAGE_HEIGHT\"\s*\:\s*"1000"\,/,
                    replacement: '"MAX_IMAGE_HEIGHT": "2000",',
                    paths: ['./fileman/conf.json'],
                    recursive: false,
                    silent: true
                });
                shell("cp -f application/core/security.inc.php fileman/php/security.inc.php");
            })
    );
});

process.on('exit', function (code) {
    log("");
    console.log("   |__________________________ update process finished ___________________________|");
    console.log("");
});
