/**
 * sass.js
 *
 * Generates stylesheets using sass
 *
 * @package grunt
 * @subpackage tasks
 * @author Chintan Kotadia <kotadiachintan@gmail.com>
 */

module.exports = function(grunt) {
	grunt.config('sass', {
		options: {
			includePaths: [
				'<%=paths.bower%>bootstrap-sass/assets/stylesheets',
				'<%=paths.bower%>font-awesome/scss',
			]
		},
		dist: {
			options: {
				style: 'compressed',
				compass: true,
				sourcemap: 'none',
				cacheLocation: './storage/framework/cache/'
			},
			files: {
				'<%=paths.css%>library.css': '<%=paths.scss%>library.scss',
				'<%=paths.css%>style.css': '<%=paths.scss%>style.scss'
			}
		}
	});

	grunt.loadNpmTasks('grunt-sass');
};
