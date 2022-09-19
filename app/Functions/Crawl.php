<?php

namespace App\Functions;
require('simple_html_dom.php');
class Crawl{ 
	public function crawlhtml($url) {
		return file_get_html($url);
	}

	public function dom(){
		$url = "https://booking.kayak.com/flights/ATL-DFW/2020-06-02/2020-06-05";

		$html = $this->crawlhtml($url);
		// echo $html ; die();
		$css = $html->find('link');
		$strcss = null;
		foreach ($css as $value) {
			$strcss .= $value; 
		}		
		$script = $html->find('script');
		$strscript = null;
		foreach ($css as $value) {
			$strscript .= $value; 
		}
		$formview = $html->find('div.resultsList',0);
		$viewhtml = $strcss.$formview;//.$strscript;
	
		echo $html ; die () ;
		foreach($html->find('img') as $element) {
        echo '<img src="'.$element->src.'" /><br>';
		}

	}
}