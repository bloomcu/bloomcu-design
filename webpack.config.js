const webpack = require('webpack');
const path = require('path');
const package = require('./package.json');
const UglifyJsPlugin = require('uglifyjs-webpack-plugin');
const ExtractTextPlugin = require('extract-text-webpack-plugin');
const OptimizeCSSPlugin = require('optimize-css-assets-webpack-plugin');
const BrowserSyncPlugin = require( 'browser-sync-webpack-plugin' );

const config = require( './config.json' );

// Naming and path settings
var appName = 'app';
var entryPoint = {
    frontend: './assets/src/frontend/main.js',
    admin: './assets/src/admin/main.js',
    // vendor: Object.keys(package.dependencies), // If using vendor scripts in package.json
};

var exportPath = path.resolve(__dirname, './assets/js');

// Enviroment flag
var plugins = [];
var env = process.env.WEBPACK_ENV;

function isProduction() {
    return process.env.WEBPACK_ENV === 'production';
}

// extract css into its own file
const extractCss = new ExtractTextPlugin({
    filename: "../css/[name].css",
});

plugins.push( extractCss );

// Extract all 3rd party modules into a separate 'vendor' chunk
plugins.push(new webpack.optimize.CommonsChunkPlugin({
    name: 'vendor',
    minChunks: ({ resource }) => /node_modules/.test(resource),
}));

// Generate a 'manifest' chunk to be inlined in the HTML template
// plugins.push(new webpack.optimize.CommonsChunkPlugin('manifest'));

// plugins.push(new BrowserSyncPlugin( {
//     proxy: {
//         target: config.proxyURL
//     },
//     files: [
//         '**/*.php'
//     ],
//     cors: true,
// 	reloadDelay: 0,
// 	open: false
// } ));

// Compress extracted CSS. We are using this plugin so that possible
// duplicated CSS from different components can be deduped.
plugins.push(new OptimizeCSSPlugin({
    cssProcessorOptions: {
        safe: true,
        map: {
            inline: false
        }
    }
}));

// Provide access to jQuery in all files
// jQuery is being excluded from the bundle because WordPress has it included already
plugins.push(new webpack.ProvidePlugin({
    $: 'jquery',
    jQuery: 'jquery',
}));

// Differ settings based on production flag
if ( isProduction() ) {

    plugins.push(new UglifyJsPlugin({
        sourceMap: true,
    }));

    // plugins.push(new webpack.DefinePlugin({
    //     'process.env': env
    // }));

    // appName = '[name].min.js';
} else {
    // appName = '[name].js';
}

appName = '[name].min.js';

module.exports = {
	entry: entryPoint,
	node: {
		fs: 'empty'
	},
    output: {
        path: exportPath,
        filename: appName,
        chunkFilename: 'chunks/[chunkhash].js',
        jsonpFunction: 'pluginWebpack'
    },
    resolve: {
        alias: {
            '@': path.resolve('./assets/src/'),
            'frontend': path.resolve('./assets/src/frontend/'),
            'admin': path.resolve('./assets/src/admin/'),
        },
        modules: [
            path.resolve('./node_modules'),
            path.resolve(path.join(__dirname, 'assets/src/')),
        ]
	},
	externals: {
		jquery: 'jQuery',
	},
    plugins,
        module: {
        rules: [
            {
                test: /\.js$/,
                exclude: /(node_modules|bower_components)/,
                loader: 'babel-loader',
                query: {
                    presets: ['env']
                }
            },
            {
                test: /\.scss$/,
                use: extractCss.extract({
                    use: [{
                        loader: "css-loader"
                    }, {
                        loader: "sass-loader"
                    }]
                })
            },
            {
                test: /\.css$/,
                use: [ 'style-loader', 'css-loader' ]
            }
        ]
    },
}
