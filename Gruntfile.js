module.exports = function(grunt) {

    // Project configuration.
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        uglify: {
            options: {
                banner: '/*! <%= pkg.name %> <%= grunt.template.today("yyyy-mm-dd") %> */\n'
            },
            build: {
                src: 'src/<%= pkg.name %>.js',
                dest: 'build/<%= pkg.name %>.min.js'
            }
        },
        curl: {
            /*
            'tmp_tinymce.html' : 'http://www.tinymce.com/download/download.php',
            'tmp_languages.zip' : 'http://www.tinymce.com/i18n/download.php?download[]=cs&download[]=da&download[]=de&download[]=fr_FR&download[]=it&download[]=nl&download[]=ru'

            custom: {
                src: 'http://www.tinymce.com/download/download.php'
            }
             */
        },
        languages: {
            'tmp_tinymce.zip' : 'yolo'
        },
        unzip: {
            tinymce: 'language-files.zip'
        }
    });

    grunt.loadNpmTasks('grunt-curl');
    grunt.loadNpmTasks('grunt-zip');

    grunt.registerTask('default', ['curl','parse','unzip', 'cleanup']);

    grunt.registerTask('cleanup', 'removing temp files', function() {
        grunt.file.delete('tmp_tinymce.html');
        grunt.file.delete('tmp_tinymce.zip');
        grunt.file.delete('tmp_languages.zip');
        //grunt.log.writeln('temporary files removed!');
    });

    grunt.registerTask('update', 'download latest tinymce files and unzip them', function() {
        // catching newest dl link for tinymce
    
        var http = require('http');
        var fs = require('fs');

        http.get("http://www.tinymce.com/download/download.php", function(response) {
            var file = fs.createWriteStream("file.html");
            var url = require('cheerio').load(response)('#twocolumns a.track-tinymce').eq(0).attr('href');
            console.log(url);
            response.pipe(file);
        });

        /*
        var request = http.get("http://www.tinymce.com/download/download.php", function(response) {
            var file = fs.createWriteStream("file.png");
            response.pipe(file);
        });
        */
    });

    grunt.registerTask('update-metadata', 'updating metadata with new module version', function() {
        grunt.helper('curl', 'http://dev.ma-be.info/git/version.php?raw=1&v=<%= pkg.version %>', function handleData (err, content) {
            grunt.log.error(err);
            grunt.file.write('test.jpg',content);

        });
    });

};