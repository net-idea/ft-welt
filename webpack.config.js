const Encore = require('@symfony/webpack-encore');

// Manually configure the runtime environment if not already configured yet by the "encore" command.
// It's useful when you use tools that rely on webpack.config.js file.
if (!Encore.isRuntimeEnvironmentConfigured()) {
  Encore.configureRuntimeEnvironment(process.env.NODE_ENV || 'dev');
}

Encore
  // directory where compiled assets will be stored
  .setOutputPath('public/build/')

  // public path used by the web server to access the output path
  .setPublicPath('/build')

  // only needed for CDN's or subdirectory deploy
  //.setManifestKeyPrefix('build/')

  /*
   * ENTRY CONFIG
   *
   * Each entry will result in one JavaScript file (e.g. app.js)
   * and one CSS file (e.g. app.css) if your JavaScript imports CSS.
   */
  .addEntry('app', './assets/app.ts')

  // When enabled, Webpack "splits" your files into smaller pieces for greater optimization.
  .splitEntryChunks()

  // Add a cache group to force all node_modules into a short-named vendor chunk
  // This prevents very long auto-generated chunk names like
  // "vendors-node_modules_symfony_stimulus-bridge_dist_index_js-node_modules_bootstrap_dist_js_..."
  // and instead creates a single `vendors` chunk (e.g. vendors.[contenthash:8].js).
  .addCacheGroup('vendor', {
    test: /[\\/]node_modules[\\/]/,
    name: 'vendors',
    chunks: 'all',
    priority: -10,
  })

  // enables the Symfony UX Stimulus bridge (used in assets/stimulus_bootstrap.js)
  .enableStimulusBridge('./assets/controllers.json')

  // will require an extra script tag for runtime.js
  // but, you probably want this, unless you're building a single-page app
  .enableSingleRuntimeChunk()

  /*
   * FEATURE CONFIG
   *
   * Enable & configure other features below. For a full
   * list of features, see:
   * https://symfony.com/doc/current/frontend.html#adding-more-features
   */
  .cleanupOutputBeforeBuild()

  // Displays build status system notifications to the user
  // .enableBuildNotifications()

  .enableSourceMaps(!Encore.isProduction())
  // enables hashed filenames (e.g. app.abc123.css)
  .enableVersioning(Encore.isProduction())

  // configure Babel
  // .configureBabel((config) => {
  //     config.plugins.push('@babel/a-babel-plugin');
  // })

  // enables and configure @babel/preset-env polyfills
  .configureBabelPresetEnv((config) => {
    config.useBuiltIns = 'usage';
    config.corejs = '3.39';
  })

  // enables Sass/SCSS support
  .enableSassLoader((options) => {
    // Use Dart Sass implementation explicitly
    options.implementation = require('sass');
    // quietDeps silences deprecation warnings from third-party packages (e.g. Bootstrap)
    if (!options.sassOptions) options.sassOptions = {};
    options.sassOptions.quietDeps = true;
  })

  // enable TypeScript support
  .enableTypeScriptLoader()

  // Copy images from assets/images to public/build/images
  .copyFiles({
    from: './assets/images',
    to: 'images/[path][name].[hash:8].[ext]',
    pattern: /\.(png|jpg|jpeg|gif|ico|svg|webp)$/,
  })

  // Configure CSS loader to process image URLs
  .configureCssLoader((options) => {
    options.url = true; // Enable URL processing for images
  })

  // enable Stimulus bridge (controllers.json alias)
  .enableStimulusBridge('./assets/controllers.json')

  // dev-server: enable HMR/live reload and watch Twig/PHP changes
  .configureDevServerOptions((options) => {
    options.hot = true;
    options.liveReload = true;
    options.client = { overlay: true, progress: true };
    options.watchFiles = ['assets/**/*', 'templates/**/*.twig', 'src/**/*.php'];
    // Bind to localhost for Symfony dev-server auto-detection
    options.host = 'localhost';
    options.port = 8080;
    options.headers = {
      'Access-Control-Allow-Origin': '*',
      'Access-Control-Allow-Methods': 'GET,HEAD,PUT,PATCH,POST,DELETE',
      'Access-Control-Allow-Headers': 'X-Requested-With, content-type, Authorization',
    };
  });

// uncomment if you use React
//.enableReactPreset()

// uncomment to get integrity="..." attributes on your script & link tags
// requires WebpackEncoreBundle 1.4 or higher
//.enableIntegrityHashes(Encore.isProduction())

// uncomment if you're having problems with a jQuery plugin
//.autoProvidejQuery()

module.exports = Encore.getWebpackConfig();
