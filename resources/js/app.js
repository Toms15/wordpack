// import external dependencies
// import 'jquery';

// import local dependencies
import Router from './routes';
import common from './routes/common';
import home from './routes/home';
import page_template_about_us from './routes/pageTemplateAboutUs';

/** Populate Router instance with DOM routes */
const routes = new Router({
  // All pages
  common,
  // Home template
  home,
  // About us template
  page_template_about_us,
});

// Load Events
jQuery(document).ready(() => routes.loadEvents());