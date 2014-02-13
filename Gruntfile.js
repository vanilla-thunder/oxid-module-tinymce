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
            'language-files.zip' : 'http://www.tinymce.com/i18n/download.php?download[]=cs&download[]=da&download[]=de&download[]=fr_FR&download[]=it&download[]=nl&download[]=ru'
        },
        unzip: {
            tinymce: 'language-files.zip'
        }
    });

    grunt.loadNpmTasks('grunt-curl');
    grunt.loadNpmTasks('grunt-zip');

    grunt.registerTask('default', ['curl','unzip', 'cleanup']);

    grunt.registerTask('cleanup', 'removing temp files', function() {
        grunt.file.delete('language-files.zip');
        grunt.log.writeln('languages zip archive removed!');
    });

    grunt.registerTask('update-metadata', 'updating metadata with new module version', function() {
        grunt.helper('curl', 'http://dev.ma-be.info/git/version.php?raw=1&v=<%= pkg.version %>', function handleData (err, content) {
            grunt.log.error(err);
            grunt.file.write('test.jpg',content);

        });
    });

};