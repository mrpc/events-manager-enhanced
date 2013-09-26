<?php

/*
 * Copyright (c) 2005-2013 Yannis - Pastis Glaros, Pramnos Hosting
 * All Rights Reserved.
 * This software is the proprietary information of Pramnos Hosting.
 */

defined('SP') or die('No startpoint defined...');

/**
 * Check if qTranslate is activated
 */
if (function_exists('qtrans_getSortedLanguages')) {
    add_action('em_event', 'eme_qtranslate', 0, 3);
    add_action('em_location', 'eme_qtranslate_location', 0, 3);
}



/**
 * The Following Functions are based on a solution by mateusgm
 * found at: http://wordpress.org/support/topic/plugin-events-manager-when-used-with-qtranslate-displays-tags-in-titles
 */

/**
 * Hook function to translate fields of EM_Event using qTranslate
 * @param EM_Event $target
 */
function eme_qtranslate($target)
{
    $target->event_name = eme_qtranslate_string($target->event_name);
    $target->event_owner = eme_qtranslate_string($target->event_owner);
    $target->post_content = eme_qtranslate_string($target->post_content);
}

/**
 * Hook function to translate fields of EM_Location using qTranslate
 * @param EM_Location $target
 */
function eme_qtranslate_location($target)
{
  $target->location_name = eme_qtranslate_string($target->location_name);
  $target->post_content = eme_qtranslate_string($target->post_content);
}

/**
 * Translates a string using qTranslate
 * @param string $raw_string
 * @return strimg
 */
function eme_qtranslate_string($raw_string)
{
    if (function_exists('qtrans_useCurrentLanguageIfNotFoundUseDefaultLanguage')) {
        $output = qtrans_useCurrentLanguageIfNotFoundUseDefaultLanguage($raw_string);
    } else {
        $output = __($raw_string);
    }
    return $output;
}
