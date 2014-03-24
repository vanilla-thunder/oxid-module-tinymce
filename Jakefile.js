var r = require('request');
var c = require('cheerio');
var fs = require('fs');
var AdmZip = require('adm-zip')



desc("full update process (default task)");
task("default", [], function() {

    var error = function(err) {
        console.log("something went wrong!");
        console.log("--------------------------------------------------------------------------------");
        console.log(err);
        console.log("--------------------------------------------------------------------------------");
        fail('task aborted');
    };


    var deleteFolderRecursive = function(path) {
        if (fs.existsSync(path)) {
            fs.readdirSync(path).forEach(function(file, index) {
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

    console.log("fetching newest tinymce version...");
    r("http://www.tinymce.com/download/download.php", function(err, res, body) {

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
            .on('close', function() {
                //console.log("tinymce download finished");
                console.log("extracting tinymce");
                var tinymce = new AdmZip('tmp_tinymce.zip');
                tinymce.getEntries().forEach(function(e) {
                    if (e.entryName.indexOf("tinymce/js/tinymce/") === 0) {
                        tinymce.extractEntryTo(e.entryName, e.entryName.replace("tinymce/js/tinymce","tinymce").replace(e.name,""), false, true);
                    }
                });
                fs.unlink('tmp_tinymce.zip');
            })
        );


        console.log("downloading latest language files: CS, DA, DE, FR, IT, NL, RU")
        r("http://www.tinymce.com/i18n/download.php?download[]=cs&download[]=da&download[]=de&download[]=fr_FR&download[]=it&download[]=nl&download[]=ru").pipe(
            fs.createWriteStream('tmp_languages.zip')
            .on('close', function() {
                //console.log("language files download finished");
                console.log("extracting lamguage files");
                var languages = new AdmZip('tmp_languages.zip');
                languages.extractAllTo("tinymce/", true);
                fs.unlink('tmp_languages.zip');
            })
        );


        // update version.jpg
        var runner = require('child_process');
        runner.exec('php -r \'include("metadata.php"); print $aModule["version"];\'',
            function(err, stdout, stderr) {
                //console.log(stdout);
                var version = stdout.split(" ")[0];
                /*
                var aVersion = oldVersion.split(".");
                var patch = aVersion.pop();
                var newVersion = aVersion.join(".") + "." + (Math.abs(patch) + 1);
                */
                var url = "http://dev.marat.ws/v/?raw=1&v=" + version;
                r(url).pipe(fs.createWriteStream('version.jpg', true));
            }
        );

    });


});
//task("default", ['tinymce', 'languages', 'extract', 'cleanup', 'version'], function() {});


desc("get latest tinymce version from website");
task("tinymce", [], function() {
    r("http://www.tinymce.com/download/download.php", function(err, res, body) {
        console.log("fetching newest tinymce version...");

        if (err || res.statusCode != 200) {
            console.log("something went wrong!");
            console.log("--------------------------------------------------------------------------------");
            console.log(err);
            console.log("--------------------------------------------------------------------------------");
        }

        var url = require('cheerio').load(body)('#twocolumns a.track-tinymce').eq(0).attr('href');
        console.log("downloading from: " + url);
        r(url).pipe(fs.createWriteStream('tmp_tinymce.zip'));
        console.log("download finished");
        console.log("------------------------------");
        complete();
    });
});

desc("download latest language files for tinymce");
task("languages", [], function() {
    console.log("downloading latest language files: CS, DA, DE, FR, IT, NL, RU")
    var url = "http://www.tinymce.com/i18n/download.php?download[]=cs&download[]=da&download[]=de&download[]=fr_FR&download[]=it&download[]=nl&download[]=ru";
    r(url).pipe(fs.createWriteStream('tmp_languages.zip'));
    console.log("download finished");
    console.log("------------------------------");
    complete();
});

desc("extracting archives and updating files");
task("extract", [], function() {
    // lets (re)move old files first
    if (fs.existsSync("tinymce")) {
        fs.renameSync("tinymce", "old_tinymce");
    }

    console.log("extracting tinymce");
    var tinymce = new AdmZip('tmp_tinymce.zip');
    tinymce.getEntries().forEach(function(e) {
        if (e.entryName.indexOf("tinymce/js/tinymce/") === 0) {
            tinymce.extractEntryTo(e.entryName, "tinymce", false, true);
        }
    });


    console.log("extracting extra lamguages");
    var languages = new AdmZip('tmp_languages.zip');
    languages.extractAllTo("tinymce/", true);

    console.log("extracting finished");
    console.log("------------------------------");
    complete();
});


desc('removing temp files');
task("cleanup", [], function() {

    console.log("removing temporary files");

    fs.unlink('tmp_tinymce.zip');
    fs.unlink('tmp_languages.zip');

    var deleteFolderRecursive = function(path) {
        if (fs.existsSync(path)) {
            fs.readdirSync(path).forEach(function(file, index) {
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
    deleteFolderRecursive("old_tinymce");

    console.log("cleanup finished");
    console.log("------------------------------");
    complete();
});


desc("updating module version");
task("version", [], function() {
    var runner = require('child_process');
    runner.exec('php -r \'include("metadata.php"); print $aModule["version"];\'',
        function(err, stdout, stderr) {
            //console.log(stdout);
            var version = stdout.split(" ")[0];
            /*
            var aVersion = oldVersion.split(".");
            var patch = aVersion.pop();
            var newVersion = aVersion.join(".") + "." + (Math.abs(patch) + 1);
            */
            var url = "http://dev.marat.ws/v/?raw=1&v=" + version;
            r(url).pipe(fs.createWriteStream('version.jpg', true));
            complete();
        }
    );

});


desc("test function");
task("test", [], function() {

    r("http://www.tinymce.com/download/download.php", function(err, res, body) {

        if (err || res.statusCode != 200) error(err);


        var url = c.load(body)('#twocolumns a.track-tinymce').eq(0).attr('href');
        console.log("downloading tinymce from: " + url);

        r(url).pipe(fs.createWriteStream('doodle.zip').on('close', function() {
            console.log('file done');
        }));
        console.log("345");
    });
    console.log("123");


});