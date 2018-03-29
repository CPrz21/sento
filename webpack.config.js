//--------------------------------------------------------------------------
//  Imports

const path = require("path")

const dirApp = path.resolve(__dirname, "app")+"/"
const outputDir = path.resolve(__dirname, "assets/js")

//--------------------------------------------------------------------------
//  Functions

function getOutput() {
  return outputDir
}

function getApp(dir = "") {
  return dirApp+dir
}

function getAppComponents(dir = "") {
  return getApp("components/"+dir)
}

function getAppCore(dir = "") {
  return getApp("core/"+dir)
}

//--------------------------------------------------------------------------
//  Code

const aliases = {
  Component: getAppComponents(),
  Icon: getAppComponents("icons"),
  Section: getAppComponents("sections"),
  Core: getAppCore()
}

//--------------------------------------------------------------------------

module.exports = {
  entry: "./app/core/App.js",
  output: {
    // filename: "app.min.js",
    filename: "App.js",
    path: getOutput()
  },
  resolve: {
    extensions: [".js", ".jsx"],
    alias: aliases
  },
  module: {
    rules: [
      {
        test: /\.js(x?)$/,
        use: [
          {
            loader: "babel-loader"
          }
        ],
        exclude: /(node_modules)/
      }
    ]
  },
  watch: true
}
