<?php
/**
* The default template for displaying news via the hub's api
*
* @package FoundationPress
* @since FoundationPress 1.0.0
*/
?>
<h1 class="hub-title">Related News from <a href="https://hub.jhu.edu/">The Hub</a></h1>
<?php
$theme_option = flagship_sub_get_global_options();
$selection = $theme_option['flagship_sub_hub_topic_keyword'];
if ('keyword' === $selection ) {
	$keywords = $theme_option['flagship_sub_hub_keywords'];
	$hub_url = 'https://api.hub.jhu.edu/articles?v=1&key=bed3238d428c2c710a65d813ebfb2baa664a2fef&tags=' . $keywords . '&per_page=3';
} elseif ('topic' === $selection ) {
	$topic = $theme_option['flagship_sub_hub_topic'];
	$topics = array(
		'arts-culture' => 32,
		'at-work' => 3158,
		'athletics' => 34,
		'health' => 31,
		'politics-society' => 167,
		'science-technology' => 33,
		'student-life' => 36,
		'university-news' => 35,
		'voices-opinion' => 37
		);
	$topic_slug = $theme_option['flagship_sub_hub_topic'];
	$hub_url = 'https://api.hub.jhu.edu/topics/' . $topics[$topic_slug] . '/articles?v=1&key=bed3238d428c2c710a65d813ebfb2baa664a2fef&per_page=3&source=all';
	}
	$hub_call = wp_remote_get($hub_url);
	if (is_array($hub_call) && ! empty($hub_call['body']) ) {
	$hub_results = json_decode($hub_call['body'], true);
	} else {
	return false; // wp_remote_get failed somehow
	}
	$hub_articles = $hub_results['_embedded'];
	if (is_array($hub_articles)) {
	foreach ($hub_articles['articles'] as $hub_article ) {
?>
<article class="hub-article" itemscope itemtype="http://schema.org/BlogPosting" aria-labelledby="post-<?php echo $hub_article['id'];?>">
	<header class="article-header">
		<?php $date = $hub_article['publish_date'];?>
		<time class="byline" datetime=""><?php echo date('F d, Y', $date);?></time>
		<h1 class="entry-title single-title" itemprop="headline">
			<a href="<?php echo $hub_article['url']; ?>" id="post-<?php echo $hub_article['id'];?>" class="external" target="_blank"><?php echo $hub_article['headline']; ?></a>
		</h1>
	</header>
	<div class="entry-content" itemprop="articleBody">
		<img class="float-left news" src="<?php echo $hub_article['_embedded']['image_thumbnail'][0]['sizes']['thumbnail']; ?>" alt="From The Hub: <?php echo $hub_article['headline']; ?>" />
		<summary>
		<p><?php echo $hub_article['subheadline'];
			if (empty($hub_article['subheadline']) ) {
				echo $hub_article['excerpt'];
			} ?>
		</p>
		</summary>
	</div>
	<hr>
</article>
<?php } ?>