"use strict";

const fs = require('fs'),
    fetch = require('node-fetch'),
    cheerio = require('cheerio'),
    unzipper = require('unzipper'),
    replace = require('replace'),
    runner = require('child_process');


var shell = function (command)
{
    runner.exec(command,
        function (err, stdout, stderr)
        {
            //if (err) console.log(err);
            //if (stderr) console.log(stderr);
        }
    );
};

var error = function (err)
{
    console.error("          ############################################################");
    console.error("          # " + err);
    console.error("          ############################################################");
    process.exit();
};
var log = function (msg)
{
    var shlomo = "                                                                           |";
    console.log("   |   " + msg + shlomo.substring(msg.length));
};


console.log("");
console.log("   ___________________________ updating TinyMCE started ___________________________");

fetch("https://portal.tiny.cloud/v1/editor/versions")
    .then(res => res.json())
    .then(json =>
    {
        //if (err || res.statusCode !== 200) error(err);

        if (fs.existsSync("../out/tinymce"))
        {
            shell("rm -rf ../out/tinymce");
            log("");
            log("->  removing old tinymce");
        }

        const tinymceurl = json.latest.productionUrl;
        log("");
        log("->  downloading newest TinyMCE");
        log("    " + tinymceurl);

        fetch(tinymceurl)
            .then(res => {

                log("");
                log("->  extracting TinyMCE");

                res.body.pipe(unzipper.Extract({path:'./'}).on("close", () => {
                    fs.renameSync(__dirname+'/tinymce/js/tinymce',__dirname+'/../out/tinymce');
                    shell("rm -rf ./tinymce");
                }));

                log("");
                log("->  downloading latest language files:");
                log("    CS, DA, DE, FR, IT, NL, RU");

                fetch('https://www.tiny.cloud/tinymce-services-azure/1/i18n/download?langs=cs,da,nl,fr_FR,de,it,ru')
                    .then(res => {
                        log("");
                        log("->  extracting language files");
                        res.body.pipe(
                            unzipper.Extract({path:'./'})
                                    .on("close", () => {
                                        /* @todo: shell() könnte man durch nodejs libraries ersetzern */
                                        shell("mv ./langs/* ../out/tinymce/langs && rm -rf ./langs");
                                    })
                        );
                    });
            });



    });
/*
request("http://www.roxyfileman.com/download", function (err, res, body) {
    if (err || res.statusCode !== 200) error(err);

    // (re)moving old tinymce files
    if (fs.existsSync("fileman")) {
        shell("rm -rf fileman");
        log("");
        log("->  removing old filemanager");
    }

    var roxyurl = 'http://www.roxyfileman.com' + cheerio.load(body)('#content a.btnSpecial').eq(0).attr('href');
    log("");
    log("->  downloading newest Roxy Fileman");
    log("    " + roxyurl);

    request
        .get(roxyurl)
        .pipe(
            fs.createWriteStream('tmp_fileman.zip')
                .on('finish', function () {
                    log("");
                    log("->  extracting Roxy Fileman");
                    new AdmZip('tmp_fileman.zip').extractAllTo("./", true);
                    fs.unlinkSync('tmp_fileman.zip');

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
 */
process.on('exit', function ()
{
    log("");
    console.log("   |__________________________ update process finished ___________________________|");
    console.log("");
});