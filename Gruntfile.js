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
            custom: {
                src: {
                    url: 'http://www.tinymce.com/i18n/download.php',
                    method: 'POST',
                    body: 'download[]=cs&download[]=da&download[]=de&download[]=fr_FR&download[]=it&download[]=nl&download[]=ru'
                },
                dest: './file.zip'
            }
        }
    });

    grunt.loadNpmTasks('grunt-curl');

    grunt.registerTask('default', 'download latest TinyMCE Editor', function() {
        grunt.log.write('yippi ya yeah schweinebacke!').ok();
    });

    grunt.registerTask('update', 'download latest TinyMCE Editor', function() {
        grunt.tasks('curl');
        grunt.log.write('update task, yo!').ok();
    });

    grunt.registerTask('languages', 'updating language files for TinyMCE', function() {
        grunt.log.write('get teh partey started, bro!').ok();
    });

};