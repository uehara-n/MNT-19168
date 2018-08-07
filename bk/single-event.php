<?php get_header(); ?>

  <!--コンテンツ囲みここから -->
  <div id="contents_wrap" class="clearfix">

    <!--メインコンテンツここから -->
    <div id="main_contents">

    	<div class="contents_box png">
        <div class="wrap2 png">
          <div class="box2 png">
            <h2><img src="<?php bloginfo( 'template_url' ); ?>/event/tit.jpg" alt="イベント情報" /></h2>
          </div>
        </div>
      </div>

 			<!--customer_navi-->
			<div class="customer_navi clearfix">
				<div class="page_back_btn">
					<p class="page_back_text"><a href="<?php echo get_post_type_archive_link( 'event' ); ?>">&lt; イベント情報一覧に戻る</a></p>
				</div>
			</div>
			
			<!--customer_navi--> 
			
			<!--event_syousai_area-->
    	<div class="contents_box png">
        <div class="wrap2 png">
          <div class="box2 png">

			<div id="event_syousai_area">
				
				<!--event_content01-->
				<div id="event_content01"> 
					
					<!--event_content01_m-->
					<div id="event_content01_m">
						<h3 id="event_syousai_title01">
							<?php the_title(); ?>
						</h3>
						
						<!--event_content01_textarea01-->
						<div id="event_content01_textarea01" class="clearfix">
							<div id="event_content01_textarea01_left">
								<p>開催日：<?php echo post_custom( 'イベント日時' ); ?><br />
									開催時間：<?php echo post_custom( 'イベント時間' ); ?><br />
									<?php 
									$place1 = post_custom('イベント開催場所 1');
									$place2 = post_custom('イベント開催場所 2');
									$map1   = post_custom('イベントマップ 1');
									$map2   = post_custom('イベントマップ 2');
									if($place1){ ?>
									<strong>開催場所<?php if($place1&&$place2){echo "１";} ?>：</strong><?php echo $place1; ?>
									<?php if($map1){ ?>
									<a href="<?php echo $map1 ?>" target="_blank"><img src="/wp/wp-content/themes/protimes/event/bt_tizu_rollout.gif" width="82" height="22" alt="地図を見る" /></a>
									<? }
									if($place1&&$place2){ echo "<br />";}
									}
									if($place2){ ?>
									<strong>開催場所<?php if($place1&&$place2){echo "２";} ?>：</strong><?php echo $place2; ?>
									<?php if($map2){ ?>
									<a href="<?php echo $map2 ?>" target="_blank"><img src="/wp/wp-content/themes/protimes/event/bt_tizu_rollout.gif" width="82" height="22" alt="地図を見る" /></a>
									<? }
									 } ?></p>
							</div>
						</div>
						<!--event_content01_textarea01-->
						
						
						<ul class="event_icon_list clearfix">
						<?php 
							$my_cat_name = array( "入場無料", "無料相談", "土地相談", "ローン相談", "設計士相談", "お値打商品有" );
							if ( $my_check_cat = post_custom( 'イベントカテゴリ01' ) ) {
	
								//配列に変換(splitはPHP5.3.0から非推奨)
								$my_check_cat = explode( ",", $my_check_cat );
								foreach ( $my_cat_name as $key=>$val ) {
									if ( in_array( $val, $my_check_cat ) ) {
										$key = sprintf( "%02d", ( $key + 1 ) );
										echo '<li><img src="' . get_stylesheet_directory_uri() . '/page_image/event/event_icon' . $key .  '.gif" alt="' . $val . '" width="66" height="66" /></li>';
									}
								}
							}
							?>
                        </ul>
                        
                        <ul class="event_icon_list clearfix">
							<?php 
							$my_cat_name = array( "キッチン", "洗面台", "給湯器", "トイレ", "お風呂", "玄関ドア" );
							if ( $my_check_cat = post_custom( 'event_category02' ) ) {
		
								//配列に変換(splitはPHP5.3.0から非推奨)
								$my_check_cat = explode( ",", $my_check_cat );
								foreach ( $my_cat_name as $key=>$val ) {
									if ( in_array( $val, $my_check_cat ) ) {
										$key = sprintf( "%02d", ( $key + 7 ) );
										echo '<li><img src="' . get_stylesheet_directory_uri() . '/page_image/event/event_icon' . $key .  '.gif" alt="' . $val . '" width="66" height="66" /></li>';
									}
								}
							}
							?>
                        </ul>
						
						<p class="pic">
							<?php
           				printf( 
							'<a href="%1$s" rel="lightbox[okyakus]">%2$s</a>',
							gr_get_image_src( 'イベントメイン画像' ), 
							gr_get_image( 
								'イベントメイン画像', 
								array( 
									'size' => full,
								)
							)
						);
						?>
						
								<?php if ( post_custom('イベント画像インポート用メイン') ) : ?>

									  <a href="<?php echo get_permalink(); ?>"><img src="<?php echo site_url(); ?>/wp-content/themes/gaiheki/page_image<?php echo post_custom( 'イベント画像インポート用メイン' ); ?>" border="0"></a>
	<?php endif; ?>
						
						</p>
						
						<p>
							<?php echo post_custom('イベントメイン画像説明文') ?>
						</p>

							<?php if ( post_custom('イベント画像01')||post_custom('event_img02')||post_custom('event_img03') ) : ?>
							<div class="event_triplebox">
								<div class="box01">
									<p class="pic">
									
									 <?php							
									 $imagefield = get_imagefield('イベント画像01');
									 $attachment = get_attachment_object($imagefield['id']);
									 echo '<a href="' . $attachment['url'] . '" rel="lightbox[okyakus]"><image src="' . $attachment['url'] . '" alt="' . $attachment['title'] . '" title="' . $attachment['content'] . '" /></a>';
									 ?>
									 		<?php if ( post_custom('CSVイベント画像1') ) : ?>

									  <a href="<?php echo get_permalink(); ?>"><img src="<?php echo site_url(); ?>/wp-content/themes/gaiheki/page_image<?php echo post_custom( 'CSVイベント画像1' ); ?>" border="0"></a>
	<?php endif; ?>
									 
									</p>
									<p><?php echo post_custom('イベント画像説明文01') ?></p>
								</div>
								<?php if ( post_custom('イベント画像02') ) : ?>
								<div class="box02">
									<p class="pic">

									 <?php							
									 $imagefield = get_imagefield('イベント画像02');
									 $attachment = get_attachment_object($imagefield['id']);
									 echo '<a href="' . $attachment['url'] . '" rel="lightbox[okyakus]"><image src="' . $attachment['url'] . '" alt="' . $attachment['title'] . '" title="' . $attachment['content'] . '" /></a>';
									 ?>
									 		<?php if ( post_custom('CSVイベント画像2') ) : ?>

									  <a href="<?php echo get_permalink(); ?>"><img src="<?php echo site_url(); ?>/wp-content/themes/gaiheki/page_image<?php echo post_custom( 'CSVイベント画像2' ); ?>" border="0"></a>
	<?php endif; ?>
									 
</p>
									<p><?php echo post_custom('イベント画像説明文02') ?></p>
								</div>
								<?php endif ?>
								<?php if ( post_custom('イベント画像03') ) : ?>
								<div class="box03">
									<p class="pic">

									 <?php							
									 $imagefield = get_imagefield('イベント画像03');
									 $attachment = get_attachment_object($imagefield['id']);
									 echo '<a href="' . $attachment['url'] . '" rel="lightbox[okyakus]"><image src="' . $attachment['url'] . '" alt="' . $attachment['title'] . '" title="' . $attachment['content'] . '" /></a>';
									 ?>		<?php if ( post_custom('CSVイベント画像3') ) : ?>

									  <a href="<?php echo get_permalink(); ?>"><img src="<?php echo site_url(); ?>/wp-content/themes/gaiheki/page_image<?php echo post_custom( 'CSVイベント画像3' ); ?>" border="0"></a>
	<?php endif; ?>
</p>
									<p><?php echo post_custom('イベント画像説明文03') ?></p>
								</div>
								<?php endif ?>
							</div>
							<?php endif ?>



							<?php if ( post_custom('イベント画像04')||post_custom('イベント画像05')||post_custom('イベント画像06') ) : ?>
							<div class="event_triplebox">
								<div class="box01">
									<p class="pic">
									
									 <?php							
									 $imagefield = get_imagefield('イベント画像04');
									 $attachment = get_attachment_object($imagefield['id']);
									 echo '<a href="' . $attachment['url'] . '" rel="lightbox[okyakus]"><image src="' . $attachment['url'] . '" alt="' . $attachment['title'] . '" title="' . $attachment['content'] . '" /></a>';
									 ?>
									 		<?php if ( post_custom('CSVイベント画像4') ) : ?>

									  <a href="<?php echo get_permalink(); ?>"><img src="<?php echo site_url(); ?>/wp-content/themes/gaiheki/page_image<?php echo post_custom( 'CSVイベント画像4' ); ?>" border="0"></a>
	<?php endif; ?>
									 
									</p>
									<p><?php echo post_custom('イベント画像説明文04') ?></p>
								</div>
								<?php if ( post_custom('イベント画像05') ) : ?>
								<div class="box02">
									<p class="pic">

									 <?php							
									 $imagefield = get_imagefield('イベント画像05');
									 $attachment = get_attachment_object($imagefield['id']);
									 echo '<a href="' . $attachment['url'] . '" rel="lightbox[okyakus]"><image src="' . $attachment['url'] . '" alt="' . $attachment['title'] . '" title="' . $attachment['content'] . '" /></a>';
									 ?>
									 		<?php if ( post_custom('CSVイベント画像5') ) : ?>

									  <a href="<?php echo get_permalink(); ?>"><img src="<?php echo site_url(); ?>/wp-content/themes/gaiheki/page_image<?php echo post_custom( 'CSVイベント画像5' ); ?>" border="0"></a>
	<?php endif; ?>
									 
</p>
									<p><?php echo post_custom('CSVイベント画像5') ?></p>
								</div>
								<?php endif ?>
								<?php if ( post_custom('イベント画像06') ) : ?>
								<div class="box03">
									<p class="pic">

									 <?php							
									 $imagefield = get_imagefield('イベント画像06');
									 $attachment = get_attachment_object($imagefield['id']);
									 echo '<a href="' . $attachment['url'] . '" rel="lightbox[okyakus]"><image src="' . $attachment['url'] . '" alt="' . $attachment['title'] . '" title="' . $attachment['content'] . '" /></a>';
									 ?>		<?php if ( post_custom('CSVイベント画像6') ) : ?>

									  <a href="<?php echo get_permalink(); ?>"><img src="<?php echo site_url(); ?>/wp-content/themes/gaiheki/page_image<?php echo post_custom( 'CSVイベント画像6' ); ?>" border="0"></a>
	<?php endif; ?>
</p>
									<p><?php echo post_custom('イベント画像説明文06') ?></p>
								</div>
								<?php endif ?>
							</div>
							<?php endif ?>

						
						<?php if ( post_custom('イベント概要') ) : ?>
						<h4><img src="<?php echo get_stylesheet_directory_uri(); ?>/event/event_syousai_title01.gif" alt="イベント概要" width="669" height="67" /></h4>
						<div id="event_content01_textarea02" class="clearfix">
							<p><?php echo nl2br(post_custom( 'イベント概要' )); ?></p>
						</div>
						<?php endif ?>
						<?php if ( post_custom('詳細情報') ) : ?>
						<h4><img src="<?php echo get_stylesheet_directory_uri(); ?>/event/event_syousai_title02.gif" alt="詳細情報" width="669" height="64" /></h4>
						<div id="event_content01_textarea03" class="clearfix">
<!--							<dl class="event_content01_textarea03_img">
								<dt> </dt>
								<dd></dd>
							</dl>
-->							<dl class="event_content01_textarea03_txt">
								<dt> </dt>
								<dd><?php echo post_custom( '詳細情報' ); ?></dd>
							</dl>
<!--							<dl class="event_content01_textarea03_img">
								<dt> </dt>
								<dd></dd>
							</dl>
-->						</div>
						<?php endif ?>
					</div>
					<!--event_content01_m--> 
					
				</div>
				<!--event_content01-->
				
				
				<!--event_content02-->
				<?php if ( post_custom('イベント報告') ) : ?>
				<div id="event_content02">
					<div id="event_content02_m">
						<h4><img src="<?php echo get_stylesheet_directory_uri(); ?>/page_image/event/event_syousai_title03.gif" alt="イベント報告" width="669" height="54" /></h4>
						<div id="event_content02_textarea01" class="clearfix"> <?php echo post_custom( 'イベント報告' ); ?> </div>
					</div>
				</div>
				<?php endif ?>
				<!--event_content02--> 
				
			</div>
			<!--event_syousai_area-->

			<!--customer_navi-->
			<div class="customer_navi clearfix">
				<div class="page_back_btn">
					<p class="page_back_text"><a href="<?php echo get_post_type_archive_link( 'event' ); ?>">&lt; イベント情報一覧に戻る</a></p>
				</div>
			</div>
			<!--customer_navi-->


<?php get_kaiyu(); ?>
</div>
</div>
</div>
			

            
		<br style="clear:both;" />
    <?php get_kaiyutoiawase(); ?>
</div>

    <?php get_sidebar(); ?>

  </div>
  <!--コンテンツ囲みここまで -->

<?php get_footer(); ?>