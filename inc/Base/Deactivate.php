<?php

namespace Inc\Base;

class Deactivate
{
	public static function deactivate_plugin() {
		flush_rewrite_rules();
	}
}