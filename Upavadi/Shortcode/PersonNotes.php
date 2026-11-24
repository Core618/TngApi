<?php

class Upavadi_Shortcode_PersonNotes extends Upavadi_Shortcode_AbstractShortcode
{
    const SHORTCODE = 'upavadi_pages_personnotes';

    public function show()
    {
        $this->content->init();
        $personId = preg_replace('/[^A-Za-z0-9_-]/', '', (string) filter_input(INPUT_GET, 'personId')); // TNG IDs: letters, digits, _ and - only
        $context = array(
            'personId' => $personId
        );
        return $this->templates->render('family_notes.html', $context);
    }
}