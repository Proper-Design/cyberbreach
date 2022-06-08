module.exports = {
	env: {
		browser: true,
		es2020: true,
	},
	extends: [
		'plugin:@wordpress/eslint-plugin/recommended',
		'plugin:prettier/recommended',
	],
	plugins: ['prettier'],
	rules: {},
};
