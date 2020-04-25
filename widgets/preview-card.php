<?php
namespace Elementor;

class MYEW_Preview_Card_Widget extends Widget_Base {

    public function get_name() {
        return  'myew-preview-card-widget-id';
    }

    public function get_title() {
        return esc_html__( 'Preview Card Widget', 'my-elementor-widget' );
    }

    public function get_script_depends() {
        return [
            'myew-script'
        ];
    }

    public function get_icon() {
        return '';
    }

    public function get_categories() {
        return [ 'myew-for-elementor' ];
    }

    public function _register_controls() {
        // Image Settings
        $this->start_controls_section(
            'image_section',
            [
                'label' => __( 'Image', 'my-elementor-widget' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

            // Image
            $this->add_control(
                'image',
                [
                    'label' => __( 'Choose Image', 'plugin-domain' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                    'default' => [
                        'url' => \Elementor\Utils::get_placeholder_image_src(),
                    ],
                ]
            );

            // Show Image link
            $this->add_control(
                'show_image_link',
                [
                    'label' => __( 'Show Image Link', 'plugin-domain' ),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => __( 'Show', 'your-plugin' ),
                    'label_off' => __( 'Hide', 'your-plugin' ),
                    'return_value' => 'yes',
                    'default' => 'yes',
                ]
            );

            // Image Link
            $this->add_control(
                'image_link',
                [
                    'label' => __( 'Image Link', 'plugin-domain' ),
                    'type' => \Elementor\Controls_Manager::URL,
                    'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
                    'show_external' => true,
                    'default' => [
                        'url' => '',
                        'is_external' => true,
                        'nofollow' => true,
                    ],
                    'condition' => [
                        'show_image_link' => 'yes'
                    ]
                ]
            );

        $this->end_controls_section();

        // Content Settings
        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Content', 'my-elementor-widget' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

            // Title
            $this->add_control(
                'card_title',
                [
                    'label' => __( 'Title', 'plugin-domain' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => __( 'Default title', 'plugin-domain' ),
                    'label_block' => true,
                    'placeholder' => __( 'Type your title here', 'plugin-domain' ),
                ]
            );

            // Divider
            $this->add_control(
                'show_divider',
                [
                    'label'        => __( 'Show Divider', 'plugin-domain' ),
                    'type'         => \Elementor\Controls_Manager::SWITCHER,
                    'label_on'     => __( 'Show', 'plugin-domain' ),
                    'label_off'    => __( 'Hide', 'plugin-domain' ),
                    'return_value' => 'yes',
                    'default'      => 'yes',
                ]
            );

            // Content
            $this->add_control(
                'item_description',
                [
                    'label' => __( 'Description', 'plugin-domain' ),
                    'type' => \Elementor\Controls_Manager::WYSIWYG,
                    'default' => __( 'Default description', 'plugin-domain' ),
                    'placeholder' => __( 'Type your description here', 'plugin-domain' ),
                ]
            );

        $this->end_controls_section();

        // Badge Settings
        $this->start_controls_section(
            'badge_section',
            [
                'label' => __( 'Badge', 'my-elementor-widget' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

            // Top badge
            $this->add_control(
                'show_top_badge',
                [
                    'label' => __( 'Show Top Badge', 'plugin-domain' ),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => __( 'Show', 'your-plugin' ),
                    'label_off' => __( 'Hide', 'your-plugin' ),
                    'return_value' => 'yes',
                    'default' => 'yes',
                ]
            );

            // Top Badge Text
            $this->add_control(
                'top_badge_text',
                [
                    'label' => __( 'Top Badge Text', 'plugin-domain' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => __( '19.99', 'plugin-domain' ),
                    'placeholder' => __( 'Type your title here', 'plugin-domain' ),
                    'condition' => [
                        'show_top_badge' => 'yes'
                    ]
                ]
            );

            // Middle badge
            $this->add_control(
                'show_middle_badge',
                [
                    'label' => __( 'Show Middle Badge', 'plugin-domain' ),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => __( 'Show', 'your-plugin' ),
                    'label_off' => __( 'Hide', 'your-plugin' ),
                    'return_value' => 'yes',
                    'default' => 'yes',
                ]
            );

            // Middle Badge Text
            $this->add_control(
                'middle_badge_text',
                [
                    'label' => __( 'Middle Badge Text', 'plugin-domain' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => __( '19.99', 'plugin-domain' ),
                    'placeholder' => __( 'Type your title here', 'plugin-domain' ),
                    'condition' => [
                        'show_middle_badge' => 'yes'
                    ]
                ]
            );

            // Bottom badge
            $this->add_control(
                'show_bottom_badge',
                [
                    'label' => __( 'Show Bottom Badge', 'plugin-domain' ),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => __( 'Show', 'your-plugin' ),
                    'label_off' => __( 'Hide', 'your-plugin' ),
                    'return_value' => 'yes',
                    'default' => 'yes',
                ]
            );

            // Bottom Badge Text
            $this->add_control(
                'bottom_badge_text',
                [
                    'label' => __( 'Bottom Badge Text', 'plugin-domain' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => __( '19.99', 'plugin-domain' ),
                    'placeholder' => __( 'Type your title here', 'plugin-domain' ),
                    'condition' => [
                        'show_bottom_badge' => 'yes'
                    ]
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

            // Button Link
            $this->add_control(
                'button_link',
                [
                    'label' => __( 'Link', 'plugin-domain' ),
                    'type' => \Elementor\Controls_Manager::URL,
                    'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
                    'show_external' => true,
                    'default' => [
                        'url' => '',
                        'is_external' => true,
                        'nofollow' => true,
                    ],
                ]
            );

            // Button Text
            $this->add_control(
                'button_text',
                [
                    'label' => __( 'Text', 'plugin-domain' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => __( 'Buy Now', 'plugin-domain' ),
                    'placeholder' => __( 'Type your text here', 'plugin-domain' ),
                ]
            );

        $this->end_controls_section();


        // Style Tab
        $this->style_tab();
    }

    private function style_tab() {

    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        // Image
        $image_target = $settings[ 'image_link' ][ 'is_external' ] ? ' target="_blank"' : '';
        $image_nofollow = $settings[ 'image_link' ][ 'nofollow' ] ? ' rel="nofollow"' : '';
        // Button
        $button_target = $settings[ 'button_link' ][ 'is_external' ] ? ' target="_blank"' : '';
		$button_nofollow = $settings[ 'button_link' ][ 'nofollow' ] ? ' rel="nofollow"' : '';
        ?>
        <div class="image-card">
            <div class="image" style="background-image: url(<?php echo esc_url( $settings[ 'image' ][ 'url' ] ); ?>);">
                <?php if( 'yes' == $settings[ 'show_image_link' ] ) : ?>
                    <a href="<?php echo esc_url( $settings[ 'image_link' ][ 'url' ] ) ?>" <?php echo $image_target; ?> <?php echo $image_nofollow; ?>></a>
                <?php endif; ?>
                <?php if( 'yes' == $settings[ 'show_top_badge' ] ) : ?>
                    <span class="top-price-badge badge-blue"><?php echo $settings[ 'top_badge_text' ]; ?></span>
                <?php endif; ?>
                <?php if( 'yes' == $settings[ 'show_middle_badge' ] ) : ?>
                    <span class="middle-price-badge badge-blue"><?php echo $settings[ 'middle_badge_text' ]; ?></span>
                <?php endif; ?>
            </div>
            <div class="content">
                <div class="title">
                    <h2><?php echo $settings[ 'card_title' ]; ?></h2>
                </div>
                <?php if( 'yes' == $settings[ 'show_divider' ] ) : ?>
                    <div class="divider"></div>
                <?php endif; ?>
                <div class="excerpt">
                    <?php echo $settings[ 'item_description' ]; ?>
                </div>
                <div class="readmore">
                    <a href="<?php echo esc_url( $settings[ 'button_link' ][ 'url' ] ); ?>" <?php echo $button_target; ?> <?php echo $button_nofollow; ?> class="button button-readmore"><?php echo $settings[ 'button_text' ];  ?></a>
                    <?php if( 'yes' == $settings[ 'show_bottom_badge' ] ) : ?>
                        <span class="bottom-price-badge badge-blue"><?php echo $settings[ 'bottom_badge_text' ]; ?></span>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php
    }

    protected function content_template() {
        
    }

}
Plugin::instance()->widgets_manager->register_widget_type( new MYEW_Preview_Card_Widget() );