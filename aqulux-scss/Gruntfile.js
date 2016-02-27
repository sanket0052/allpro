module.exports = function(grunt) {
	
	var paths = {
		'assets': './assets/',
		'bower': './assets/bower/',
		'scss': './assets/scss/',
		'css': './assets/css/',
		'js': './assets/js/'
	};

	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
		paths: paths,
	});
	
	//Loads all the tasks
	grunt.loadTasks('./grunt/tasks');

	//Registration of different tasks
	grunt.registerTask('build', [
		'sass',
		'concat',
		'watch'
	]);

	grunt.registerTask('default',['sass']);
};