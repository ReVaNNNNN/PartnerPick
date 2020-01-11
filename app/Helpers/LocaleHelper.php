<?php

/**
 * @param string $locale
 * @param string $class_name
 * @return string
 */
function setActive(string $locale, string $class_name = "lang-active"): string
{
    return Session::get('locale') === $locale ? $class_name : "";
}
