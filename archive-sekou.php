<?php get_header(); ?>

  <!--コンテンツ囲みここから -->
  <div id="contents_wrap" class="clearfix">

    <!--メインコンテンツここから -->
    <div id="main_contents">

    	<div class="contents_box png">
        <div class="wrap2 png">
          <div class="box2 png">
            <h2><img src="<?php bloginfo( 'template_url' ); ?>/case/img/ttl.jpg" alt="施工事例" /></h2>
          </div>
        </div>
      </div>

      <div class="contents_box png">
        <div class="wrap2 png">
          <div class="box3 png">

            <div id="case_list_top" class="clearfix">

<p id="seko_count"><?php echo gr_get_posts_count(); ?>件</p>
<div class="mar_b_30">　</div>

<div class="listBox01">
<ul class="Outer heightLineParent clearfix">

		<?php query_posts( $query_string.'&showposts=30' ); ?>
                        <?php if( have_posts() ): ?>
	                        	<?php while( have_posts() ): the_post(); ?>

<li>

<div class="post_thumbnail">



<?
if(post_custom('スタンプ')=="施工中"){echo '<span class="stamp"><img src="/wp/wp-content/themes/protimes/common/img/stamp_chu.png" alt="施工中" /></span>';}
if(post_custom('スタンプ')=="施工前"){echo '<span class="stamp"><img src="/wp/wp-content/themes/protimes/common/img/stamp_mae.png" alt="施工前" /></span>';}
?>
<a href="<?php the_permalink(); ?>" class="opacity"><?php $img_alt_title = array( 'alt' => the_title( '施工事例：', '', '0' ), 'title' => the_title( '施工事例：', '', '0' ), 'class' => 'attachment-medium' ); echo wp_get_attachment_image( post_custom( '施工後写真' ), 'top_case_thumbnail', '0', $img_alt_title); ?></a>
<?php
global $post;
$newIconhyouji = get_post_meta($post->ID,'NEWアイコン');
?>
<?php if(in_array("NEW",$newIconhyouji)):?><span class="icon_obi"><img src="/wp/wp-content/themes/protimes/common/img/main/icon_new_obi.png" alt="NEW" /></span><?php endif;?>

<div class="seko_icon_hyoji">
<?php
global $post;
$Iconhyouji = get_post_meta($post->ID,'アイコン');
?>
<?php if(in_array("HPからのお問い合わせ",$Iconhyouji)):?><img src="/wp/wp-content/themes/protimes/common/img/icon_hp.gif" alt="HPからのお問い合わせ" /><?php endif;?>
<?php if(in_array("お客様からのご紹介",$Iconhyouji)):?><img src="/wp/wp-content/themes/protimes/common/img/icon_shokai.gif" alt="お客様からのご紹介" /><?php endif;?>
<?php if(in_array("インタビューあり",$Iconhyouji)):?><img src="/wp/wp-content/themes/protimes/common/img/icon_interview.gif" alt="インタビューあり" /><?php endif;?>
<?php if(in_array("相談会より",$Iconhyouji)):?><img src="/wp/wp-content/themes/protimes/common/img/icon_seminar.gif" alt="塗り替えセミナーより" /><?php endif;?>
<?php if(in_array("塗り替えセミナーより",$Iconhyouji)):?><img src="/wp/wp-content/themes/protimes/common/img/icon_seminar.gif" alt="塗り替えセミナーより" /><?php endif;?>
<?php if(in_array("現場を見てのお問い合わせ",$Iconhyouji)):?><img src="/wp/wp-content/themes/protimes/common/img/icon_genba.gif" alt="現場を見てのお問い合わせ" /><?php endif;?>
</div>
</div>


<div class="post_ttl_wrap">
<p class="post_ttl"><a href="<?php the_permalink(); ?>"><?php the_time( 'Y/m/d' ); ?><br /><?php if(post_custom('トップ用タイトル')){echo nl2br(post_custom('トップ用タイトル'));}
else { echo the_title();}?></a></p>
</div>


</li>
             <?php endwhile; ?>

<?php else: ?>
<li class="not_post">施工事例の登録がありません。</li>
<?php endif; ?>
</ul>
</div>
</div>

                    <div class="page_nav">
                        <div class="tablenav"><?php global $wp_rewrite;
            $paginate_base = get_pagenum_link(1);
            if (strpos($paginate_base, '?') || ! $wp_rewrite->using_permalinks()) {
                $paginate_format = '';
                $paginate_base = add_query_arg('paged', '%#%');
            } else {
                $paginate_format = (substr($paginate_base, -1 ,1) == '/' ? '' : '/') .
                user_trailingslashit('page/%#%/', 'paged');;
                $paginate_base .= '%_%';
            }
            echo paginate_links( array(
                'base' => $paginate_base,
                'format' => $paginate_format,
                'total' => $wp_query->max_num_pages,
                'mid_size' => 5,
                'current' => ($paged ? $paged : 1),
            )); ?></div>
                       </div>

            <?php get_kaiyu(); ?>
          </div>
        </div>
      </div>

    <?php get_kaiyutoiawase(); ?>
    </div>
    <!--メインコンテンツここまで -->

    <?php get_sidebar(); ?>

  </div>
  <!--コンテンツ囲みここまで -->

<?php get_footer(); ?>
