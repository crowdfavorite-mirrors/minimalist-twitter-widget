=== Minimalist Twitter Widget ===
Contributors: impression11 
Tags: Twitter, Widget, Minimalist, Tweets
Requires at least: 3.5
Tested up to: 3.9
Stable tag: 1.2

A quick and efficient Twitter widget to display tweets.

== Description ==

Minimalists Twitter Widget displays user tweets using the REST API v1.1. With minimal styling it picks up your theme’s styling to blend in seamlessly.

With efficiency in mind this widget can also cache your Tweets reduce the amount of API calls your website has to make and to load quicker.

== Installation ==

1. Extract the zip file and just drop the contents in the wp-content/plugins/ directory of your WordPress installation and then activate the Plugin from Plugins page.

2. Go to "Tweet Options" under Appearance and input your Consumer Key, Consumer Secret, Access Token & Access Token Secret. If you haven't got these details, register and application at https://apps.twitter.com/ to attain them.

4. Go to Widgets, drag the "Minimalist Twitter Widget" to the your sidebar and define the widgets Title, your twitter handle and how many tweets it should display. To insert into a post use the shortcode [mintweet username="impression11" count="5" type="user" retweets=“1”], replacing the shortcode options with your desired parameters. Insert the widget as many times as required, though baring in mind the API limits.

5. If you run into API limits use the caching feature to speed up loading and to limit the amount of requests sent to Twitter.

== Changelog ==

= 1.2 =
* Added the ability to not include Re-tweets from user tweets on a per widget/shortcode basis. Use the new option on the widget configuration or add retweets=“0” (to disable Re-tweets) to your shortcode. Due to the way Twitter feeds user Tweets through their API it will reduce the total number of Tweets shown if there are Re-tweets there if they are disabled.
*Planned Upcoming Features: Disable Replies, Linkify @ usernames in Tweets, smarter caching for less API calls and displaying more than 20 Tweets.

= 1.1 =
* Better handling of cached Tweets, differentiating between different counts and search types.
* Partial re-write to support shortcode input.
* Better handling of hashtag search.
* Converts URL in Tweets to hyperlinks.
* Fixed various notices while debugging.
* Added Plugin Description.


= 1.0 =
* Initial release.