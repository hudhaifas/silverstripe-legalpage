<?php

use SilverStripe\ORM\DataExtension;

/**
 *
 * @author Hudhaifa Shatnawi <hudhaifa.shatnawi@gmail.com>
 * @version 1.0, Apr 25, 2018 - 2:05:11 PM
 */
class LegalPageExtension
        extends DataExtension {

    public function getRandomSnippet() {
        $randomPage = LegalPage::get()->sort("RAND()")->limit("1")->first();
        $snippet = $randomPage->Snippets()->sort("RAND()")->limit("1")->first();

        if (!$snippet) {
            return;
        }

        return $this->owner
                        ->customise([
                            'Title' => $randomPage->getTitle(),
                            'Link' => $randomPage->Link(),
                            'Snippet' => $snippet->Text
                        ])
                        ->renderWith('Includes/LegalSnippet');
    }

}
