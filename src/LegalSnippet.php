<?php

use SilverStripe\ORM\DataObject;

/**
 *
 * @author Hudhaifa Shatnawi <hudhaifa.shatnawi@gmail.com>
 * @version 1.0, Apr 25, 2018 - 2:44:39 PM
 */
class LegalSnippet
        extends DataObject {

    private static $db = [
        'Text' => 'Varchar(255)'
    ];
    private static $has_one = [
        'LegalPage' => LegalPage::class
    ];

}
