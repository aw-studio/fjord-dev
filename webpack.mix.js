require('fjord/resources/js/mix.js');

const mix = require('laravel-mix');
const fs = require('fs');

/**
 |--------------------------------------------------------------------------
 | MergePackageJson
 |--------------------------------------------------------------------------
 |
 | This class keeps the package.json file up to date
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
        let self = this;
        self.onChange(from, to);
        fs.watchFile(from, (curr, prev) => {
            self.onChange(from, to);
        });
    }

    onChange(from, to) {
        let toPath = to + '/package.json';
        let fromJson = JSON.parse(fs.readFileSync(from));
        let toJson = JSON.parse(fs.readFileSync(toPath));
        toJson.devDependencies = fromJson.devDependencies;
        toJson.dependencies = fromJson.dependencies;
        delete toJson.dependencies['fjord'];

        toJson.dependencies['fjord-permissions'] = 'file:../fjord-permissions';
        delete toJson.dependencies['fjord-eloquent-js'];

        let spacing = 4;
        fs.writeFile(toPath, JSON.stringify(toJson, null, spacing), err => {});
    }
}

mix.extend('package', new MergePackageJson());

mix.copyDirectory('public/fjord', 'packages/aw-studio/fjord/publish/assets')
    .copy(
        'public/fjord/css/app.css',
        'packages/aw-studio/fjord/public/css/app.css'
    )
    .copy('public/fjord/js/app.js', 'packages/aw-studio/fjord/public/js/app.js')
    .copy(
        'public/fjord/css/app.css',
        'packages/aw-studio/fjord/public/css/app.css'
    )
    //.package('package.json', 'packages/aw-studio/fjord')
    // browser sync
    .browserSync({
        proxy: 'fjord-dev.aw',
        notify: false
    });
