=== Minimalist Twitter Widget ===
Contributors: impression11, ethanjim 
Tags: Twitter, Widget, Minimalist
Requires at least: 3.5
Tested up to: 3.9
Stable tag: 1.1

A minimalist Twitter widget to display tweets.

== Description ==

Minimalists Twitter Widget displays user tweets using the REST API v1.1. With minimal styling it is a good widget to build upon to fit into a theme.

To avoid API limits there is an optional Tweet cache feature which can be set to expire after a user defined amount of hours.

== Installation ==

1. Extract the zip file and just drop the contents in the wp-content/plugins/ directory of your WordPress installation and then activate the Plugin from Plugins page.

2. Go to "Tweet Options" under Appearance and input your Consumer Key, Consumer Secret, Access Token & Access Token Secret. If you haven't got these details, register and application at https://apps.twitter.com/ to attain them.

4. Go to Widgets, drag the "Minimalist Twitter Widget" to the your sidebar and define the widgets Title, your twitter handle and how many tweets it should display. To insert into a post use the shortcode [mintweet username="impression11" count="5" type="user"], replacing the shortcode options with your desired parameters. Insert the widget as many times as required, though baring in mind the API limits.

5. If you run into API limits use the caching feature to speed up loading and to limit the amount of requests sent to Twitter.

== Changelog ==

= 1.1 =
* Better handling of cached Tweets, differentiating between different counts and search types.
* Partial re-write to support shortcode input.
* Better handling of hashtag search.
* Converts URL in Tweets to hyperlinks.
* Fixed various notices while debugging.
* Added Plugin Description.


= 1.0 =
* Initial release.