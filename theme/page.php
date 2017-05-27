<?php
/*
Template Name: Page Template
*/
?>

<?php get_header(); ?>
<div id="container">
	<div id="slide_area">
		<?php get_sidebar(); ?>
		<div id="content_wrap">
			<section id="content" role="main">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<!--<header class="header">
						<h1 class="entry_title"><?php the_title(); ?></h1> <?php edit_post_link(); ?>
					</header>-->
						<section class="entry-content">
							<?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
							<?php the_content(); ?>
							<div class="entry-links"><?php wp_link_pages(); ?></div>
						</section>
					</article>
				<?php endwhile; ?>
				<?php endif; ?>
			</section>
		</div>
		<?php get_sidebar( 'second' ); ?>
	</div>
	<!-- industry insight -->
	<section id="industry_insight">
		<div id="industry_insight_content_wrap">
			<div id="mentor-videos">
				<h3>VIDEO</h3>
				<div class="carousel slide" data-ride="carousel" data-type="multi" id="mentor-videos-carousel">
						<div class="carousel-inner" role="listbox">
							<div class="item active">
								<div class="col-md-offset-1 col-md-2"><a href="#"><img
											src="https://i.ytimg.com/vi/LzE45Wfd5zo/maxresdefault.jpg" class="img-responsive">
										<span>전문가1 게임프로그래머</span></a>
								</div>
								<div class="col-md-2"><a href="#"><img
											src="https://i.ytimg.com/vi/LzE45Wfd5zo/maxresdefault.jpg" class="img-responsive">
										<span>전문가1 게임프로그래머</span></a>
								</div>
								<div class="col-md-2"><a href="#"><img
											src="https://i.ytimg.com/vi/LzE45Wfd5zo/maxresdefault.jpg" class="img-responsive">
										<span>전문가1 게임프로그래머</span></a>
								</div>
								<div class="col-md-offset-right-1 col-md-2"><a href="#"><img
											src="https://i.ytimg.com/vi/LzE45Wfd5zo/maxresdefault.jpg" class="img-responsive">
										<span>전문가1 게임프로그래머</span></a>
								</div>
							</div>
							<div class="item">
								<div class="col-md-offset-1 col-md-2"><a href="#"><img
											src="https://i.ytimg.com/vi/LzE45Wfd5zo/maxresdefault.jpg" class="img-responsive">
										<span>전문가1 게임프로그래머</span></a>
								</div>
								<div class="col-md-2"><a href="#"><img
											src="https://i.ytimg.com/vi/LzE45Wfd5zo/maxresdefault.jpg" class="img-responsive">
										<span>전문가1 게임프로그래머</span></a>
								</div>
								<div class="col-md-2"><a href="#"><img
											src="https://i.ytimg.com/vi/LzE45Wfd5zo/maxresdefault.jpg" class="img-responsive">
										<span>전문가1 게임프로그래머</span></a>
								</div>
								<div class="col-md-offset-right-1 col-md-2"><a href="#"><img
											src="https://i.ytimg.com/vi/LzE45Wfd5zo/maxresdefault.jpg" class="img-responsive">
										<span>전문가1 게임프로그래머</span></a>
								</div>
							</div>
							<div class="item">
								<div class="col-md-offset-1 col-md-2"><a href="#"><img
											src="https://i.ytimg.com/vi/LzE45Wfd5zo/maxresdefault.jpg" class="img-responsive">
										<span>전문가1 게임프로그래머</span></a>
								</div>
								<div class="col-md-2"><a href="#"><img
											src="https://i.ytimg.com/vi/LzE45Wfd5zo/maxresdefault.jpg" class="img-responsive">
										<span>전문가1 게임프로그래머</span></a>
								</div>
								<div class="col-md-2"><a href="#"><img
											src="https://i.ytimg.com/vi/LzE45Wfd5zo/maxresdefault.jpg" class="img-responsive">
										<span>전문가1 게임프로그래머</span></a>
								</div>
								<div class="col-md-offset-right-1 col-md-2"><a href="#"><img
											src="https://i.ytimg.com/vi/LzE45Wfd5zo/maxresdefault.jpg" class="img-responsive">
										<span>전문가1 게임프로그래머</span></a>
								</div>
							</div>
						</div>
						<a class="left carousel-control" role="button" data-target="#mentor-videos-carousel" data-slide="prev"><i
								class="glyphicon glyphicon-chevron-left"></i></a>
						<a class="right carousel-control" role="button" data-target="#mentor-videos-carousel" data-slide="next"><i
								class="glyphicon glyphicon-chevron-right"></i></a>
				</div>
			</div>
			<hr>
			<div id="industry-list">
				<h3>INDUSTRY LIST</h3>
				<div id="industry-list-inner">
					<div class="item"><a href="#"><img
								src="<?php echo get_stylesheet_directory_uri(); ?>/images/Resource/Industry_IMG/nexon_logo.png" class="img-responsive"></a>
					</div>
					<div class="item"><a href="#"><img
								src="<?php echo get_stylesheet_directory_uri(); ?>/images/Resource/Industry_IMG/neowiz_logo.jpg" class="img-responsive"></a>
					</div>
					<div class="item"><a href="#"><img
								src="<?php echo get_stylesheet_directory_uri(); ?>/images/Resource/Industry_IMG/nhn_logo.jpg" class="img-responsive"></a>
					</div>
					<div class="item"><a href="#"><img
								src="<?php echo get_stylesheet_directory_uri(); ?>/images/Resource/Industry_IMG/ncsoft_logo.png" class="img-responsive"></a>
					</div>
					<div class="item"><a href="#"><img
								src="<?php echo get_stylesheet_directory_uri(); ?>/images/Resource/Industry_IMG/neowiz_logo.jpg" class="img-responsive"></a>
					</div>
					<div class="item"><a href="#"><img
								src="<?php echo get_stylesheet_directory_uri(); ?>/images/Resource/Industry_IMG/nhn_logo.jpg" class="img-responsive"></a>
					</div>
					<div class="item"><a href="#"><img
								src="<?php echo get_stylesheet_directory_uri(); ?>/images/Resource/Industry_IMG/ncsoft_logo.png" class="img-responsive"></a>
					</div>
					<div class="item"><a href="#"><img
								src="<?php echo get_stylesheet_directory_uri(); ?>/images/Resource/Industry_IMG/neowiz_logo.jpg" class="img-responsive"></a>
					</div>
					<div class="item"><a href="#"><img
								src="<?php echo get_stylesheet_directory_uri(); ?>/images/Resource/Industry_IMG/nhn_logo.jpg" class="img-responsive"></a>
					</div>
					<div class="item"><a href="#"><img
								src="<?php echo get_stylesheet_directory_uri(); ?>/images/Resource/Industry_IMG/nexon_logo.png" class="img-responsive"></a>
					</div>
					<div class="item"><a href="#"><img
								src="<?php echo get_stylesheet_directory_uri(); ?>/images/Resource/Industry_IMG/ncsoft_logo.png" class="img-responsive"></a>
					</div>
					<div class="item"><a href="#"><img
								src="<?php echo get_stylesheet_directory_uri(); ?>/images/Resource/Industry_IMG/neowiz_logo.jpg" class="img-responsive"></a>
					</div>
					<div class="item"><a href="#"><img
								src="<?php echo get_stylesheet_directory_uri(); ?>/images/Resource/Industry_IMG/nhn_logo.jpg" class="img-responsive"></a>
					</div>
					<div class="item"><a href="#"><img
								src="<?php echo get_stylesheet_directory_uri(); ?>/images/Resource/Industry_IMG/ncsoft_logo.png" class="img-responsive"></a>
					</div>
					<div class="item"><a href="#"><img
								src="<?php echo get_stylesheet_directory_uri(); ?>/images/Resource/Industry_IMG/neowiz_logo.jpg" class="img-responsive"></a>
					</div>
					<div class="item"><a href="#"><img
								src="<?php echo get_stylesheet_directory_uri(); ?>/images/Resource/Industry_IMG/nhn_logo.jpg" class="img-responsive"></a>
					</div>
					<div class="item"><a href="#"><img
								src="<?php echo get_stylesheet_directory_uri(); ?>/images/Resource/Industry_IMG/ncsoft_logo.png" class="img-responsive"></a>
					</div>
					<div class="item"><a href="#"><img
								src="<?php echo get_stylesheet_directory_uri(); ?>/images/Resource/Industry_IMG/nexon_logo.png" class="img-responsive"></a>
					</div>
					<div class="item"><a href="#"><img
								src="<?php echo get_stylesheet_directory_uri(); ?>/images/Resource/Industry_IMG/neowiz_logo.jpg" class="img-responsive"></a>
					</div>
					<div class="item"><a href="#"><img
								src="<?php echo get_stylesheet_directory_uri(); ?>/images/Resource/Industry_IMG/nhn_logo.jpg" class="img-responsive"></a>
					</div>
					<div class="item"><a href="#"><img
								src="<?php echo get_stylesheet_directory_uri(); ?>/images/Resource/Industry_IMG/ncsoft_logo.png" class="img-responsive"></a>
					</div>
					<div class="item"><a href="#"><img
								src="<?php echo get_stylesheet_directory_uri(); ?>/images/Resource/Industry_IMG/neowiz_logo.jpg" class="img-responsive"></a>
					</div>
					<div class="item"><a href="#"><img
								src="<?php echo get_stylesheet_directory_uri(); ?>/images/Resource/Industry_IMG/nhn_logo.jpg" class="img-responsive"></a>
					</div>
					<div class="item"><a href="#"><img
								src="<?php echo get_stylesheet_directory_uri(); ?>/images/Resource/Industry_IMG/ncsoft_logo.png" class="img-responsive"></a>
					</div>
					<div class="item"><a href="#"><img
								src="<?php echo get_stylesheet_directory_uri(); ?>/images/Resource/Industry_IMG/neowiz_logo.jpg" class="img-responsive"></a>
					</div>
					<div class="item"><a href="#"><img
								src="<?php echo get_stylesheet_directory_uri(); ?>/images/Resource/Industry_IMG/nexon_logo.png" class="img-responsive"></a>
					</div>
					<div class="item"><a href="#"><img
								src="<?php echo get_stylesheet_directory_uri(); ?>/images/Resource/Industry_IMG/nhn_logo.jpg" class="img-responsive"></a>
					</div>
					<div class="item"><a href="#"><img
								src="<?php echo get_stylesheet_directory_uri(); ?>/images/Resource/Industry_IMG/ncsoft_logo.png" class="img-responsive"></a>
					</div>
					<div class="item"><a href="#"><img
								src="<?php echo get_stylesheet_directory_uri(); ?>/images/Resource/Industry_IMG/neowiz_logo.jpg" class="img-responsive"></a>
					</div>
					<div class="item"><a href="#"><img
								src="<?php echo get_stylesheet_directory_uri(); ?>/images/Resource/Industry_IMG/nhn_logo.jpg" class="img-responsive"></a>
					</div>
					<div class="item"><a href="#"><img
								src="<?php echo get_stylesheet_directory_uri(); ?>/images/Resource/Industry_IMG/nexon_logo.png" class="img-responsive"></a>
					</div>
					<div class="item"><a href="#"><img
								src="<?php echo get_stylesheet_directory_uri(); ?>/images/Resource/Industry_IMG/ncsoft_logo.png" class="img-responsive"></a>
					</div>
				</div>
			</div>
			<hr>
			<div id="industry-news">
				<h3>INDUSTRY NEWS</h3>
				<div id="industry-news-inner">
					<?php

						// 지정된 피드 소스에서 SimplePie 피드 개체 가져오기
						$rss = fetch_feed( 'http://newssearch.naver.com/search.naver?where=rss&query=%EB%84%A5%EC%8A%A8&field=0&nx_search_query=&nx_and_query=&nx_sub_query=&nx_search_hlquery=' );

						if ( ! is_wp_error( $rss ) ) : // Checks that the object is created correctly

						// 총 항목 20개로 제한
						$maxitems = $rss->get_item_quantity( 20 );

						// 배열 빌드하기
						$rss_items = $rss->get_items( 0, 20 );

						endif;
						?>

						<?php if ( $maxitems == 0 ) : ?>
							<p><?php echo 'No news'; ?></p>
						<?php else : ?>
							<?php // Loop through each feed item and display each item as a hyperlink. ?>
							<?php  $i = 0; ?>
							<?php foreach ( $rss_items as $item ) : ?>
								<?php if ( $i % 4 == 0 ) echo "<div class='rss-item-wrap'>"; ?>
									<div class="rss-item">
									<h4>
										<a href="<?php echo esc_url( $item->get_permalink() ); ?>" target="_blank">
											<?php echo esc_html( $item->get_title() ); ?>
										</a>
									</h4>
									<span>&nbsp;<?php echo $item->get_author()->get_email(); ?> | <?php echo $item->get_date('j F Y | g:i a'); ?><br></span>
									<?php echo $item->get_description(); ?>
								</div>
								<?php if ( $i % 4 == 3 ) echo "</div>"; ?>
								<?php  $i++; ?>
							<?php endforeach; ?>
						<?php endif; ?>
				</div>
				<div class="text-center">
					<ul class="pagination">
						<li id="list1" class="active"><a>1</a></li>
						<li id="list2"><a>2</a></li>
						<li id="list3"><a>3</a></li>
						<li id="list4"><a>4</a></li>
						<li id="list5"><a>5</a></li>
					</ul>
				</div>
			</div>
		</div>
	</section> <!-- End of industry insight -->
</div>
<?php get_footer(); ?>