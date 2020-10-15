<?php

if (! function_exists('aurl')){
	function aurl ($url) {
		return url('admin/'.$url);
	}
}