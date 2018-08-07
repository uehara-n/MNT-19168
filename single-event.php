<?php get_header(); ?>

<!--コンテンツ囲みここから -->
<div id="contents_wrap" class="clearfix">

    <!--メインコンテンツここから -->
    <div id="contents">
    	<div class="pankuzu"><?php if(function_exists('bcn_display')){ bcn_display();}?></div>
        <div id="page_contents">
        	<section>
    			<h1 id="page_ttl"><?php the_title_attribute(); ?></h1>
                <div id="blog_container">
                    	<?php if( have_posts() ): ?>
                        <?php while( have_posts() ): the_post(); ?>
                        <div class="inner post_list">
                        <article>
                        	<section>
                        	<div class="post_container">
                            	<header>
                                	<div class="post_header clearfix">
                                    	<div class="post_author_thumbnail"><?php echo get_avatar(get_the_author_id(), 90); ?></div>
                                        <div class="post_data">
                                        	<h1 class="post_title"><?php the_title_attribute(); ?></h1>
                                            <div class="post_date mar_r_10"><time datetime="<?php the_time( 'Y-m-d' ); ?>"><?php the_time( 'Y年m月d日(D)' ); ?></time></div>
                                            <div class="post_author mar_r_10">著者：<?php the_author_posts_link(); ?></div>
                                            <div class="post_category">カテゴリー：<?php the_category( ', ' ); ?></div>
                                        </div>
                                    </div>
                                    <div class="post_detail clearfix">
                                    	<?php the_content(); ?>
                                    </div>
                                        <?php comments_template(); ?>
                                </header>
                            </div>
                            </section>
                        </article>
                         </div>
                        <?php endwhile; endif; ?>
                </div>
                <div id="paging">
                    <div class="previous"><?php previous_post_link( '%link', '前の記事', false ); ?></div>
                    <div class="next"><?php next_post_link( '%link', '次の記事', false ); ?></div>
                    <a href="<?php bloginfo('home'); ?>/blog/" class="return">ブログ一覧へ</a>
                </div>
            </section>
        </div>
    </div>
    <!--メインコンテンツここまで -->

<?php get_sidebar(); ?>

</div>
<!--コンテンツ囲みここまで -->

<?php $file_name = TEMPLATEPATH.'/bn_contact.php'; if( file_exists( $file_name ) ){ include( $file_name ); } ?>

<?php get_footer(); ?>