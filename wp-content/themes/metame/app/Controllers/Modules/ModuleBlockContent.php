<?php

namespace App\Controllers\Modules;

use App\Controllers\App;
use App\Controllers\NewsInsights;

/**
 * Trait ModuleTestimonials
 * @package App\Controllers\Modules
 */

trait ModuleBlockContent
{
    /**
     * Class config
    */
    public static $postsPerPage     = 3;
    public static $showPagination   = false;

    // Block settings
    public static $blockType      = 'query-content';
    public static $postCategory   = 0;
    public static $viewType       = 'list';
    public static $postTitle      = true;
    public static $postDate       = true;
    public static $postExcerpt    = true;
    public static $postImage      = true;


    // Post type variables
    public static $postTypeQuery = 'post';

    /**
     * ACF fields
     */
    public static $acfQueryCategory     = 'category';
    public static $acfQueryPostCount    = 'posts_per_page';
    public static $acfQueryPagination   = 'show_pagination';
    public static $acfQueryViewType     = 'view_type';
    public static $acfQueryShowTitle    = 'show_post_title';
    public static $acfQueryShowDate     = 'show_post_date';
    public static $acfQueryShowExcerpt  = 'show_post_excerpt';
    public static $acfQueryShowImage    = 'show_post_featured_image';

    /**
     * Setup trait
     */
    public static function traitSetup()
    {
        add_action( 'acf/init', [ static::class, 'gutenbergBlockInit' ] );
    }

    public static function gutenbergBlockInit()
    {
        // Check function exists.
        if( function_exists('acf_register_block_type') ) {

            // Register a testimonial block.
            acf_register_block_type( array(
                'name'              => static::$blockType,
                'title'             => __( 'Query Content' ),
                'description'       => __( 'Show block with posts of custom query options' ),
                'keywords'          => array( 'query', 'content', 'custom' ),
                'icon'              => '<svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="th-large" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-th-large fa-w-16 fa-2x"><path fill="currentColor" d="M296 32h192c13.255 0 24 10.745 24 24v160c0 13.255-10.745 24-24 24H296c-13.255 0-24-10.745-24-24V56c0-13.255 10.745-24 24-24zm-80 0H24C10.745 32 0 42.745 0 56v160c0 13.255 10.745 24 24 24h192c13.255 0 24-10.745 24-24V56c0-13.255-10.745-24-24-24zM0 296v160c0 13.255 10.745 24 24 24h192c13.255 0 24-10.745 24-24V296c0-13.255-10.745-24-24-24H24c-13.255 0-24 10.745-24 24zm296 184h192c13.255 0 24-10.745 24-24V296c0-13.255-10.745-24-24-24H296c-13.255 0-24 10.745-24 24v160c0 13.255 10.745 24 24 24z" class=""></path></svg>',
                'align'             => 'full',
                'render_callback'   => [ static::class, 'renderBlock' ],
                'category'          => 'common',
                //'enqueue_script'    => get_stylesheet_directory_uri() . '/assets/scripts/blocks/random-testimonial.js',
                'supports'          => array(
                    'align'             => array( 'left', 'center', 'wide', 'full' ),
                    'align_content'     => true,
                    'full_height'       => true,
                    'mode'              => false,
                    'multiple'          => true,
                ),
            ) );
        }
    }

    public static function setConfig()
    {
        $postCategory   = get_field( static::$acfQueryCategory );
        $postCount      = get_field( static::$acfQueryPostCount );
        $postPagination = get_field( static::$acfQueryPagination );
        $viewType       = get_field( static::$acfQueryViewType );
        $postTitle      = get_field( static::$acfQueryShowTitle );
        $postDate       = get_field( static::$acfQueryShowDate );
        $postExcerpt    = get_field( static::$acfQueryShowExcerpt );
        $postImage      = get_field( static::$acfQueryShowImage );

        if ( $postCount > 0 ) {
            static::$postsPerPage = $postCount;
        }

        static::$showPagination = $postPagination;
        static::$postCategory   = $postCategory;
        static::$viewType       = $viewType;
        static::$postTitle      = $postTitle;
        static::$postDate       = $postDate;
        static::$postExcerpt    = $postExcerpt;
        static::$postImage      = $postImage;
    }

    public static function renderBlock( $block, $content = '', $is_preview = false, $post_id = 0 )
    {
        static::setConfig();

        $news = NewsInsights::posts( static::$postsPerPage, static::$postCategory );
        // Create id attribute allowing for custom "anchor" value.
        $id = 'query-content-' . $block[ 'id' ];
        if( !empty( $block[ 'anchor' ] ) ) {
            $id = $block[ 'anchor' ];
        }

        // Create class attribute allowing for custom "className" and "align" values.
        $className = 'query-content';
        if( !empty( $block[ 'className' ] ) ) {
            $className .= ' ' . $block['className'];
        }
        if( !empty($block['align']) ) {
            $className .= ' align' . $block[ 'align' ];
        }
        ?>
        <div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
            <div class="block-inner">
                <?php if ( $news ) : ?>
                    <div class="list view-type-<?= static::$viewType ?>">
                        <?php foreach( $news as $post ) : ?>
                            <div class="post-item">
                                <?php if ( static::$postImage ) : ?>
                                    <div class="featured-image">
                                        <a href="<?= $post[ 'url' ] ?>">
                                            <?= App::getFeaturedImage( $post[ 'id' ], $post[ 'title' ] ) ?>
                                        </a>
                                    </div>
                                <?php endif; ?>
                                <?php if ( static::$postTitle ) : ?>
                                    <div class="post-title">
                                        <a href="<?= $post[ 'url' ] ?>">
                                            <?= $post[ 'title' ] ?>
                                        </a>
                                    </div>
                                <?php endif; ?>
                                <?php if ( static::$postDate ) : ?>
                                    <div class="post-date">
                                        <?= $post[ 'date' ] ?>
                                    </div>
                                <?php endif; ?>
                                <?php if ( static::$postExcerpt ) : ?>
                                    <div class="post-desc">
                                        <?= $post[ 'excerpt' ] ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php else : ?>
                    <div class="no-posts-found">Posts not found!</div>
                <?php endif; ?>
                <?php if ( static::$showPagination ) : ?>
                    <?php App::dc_pagination( NewsInsights::$instance, ( static::$postCategory ? static::$postCategory : 0 ) ) ?>
                <?php endif; ?>
            </div>
        </div>
        <?php
    }



    public static function getRandomTestimonial ()
    {
        $args = array(
            'posts_per_page'        => static::$countTM,
            'meta_query'            => array(
                'relation'              => 'AND',
                array(
                    'key'       => static::$acfTestimonialAuthor,
                    'compare'   => 'EXISTS',
                ),
                array(
                    'key'       => static::$acfTestimonialText,
                    'compare'   => 'EXISTS'
                ),
            ),
            'post_type'             => static::$postType,
            'post_status'           => 'publish',
            'suppress_filters'      => true,
            'ignore_sticky_posts'   => true,
            'orderby'               => static::$getRandomTM ? 'rand' : 'date',
            'order'                 => 'DESC'
        );

        $posts = new \WP_Query( $args );

        $result = array();
        if ( $posts->post ) {
            $post = $posts->post;

            $result = array(
                'id'        => $post->ID,
                'author'    => get_field( static::$acfTestimonialAuthor, $post->ID ),
                'text'      =>  strip_tags( get_field( static::$acfTestimonialText, $post->ID ) ),
            );
        }

        return $result;
    }

    public static function testimonialAjaxData ()
    {
        echo json_encode( static::getRandomTestimonial() );
        wp_die( '', '', ['response' => 200] );
    }
}
