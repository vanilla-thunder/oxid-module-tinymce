var r = require('request');
var c = require('cheerio');
var fs = require('fs');
var AdmZip = require('adm-zip');

var error = function (err) {
    console.log("something went wrong!");
    console.log("--------------------------------------------------------------------------------");
    console.log(err);
    console.log("--------------------------------------------------------------------------------");
    process.exit(1);
};


var deleteFolderRecursive = function (path) {
    if (fs.existsSync(path)) {
        fs.readdirSync(path).forEach(function (file, index) {
            var curPath = path + "/" + file;
            if (fs.lstatSync(curPath).isDirectory()) { // recurse
                deleteFolderRecursive(curPath);
            } else { // delete file
                fs.unlinkSync(curPath);
            }
        });
        fs.rmdirSync(path);
    }
};

var fnc = process.argv[2];
if (!fnc) {

    console.log("fetching newest tinymce version...");
    r("http://www.tinymce.com/download/download.php", function (err, res, body) {

        if (err || res.statusCode != 200) error(err);

        // (re)moving old tinymce files
        if (fs.existsSync("tinymce")) {
            fs.renameSync("tinymce", "old_tinymce");
            deleteFolderRecursive("old_tinymce");
        }

        var tinymceurl = c.load(body)('#twocolumns a.track-tinymce').eq(0).attr('href');
        console.log("downloading tinymce from: " + tinymceurl);

        r(tinymceurl).pipe(
            fs.createWriteStream('tmp_tinymce.zip')
                .on('close', function () {
                    //console.log("tinymce download finished");
                    console.log("extracting tinymce");
                    var tinymce = new AdmZip('tmp_tinymce.zip');
                    tinymce.getEntries().forEach(function (e) {
                        if (e.entryName.indexOf("tinymce/js/tinymce/") === 0) {
                            tinymce.extractEntryTo(e.entryName, e.entryName.replace("tinymce/js/tinymce", "tinymce").replace(e.name, ""), false, true);
                        }
                    });
                    fs.unlink('tmp_tinymce.zip');
                })
        );


        console.log("downloading latest language files: CS, DA, DE, FR, IT, NL, RU")
        r("http://www.tinymce.com/i18n/download.php?download[]=cs&download[]=da&download[]=de&download[]=fr_FR&download[]=it&download[]=nl&download[]=ru").pipe(
            fs.createWriteStream('tmp_languages.zip')
                .on('close', function () {
                    //console.log("language files download finished");
                    console.log("extracting lamguage files");
                    var languages = new AdmZip('tmp_languages.zip');
                    languages.extractAllTo("tinymce/", true);
                    fs.unlink('tmp_languages.zip');
                })
        );


    });
}
else if (fnc == "version") {
    // update version.jpg

    var version = process.argv[3];
    if (!version) {
        var runner = require('child_process');
        runner.exec('php -r \'include("metadata.php"); print $aModule["version"];\'',
            function (err, stdout, stderr) {
                //console.log(stdout);
                if(err) error(err);
                if(stderr) error(stderr);

                version = stdout.split(" ")[0];
            }
        );
    }
    console.log("updating version.jpg to " + version);
    url = "http://dev.marat.ws/v/?raw=1&v=" + version;
    r(url).pipe(fs.createWriteStream('version.jpg', true));
}