<?php
/**
 * Testimonial Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during backend preview render.
 * @param   int $post_id The post ID the block is rendering content against.
 *          This is either the post ID currently being displayed inside a query loop,
 *          or the post ID of the post hosting this block.
 * @param   array $context The context provided to the block by the post or it's parent block.
 */

// Support custom "anchor" values.
$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
    $anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'testimonial-block';
if ( ! empty( $block['className'] ) ) {
    $class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $class_name .= ' align' . $block['align'];
}

// Load values and assign defaults.
$text             = get_field( 'testimonial' ) ?: 'Your testimonial here...';
$author           = get_field( 'author' ) ?: 'Author name';
$author_role      = get_field( 'role' ) ?: 'Author role';
$image            = get_field( 'image' );
$background_color = get_field( 'background_color' );
$text_color       = get_field( 'text_color' );

// Build a valid style attribute for background and text colors.
$styles = array( 'background-color: ' . $background_color, 'color: ' . $text_color );
$style  = implode( '; ', $styles );

?>

<div <?php echo $anchor; ?>class="<?php echo esc_attr( $class_name ); ?>" style="<?php echo esc_attr( $style ); ?>">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 col-md-7 col-12">
                <blockquote class="testimonial-blockquote">
                    <span class="testimonial-text"><?php echo esc_html( $text ); ?></span>
                    <span class="testimonial-author"><?php echo esc_html( $author ); ?></span>
                    <span class="testimonial-role"><?php echo esc_html( $author_role ); ?></span>
                </blockquote>
            </div>
            <div class="col-lg-4 col-md-5 col-12">
                <!-- <div class="ratio ratio-1x1" style="background: url() no-repeat center center; background-size: cover !important;"></div> -->
                <img src="<?php echo $image['url']; ?>" alt="Testimonial">
            </div>
        </div>
    </div>
</div>