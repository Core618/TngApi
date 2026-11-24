<?php

class Upavadi_Shortcode_AdminFamilySheet extends Upavadi_Shortcode_AbstractShortcode
{
    const SHORTCODE = 'upavadi_pages_adminfamilysheet';

    //do shortcode Add Family form
    public function show()
    {
        $personId = preg_replace('/[^A-Za-z0-9_-]/', '', (string) filter_input(INPUT_GET, 'personId')); // TNG IDs: letters, digits, _ and - only
        $context = array();
        $context['personId'] = $personId;
        return $this->templates->render('admin-familysheet.html', $context);
    }
}