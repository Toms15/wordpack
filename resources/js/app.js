/*
 * Import external dependencies
 */

/* 
 * Import local dependencies
 */
import Router from './routes';
import common from './routes/common';
import home from './routes/home';
import pageTemplateAboutUs from './routes/pageTemplateAboutUs';

/*
 * Populate Router instance with DOM routes
 */
const routes = new Router({
  // All pages
  common,
  // Home template
  home,
  // About us template
  pageTemplateAboutUs,
});

/*
 * Load Events
 */
jQuery(document).ready(() => routes.loadEvents());