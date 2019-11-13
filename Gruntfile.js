module.exports = function (grunt) {


    // Project configuration.
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        // Delete old files before creating new
        clean: {
            js: ['pgthrottle/js/*.js', '!pgthrottle/js/*.min.js'],
            css: ['pgthrottle/css/*.css'],
        },
        // consolidate multiple javascript files into one file
        concat: {
            options: {
                stripBanners: true,
                banner: '/*! <%= pkg.name %> - v<%= pkg.version %> - ' +
                    '<%= grunt.template.today("yyyy-mm-dd") %> */',

            },
            dist: {
                src: ['node_modules/popper.js/dist/popper.js', 'node_modules/bootstrap/dist/js/bootstrap.js', 'resources/js/app.js'],
                dest: 'pgthrottle/js/pgthrottle.js'
            },
        },
        // minify CSS in resources directoy
        cssmin: {

            target: {

                files: [{
                    expand: true,
                    cwd: 'resources/css',
                    src: ['*.css', '!*.min.css'],
                    dest: 'resources/css',
                    ext: '.min.css'
    }]
            }
        },
        //copy files from resoures the production theme
        copy: {
            main: {
                files: [
      // includes files within path
                    {
                        expand: true,
                        cwd: 'resources/css',
                        src: ['**/*'],
                        dest: 'pgthrottle/css/',
                    },

    ],
            },
        },
        // rename production theme stylesheet to match theme name
        rename: {
            main: {
                files: [
                    {
                        src: ['pgthrottle/css/app.min.css'],
                        dest: 'pgthrottle/css/pgthrottle.min.css'
                    },
                    {
                        src: ['pgthrottle/css/app.css'],
                        dest: 'pgthrottle/css/pgthrottle.css'
                    },
                    {
                        src: ['pgthrottle/css/app.css.map'],
                        dest: 'pgthrottle/css/pgthrottle.css.map'
                    },
        ]
            }
        },




    });

    // Load the plugin that provides the "uglify" task.
    grunt.loadNpmTasks('grunt-contrib-clean');
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-contrib-copy');
    grunt.loadNpmTasks('grunt-contrib-rename');





    // Default task(s).
    grunt.registerTask('default', ['clean', 'concat', 'cssmin', 'copy', 'rename']);

};
