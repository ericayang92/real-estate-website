<?php
/**
 * Template Name: Neighborhood Page Template
 * Description: Custom template for neighborhood/community pages
 *
 * This template is optimized for local SEO and provides a clean structure
 * for showcasing neighborhood information, market data, and listings.
 */

get_header(); ?>

<div id="primary" class="content-area neighborhood-page">
    <main id="main" class="site-main" role="main">

        <?php
        while ( have_posts() ) : the_post();
            ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                <?php
                // Check if using Elementor
                if ( class_exists( '\Elementor\Plugin' ) && \Elementor\Plugin::$instance->documents->get( get_the_ID() )->is_built_with_elementor() ) {
                    // Elementor content
                    the_content();
                } else {
                    // Standard WordPress content
                    ?>

                    <header class="entry-header">
                        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                    </header>

                    <div class="entry-content">
                        <?php
                        the_content();

                        wp_link_pages( array(
                            'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'textdomain' ),
                            'after'  => '</div>',
                        ) );
                        ?>
                    </div>

                    <?php
                }
                ?>

            </article>

            <?php
        endwhile; // End of the loop.
        ?>

    </main>
</div>

<?php
// Add schema markup to footer
add_action( 'wp_footer', 'neighborhood_page_schema', 100 );
function neighborhood_page_schema() {
    // Get neighborhood name from custom field or page title
    $neighborhood_name = get_post_meta( get_the_ID(), 'neighborhood_name', true );
    if ( empty( $neighborhood_name ) ) {
        $neighborhood_name = get_the_title();
    }

    // Get coordinates from custom fields (optional)
    $latitude = get_post_meta( get_the_ID(), 'neighborhood_latitude', true );
    $longitude = get_post_meta( get_the_ID(), 'neighborhood_longitude', true );

    // Get description
    $description = get_the_excerpt();
    if ( empty( $description ) ) {
        $description = wp_trim_words( get_the_content(), 30 );
    }

    ?>
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@graph": [
            {
                "@type": "Place",
                "name": "<?php echo esc_js( $neighborhood_name ); ?>",
                <?php if ( !empty( $latitude ) && !empty( $longitude ) ) : ?>
                "geo": {
                    "@type": "GeoCoordinates",
                    "latitude": "<?php echo esc_js( $latitude ); ?>",
                    "longitude": "<?php echo esc_js( $longitude ); ?>"
                },
                <?php endif; ?>
                "description": "<?php echo esc_js( wp_strip_all_tags( $description ) ); ?>",
                "url": "<?php echo esc_url( get_permalink() ); ?>"
            },
            {
                "@type": "RealEstateAgent",
                "name": "Erica Yang",
                "url": "<?php echo esc_url( home_url( '/' ) ); ?>",
                "logo": "<?php echo esc_url( home_url( '/wp-content/uploads/logo.png' ) ); ?>",
                "image": "<?php echo esc_url( home_url( '/wp-content/uploads/erica-yang-headshot.jpg' ) ); ?>",
                "telephone": "+1-XXX-XXX-XXXX",
                "email": "erica@ericayangrealtor.com",
                "address": {
                    "@type": "PostalAddress",
                    "addressLocality": "Boston",
                    "addressRegion": "MA",
                    "addressCountry": "US"
                },
                "areaServed": [
                    "Cambridge, MA",
                    "Lexington, MA",
                    "Waltham, MA",
                    "Arlington, MA",
                    "Framingham, MA"
                ],
                "priceRange": "$$-$$$$"
            },
            {
                "@type": "BreadcrumbList",
                "itemListElement": [
                    {
                        "@type": "ListItem",
                        "position": 1,
                        "name": "Home",
                        "item": "<?php echo esc_url( home_url( '/' ) ); ?>"
                    },
                    {
                        "@type": "ListItem",
                        "position": 2,
                        "name": "Neighborhoods",
                        "item": "<?php echo esc_url( home_url( '/neighborhoods/' ) ); ?>"
                    },
                    {
                        "@type": "ListItem",
                        "position": 3,
                        "name": "<?php echo esc_js( $neighborhood_name ); ?>",
                        "item": "<?php echo esc_url( get_permalink() ); ?>"
                    }
                ]
            }
        ]
    }
    </script>
    <?php
}
?>

<?php get_footer(); ?>
