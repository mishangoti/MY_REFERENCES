'use strict';

const gulp = require("gulp");
const imagemin = require("gulp-imagemin");
const server = require("browser-sync");
const sass = require("gulp-sass");

// Copy all HTML files to dist folder
gulp.task("copyHTML", callback => {
  gulp.src("src/*.html")
    .pipe(gulp.dest("dist"));
  callback();
});

// Copy all JS files to dist folder
gulp.task("copyJS", callback => {
  gulp.src("src/js/*.js")
    .pipe(gulp.dest("dist"));
  callback();
});

// Minify images
gulp.task("imagemin", callback => {
  gulp.src("src/images/*")
    .pipe(imagemin())
    .pipe(gulp.dest("dist/images"))
  callback();
});

// Transpile SASS
gulp.task("sass", callback => {
  gulp.src("src/sass/**/*.{sass,scss}")
    .pipe(sass().on("error", sass.logError))
    .pipe(sass({outputStyle: "compressed"}))
    .pipe(gulp.dest("dist"));
  callback();
});

// Sync browser
gulp.task("server", callback => {
  server.init({
    server: "dist",
    files: ["dist/*.html", "dist/*.css", "dist/images/*"]
  });
  callback();
});

// Watch files for changes
gulp.task("watch", callback => {
  gulp.watch("src/*.html", gulp.series("copyHTML"));
  gulp.watch("src/js/*.js", gulp.series("copyJS"));
  gulp.watch("src/sass/**/*.{sass,scss}", gulp.series("sass"));
  gulp.watch("src/images/*", gulp.series("imagemin"));
  callback();
});

// Default tasks
gulp.task("default", gulp.series("copyHTML", "copyJS", "sass", "imagemin", "server", "watch"));