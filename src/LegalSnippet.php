<?php

use SilverStripe\ORM\DataObject;
use SilverStripe\View\TemplateGlobalProvider;

/**
 *
 * @author Hudhaifa Shatnawi <hudhaifa.shatnawi@gmail.com>
 * @version 1.0, Apr 25, 2018 - 2:44:39 PM
 */
class LegalSnippet
        extends DataObject
        implements TemplateGlobalProvider {

    private static $db = [
        'Text' => 'Varchar(255)'
    ];
    private static $has_one = [
        'LegalPage' => LegalPage::class
    ];
    private static $translate = [
        'Text'
    ];

    public static function get_random_snippet() {
        $randomPage = LegalPage::get()->sort("RAND()")->limit("1")->first();
        $snippet = $randomPage->Snippets()->sort("RAND()")->limit("1")->first();

        if (!$snippet) {
            return;
        }

        return $snippet
                        ->customise([
                            'Title' => $randomPage->getTitle(),
                            'Link' => $randomPage->Link(),
                            'Snippet' => $snippet->Text
                        ])
                        ->renderWith('Includes/LegalSnippet');
    }

    public static function get_template_global_variables() {
        return array(
            'LegalSnippet' => 'get_random_snippet',
        );
    }

}
