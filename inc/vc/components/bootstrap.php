<?php

// Container
vc_map(
    array(
        "name" => "Bootstrap Container",
        "description" => "Basic bootstrap container",
        "base" => "sembia_bs_container",
        "category" => "Bootstrap",
        "show_settings_on_create" => false,
        "is_container" => true,
        "content_element" => true,
        "js_view" => 'VcColumnView',
        "params" => array(
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
class WPBakeryShortCode_sembia_bs_container extends WPBakeryShortCodesContainer {
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
        include(locate_template('inc/shortcodes/bs_container.php'));
        $output = ob_get_clean();
        return $output;
    }
}
