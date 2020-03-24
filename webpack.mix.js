const mix = require("laravel-mix");
const fs = require('fs');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

 class MergePackageJson {
     /**
      * The API name for the component.
      */
     name() {
         return ['mergePackageJson', 'package'];
     }

     /**
      * Register the component.
      *
      * @param {*} from
      * @param {string} to
      */
     register(from, to) {
         console.log(from);
         let self = this;
         self.onChange(from, to);
         fs.watchFile(from, (curr, prev) => {
             self.onChange(from, to);
         });
     }

     onChange(from, to) {
         let toPath = to + '/package.json'
         let fromJson = JSON.parse(fs.readFileSync(from))
         let toJson = JSON.parse(fs.readFileSync(toPath))
         toJson.devDependencies = fromJson.devDependencies
         toJson.dependencies = fromJson.dependencies
         delete toJson.dependencies['fjord']

         let spacing = 4
         fs.writeFile(toPath, JSON.stringify(toJson, null, spacing), (err) => {});
     }
 }

mix.extend('package', new MergePackageJson());

mix.webpackConfig({
    resolve: {
        alias: {
            "@fj-js": path.resolve(
                __dirname,
                "vendor/aw-studio/fjord/resources/js/"
            ),
            "@fj-sass": path.resolve(
                __dirname,
                "vendor/aw-studio/fjord/resources/sass/"
            )
        }
    }
});

mix.js('resources/js/app.js', 'public/fjord/js')
    .sass(
        'packages/aw-studio/fjord/resources/sass/app.scss',
        'public/fjord/css'
    )
    .copyDirectory('public/fjord', 'packages/aw-studio/fjord/publish/assets')
    .package('package.json', 'packages/aw-studio/fjord')
    .browserSync({
        proxy: "fjord-dev.aw",
        notify: false
    });
