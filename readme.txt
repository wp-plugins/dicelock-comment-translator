=== Plugin Name ===
Contributors: Angel Ferre
Donate link: http://blog.dicelocksecurity.com/plugins/dicelock-comment-translator/
Tags: google translations, automatic translator, multilanguage, translator
Requires at least: 2.2.0 or higher
Tested up to: 2.8
Stable tag: 1.0.0

DiceLock Comment Translator inserts a language translation form at he bottom of your posts, pages and categories. The forms makes use of Google translation services and allows the visitor to tanslate between more than 43 different languages

== Description ==

DiceLock Comment Translator inserts a translation form at he bottom of your posts, pages and categories. The forms makes use of Google translation services and allows the visitor to tanslate between more than 43 different languages (depending in Google Translator): albanian, arabic, bulgarian, catalan, chinese, chinese (simplified), chinese (traditional), croatian, czech, danish, dutch, english, estonian, filipino, finnish, french, galician, german, greek, hebrew, hindi, hungarian, indonesian, italian, japanese, korean, latvian, lithuanian, maltese, norwegian, persian, polish, portuguese, romanian, russian, serbian, slovak, slovenian, spanish, swedish, tagalog, thai, turkish, ukrainian, vietnamese

Main features:

* Inserts a link to DiceLock Comment Translator form at the bottom of your posts, pages and categories.
* DiceLock Comment Translator is hiden until the visitors makes click on the link that shows the translation form, it can be hiden again making click on the same link.
* One translation engine: Google Translation Engine.
* Allows copy and paste of text in order to be able your visitors to translate any kind of text.
* Visitors can perform language translations on the fly.
* The translation process is performed on the page, it does not require the page to be reloaded.
* The plugin can be loaded once on each page.
* No database modifications: DiceLock Comment Translator is not intrusive. It doesn’t create or alter any table on your database.

For the latest information and changelog visit the website

<a href="http://blog.dicelocksecurity.com/plugins/dicelock-comment-translator/">http://blog.dicelocksecurity.com/plugins/dicelock-comment-translator/</a>

Information about WordPress (and plugins), and Joomla (and components and modules) customizations can be found at the website

<a href="http://blog.dicelocksecurity.com/">http://blog.dicelocksecurity.com/</a>

This plugin has been promoted by <a href="http://www.dicelocksecurity.com/">DiceLock Security</a>

== Installation ==

1. Upload the folder “dicelock-comment-translator” to the “wp-content/plugins” directory.
2. Activate the plugin through the ‘Plugins’ menu in WordPress.
3. And you have it working!. There is no more installation operations.

== Frequently Asked Questions ==

= Is the translation service always available? =

As DiceLock Comment Translator does depend on Google translation services, it depends on Google disponibility.

== Screenshots ==

1. Link at the bottom and above of the footer of you pages, posts ans categories.

2. Form showed to perform the translation.

== Changelog ==

= 1.0.0 =
* Plugin released.

== Other Notes ==

DiceLock Comment Translator can be loaded through a direct call to the function ‘dicelock_translator_show’ as in:

	if (function_exists('dicelock_translator_show'))
    		dicelock_translator_show();
	else
		echo 'Fix DiceLock Comment Translator';

If it is loaded in this way, only the first called DiceLock Comment Translator link will be shown. 


