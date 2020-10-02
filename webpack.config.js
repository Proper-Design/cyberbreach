const path = require("path");
const defaults = require("@wordpress/scripts/config/webpack.config");
const BrowserSyncPlugin = require("browser-sync-webpack-plugin");

module.exports = {
  ...defaults,
  entry: path.resolve(__dirname, "assets/js/src/index.js"),
  output: {
    path: path.resolve(__dirname, "assets/js/build"),
    filename: "index.js",
  },
  externals: {
    react: "React",
    "react-dom": "ReactDOM",
  },
  plugins: [
    new BrowserSyncPlugin({
      files: [
        "./*.php",
        "./inc/*.php",
        "./assets/js/build/*",
        "./assets/scss/**/*.scss",
      ],
      host: "proper-bear.local",
      proxy: { target: "proper-bear.local" },
      open: "external",
    }),
  ],
};
