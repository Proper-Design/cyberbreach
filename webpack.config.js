const path = require('path');
const defaults = require('@wordpress/scripts/config/webpack.config');
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');

module.exports = {
	...defaults,
	entry: path.resolve(__dirname, 'assets/js/src/index.js'),
	output: {
		path: path.resolve(__dirname, 'assets/js/build'),
		filename: 'index.js',
	},
	externals: {
		react: 'React',
		'react-dom': 'ReactDOM',
	},
	plugins: [
		new BrowserSyncPlugin({
			files: [
				'./**/*.php',
				'./assets/js/build/*',
				'./**/*.css',
				'./assets/svg/src/**/*.svg',
			],
			host: 'cyber-breach.local',
			proxy: { target: 'https://cyber-breach.local' },
			open: 'external',
			https: true,
		}),
	],
};
