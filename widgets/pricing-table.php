<?php
namespace Elementor;
class MYEW_Pricing_Table_Widget extends Widget_Base {

    public function get_name() {
        return  'myewpricing-table-widget-id';
    }

    public function get_title() {
        return esc_html__( 'Pricing Table', 'my-elementor-widget' );
    }

    public function get_script_depends() {
        return [
            'myew-script'
        ];
    }

    public function get_icon() {
        return 'eicon-price-table';
    }

    public function get_categories() {
        return [ 'myew-for-elementor' ];
    }

    public function _register_controls() {

        // Header Settings
        $this->start_controls_section(
            'header_section',
            [
                'label' => __( 'Header', 'my-elementor-widget' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

            // Title
            $this->add_control(
                'header_title',
                [
                    'label' => __( 'Title', 'plugin-domain' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => __( 'Pricing Title', 'plugin-domain' ),
                    'label_block' => true,
                    'placeholder' => __( 'Type your title here', 'plugin-domain' ),
                ]
            );

            // Description
            $this->add_control(
                'header_description',
                [
                    'label' => __( 'Description', 'plugin-domain' ),
                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                    'rows' => 5,
                    'default' => __( 'Default description', 'plugin-domain' ),
                    'placeholder' => __( 'Type your description here', 'plugin-domain' ),
                ]
            );

            // Show Badge
            $this->add_control(
                'show_badge',
                [
                    'label' => __( 'Show Badge', 'plugin-domain' ),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => __( 'Show', 'your-plugin' ),
                    'label_off' => __( 'Hide', 'your-plugin' ),
                    'return_value' => 'yes',
                    'default' => 'yes',
                ]
            );

            // Badge Text
            $this->add_control(
                'header_badge_text',
                [
                    'label' => __( 'Badge Text', 'plugin-domain' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => __( 'Popular', 'plugin-domain' ),
                    'label_block' => true,
                    'placeholder' => __( 'Badge text', 'plugin-domain' ),
                    'condition' => [
                        'show_badge' => 'yes'
                    ]
                ]
            );

        $this->end_controls_section();

        // Price Settings
        $this->start_controls_section(
            'price_section',
            [
                'label' => __( 'Pricing', 'my-elementor-widget' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

            // Price
            $this->add_control(
                'pricing_price',
                [
                    'label' => __( 'Price', 'plugin-domain' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => __( '$99', 'plugin-domain' ),
                    'label_block' => true,
                    'placeholder' => __( 'Type your price here', 'plugin-domain' ),
                ]
            );

            // Duration
            $this->add_control(
                'pricing_duration',
                [
                    'label' => __( 'Duration', 'plugin-domain' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => __( 'year', 'plugin-domain' ),
                    'label_block' => true,
                    'placeholder' => __( 'Type your duration here', 'plugin-domain' ),
                ]
            );

        $this->end_controls_section();

        // Listing Settings
        $this->start_controls_section(
            'listing_section',
            [
                'label' => __( 'Listing', 'my-elementor-widget' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

            // List Repeater
            $repeater = new \Elementor\Repeater();
            $repeater->add_control(
                'feature_text',
                [
                    'label' => __( 'Feature Text', 'plugin-domain' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => __( '' , 'plugin-domain' ),
                    'label_block' => true,
                ]
            );
            $repeater->add_control(
                'feature_icon',
                [
                    'label' => __( 'Feature Icon', 'text-domain' ),
                    'type' => \Elementor\Controls_Manager::ICONS,
                    'default' => [
                        'value' => 'fas fa-check',
                        'library' => 'solid',
                    ],
                ]
            );

            $this->add_control(
                'list',
                [
                    'label' => __( 'Repeater List', 'plugin-domain' ),
                    'type' => \Elementor\Controls_Manager::REPEATER,
                    'fields' => $repeater->get_controls(),
                    'default' => [
                        [
                            'feature_text' => __( 'upto 5 users', 'plugin-domain' ),
                        ],
                        [
                            'feature_text' => __( 'max 100 items/month', 'plugin-domain' ),
                        ],
                        [
                            'feature_text' => __( '500 quries', 'plugin-domain' ),
                        ],
                        [
                            'feature_text' => __( 'basic statistic', 'plugin-domain' ),
                        ],
                    ],
                    'title_field' => '{{{ feature_text }}}',
                ]
            );

        $this->end_controls_section();

        // Button Settings
        $this->start_controls_section(
            'button_section',
            [
                'label' => __( 'Button', 'my-elementor-widget' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->end_controls_section();

        // Style Tab
        $this->style_tab();
    }

    private function style_tab() {}

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <div class="pricing-table">
            <div class="pricing-table-header">
                <?php if( 'yes' == $settings[ 'show_badge' ] ) : ?>
                    <span class="popular"><?php echo $settings[ 'header_badge_text' ]; ?></span>
                <?php endif; ?>
                <h2 class="header-title"><?php echo $settings[ 'header_title' ]; ?></h2>
                <h2 class="header-subtitle"><?php echo $settings[ 'header_description' ]; ?></h2>
            </div>
            <div class="pricing-table-price">
                <div class="price"><?php echo $settings[ 'pricing_price' ]; ?></div>
                <div class="price-divider">/</div>
                <div class="price-duration"><?php echo $settings[ 'pricing_duration' ]; ?></div>
            </div>
            <div class="pricing-table-feature">
                <?php foreach( $settings[ 'list' ] as $item ) : ?>
                    <div><?php \Elementor\Icons_Manager::render_icon( $item['feature_icon'], [ 'aria-hidden' => 'true' ] ); ?> <?php echo $item[ 'feature_text' ]; ?></div>
                <?php endforeach; ?>
            </div>
            <div class="pricing-table-action">
                <a href="#" class="button button-pricing-action">Get This Plan</a>
            </div>
        </div>
        <?php
    }

    protected function _content_template() {

    }

}
Plugin::instance()->widgets_manager->register_widget_type( new MYEW_Pricing_Table_Widget() );