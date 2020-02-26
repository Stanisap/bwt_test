<?php
/**
 * 
 */
require_once __DIR__ . '/../../vendor/autoload.php';
require __DIR__ . '/../lib/parser.php';

class Model_Main extends Model {

	public function get_data() {
		
		$url = 'https://www.gismeteo.ua/weather-zaporizhia-5093/';
		$pattern_temp = '#<span class="unit unit_temperature_c.+?<\/span>#';
		$pattern_date = '#<div class="tab-content(.?\n?+)+?<\/div>#';
		$pattern_wtype = '#<div class="tab\s+tooltip".+?>#';
		$pattern_icon = '#<div class="img">(\n\s+)?<svg height=.+?<\/svg>(\n\s+)?<\/div>#';
		$pattern_icon_hours = '#<span class="tooltip.+?<\/span>#';
		$pattern_wind = '#<span class="unit unit_wind_m_s.+[\w\W]+?<\/span>#';
		$parser = new Parser($url);
		$data_temp = $parser->get_array_data($pattern_temp);
		$data_d = $parser->get_array_data($pattern_date);
		$data_wtype = $parser->get_attribute($pattern_wtype, 'data-text');
		$data_icon = $parser->get_array_html($pattern_icon);
		$data_icon = array_merge($data_icon, $parser->get_array_html($pattern_icon_hours));
		$data_wind = $parser->get_array_data($pattern_wind);

		$data = [
			'today' => $data_d[1],
			'temp_today' => $data_temp[0] . " - " . $data_temp[1],
			'icon_today' => $data_icon[1],
			'weather_type' => $data_wtype,
			'2' => [
				'icon' => $data_icon[3],
				'temp' => $data_temp[4],
				'wind' => $data_wind[0]
			],
			'5' => [
				'icon' => $data_icon[4],
				'temp' => $data_temp[5],
				'wind' => $data_wind[1]
			],
			'8' => [
				'icon' => $data_icon[5],
				'temp' => $data_temp[6],
				'wind' => $data_wind[2]
			],
			'11' => [
				'icon' => $data_icon[6],
				'temp' => $data_temp[7],
				'wind' => $data_wind[3]
			],
			'14' => [
				'icon' => $data_icon[7],
				'temp' => $data_temp[8],
				'wind' => $data_wind[4]
			],
			'17' => [
				'icon' => $data_icon[8],
				'temp' => $data_temp[9],
				'wind' => $data_wind[5]
			],
			'20' => [
				'icon' => $data_icon[9],
				'temp' => $data_temp[10],
				'wind' => $data_wind[6]
			],
			'23' => [
				'icon' => $data_icon[10],
				'temp' => $data_temp[11],
				'wind' => $data_wind[7]
			],
		];
		return $data;
	}


}