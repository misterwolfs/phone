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

    cssmin: {
      minify: {
        expand: true,
        cwd: 'css/', // src matches relative to this path
        src: ['*.css', '!*.min.css'],
        dest: 'css/',
        ext: '.min.css'
      }
    },

    less: {
      development: {
        options: {
          paths: ["css/less"]
        },
        files: {
          "css/style.css": "css/less/style.less"
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
      sass: {
        files: ['assets/sass/**/*.scss'],
        tasks: ['compass:dev']
      },
      /* watch and see if our javascript files change, or new packages are installed */
      js: {
        files: ['assets/js/main.js', 'components/**/*.js'],
        tasks: ['uglify']
      },

      css : {
        files: ['css/*.css'],
        tasks: ['cssmin:minify']
      },
      
      less : {
        files: ['css/less/*.less'],
        tasks : ['less:development', 'cssmin:minify'],
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