<?php

use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RelationEditor;
use SilverStripe\Forms\GridField\GridFieldDataColumns;

/**
 *
 * @author Hudhaifa Shatnawi <hudhaifa.shatnawi@gmail.com>
 * @version 1.0, Jan 29, 2018 - 2:33:14 PM
 */
class LegalPage
        extends Page {

    private static $has_many = [
        'Snippets' => LegalSnippet::class
    ];
    private static $icon = "hudhaifas/silverstripe-legalpage: res/images/legal.png";
    private static $description = 'Versioned Legal Page.';

    public function getCMSFields() {
        // Get the fields from the parent implementation
        $fields = parent::getCMSFields();

        // Create a default configuration for the new GridField, allowing record editing
        $config = GridFieldConfig_RelationEditor::create();
        // Set the names and data for our gridfield columns
//        $config->getComponentByType(GridFieldDataColumns::class)->setDisplayFields(array(
//            'Name' => 'Name',
//            'Page.Title' => 'Page' // Retrieve from a has-one relationship
//        ));
        // Create a gridfield to hold the student relationship    
        $snippetsField = new GridField(
                'Snippets', // Field name
                'Snippet', // Field title
                $this->Snippets(), // List of all related students
                $config
        );
        // Create a tab named "Students" and add our field to it
        $fields->addFieldToTab('Root.Snippets', $snippetsField);

        return $fields;
    }

}
