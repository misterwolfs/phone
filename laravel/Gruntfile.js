module.exports = function(grunt) {

  // load all grunt tasks
  require('matchdep').filterDev('grunt-*').forEach(grunt.loadNpmTasks);

  grunt.initConfig({

    uglify: {
      my_target: {
          src : 'public/resources/js/*.js',
          dest : 'public/resources/js/base.min.js'
      }
    },

    imagemin: {                          // Task
      dynamic: {                         // Another target
         options: {                       // Target options
          optimizationLevel: 3

        },
        files: [{
          expand: true,                  // Enable dynamic expansion
          cwd: 'public/resources/img/',                   // Src matches are relative to this path
          src: ['public/resources/img/*.{png,jpg,gif}'],   // Actual patterns to match
          dest: 'public/resources/img/dist/'                  // Destination path prefix
        }]
      }
    },
    
    sass: {                              // Task
      dist: {                            // Target
        options: {                       // Target options
          style: 'compressed'
        },
        files: {                         // Dictionary of files
          'public/resources/css/base.css': 'public/resources/css/master.scss',       // 'destination': 'source'
        }
      }
    },

    watch: {
      sass: {
        files: ['public/resources/css/*.scss'],
        tasks: ['sass']
      },
      /* watch and see if our javascript files change, or new packages are installed */
      js: {
        files: ['public/resources/js/*.js'],
        tasks: ['uglify']
      },
      /* watch our files for change, reload */
      livereload: {
        files: ['*.html', 'assets/css/*.css', 'assets/images/*', 'assets/js/{main.min.js, plugins.min.js}'],
        options: {
          livereload: true
        }
      },
    }

  });

  grunt.registerTask('default', ['imagemin:dynamic', 'watch']);

}