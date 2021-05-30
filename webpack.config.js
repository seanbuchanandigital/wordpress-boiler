const webpack = require("webpack");
const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const CssnanoPlugin = require('cssnano-webpack-plugin');
const WebpackBuildNotifierPlugin = require('webpack-build-notifier');
const DashboardPlugin = require("webpack-dashboard/plugin");
const CopyWebpackPlugin = require('copy-webpack-plugin');
const theme = 'wordpress'

module.exports = {
    mode: "development",
    entry: "./src/webpack.js",
    output: {
        filename: 'bundle.js',
        path: path.resolve(__dirname, 'public_html/wp-content/themes/'+theme)
    },
    module: {
        rules: [{
            test: /\.(sc|c)ss$/,
            use: [{
                loader: MiniCssExtractPlugin.loader,
            },
                {
                    loader: "css-loader",
                },
                {
                    loader: "postcss-loader"
                },
                {
                    loader: "sass-loader",
                    options: {
                        implementation: require("sass"),
                    }
                }
            ]
        },
        ]
    },
    optimization: {
        minimizer: [
            new CssnanoPlugin()
        ]
    },
    plugins: [
        new MiniCssExtractPlugin({
            filename: "theme.css"
        }),
        new WebpackBuildNotifierPlugin({
            title: "Webpack Build"
        }),
        new DashboardPlugin(),
        new webpack.ProvidePlugin({
            $: "jquery",
            jQuery: "jquery"
        }),
        new CopyWebpackPlugin({
            patterns: [{
                from: path.resolve(__dirname, 'src/img'),
                to: 'img'
            },
            {
                from: path.resolve(__dirname, 'src/svg'),
                to: 'svg'
            },
            {
                from: path.resolve(__dirname, 'src/font'),
                to: 'font'
            },
            { from: path.resolve(__dirname, 'src/templates'), to : path.resolve(__dirname, './public_html/wp-content/themes/'+theme) }
            ]
        }),
    ],
};





