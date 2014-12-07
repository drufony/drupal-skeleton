<?php

/**
 * @file
 * The PHP page that serves all page requests on a Drupal installation.
 *
 * The routines here dispatch control to the appropriate handler, which then
 * prints the appropriate page.
 *
 * All Drupal code is released under the GNU General Public License.
 * See COPYRIGHT.txt and LICENSE.txt.
 */

/**
 * Root directory of Drupal installation.
 */
define('DRUPAL_ROOT', getcwd());

require_once DRUPAL_ROOT.'/../vendor/autoload.php';
$c = new \Silex\Application();
$c->register(new \Bangpound\Bridge\Drupal\BootstrapServiceProvider(), array('drupal.bootstrap.override' => \Bangpound\Bridge\Drupal\BootstrapServiceProvider::OVERRIDE_DATABASE));
$c->boot();
drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL, true, $c['drupal.bootstrap']);
menu_execute_active_handler();
