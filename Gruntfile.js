module.exports = function(grunt) {

  // load all grunt tasks
  require('matchdep').filterDev('grunt-*').forEach(grunt.loadNpmTasks);

  grunt.initConfig({

    compass: {
      dev: {
        options: {
          config: 'config.rb',
          force: true
        }
      }
    },

    concat_css: {
      options: {
        // Task-specific options go here.
      },
      all: {
        src: ["css/*.css"],
        dest: "css/base-concat.css"
      },
    }, 

    cssmin: {
      minify: {
        expand: true,
        cwd: 'css/', // src matches relative to this path
        src: ['base-concat.css', '!*.min.css'],
        dest: 'css/',
        ext: '.min.css'
      }
    },

    uglify: {
      my_target: { 
        files: {
          'js/base.min.js': 'js/*.js',
        }
      }
    },

    less: {
      development: {
        options: {
          paths: ["css/less/"]
        },
        files: {
          "css/base.css": "css/less/*.less"
        }
      },
      production: {
        options: {
          paths: ["assets/css"],
          yuicompress: true
        },
        files: {
          "path/to/result.css": "path/to/source.less"
        }
      }
    },

    watch: {

      /* watch and see if our javascript files change, or new packages are installed */
      js: {
        files: ['js/*.js'],
        tasks: ['uglify']
      },

      // css : {
      //   files: ['css/*.css'],
      //   tasks: ['concat_css', 'cssmin:minify']
      // },
      
      less : {
        files: ['css/less/*.less'],
        tasks : ['less:development', 'concat_css', 'cssmin:minify'],
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

  grunt.registerTask('default', 'watch');

}