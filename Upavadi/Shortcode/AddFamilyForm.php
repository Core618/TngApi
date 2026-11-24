<?php

class Upavadi_Shortcode_AddFamilyForm extends Upavadi_Shortcode_AbstractShortcode
{
    const SHORTCODE = 'upavadi_pages_addfamilyform';

    //do shortcode Add Family form
    public function show()
    {
        $personId = preg_replace('/[^A-Za-z0-9_-]/', '', (string) filter_input(INPUT_GET, 'personId')); // TNG IDs: letters, digits, _ and - only
        $tree = preg_replace('/[^A-Za-z0-9_-]/', '', (string) filter_input(INPUT_GET, 'tree')); // TNG IDs: letters, digits, _ and - only
        $context = array();
        $context['personId'] = $personId;
        $context['tree'] = $tree;
        return $this->templates->render('addfamilyform.html', $context);
    }
}