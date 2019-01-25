module.exports = function(grunt) {
    require('jit-grunt')(grunt);

    grunt.initConfig({
        pkg: grunt.file.readJSON( 'package.json' ),
        // Clean the build folder
        clean: {
            build: {
                src: ['__build/']
            },
            build2: {
                src: ['__build/*','!__build/<%= pkg.name %>.zip']
            }
        },
        // Copy to build folder
        copy: {
            build: {
                src: ['**', '!node_modules/**', '!__junk/**', '!Gruntfile.js', '!package.json', '!todo.txt', '!sftp-config.json', '!testing.html'],
                dest: '__build/',
            }
        },        
        // Compress the build folder into an upload-ready zip file
        compress: {
            build: {
                options: {
                    archive: '__build/<%= pkg.name %>.zip'
                },
                expand: true,
                cwd: '__build/',
                src: ['**/*'],
                dest: '<%= pkg.name %>/'
            }
        }
    });

    // Build task
    grunt.registerTask( 'build', [ 'clean:build', 'copy:build', 'compress:build', 'clean:build2' 
        ]);
};