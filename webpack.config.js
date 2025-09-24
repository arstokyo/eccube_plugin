const Encore = require('@symfony/webpack-encore');

// Manually configure the runtime environment if not already configured yet by the "encore" command.
// It's useful when you use tools that rely on webpack.config.js file.
if (!Encore.isRuntimeEnvironmentConfigured()) {
  Encore.configureRuntimeEnvironment(process.env.NODE_ENV || 'dev');
}

Encore
  .setOutputPath('html/bundle/')
  .setPublicPath('/html/bundle')
  .addEntry('ars', './html/template/ars/assets/js/bundle.js')
  .addEntry('eccube-function', './html/template/ars/assets/js/function.js')
  .addEntry('eccube-js', './html/template/ars/assets/js/eccube.js')
  .addEntry('admin', './html/template/admin/assets/js/bundle.js')
  .addEntry('install', './html/template/install/assets/js/bundle.js')
  .addEntry('stimulus', './assets/app.js')
  .addStyleEntry('front-css', './html/template/ars/assets/scss/style.scss')
  .addStyleEntry('admin-app-css', './html/template/admin/assets/scss/app.scss')
  .addStyleEntry('admin-bootstrap-css', './html/template/admin/assets/scss/bootstrap.scss')
  // When enabled, Webpack "splits" your files into smaller pieces for greater optimization.
  .splitEntryChunks()

  // will require an extra script tag for runtime.js
  // but, you probably want this, unless you're building a single-page app
  .enableSingleRuntimeChunk()
  //.disableSingleRuntimeChunk()

  /*
   * FEATURE CONFIG
   *
   * Enable & configure other features below. For a full
   * list of features, see:
   * https://symfony.com/doc/current/frontend.html#adding-more-features
   */
  .cleanupOutputBeforeBuild()
  .enableBuildNotifications()
  .enableSourceMaps(!Encore.isProduction())
  // enables hashed filenames (e.g. app.abc123.css)
  .enableVersioning(Encore.isProduction())

  // enables @babel/preset-env polyfills
  .configureBabel(null)

  // enable stimulus bridge
  .enableStimulusBridge('./assets/controllers.json')

  // enable TypeScript support
  .enableTypeScriptLoader()

  // uncomment to enable React support
  //.enableReactPreset()

  // enables Sass/SCSS support
  .enableSassLoader()
  .enablePostCssLoader()
  .autoProvidejQuery();

module.exports = Encore.getWebpackConfig();
