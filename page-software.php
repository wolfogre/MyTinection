<?php
/*
Template Name: 软件中心
*/
?>
<?php
/**
 * Page Template of Tinection WordPress Theme
 *
 * @package   Tinection
 * @version   1.1.5
 * @date      2015.1.28
 * @author    Zhiyan <chinash2010@gmail.com>
 * @site      Zhiyanblog <www.zhiyanblog.com>
 * @copyright Copyright (c) 2014-2015, Zhiyan
 * @license   http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link      http://www.zhiyanblog.com/tinection.html
**/

?>
<?php get_header(); ?>
<?php $categories = 11;$sorts = array('likes'=>'喜欢最多','views'=>'浏览最多','comments'=>'评论最多','collects'=>'收藏最多');$timeframes = array('week'=>'一周内','month'=>'一月内','year'=>'一年内');$styles = array('nopic'=>'无图模式','titlelist'=>'标题模式'); ?>

<div id="main-wrap" class="container two-col-container">
	<?php dynamic_query(); ?>
	
	<div id="main-wrap-left">
		<div class="bloglist-container clr">
		<?php $i=0;if(have_posts()):while (have_posts()) : the_post();$i++;?>
			<article class="home-blog-entry col span_1 clr">
				<?php if(!(isset($_GET['style'])&&($_GET['style']=='nopic'||$_GET['style']=='titlelist')))get_template_part('includes/thumbnail'); ?>
				<div class="home-blog-entry-text clr">
					<h3>
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
					</h3>
					<!-- Post meta -->
					<div class="meta">
						<span class="postlist-meta-cat"><i class="fa fa-bookmark"></i><?php the_category(' ', false); ?></span>
						<span class="postlist-meta-time"><i class="fa fa-calendar"></i><?php echo timeago( get_gmt_from_date(get_the_time('Y-m-d G:i:s')) ); ?></span>
						<span class="postlist-meta-views"><i class="fa fa-fire"></i><?php echo '浏览: '.get_tin_traffic( 'single' , get_the_ID() ); ?></span>
						<span class="postlist-meta-comments"><?php if ( comments_open() ): ?><i class="fa fa-comments"></i><a href="<?php comments_link(); ?>"><?php comments_number( __('<span>评论: </span>0','tinection'), __('<span>评论: </span>1','tinection'), __('<span>评论: </span>%','tinection') ); ?></a><?php  endif; ?></span>
					</div>
					<!-- /.Post meta -->
					<?php if(!(isset($_GET['style'])&&($_GET['style']=='titlelist'))){ ?>
					<p>
					<?php $contents = get_the_excerpt(); $excerpt = wp_trim_words($contents,ot_get_option('excerpt-length'),''); echo $excerpt.new_excerpt_more('...');?>
					</p>
					<?php } ?>
				</div>
				<div class="clear"></div>
			</article>
			<?php endwhile;?>
		</div>
			<!-- pagination -->
			<div class="clear"></div>
			<div class="pagination">
			<?php pagenavi(); ?>
			</div>
			<!-- /.pagination -->
			<?php endif;?>
	</div>
	<?php wp_reset_query(); ?>
	<?php get_sidebar();?>
</div>
<div class="clear"></div>
<?php get_footer(); ?>