<?php

use SilverStripe\Control\Controller;
use SilverStripe\View\Requirements;
use SilverStripe\View\TemplateGlobalProvider;

/**
 *
 * @author Hudhaifa Shatnawi <hudhaifa.shatnawi@gmail.com>
 * @version 1.0, Aug 3, 2018 - 6:24:12 AM
 */
class LegalProvider
        implements TemplateGlobalProvider {

    //put your code here
    public static function get_template_global_variables() {
        return array(
            'EUCookieSnippet' => 'get_cookies_snippet',
        );
    }

    /// Counters ///
    public static function get_cookies_snippet() {
        $currentPage = Controller::curr();

        if (!$currentPage) {
            return;
        }

        Requirements::css('hudhaifas/silverstripe-legalpage: res/css/cookies-snippet.css');
        Requirements::javascript('https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js');
        Requirements::javascript('hudhaifas/silverstripe-legalpage: res/js/cookies.js');

        return $currentPage
                        ->customise([
                        ])
                        ->renderWith('Includes/CookieSnippet');
    }

}
