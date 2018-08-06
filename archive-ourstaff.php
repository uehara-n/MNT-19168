<?php get_header(); ?>

  <!--コンテンツ囲みここから -->
  <div id="contents_wrap" class="clearfix">

	<!--メインコンテンツここから -->
	<div id="main_contents">

		<!-- スタッフ一覧 -->
		<div id="staffEnt" class="mainBox png">
			<div class="boxHead png">
				<div class="boxBody png">
					<div class="ttlArea"><h2>スタッフ紹介</h2></div>

<div align="center">
<iframe width="560" height="315" src="https://www.youtube.com/embed/FDQ9IYFtMps" frameborder="0" allowfullscreen></iframe></div>
<br />
<br />
					<div class="Inner01">

						<?php if ( have_posts() ) : ?>
						<div class="listWrap">

							<?php
							$args = array(
							'parent'       => 0,
							'hierarchical' => 0,
							'orderby'      => 'order', // Category Order and Taxonomy Terms Order を使用
							'order'        => 'ASC'
							);
								$taxonomy_name = 'ourstaff-cat';
								$taxonomys = get_terms($taxonomy_name,$args);
								if(!is_wp_error($taxonomys) && count($taxonomys)):
									foreach($taxonomys as $taxonomy):
									$url = get_term_link($taxonomy->slug, $taxonomy_name);
									$tax_posts = get_posts(array(
													'post_type' => get_post_type(),
													'posts_per_page' => -1, // 表示させたい記事数
													'order' => 'modified',
													'tax_query' => array(
														array(
															'taxonomy'=>'ourstaff-cat',
															'terms'=>array( $taxonomy->slug ),
															'field'=>'slug',
															'include_children'=>true,
															'operator'=>'IN'
															),
														'relation' => 'AND'
														)
													));
								if($tax_posts):
							?>

							<div class="listBox01">
								<h3 class="mTtl"><?php echo esc_html($taxonomy->name); ?></h3>
								<ul class="Outer heightLineParent clearfix">

									<?php foreach($tax_posts as $tax_post): ?>
									<li>
										<div class="thm">

											<?php if(get_post_meta($tax_post->ID, 'プロフィール写真', true)): ?>
											<a href="<?php echo get_permalink($tax_post->ID); ?>" class="opacity"><?php echo wp_get_attachment_image(get_post_meta($tax_post->ID, 'プロフィール写真', true),'list_thumbnail'); ?></a>
											<?php else : ?>
											<a href="<?php echo get_permalink($tax_post->ID); ?>" class="opacity"><img src="<?php bloginfo('template_url'); ?>/common/img/main/ourstaff_dthm.gif" width="148" height="185" alt="Now Printing..." /></a>
											<?php endif; ?>

										</div>
										<p class="txt"><a href="<?php echo get_permalink($tax_post->ID); ?>"><strong class="name"><?php echo get_the_title($tax_post->ID); ?></strong><?php if(get_post_meta($tax_post->ID, '役職／部署／担当', true)): ?><br /><?php echo get_post_meta($tax_post->ID,'役職／部署／担当',true); ?><?php endif; ?></a></p>
									</li>
									<?php endforeach; ?>

								</ul>
							</div>

							<?php
									endif;
							endforeach;
							endif;
							?>

						</div>

						<?php else: ?>

						<div align="center" style="padding: 40px 0px; ">申し訳ございません。現在スタッフは登録されておりません。</div>

						<?php endif; ?>

					</div>
          <?php get_kaiyu(); ?>

				</div>
			</div>
		</div>

		<!-- モデルケース -->
		<!--
		<div id="partsCase" class="png">
			<div class="boxHead png"><img src="common/img/main/partscase_head.png" width="720" height="125" alt="外壁塗装モデルケース「あなたのお住まいはいくらかかる？」" /></div>
			<div class="boxBody png">
				<ul class="clearfix">
					<li><a href="#"><img src="common/img/main/partscase_btn01.png" width="218" height="154" alt="モデルケース01" class="imgover" /></a></li>
					<li><a href="#"><img src="common/img/main/partscase_btn02.png" width="218" height="154" alt="モデルケース02" class="imgover" /></a></li>
					<li><a href="#"><img src="common/img/main/partscase_btn03.png" width="218" height="154" alt="モデルケース03" class="imgover" /></a></li>
				</ul>
				<p>
					私たちプロタイムズ岐阜関店（三輪塗装）では、お客さまのご要望に合わせ、<strong>5種のお見積り</strong>をご用意しております。
					施工の際はお客さまと一緒に協議し最適なプランをお選びいただけます。まずは当サイトにてあなたのお住まいがどのプランに当てはまるか事前にご参照ください。<br />
					ご不明な点はお気軽にご相談ください。（<a href="http://www.protimes.jp/fc/form/gifuseki/" onclick="_gaq.push(['_link', this.href]); return false;">⇒お問い合わせはこちらから</a>）
				</p>
			</div>
		</div>
		 -->
  <?php get_kaiyutoiawase(); ?>
	</div>
	<!--メインコンテンツここまで -->

    <?php get_sidebar(); ?>

  </div>
  <!--コンテンツ囲みここまで -->

<?php get_footer(); ?>
