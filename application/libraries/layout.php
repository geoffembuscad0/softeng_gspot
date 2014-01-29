<?php
class Layout {
	public function head($title, $css_files = array(), $js_files = array()){
		$html = null;

		$html .= "<html>";
		$html .= "<head>";
		$html .= "<title>".$title."</title>";
		if(count($css_files) > 0){
			foreach($css_files AS $css){
				$html .= "<style type='text/css'>@import url('" . site_url("assets/dists/css/" . $css . ".css") . "');</style>";
			}
		}
		if(count($js_files) > 0){
			foreach($js_files AS $js){
				$html .= "<script src='".site_url("assets/dists/js/" . $js . ".js")."'></script>";
			}
		}
		$html .= "</head>";
		$html .= "<body>";
		$html .= "<div class='container'>";
		return $html;
	}
	
	public function footer(){
		$html = null;
		$html .= "</div>";
		$html .= "</body>";
		$html .= "</html>";
		return $html;
	}
}

