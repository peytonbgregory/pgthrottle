const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const TerserPlugin = require('terser-webpack-plugin');
module.exports = {

    mode: process.env.NODE_ENV === 'production' ? 'production' : 'development',
    entry: ['./resources/js/app.js', './resources/scss/app.scss'],
    output: {
        path: path.resolve(__dirname, 'pgthrottle'),
        filename: 'js/pgthrottle.min.js',
    },
    module: {
        rules: [
            {
                test: /\.scss$/,
                use: [
                    {
                        loader: 'file-loader',
                        options: {
                            name: 'css/pgthrottle.min.css',
                        }
					},
                    {
                        loader: 'extract-loader'
					},
                    {
                        loader: 'css-loader'
                    },
                    {
                        loader: 'postcss-loader'
					},
                    {
                        loader: 'sass-loader'
					}
				]
			}
		]
    },
    plugins: [
    new MiniCssExtractPlugin({
            // Options similar to the same options in webpackOptions.output
            // all options are optional
            filename: '[name].css',
            chunkFilename: '[id].css',
            ignoreOrder: false, // Enable to remove warnings about conflicting order
        }),
  ],
    optimization: {
        minimizer: [
      new TerserPlugin({
                terserOptions: {
                    output: {
                        comments: false,
                    },
                },
            }),
    ],
    },

};
