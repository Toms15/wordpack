// import external dependencies
// import 'jquery';

// import local dependencies
import Router from './routes';
import common from './routes/common';
import home from './routes/home';
import about_us from './routes/aboutUs';

/** Populate Router instance with DOM routes */
const routes = new Router({
  // All pages
  common,
  // Home template
  home,
  // About us template
  about_us,
});

// Load Events
jQuery(document).ready(() => routes.loadEvents());