<?php
namespace Elementor;
class MYEW_Logo_Carousel_Widget extends Widget_Base {

    public function get_name() {
        return  'myewpricing-logo-carousel-id';
    }

    public function get_title() {
        return esc_html__( 'Logo Carousel', 'my-elementor-widget' );
    }

    public function get_script_depends() {
        return [
            'myew-script'
        ];
    }

    public function get_icon() {
        return 'eicon-slider-album';
    }

    public function get_categories() {
        return [ 'myew-for-elementor' ];
    }

    public function _register_controls() {
        // Content Settings
        $this->start_controls_section(
            'content_settings',
            [
                'label' => __( 'Content Settings', 'my-elementor-widget' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
            // Slider Repeater
            $repeater = new \Elementor\Repeater();
            $repeater->add_control(
                'slider_title',
                [
                    'label' => __( 'Title', 'my-elementor-widget' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => __( 'SLider Title #1', 'my-elementor-widget' ),
                    'label_block' => true
                ]
            );
            $repeater->add_control(
                'slider_image',
                [
                    'label'   => __( 'Image', 'my-elementor-widget' ),
                    'type'    => \Elementor\Controls_Manager::MEDIA,
                    'default' => [
                        'url' => \Elementor\Utils::get_placeholder_image_src(),
                    ],
                ],
            );
            $this->add_control(
                'slider',
                [
                    'label' => __( 'Slider Items', 'my-elementor-widget' ),
                    'type' => \Elementor\Controls_Manager::REPEATER,
                    'fields' => $repeater->get_controls(),
                    'default' => [
                        [
                            'slider_title' => __( 'Slider title #1', 'my-elementor-widget' ),
                        ],
                    ],
                    'title_field' => '{{{ slider_title }}}',
                ]
            );
        $this->end_controls_section();

        // Slider Settings
        $this->start_controls_section(
            'slider_settings',
            [
                'label' => __( 'Slider Settings', 'my-elementor-widget' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
            // show Loop
            $this->add_control(
                'loop',
                [
                    'label' => __( 'Loop', 'plugin-domain' ),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => __( 'Show', 'your-plugin' ),
                    'label_off' => __( 'Hide', 'your-plugin' ),
                    'return_value' => true,
                    'default' => true,
                ]
            );

            // show Dots
            $this->add_control(
                'dots',
                [
                    'label' => __( 'Dots', 'plugin-domain' ),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => __( 'Show', 'your-plugin' ),
                    'label_off' => __( 'Hide', 'your-plugin' ),
                    'return_value' => true,
                    'default' => true,
                ]
            );

            // Show Navs
            $this->add_control(
                'navs',
                [
                    'label' => __( 'Navs', 'plugin-domain' ),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => __( 'Show', 'your-plugin' ),
                    'label_off' => __( 'Hide', 'your-plugin' ),
                    'return_value' => true,
                    'default' => true,
                ]
            );

            // Margin
            $this->add_control(
                'margin',
                [
                    'label' => __( 'Margin', 'plugin-domain' ),
                    'type' => \Elementor\Controls_Manager::NUMBER,
                    'default' => 10,
                    'placeholder' => __( 'Enter the margin between to slides', 'plugin-domain' ),
                ]
            );

        $this->end_controls_section();
    }

    private function style_tab() {}

    protected function render() {
        $settings = $this->get_settings_for_display();
        $this->add_render_attribute(
            'logo_carousel_options',
            [
                'id'          => 'logo-carousel-' . $this->get_id(),
                'data-loop'   => $settings[ 'loop' ],
                'data-dots'   => $settings[ 'dots' ],
                'data-navs'   => $settings[ 'navs' ],
                'data-margin' => $settings[ 'margin' ],
            ]
        );
        ?>
        <div class="owl-carousel owl-theme logo-carousel" <?php echo $this->get_render_attribute_string( 'logo_carousel_options' ); ?>>
            <?php foreach( $settings[ 'slider' ] as $slide ) : ?>
                <div class="item">
                    <img src="<?php echo esc_url( $slide[ 'slider_image' ][ 'url' ] ); ?>" alt="<?php esc_attr_e( $slide[ 'slider_title' ] ); ?>" />
                </div>
            <?php endforeach; ?>
        </div>
        <?php
    }

    protected function _content_template() {
        ?>
        <#
            view.addRenderAttribute(
                'logo_carousel_options',
                {
                    'id': 'logo-carousel-id',
                    'data-loop': settings.loop,
                    'data-dots': settings.dots,
                    'data-navs': settings.navs,
                    'data-margin': settings.margin
                }
            );
        #>
        <# if( settings.slider.length ) { #>
        <div class="owl-carousel owl-theme logo-carousel" {{{ view.getRenderAttributeString( 'logo_carousel_options' ) }}}>
            <# _.each( settings.slider, function( slide ) { #>
            <div class="item">
                <img src="{{ slide.slider_image.url }}" alt="{{ slide.slider_title }}" />
            </div>
            <# } ) #>
        </div>
        <# } #>
        <?php
    }

}
Plugin::instance()->widgets_manager->register_widget_type( new MYEW_Logo_Carousel_Widget() );