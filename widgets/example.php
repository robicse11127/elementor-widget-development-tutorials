<?php
namespace Elementor;

class MYEW_Example_Widget extends Widget_Base {

    public function get_name() {
        return  'myew-example-widget-id';
    }

    public function get_title() {
        return esc_html__( 'Example Widget', 'my-elementor-widget' );
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
        // Content Settings
        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Content Settings', 'my-elementor-widget' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->end_controls_section();


        // Style Tab
        $this->style_tab();
    }

    private function style_tab() {

    }

    protected function render() {
        $mywe_values = $this->get_settings_for_display();
        ?>
        <div>
            <h1>This is an exmaple widget.</h1>
        </div>
        <?php
    }

    protected function content_template() {
        
    }

}
Plugin::instance()->widgets_manager->register_widget_type( new MYEW_Example_Widget() );