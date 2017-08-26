<?php
// dark container
vc_map(
    array(
        "name" => "Container",
        "description" => "Container to wrap content.",
        "base" => "sembia_container",
        "category" => "Content",
        "show_settings_on_create" => false,
        "is_container" => true,
        "content_element" => true,
        "js_view" => 'VcColumnView',
        "params" => array(
            array(
                "admin_label" => true,
                "type" => "dropdown",
                "heading" => __("Background Color"),
                "param_name" => "color",
                "value" => array(
                    'None (Default)' => 'transparent',
                    'Dark' => 'dark',
                    'light' => 'light',
                ),
            ),
            array(
                "admin_label" => true,
                "type" => "attach_image",
                "heading" => __("Background Image"),
                "param_name" => "image",
                "value" => '',
            ),
        ),
    )
);
class WPBakeryShortCode_sembia_container extends WPBakeryShortCodesContainer {
    protected function content($atts, $content = null) {
        extract(shortcode_atts(
            array(
                'color' => 'transparent',
                'image' => '',
            ), $atts
        ));
        $output = false;
        if ($image) { $image = wp_get_attachment_image_src($image, 'full');}
        ob_start();
        include(locate_template('inc/shortcodes/container.php'));
        $output = ob_get_clean();
        return $output;
    }
}

// p.Lead
vc_map(
    array(
        "name" => "Paragraph Lead",
        "description" => "slightly larger than usual text block",
        "base" => "sembia_lead",
        "category" => "Content",
        "params" => array(
            array(
                "admin_label" => true,
                "type" => "textarea",
                "heading" => __("Text"),
                "param_name" => "text_block",
                "value" => '',
            ),
        )
    )
);
class WPBakeryShortCode_sembia_lead extends WPBakeryShortCode {
    protected function content($atts, $content = null) {
        extract(shortcode_atts(
            array(
                'text_block' => '',
            ), $atts
        ));
        $output = false;
        ob_start();
        include(locate_template('inc/shortcodes/lead.php'));
        $output = ob_get_clean();
        return $output;
    }
}

// blockquote
vc_map(
    array(
        "name" => "Blockquote",
        "description" => "Displays a block quote",
        "base" => "sembia_blockquote",
        "category" => "Content",
        "params" => array(
            array(
                "admin_label" => true,
                "type" => "textarea",
                "heading" => __("Text"),
                "param_name" => "text_block",
                "value" => '',
            ),
            array(
                "admin_label" => true,
                "type" => "textfield",
                "heading" => __("Footer"),
                "param_name" => "footer",
                "value" => '',
            ),
            array(
                "admin_label" => true,
                "type" => "textfield",
                "heading" => __("Source"),
                "param_name" => "source",
                "value" => '',
            ),
        )
    )
);
class WPBakeryShortCode_sembia_blockquote extends WPBakeryShortCode {
    protected function content($atts, $content = null) {
        extract(shortcode_atts(
            array(
                'text_block' => '',
                'footer' => '',
                'source' => '',
            ), $atts
        ));
        $output = false;
        ob_start();
        include(locate_template('inc/shortcodes/blockquote.php'));
        $output = ob_get_clean();
        return $output;
    }
}

// Button
vc_map(
    array(
        "name" => "Button",
        "description" => "Link button",
        "base" => "sembia_button",
        "category" => "Content",
        "params" => array(
            array(
                "admin_label" => true,
                "type" => "textfield",
                "heading" => __("Text"),
                "param_name" => "text",
                "value" => '',
            ),
            array(
                "admin_label" => true,
                "type" => "upload_file",
                "heading" => __("Link"),
                "param_name" => "link",
                "value" => '',
            ),
            array(
                "admin_label" => true,
                "type" => "checkbox",
                "heading" => "Open link in new window?",
                "param_name" => "target",
                "description" => "Opens link in new window if checked.",
                "value" => array(
                    "Active" => 1
                )
            ),
        )
    )
);
class WPBakeryShortCode_sembia_button extends WPBakeryShortCode {
    protected function content($atts, $content = null) {
        extract(shortcode_atts(
            array(
                'link' => '', // Post IDs or URL to a full-sized image
                'text' => '',
                'target' => '',
            ), $atts
        ));
        $output = false;
        ob_start();
        include(locate_template('inc/shortcodes/button.php'));
        $output = ob_get_clean();
        return $output;
    }
}
// Callout Title
vc_map(array(
    "name" => "Hero Block",
    "description" => "A large hero block with centered text",
    "base" => "sembia_hero",
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
        array(
            "admin_label" => true,
            "type" => "attach_image",
            "heading" => __("Background Image"),
            "param_name" => "image",
            "value" => '',
        ),
    )
));
class WPBakeryShortCode_sembia_hero extends WPBakeryShortCode {
    protected function content($atts, $content = null) {
        extract(shortcode_atts(
            array(
                "image" => '', // Post IDs or URL to a full-sized image
                "subtitle" => '',
                "title" => '',
                "header_size" => 'h2',
                "accent" => 'default',
            ), $atts
        ));
        if ($image) { $image = wp_get_attachment_image_src($image, 'full'); }
        ob_start();
        include(locate_template('inc/shortcodes/hero.php'));
        $output = ob_get_clean();
        return $output;
    }
}


// Random Shapes
vc_map(array(
    "name" => "Shapes",
    "description" => "Displays a randam array of shapes",
    "base" => "sembia_shapes",
    "category" => "Content",
    "params" => array(
        array(
            "admin_label" => true,
            "type" => "textfield",
            "heading" => __("Height"),
            "param_name" => "height",
            "value" => '',
        ),
        array(
            "admin_label" => true,
            "type" => "textfield",
            "heading" => __("width"),
            "param_name" => "width",
            "value" => '',
        ),
    )
));
class WPBakeryShortCode_sembia_shapes extends WPBakeryShortCode {
    protected function content($atts, $content = null) {
        extract(shortcode_atts(
            array(
                "height" => '', // Post IDs or URL to a full-sized image
                "width" => '',
            ), $atts
        ));
        ob_start();
        include(locate_template('inc/shortcodes/shapes.php'));
        $output = ob_get_clean();
        return $output;
    }
}
