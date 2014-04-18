<?php
/* Plugin Name: Minimalist Twitter Widget
Plugin URI: http://impression11.co.uk/
Description: A minimalist Twitter widget to display users tweets.
Version: 1.0
Author: Impression11 Ltd
Author URI: http://impression11.co.uk/
*/
require_once ( dirname(__FILE__).'/options.php' );

class wp_tweets extends WP_Widget
{
  public function __construct()
  {
    parent::__construct(
      'wordpress-tweets',
      'Minimalist Twitter Widget',
      array(
        'description' => 'Displays user Tweets in sidebar.'
      )
    );
  }

  public function widget( $args, $instance )
  {
  /* Print bxslider initializing script */
echo $args['before_widget'];
$options = get_option( 'tweet_plugin_options' );
if($instance['username']=='' || $instance['count']=='' || $options['ck']=='' || $options['cs']=='' || $options['at']=='' || $options['ats']==''){echo 'Please ensure this plugin is correctly configured under "Tweet Options" & "Widgets"';}
else{
$file = plugin_dir_path( __FILE__ ).$instance['username'].'_tweets.txt';
if($options['caching']==1 && file_exists($file) && time()-filemtime($file) < $options['cache_exp'] * 3600){
echo file_get_contents($file);
echo '<!-- Cached File -->';
}
else{
$cache .= $args['before_title'].$instance['title']. $args['after_title'];
require_once 'lib/twitteroauth.php';
define('CONSUMER_KEY', $options['ck']);
define('CONSUMER_SECRET', $options['cs']);
define('ACCESS_TOKEN', $options['at']);
define('ACCESS_TOKEN_SECRET', $options['ats']);
$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, ACCESS_TOKEN, ACCESS_TOKEN_SECRET);
    
// Check if we're getting user tweets or hashtag tweets
if ($instance['search']=='user'){
// get user tweets
$statuses = $connection->get('statuses/user_timeline', array('screen_name' => $instance['username'], 'count' => $instance['count']));}
else
{
//get hastag tweets
$statuses = $connection->get('search/tweets', array("q" => $instance['username'], 'count' => $instance['count']));
//bring the array up one level so it's compatible with the loop for getting user tweets
$statuses = $statuses->statuses;}
$tweettest = count($statuses);
if ($tweettest ==0){echo 'Please check your Twitter Application details, that you have specified the number of tweets to load.';} else {
$cache .= '<ul id="tweets">';
foreach ($statuses as $status) {
$cache .=  '<li>';
if ($instance['search']=='hash'){
// if hashtag display Username
$cache .= '<a href="https://twitter.com/#!/'.$status->user->screen_name.'" target="_blank"/>';
$cache .= $status->user->screen_name;
$cache .= '</a>';
$cache .= ': ';
}
$cache .=  $status->text;
$cache .=  '</li>';
}
$cache .= '</ul>';
echo $cache;
if($options['caching']==1){file_put_contents( $file, $cache);}
}}}echo $args['after_widget'];
}


  
  public function form( $instance )
  {
    // removed the for loop, you can create new instances of the widget instead
    ?>
       <p>
<label for="<?php echo $this->get_field_id('title'); ?>">Widget Title</label><br />
      <input type="text" class="img" name="<?php echo $this->get_field_name('title'); ?>" id="<?php echo $this->get_field_id('title'); ?>" value="<?php echo $instance['title']; ?>" />
    </p> 
    <p>
  <label for="<?php echo $this->get_field_id('search'); ?>">
    <?php _e( 'User Tweets / Hashtag' ); ?>
  </label>
  <select name="<?php echo $this->get_field_name('search'); ?>" id="<?php echo $this->get_field_id('pager'); ?>" class="widefat">
    <option value="user"<?php selected( $instance['search'], 'user' ); ?>>
    <?php _e('User'); ?>
    </option>
    <option value="hash"<?php selected( $instance['search'], 'hash' ); ?>>
    <?php _e('Hashtag'); ?>
    </option>
  </select>
</p> 
    <p>
<label for="<?php echo $this->get_field_id('username'); ?>">Username / Hashtag</label><br />
      <input type="text" class="img" name="<?php echo $this->get_field_name('username'); ?>" id="<?php echo $this->get_field_id('username'); ?>" value="<?php echo $instance['username']; ?>" />
    </p>
    <label for="<?php echo $this->get_field_id('count'); ?>"># of Tweets</label><br />
      <input type="text" class="img" name="<?php echo $this->get_field_name('count'); ?>" id="<?php echo $this->get_field_id('count'); ?>" value="<?php echo $instance['count']; ?>" />
    </p>

 <?php
  }
} 
add_action( 'widgets_init', create_function('', 'return register_widget("wp_tweets");') );
function wp_tweets_css()
{wp_enqueue_style('minimal-tweet', plugins_url('wp-tweet.css',__FILE__ ), null, null);}
add_action('init', 'wp_tweets_css');
?>