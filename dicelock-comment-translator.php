<?php
/*
Plugin Name: DiceLock Comment Translator
Plugin URI: http://blog.dicelocksecurity.com/plugins/dicelock-comment-translator/
Description: Adds a link that shows a Google translation form to easily allow language translations while reading and/or before commenting. Visitors talking different languages can communicate with you in your language.
Version: 1.0.0
Author: Angel Ferre
Author URI: hhttp://www.dicelocksecurity.com/
*/

class DiceLockCommentTranslator {
	var $is_shown = false;
	var $folder_url = false;
	
	function showCommentTranslator() {
		global $smilies_themer;
		
		// Check if the translator form was already shown via direct calling
		if ( $this->is_shown ) return;
		
		echo '<script language="javascript">';
		echo '  function toggleDiceLockTranslator(divid){';
		echo '    if(document.getElementById(divid).style.display == \'none\'){';
		echo '      document.getElementById(divid).style.display = \'block\';';
		echo '    }else{';
		echo '      document.getElementById(divid).style.display = \'none\';';
		echo '    }';
		echo '  }';
		echo '</script>';
		
		echo '<div align="center">';
		echo '<a href="javascript:;" onmousedown="toggleDiceLockTranslator(\'DiceLockTranslator\');">Translation form - Translate your comment!</a>';
		echo '</div>';
		echo '<div id="DiceLockTranslator" style="display:none">';
		//build the html form that references the google jsapi and the js
		echo '<p>';
		echo '<table class="googletranslate">';
		echo '<thead>';
		echo '<tr>';
		echo '<th class="title">Precomment Google translator</th>';
		echo '</tr>';
		echo '</thead>';
		echo '</table>';
		echo 'If you are posting a comment in a language different than yours, you can use this translator to translate from your language to any language you want. As well you can copy any text of the page to see the translation.<br /><br />';
		echo '</p>';
		echo '<form class="DiceLockTranslator" onsubmit="return submitDiceLockTranslationChange();">';
  		echo 'Insert text to translate:';
  		echo '<textarea id="diceLockSource" style="width:98%;" rows="5">Enter Text to Translate Here</textarea><br /><br />';
  		echo 'From: ';
  		echo '<select name="diceLockSrc" id="diceLockSrc"></select> '; 
  		echo 'To: ';
  		echo '<select name="diceLockDst" id="diceLockDst"></select> ';
  		echo '<input type="submit" value="Translate" class="DiceLockSubmit"/></form><br /><br />';
  		echo 'Translation:';  
  		echo '<div id="resultsDiceLockBody"></div>';
  		echo '<div id="branding"></div>';
		echo '</div>';

		$this->print_translation_js();

		echo '<br />';
		$this->is_shown = true;
	}
	
	function print_translation_js() {

	?>
		<script  language="javascript">
		google.load("language", "1");
		google.setOnLoadCallback(init);

		function init() {
   			var src = document.getElementById('diceLockSrc');
   			var dst = document.getElementById('diceLockDst');
   			var i = 0;
   			for (l in google.language.Languages) {
      				var lng = l.toLowerCase();
      				var lngCode = google.language.Languages[l];
      				if (google.language.isTranslatable(lngCode)) {
         				src.options.add(new Option(lng, lngCode));
         				dst.options.add(new Option(lng, lngCode));
         			}
      			}
   			google.language.getBranding('branding', { type : 'vertical' });
      			   
   			submitDiceLockTranslationChange();
		}
   
		function submitDiceLockTranslationChange() {
   			var value = document.getElementById('diceLockSource').value;
   			var src = document.getElementById('diceLockSrc').value;
   			var dest = document.getElementById('diceLockDst').value;
   			google.language.translate(value, src, dest, translateDiceLockTranslationResult);
   			return false;
		}
   
		function translateDiceLockTranslationResult(result) {
   			var resultBody = document.getElementById("resultsDiceLockBody");
   			if (result.translation) {
      				var str = result.translation.replace('>', '&gt;').replace('<', '&lt;');
      				resultBody.innerHTML = str;
			}
   			else {
      				resultBody.innerHTML = '<span style="color:red">Error Translating</span>';
      			}
		}
		</script>
<?php	}
	
	function add_google_js () {
		echo '<script src="http://www.google.com/jsapi?key=internal" type="text/javascript"></script>';
	}

}

function dicelock_translator_show() {
	global $dicelock_translator;
	if ( $dicelock_translator && method_exists( $dicelock_translator, 'showCommentTranslator' ) )
		$dicelock_translator->showCommentTranslator();
}

$dicelock_translator = new DiceLockCommentTranslator();
$dicelock_translator->folder_url = WP_CONTENT_URL . '/plugins/' . plugin_basename( dirname(__FILE__) ) . "/";

// If it was already shown through a theme call, this is overridden.
add_action( 'get_footer', array( &$dicelock_translator, 'showCommentTranslator' ) );

// Loads Google translator script
add_action('wp_head', array( &$dicelock_translator, 'add_google_js' ) );

register_activation_hook( __FILE__, array( &$dicelock_translator, 'install' ) );
register_deactivation_hook( __FILE__, array( &$dicelock_translator, 'uninstall' ) );

?>
