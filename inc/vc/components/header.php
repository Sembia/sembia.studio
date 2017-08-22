<?php

// Callout Title
vc_map(array(
    "name" => "Title & Subtitle",
    "description" => "A Subtitle and Title block",
    "base" => "sembia_callout_title",
    "category" => "Content",
    "params" => array(
        array(
            "admin_label" => true,
            "type" => "textfield",
            "heading" => __("Title"),
            "param_name" => "title",
            "value" => '',
        ),
        array(
            "admin_label" => true,
            "type" => "textfield",
            "heading" => __("Subtitle"),
            "param_name" => "subtitle",
            "value" => '',
        ),
        array(
            "admin_label" => true,
            "type" => "dropdown",
            "heading" => __("Heading size"),
            "param_name" => "header_size",
            "value" => array(
                'Default (h2)' => 'h2',
                'h1' => 'h1',
                'h3' => 'h3',
            ),
        ),
        array(
            "admin_label" => true,
            "type" => "dropdown",
            "heading" => __("Accent Color"),
            "param_name" => "accent",
            "value" => array(
                'Default (none)' => 'default',
                'White' => 'white',
                'Red' => 'red',
                'Blue' => 'blue',
                'Green' => 'green',
                'Yellow' => 'yellow',
            ),
        ),
    )
));
class WPBakeryShortCode_sembia_callout_title extends WPBakeryShortCode {
    protected function content($atts, $content = null) {
        extract(shortcode_atts(
            array(
                "subtitle" => '',
                "title" => '',
                "header_size" => 'h2',
                "accent" => 'default',
            ), $atts
        ));
        ob_start();
        include(locate_template('inc/shortcodes/callout_title.php'));
        $output = ob_get_clean();
        return $output;
    }
}

// Headline
vc_map(array(
    "name" => "Headline",
    "description" => "A large title block",
    "base" => "sembia_callout_headline",
    "category" => "Content",
    "params" => array(
        array(
            "admin_label" => true,
            "type" => "textfield",
            "heading" => __("Title"),
            "param_name" => "title",
            "value" => '',
        ),
        array(
            "admin_label" => true,
            "type" => "dropdown",
            "heading" => __("Heading size"),
            "param_name" => "header_size",
            "value" => array(
                'Default (h1)' => 'h1',
                'h2' => 'h2',
            ),
        ),
        array(
            "admin_label" => true,
            "type" => "dropdown",
            "heading" => __("Accent Color"),
            "param_name" => "accent",
            "value" => array(
                'Default (none)' => 'default',
                'White' => 'white',
                'Red' => 'red',
                'Blue' => 'blue',
                'Green' => 'green',
                'Yellow' => 'yellow',
            ),
        ),
    )
));
class WPBakeryShortCode_sembia_callout_headline extends WPBakeryShortCode {
    protected function content($atts, $content = null) {
        extract(shortcode_atts(
            array(
                "title" => '',
                "header_size" => 'h1',
                "accent" => 'default',
            ), $atts
        ));
        ob_start();
        include(locate_template('inc/shortcodes/headline.php'));
        $output = ob_get_clean();
        return $output;
    }
}
