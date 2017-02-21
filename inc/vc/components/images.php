<?php

// Image Grid 1
vc_map(
    array(
        "name" => "Image Grid 1",
        "description" => "Image Grid with 3 images",
        "base" => "sembia_image_grid_1",
        "category" => "Content",
        "params" => array(
            array(
                "admin_label" => true,
                "type" => "attach_image",
                "heading" => __("Primary Image"),
                "param_name" => "image1",
                "value" => '',
            ),
            array(
                "admin_label" => true,
                "type" => "attach_image",
                "heading" => __("Secondary Image"),
                "param_name" => "image2",
                "value" => '',
            ),
            array(
                "admin_label" => true,
                "type" => "attach_image",
                "heading" => __("Tertiary Image"),
                "param_name" => "image3",
                "value" => '',
            ),
            array(
                "admin_label" => true,
                "type" => "textfield",
                "heading" => __("Caption"),
                "param_name" => "caption",
                "value" => '',
            ),

        )
    )
);
class WPBakeryShortCode_sembia_image_grid_1 extends WPBakeryShortCode {
    protected function content($atts, $content = null) {
        extract(shortcode_atts(
            array(
                'image1' => '', // Post IDs or URL to a full-sized image
                'image2' => '', // Post IDs or URL to a full-sized image
                'image3' => '', // Post IDs or URL to a full-sized image
                'caption' => '',
            ), $atts
        ));
        $output = false;
        if ($image1) { $image1 = wp_get_attachment_image_src($image1, 'full');}
        if ($image2) { $image2 = wp_get_attachment_image_src($image2, 'full');}
        if ($image3) { $image3 = wp_get_attachment_image_src($image3, 'full');}
        ob_start();
        include(locate_template('inc/shortcodes/img_grid_1.php'));
        $output = ob_get_clean();
        return $output;
    }
}

// Image Grid 2
vc_map(
    array(
        "name" => "Image Grid 2",
        "description" => "Image Grid with 2 images",
        "base" => "sembia_image_grid_2",
        "category" => "Content",
        "params" => array(
            array(
                "admin_label" => true,
                "type" => "attach_image",
                "heading" => __("Primary Image"),
                "param_name" => "image1",
                "value" => '',
            ),
            array(
                "admin_label" => true,
                "type" => "attach_image",
                "heading" => __("Secondary Image"),
                "param_name" => "image2",
                "value" => '',
            ),
            array(
                "admin_label" => true,
                "type" => "textfield",
                "heading" => __("Caption"),
                "param_name" => "caption",
                "value" => '',
            ),

        )
    )
);
class WPBakeryShortCode_sembia_image_grid_2 extends WPBakeryShortCode {
    protected function content($atts, $content = null) {
        extract(shortcode_atts(
            array(
                'image1' => '', // Post IDs or URL to a full-sized image
                'image2' => '', // Post IDs or URL to a full-sized image
                'caption' => '',
            ), $atts
        ));
        $output = false;
        if ($image1) { $image1 = wp_get_attachment_image_src($image1, 'full');}
        if ($image2) { $image2 = wp_get_attachment_image_src($image2, 'full');}
        ob_start();
        include(locate_template('inc/shortcodes/img_grid_2.php'));
        $output = ob_get_clean();
        return $output;
    }
}

// Image Grid 3
vc_map(
    array(
        "name" => "Image Grid 3",
        "description" => "Image Grid with 3 images",
        "base" => "sembia_image_grid_3",
        "category" => "Content",
        "params" => array(
            array(
                "admin_label" => true,
                "type" => "attach_image",
                "heading" => __("Primary Image"),
                "param_name" => "image1",
                "value" => '',
            ),
            array(
                "admin_label" => true,
                "type" => "attach_image",
                "heading" => __("Secondary Image"),
                "param_name" => "image2",
                "value" => '',
            ),
            array(
                "admin_label" => true,
                "type" => "attach_image",
                "heading" => __("Tertiary Image"),
                "param_name" => "image3",
                "value" => '',
            ),
            array(
                "admin_label" => true,
                "type" => "textfield",
                "heading" => __("Caption"),
                "param_name" => "caption",
                "value" => '',
            ),

        )
    )
);
class WPBakeryShortCode_sembia_image_grid_3 extends WPBakeryShortCode {
    protected function content($atts, $content = null) {
        extract(shortcode_atts(
            array(
                'image1' => '', // Post IDs or URL to a full-sized image
                'image2' => '', // Post IDs or URL to a full-sized image
                'image3' => '', // Post IDs or URL to a full-sized image
                'caption' => '',
            ), $atts
        ));
        $output = false;
        if ($image1) { $image1 = wp_get_attachment_image_src($image1, 'full');}
        if ($image2) { $image2 = wp_get_attachment_image_src($image2, 'full');}
        if ($image3) { $image3 = wp_get_attachment_image_src($image3, 'full');}
        ob_start();
        include(locate_template('inc/shortcodes/img_grid_3.php'));
        $output = ob_get_clean();
        return $output;
    }
}


// Image Grid 4
vc_map(
    array(
        "name" => "Single Image",
        "description" => "Image Grid with 1 image",
        "base" => "sembia_image_grid_4",
        "category" => "Content",
        "params" => array(
            array(
                "admin_label" => true,
                "type" => "attach_image",
                "heading" => __("Primary Image"),
                "param_name" => "image1",
                "value" => '',
            ),
            array(
                "admin_label" => true,
                "type" => "textfield",
                "heading" => __("Caption"),
                "param_name" => "caption",
                "value" => '',
            ),

        )
    )
);
class WPBakeryShortCode_sembia_image_grid_4 extends WPBakeryShortCode {
    protected function content($atts, $content = null) {
        extract(shortcode_atts(
            array(
                'image1' => '', // Post IDs or URL to a full-sized image
                'caption' => '',
            ), $atts
        ));
        $output = false;
        if ($image1) { $image1 = wp_get_attachment_image_src($image1, 'full');}
        ob_start();
        include(locate_template('inc/shortcodes/img_grid_4.php'));
        $output = ob_get_clean();
        return $output;
    }
}

// Image Grid 3
vc_map(
    array(
        "name" => "Graphic",
        "description" => "Single image",
        "base" => "sembia_image_grid_5",
        "category" => "Content",
        "params" => array(
            array(
                "admin_label" => true,
                "type" => "attach_image",
                "heading" => __("Primary Image"),
                "param_name" => "image1",
                "value" => '',
            ),
            array(
                "admin_label" => true,
                "type" => "textfield",
                "heading" => __("Alt Text"),
                "param_name" => "caption",
                "value" => '',
            ),
            array(
                "admin_label" => true,
                "type" => "dropdown",
                "heading" => __("Alignment"),
                "param_name" => "align",
                "value" => array(
                    'None' => 'no-align',
                    'Center' => 'text-center',
                    'Left Aligned' => 'text-left',
                    'Right Aligned' => 'text-right',
                ),
            ),
            array(
                "admin_label" => true,
                "type" => "checkbox",
                "heading" => "Float Image?",
                "param_name" => "float",
                "description" => "Floating the image allows for text to wrap around the image",
                "value" => array(
                    "Active" => 1
                )
            ),
        )
    )
);
class WPBakeryShortCode_sembia_image_grid_5 extends WPBakeryShortCode {
    protected function content($atts, $content = null) {
        extract(shortcode_atts(
            array(
                'image1' => '', // Post IDs or URL to a full-sized image
                'caption' => '',
                'align' => 'no-align',
                'float' => '',
            ), $atts
        ));
        $output = false;
        if ($image1) { $image1 = wp_get_attachment_image_src($image1, 'full');}
        ob_start();
        include(locate_template('inc/shortcodes/img_grid_5.php'));
        $output = ob_get_clean();
        return $output;
    }
}
