<?php
/**
 * @package Bororó 25
 */
?>

<?php
    global $page_;
?>
<?php
    $numItens = 6;
    $numItensFrom = ( $numItens * $GLOBALS['page_'] ) - $numItens;

    $params = array(
        'post_type' => 'post',
        'posts_per_page' => $numItens,
        'offset' => $numItensFrom
    );

    $postItens = get_posts( $params );
    $size = sizeof( $postItens );
?>

<?php if ( $GLOBALS['page_'] == 1 ) : ?>

    <?php get_template_part( 'module', 'nav' ) ?>

    <?php get_template_part( 'module', 'top' ) ?>

<?php endif ?>

<section class="section-internal-content">
    <div class="box-tabs">
        <div class="box-tab-content">
            <div class="tab-content">
                <div class="tab-pane active">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12">
                                <h3 class="title">BLOG BORORÓ25</h3>
                            </div>
                        </div>
                        <div class="row">
                            <?php if ( sizeof( $postItens ) ) : ?>
                                <div class="box-posts ajax-container">
                                <?php
                                    foreach ( $postItens as $postItem ) :
                                        $postTitulo = apply_filters( 'the_title', $postItem->post_title );
                                        $postContent = apply_filters( 'the_content', $postItem->post_content );
                                        $postImagem = wp_get_attachment_image_src( get_post_thumbnail_id($postItem->ID ), '300x300');
                                        $postLink   = get_the_permalink( $postItem->ID);
                                        $postDate   = get_the_time('d.m.Y | H\hi', $postItem->ID);
                                        //$postDate   = get_the_time('d/m/Y', $postItem->ID);get_the_date(  )
                                    ?>
                                    <div class="col-xs-4 ajax-item">
                                        <article class="article article-d article-regular">
                                            <div class="row">
                                                <?php if ( ! empty( $postImagem ) ): ?>
                                                <div class="col-xs-12">
                                                    <div class="box-photo-detail">
                                                        <div class="box-image" <?php if ( ! empty( $postImagem ) ) echo 'style="background-image:url('. $postImagem[0] .')"' ?>>
                                                            <a href="<?php echo $postLink ?>" title="<?php echo $postTitulo ?>"><?php echo $postTitulo ?></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php endif ?>
                                                <div class="col-xs-12">
                                                    <div class="box-content">
                                                        <h3 class="title title-a"><a href="<?php echo $postLink ?>"><?php echo $postTitulo ?></a></h3>  
                                                        <div class="post-meta">
                                                            <div class="post-date"><?php echo $postDate; ?></div>
                                                        </div>
                                                        <p class="text">
                                                            <?php echo frontend_get_the_excerpt_by_id( $postItem->ID, 20 ) ?>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </article>
                                    </div>
                                <?php endforeach ?>
                                </div>
                            <?php endif ?>
                        </div>
                        <div class="row navigation hidden">
                            <?php frontend_paging_nav() ?>
                        </div>
                        <?php if ( $GLOBALS['page_'] == 1 ) : ?>
                            <div class="row pagination pagination-container centered">
                                <div class="col-xs-12">
                                    <button class="btn-see-more"><i class="fa fa-plus"></i><span>VER MAIS</span></button>
                                </div>
                            </div>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>