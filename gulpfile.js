var elixir = require('laravel-elixir');
var gulp = require('gulp');
var notify = require("gulp-notify");
var phplint = require('phplint')
	.lint;
var phpcbf = require('gulp-phpcbf');
var jsbeautify = require('gulp-jsbeautifier');
var gutil = require('gulp-util');
var jshint = require('gulp-jshint');
var stylish = require('jshint-stylish');
GLOBBED_PHP_SOURCES = ['**/*.php', '!vendor/**', '!**/node_modules/**'];
GLOBBED_JS_SOURCES = ['**/*.js', '!**/*.min.js', '!vendor/**', '!**/node_modules/**', '!**dist/**/*.js'];
gulp.task('phplint', function (cb) {
	phplint(GLOBBED_PHP_SOURCES, {
		limit: 10
	}, function (err, stdout, stderr) {
		if (err) {
			cb(err);
			process.exit(1);
		}
		cb();
	});
});
gulp.task('jslint', function () {
	return gulp.src(GLOBBED_JS_SOURCES)
		.pipe(jshint())
		.pipe(jshint.reporter('jshint-stylish'));
});
gulp.task('phpbeautify', function () {
	return gulp.src(GLOBBED_PHP_SOURCES)
		.pipe(phpcbf({
			bin: 'phpcbf',
			standard: 'PSR2',
			warningSeverity: 0
		}))
		.on('error', function (msg) {
			return gutil.log({
				showStack: true
			});
		});
});
gulp.task('jsbeautify', function () {
	return gulp.src(GLOBBED_JS_SOURCES)
		.pipe(jsbeautify({
			config: '.jsbeautifyrc',
			mode: 'VERIFY_AND_WRITE'
		}))
		.pipe(gulp.dest(function (data) {
			console.log("Overwriting file: " + data.path);
			return data.base;
		}))
		.on('error', function (msg) {
			return gutil.log({
				showStack: true
			});
		});
});
gulp.task('jscheckstyle', function () {
	return gulp.src(GLOBBED_JS_SOURCES)
		.pipe(jsbeautify({
			config: '.jsbeautifyrc',
			mode: 'VERIFY_ONLY'
		}))
		.on('error', function (msg) {
			return gutil.log({
				showStack: true
			});
		});
});
gulp.task('lint', ['phplint', 'jslint']);
gulp.task('prettify', ['phpbeautify', 'jsbeautify']);

