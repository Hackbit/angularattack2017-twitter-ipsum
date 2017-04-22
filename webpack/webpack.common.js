var webpack = require("webpack");
var HtmlWebpackPlugin = require("html-webpack-plugin");
var ExtractTextPlugin = require("extract-text-webpack-plugin");
var helpers = require("./helpers");

module.exports = {
	entry: {
		"polyfills": helpers.root("angular") + "/polyfills.ts",
		"vendor": helpers.root("angular") + "/vendor.ts",
		"app": helpers.root("angular") + "/main.ts",
		"css": helpers.root("angular") + "/app.css"
	},

	resolve: {
		extensions: [".ts", ".js"]
	},

	module: {
		rules: [
			{
				test: /\.(html|php)$/,
				loader: "html-loader"2
			},
			{
				test: /\.(png|jpe?g|gif|svg|woff|woff2|ttf|eot|ico)$/,
				loader: "file-loader?name=/assets/[name].[hash].[ext]"
			},
			{
				test: /\.css$/,
				loader: ExtractTextPlugin.extract({ fallbackLoader: "style-loader", loader: "css-loader?minimize=true" })
			},
			{
				test: /\.ts$/,
				loaders: ["awesome-typescript-loader"],
				exclude: [/vendor/]
			}
		]
	},

	plugins: [
		new webpack.optimize.CommonsChunkPlugin({
			name: ["app", "vendor", "polyfills"]
		}),

		new webpack.ProvidePlugin({
			$: "jquery",
			jQuery: "jquery",
			"window.jQuery": "jquery"
		}),

		new HtmlWebpackPlugin({
			inject: "head",
			filename: helpers.root("resources") + "/views/welcome.php",
			template: helpers.root("webpack") + "/welcome.php"
		})
	]
};