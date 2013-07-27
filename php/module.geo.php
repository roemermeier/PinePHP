<?
//This class offers various functions to analyze country-code-data (ISO-standard)

function is_in_EU($countrycode) {

		$EUstates = array("BE", "BG", "CZ", "DK", "DE", "EE", "IE", "EL", "ES", "FR", "IT", "CY", "LV", "LT", "LU", "HU", "MT", "NL", "AT", "PL", "PT", "RO", "SI", "SK", "FI", "SE", "UK", "GR", "GB");
		
		if (in_array($countrycode, $EUstates)) {
			return true;
		} else {
			return false;
		}
	
}

function getCountryFromIP($ip = '$_SERVER[\'REMOTE_ADDR\']') {
	$cc = "DE";
	
	try
	{
		$cc = Maxmind_CountryCodeByIP($ip);
	}
	catch (Exception $e)
	{
		$cc = "DE";
	}
	
	//echo $cc;

	$_SESSION["IPCountryCode"] = $cc;
	
	return $cc;
}

function Maxmind_CountryCodeByIP($ip) {

	$params = getopt('l:i:');

	if (!isset($params['l'])) $params['l'] = 'DsTDQzlfdmVR';
	if (!isset($params['i'])) $params['i'] = $ip;

	$query = 'https://geoip.maxmind.com/a?' . http_build_query($params);

	$omni_keys =
	  array(
		'country_code',
		);

	$curl = curl_init();
	curl_setopt_array(
		$curl,
		array(
			CURLOPT_URL => $query,
			CURLOPT_USERAGENT => 'PHP',
			CURLOPT_RETURNTRANSFER => true
		)
	);

	$resp = curl_exec($curl);

	if (curl_errno($curl)) {
		throw new Exception(
			'GeoIP request failed with a curl_errno of '
			. curl_errno($curl)
		);
	}

	$omni_values = str_getcsv($resp);
	$omni_values = array_pad($omni_values, sizeof($omni_keys), '');
	$omni = array_combine($omni_keys, $omni_values);

	return $omni['country_code'];

}

function is_country($name) {
	$countries = array('Afghanistan', 'Albania', 'Algeria', 'Andorra', 'Angola', 'Antigua and Barbuda', 'Argentina', 'Armenia', 'Australia', 'Austria', 'Azerbaijan', 'The Bahamas', 'Bahrain', 'Bangladesh', 'Barbados', 'Belarus', 'Belgium', 'Belize', 'Benin', 'Bhutan', 'Bolivia', 'Bosnia and Herzegovina', 'Botswana', 'Brazil', 'Brunei', 'Bulgaria', 'Burkina Faso', 'Burundi', 'Cambodia', 'Cameroon', 'Canada', 'Cape Verde', 'Central African Republic', 'Chad', 'Chile', 'China', 'Colombia', 'Comoros', 'Congo, Republic of the', 'Congo, Democratic Republic of the', 'Costa Rica', 'Cote d\'Ivoire', 'Croatia', 'Cuba', 'Cyprus', 'Czech Republic', 'Denmark', 'Djibouti', 'Dominica', 'Dominican Republic', 'Timor-Leste', 'Ecuador', 'Egypt', 'El Salvador', 'Equatorial Guinea', 'Eritrea', 'Estonia', 'Ethiopia', 'Fiji', 'Finland', 'France', 'Gabon', 'Gambia', 'Georgia', 'Germany', 'Ghana', 'Greece', 'Grenada', 'Guatemala', 'Guinea', 'Guinea-Bissau', 'Guyana', 'Haiti', 'Honduras', 'Hungary', 'Iceland', 'India', 'Indonesia', 'Iran', 'Iraq', 'Ireland', 'Israel', 'Italy', 'Jamaica', 'Japan', 'Jordan', 'Kazakhstan', 'Kenya', 'Kiribati', 'Korea, North', 'Korea, South', 'Kosovo', 'Kuwait', 'Kyrgyzstan', 'Laos', 'Latvia', 'Lebanon', 'Lesotho', 'Liberia', 'Libya', 'Liechtenstein', 'Lithuania', 'Luxembourg', 'Macedonia', 'Madagascar', 'Malawi', 'Malaysia', 'Maldives', 'Mali', 'Malta', 'Marshall Islands', 'Mauritania', 'Mauritius', 'Mexico', 'Micronesia, Federated States of', 'Moldova', 'Monaco', 'Mongolia', 'Montenegro', 'Morocco', 'Mozambique', 'Myanmar (Burma)', 'Namibia', 'Nauru', 'Nepal', 'Netherlands', 'New Zealand', 'Nicaragua', 'Niger', 'Nigeria', 'Norway', 'Oman', 'Pakistan', 'Palau', 'Panama', 'Papua New Guinea', 'Paraguay', 'Peru', 'Philippines', 'Poland', 'Portugal', 'Qatar', 'Romania', 'Russia', 'Rwanda', 'Saint Kitts and Nevis', 'Saint Lucia', 'Saint Vincent and the Grenadines', 'Samoa', 'San Marino', 'Sao Tome and Principe', 'Saudi Arabia', 'Senegal', 'Serbia', 'Seychelles', 'Sierra Leone', 'Singapore', 'Slovakia', 'Slovenia', 'Solomon Islands', 'Somalia', 'South Africa', 'South Sudan', 'Spain', 'Sri Lanka', 'Sudan', 'Suriname', 'Swaziland', 'Sweden', 'Switzerland', 'Syria', 'Taiwan', 'Tajikistan', 'Tanzania', 'Thailand', 'Togo', 'Tonga', 'Trinidad and Tobago', 'Tunisia', 'Turkey', 'Turkmenistan', 'Tuvalu', 'Uganda', 'Ukraine', 'United Arab Emirates', 'United Kingdom', 'United States of America', 'Uruguay', 'Uzbekistan', 'Vanuatu', 'Vatican City (Holy See)', 'Venezuela', 'Vietnam', 'Yemen', 'Zambia', 'Zimbabwe');
	if (in_array($name, $countries)) {
		return true;
	} else {
		return false;
	}
}

function get_capital_by_iso($iso) {
	$countries = array('AF' => array ( 'country' => 'Afghanistan', 'capital' => 'Kabul', 'code' => 'AF' ), 'AL' => array ( 'country' => 'Albania', 'capital' => 'Tirane', 'code' => 'AL' ), 'DZ' => array ( 'country' => 'Algeria', 'capital' => 'Algiers', 'code' => 'DZ' ), 'AD' => array ( 'country' => 'Andorra', 'capital' => 'Andorra la Vella', 'code' => 'AD' ), 'AO' => array ( 'country' => 'Angola', 'capital' => 'Luanda', 'code' => 'AO' ), 'AG' => array ( 'country' => 'Antigua and Barbuda', 'capital' => 'Saint John\'s', 'code' => 'AG' ), 'AR' => array ( 'country' => 'Argentina', 'capital' => 'Buenos Aires', 'code' => 'AR' ), 'AM' => array ( 'country' => 'Armenia', 'capital' => 'Yerevan', 'code' => 'AM' ), 'AU' => array ( 'country' => 'Australia', 'capital' => 'Canberra', 'code' => 'AU' ), 'AT' => array ( 'country' => 'Austria', 'capital' => 'Vienna', 'code' => 'AT' ), 'AZ' => array ( 'country' => 'Azerbaijan', 'capital' => 'Baku', 'code' => 'AZ' ), 'BS' => array ( 'country' => 'The Bahamas', 'capital' => 'Nassau', 'code' => 'BS' ), 'BH' => array ( 'country' => 'Bahrain', 'capital' => 'Manama', 'code' => 'BH' ), 'BD' => array ( 'country' => 'Bangladesh', 'capital' => 'Dhaka', 'code' => 'BD' ), 'BB' => array ( 'country' => 'Barbados', 'capital' => 'Bridgetown', 'code' => 'BB' ), 'BY' => array ( 'country' => 'Belarus', 'capital' => 'Minsk', 'code' => 'BY' ), 'BE' => array ( 'country' => 'Belgium', 'capital' => 'Brussels', 'code' => 'BE' ), 'BZ' => array ( 'country' => 'Belize', 'capital' => 'Belmopan', 'code' => 'BZ' ), 'BJ' => array ( 'country' => 'Benin', 'capital' => 'Porto', 'code' => 'BJ' ), 'BT' => array ( 'country' => 'Bhutan', 'capital' => 'Thimphu', 'code' => 'BT' ), 'BO' => array ( 'country' => 'Bolivia', 'capital' => 'La Paz (administrative); Sucre (judicial)', 'code' => 'BO' ), 'BA' => array ( 'country' => 'Bosnia and Herzegovina', 'capital' => 'Sarajevo', 'code' => 'BA' ), 'BW' => array ( 'country' => 'Botswana', 'capital' => 'Gaborone', 'code' => 'BW' ), 'BR' => array ( 'country' => 'Brazil', 'capital' => 'Brasilia', 'code' => 'BR' ), 'BN' => array ( 'country' => 'Brunei', 'capital' => 'Bandar Seri Begawan', 'code' => 'BN' ), 'BG' => array ( 'country' => 'Bulgaria', 'capital' => 'Sofia', 'code' => 'BG' ), 'BF' => array ( 'country' => 'Burkina Faso', 'capital' => 'Ouagadougou', 'code' => 'BF' ), 'BI' => array ( 'country' => 'Burundi', 'capital' => 'Bujumbura', 'code' => 'BI' ), 'KH' => array ( 'country' => 'Cambodia', 'capital' => 'Phnom Penh', 'code' => 'KH' ), 'CM' => array ( 'country' => 'Cameroon', 'capital' => 'Yaounde', 'code' => 'CM' ), 'CA' => array ( 'country' => 'Canada', 'capital' => 'Ottawa', 'code' => 'CA' ), 'CV' => array ( 'country' => 'Cape Verde', 'capital' => 'Praia', 'code' => 'CV' ), 'CF' => array ( 'country' => 'Central African Republic', 'capital' => 'Bangui', 'code' => 'CF' ), 'TD' => array ( 'country' => 'Chad', 'capital' => 'N\'Djamena', 'code' => 'TD' ), 'CL' => array ( 'country' => 'Chile', 'capital' => 'Santiago', 'code' => 'CL' ), 'CN' => array ( 'country' => 'China', 'capital' => 'Beijing', 'code' => 'CN' ), 'CO' => array ( 'country' => 'Colombia', 'capital' => 'Bogota', 'code' => 'CO' ), 'KM' => array ( 'country' => 'Comoros', 'capital' => 'Moroni', 'code' => 'KM' ), 'CG' => array ( 'country' => 'Congo, Republic of the', 'capital' => 'Brazzaville', 'code' => 'CG' ), 'CD' => array ( 'country' => 'Congo, Democratic Republic of the', 'capital' => 'Kinshasa', 'code' => 'CD' ), 'CR' => array ( 'country' => 'Costa Rica', 'capital' => 'San Jose', 'code' => 'CR' ), 'CI' => array ( 'country' => 'Cote d\'Ivoire', 'capital' => 'Yamoussoukro (official); Abidjan (de facto)', 'code' => 'CI' ), 'HR' => array ( 'country' => 'Croatia', 'capital' => 'Zagreb', 'code' => 'HR' ), 'CU' => array ( 'country' => 'Cuba', 'capital' => 'Havana', 'code' => 'CU' ), 'CY' => array ( 'country' => 'Cyprus', 'capital' => 'Nicosia', 'code' => 'CY' ), 'CZ' => array ( 'country' => 'Czech Republic', 'capital' => 'Prague', 'code' => 'CZ' ), 'DK' => array ( 'country' => 'Denmark', 'capital' => 'Copenhagen', 'code' => 'DK' ), 'DJ' => array ( 'country' => 'Djibouti', 'capital' => 'Djibouti', 'code' => 'DJ' ), 'DM' => array ( 'country' => 'Dominica', 'capital' => 'Roseau', 'code' => 'DM' ), 'DO' => array ( 'country' => 'Dominican Republic', 'capital' => 'Santo Domingo', 'code' => 'DO' ), 'TL' => array ( 'country' => 'Timor-Leste', 'capital' => 'Dili', 'code' => 'TL' ), 'EC' => array ( 'country' => 'Ecuador', 'capital' => 'Quito', 'code' => 'EC' ), 'EG' => array ( 'country' => 'Egypt', 'capital' => 'Cairo', 'code' => 'EG' ), 'SV' => array ( 'country' => 'El Salvador', 'capital' => 'San Salvador', 'code' => 'SV' ), 'GQ' => array ( 'country' => 'Equatorial Guinea', 'capital' => 'Malabo', 'code' => 'GQ' ), 'ER' => array ( 'country' => 'Eritrea', 'capital' => 'Asmara', 'code' => 'ER' ), 'EE' => array ( 'country' => 'Estonia', 'capital' => 'Tallinn', 'code' => 'EE' ), 'ET' => array ( 'country' => 'Ethiopia', 'capital' => 'Addis Ababa', 'code' => 'ET' ), 'FJ' => array ( 'country' => 'Fiji', 'capital' => 'Suva', 'code' => 'FJ' ), 'FI' => array ( 'country' => 'Finland', 'capital' => 'Helsinki', 'code' => 'FI' ), 'FR' => array ( 'country' => 'France', 'capital' => 'Paris', 'code' => 'FR' ), 'GA' => array ( 'country' => 'Gabon', 'capital' => 'Libreville', 'code' => 'GA' ), 'GM' => array ( 'country' => 'Gambia', 'capital' => 'Banjul', 'code' => 'GM' ), 'GE' => array ( 'country' => 'Georgia', 'capital' => 'Tbilisi', 'code' => 'GE' ), 'DE' => array ( 'country' => 'Germany', 'capital' => 'Berlin', 'code' => 'DE' ), 'GH' => array ( 'country' => 'Ghana', 'capital' => 'Accra', 'code' => 'GH' ), 'GR' => array ( 'country' => 'Greece', 'capital' => 'Athens', 'code' => 'GR' ), 'GD' => array ( 'country' => 'Grenada', 'capital' => 'Saint George\'s', 'code' => 'GD' ), 'GT' => array ( 'country' => 'Guatemala', 'capital' => 'Guatemala City', 'code' => 'GT' ), 'GN' => array ( 'country' => 'Guinea', 'capital' => 'Conakry', 'code' => 'GN' ), 'GW' => array ( 'country' => 'Guinea-Bissau', 'capital' => 'Bissau', 'code' => 'GW' ), 'GY' => array ( 'country' => 'Guyana', 'capital' => 'Georgetown', 'code' => 'GY' ), 'HT' => array ( 'country' => 'Haiti', 'capital' => 'Port', 'code' => 'HT' ), 'HN' => array ( 'country' => 'Honduras', 'capital' => 'Tegucigalpa', 'code' => 'HN' ), 'HU' => array ( 'country' => 'Hungary', 'capital' => 'Budapest', 'code' => 'HU' ), 'IS' => array ( 'country' => 'Iceland', 'capital' => 'Reykjavik', 'code' => 'IS' ), 'IN' => array ( 'country' => 'India', 'capital' => 'New Delhi', 'code' => 'IN' ), 'ID' => array ( 'country' => 'Indonesia', 'capital' => 'Jakarta', 'code' => 'ID' ), 'IR' => array ( 'country' => 'Iran', 'capital' => 'Tehran', 'code' => 'IR' ), 'IQ' => array ( 'country' => 'Iraq', 'capital' => 'Baghdad', 'code' => 'IQ' ), 'IE' => array ( 'country' => 'Ireland', 'capital' => 'Dublin', 'code' => 'IE' ), 'IL' => array ( 'country' => 'Israel', 'capital' => 'Jerusalem', 'code' => 'IL' ), 'IT' => array ( 'country' => 'Italy', 'capital' => 'Rome', 'code' => 'IT' ), 'JM' => array ( 'country' => 'Jamaica', 'capital' => 'Kingston', 'code' => 'JM' ), 'JP' => array ( 'country' => 'Japan', 'capital' => 'Tokyo', 'code' => 'JP' ), 'JO' => array ( 'country' => 'Jordan', 'capital' => 'Amman', 'code' => 'JO' ), 'KZ' => array ( 'country' => 'Kazakhstan', 'capital' => 'Astana', 'code' => 'KZ' ), 'KE' => array ( 'country' => 'Kenya', 'capital' => 'Nairobi', 'code' => 'KE' ), 'KI' => array ( 'country' => 'Kiribati', 'capital' => 'Tarawa Atoll', 'code' => 'KI' ), 'KP' => array ( 'country' => 'Korea, North', 'capital' => 'Pyongyang', 'code' => 'KP' ), 'KR' => array ( 'country' => 'Korea, South', 'capital' => 'Seoul', 'code' => 'KR' ), 'ZZ' => array ( 'country' => 'Kosovo', 'capital' => 'Pristina', 'code' => 'ZZ' ), 'KW' => array ( 'country' => 'Kuwait', 'capital' => 'Kuwait City', 'code' => 'KW' ), 'KG' => array ( 'country' => 'Kyrgyzstan', 'capital' => 'Bishkek', 'code' => 'KG' ), 'LA' => array ( 'country' => 'Laos', 'capital' => 'Vientiane', 'code' => 'LA' ), 'LV' => array ( 'country' => 'Latvia', 'capital' => 'Riga', 'code' => 'LV' ), 'LB' => array ( 'country' => 'Lebanon', 'capital' => 'Beirut', 'code' => 'LB' ), 'LS' => array ( 'country' => 'Lesotho', 'capital' => 'Maseru', 'code' => 'LS' ), 'LR' => array ( 'country' => 'Liberia', 'capital' => 'Monrovia', 'code' => 'LR' ), 'LY' => array ( 'country' => 'Libya', 'capital' => 'Tripoli', 'code' => 'LY' ), 'LI' => array ( 'country' => 'Liechtenstein', 'capital' => 'Vaduz', 'code' => 'LI' ), 'LT' => array ( 'country' => 'Lithuania', 'capital' => 'Vilnius', 'code' => 'LT' ), 'LU' => array ( 'country' => 'Luxembourg', 'capital' => 'Luxembourg', 'code' => 'LU' ), 'MK' => array ( 'country' => 'Macedonia', 'capital' => 'Skopje', 'code' => 'MK' ), 'MG' => array ( 'country' => 'Madagascar', 'capital' => 'Antananarivo', 'code' => 'MG' ), 'MW' => array ( 'country' => 'Malawi', 'capital' => 'Lilongwe', 'code' => 'MW' ), 'MY' => array ( 'country' => 'Malaysia', 'capital' => 'Kuala Lumpur', 'code' => 'MY' ), 'MV' => array ( 'country' => 'Maldives', 'capital' => 'Male', 'code' => 'MV' ), 'ML' => array ( 'country' => 'Mali', 'capital' => 'Bamako', 'code' => 'ML' ), 'MT' => array ( 'country' => 'Malta', 'capital' => 'Valletta', 'code' => 'MT' ), 'MH' => array ( 'country' => 'Marshall Islands', 'capital' => 'Majuro', 'code' => 'MH' ), 'MR' => array ( 'country' => 'Mauritania', 'capital' => 'Nouakchott', 'code' => 'MR' ), 'MU' => array ( 'country' => 'Mauritius', 'capital' => 'Port Louis', 'code' => 'MU' ), 'MX' => array ( 'country' => 'Mexico', 'capital' => 'Mexico City', 'code' => 'MX' ), 'FM' => array ( 'country' => 'Micronesia, Federated States of', 'capital' => 'Palikir', 'code' => 'FM' ), 'MD' => array ( 'country' => 'Moldova', 'capital' => 'Chisinau', 'code' => 'MD' ), 'MC' => array ( 'country' => 'Monaco', 'capital' => 'Monaco', 'code' => 'MC' ), 'MN' => array ( 'country' => 'Mongolia', 'capital' => 'Ulaanbaatar', 'code' => 'MN' ), 'ME' => array ( 'country' => 'Montenegro', 'capital' => 'Podgorica', 'code' => 'ME' ), 'MA' => array ( 'country' => 'Morocco', 'capital' => 'Rabat', 'code' => 'MA' ), 'MZ' => array ( 'country' => 'Mozambique', 'capital' => 'Maputo', 'code' => 'MZ' ), 'MM' => array ( 'country' => 'Myanmar (Burma)', 'capital' => 'Rangoon (Yangon); Naypyidaw or Nay Pyi Taw (administrative)', 'code' => 'MM' ), 'NA' => array ( 'country' => 'Namibia', 'capital' => 'Windhoek', 'code' => 'NA' ), 'NR' => array ( 'country' => 'Nauru', 'capital' => 'no official capital; government offices in Yaren District', 'code' => 'NR' ), 'NP' => array ( 'country' => 'Nepal', 'capital' => 'Kathmandu', 'code' => 'NP' ), 'NL' => array ( 'country' => 'Netherlands', 'capital' => 'Amsterdam; The Hague (seat of government)', 'code' => 'NL' ), 'NZ' => array ( 'country' => 'New Zealand', 'capital' => 'Wellington', 'code' => 'NZ' ), 'NI' => array ( 'country' => 'Nicaragua', 'capital' => 'Managua', 'code' => 'NI' ), 'NE' => array ( 'country' => 'Niger', 'capital' => 'Niamey', 'code' => 'NE' ), 'NG' => array ( 'country' => 'Nigeria', 'capital' => 'Abuja', 'code' => 'NG' ), 'NO' => array ( 'country' => 'Norway', 'capital' => 'Oslo', 'code' => 'NO' ), 'OM' => array ( 'country' => 'Oman', 'capital' => 'Muscat', 'code' => 'OM' ), 'PK' => array ( 'country' => 'Pakistan', 'capital' => 'Islamabad', 'code' => 'PK' ), 'PW' => array ( 'country' => 'Palau', 'capital' => 'Melekeok', 'code' => 'PW' ), 'PA' => array ( 'country' => 'Panama', 'capital' => 'Panama City', 'code' => 'PA' ), 'PG' => array ( 'country' => 'Papua New Guinea', 'capital' => 'Port Moresby', 'code' => 'PG' ), 'PY' => array ( 'country' => 'Paraguay', 'capital' => 'Asuncion', 'code' => 'PY' ), 'PE' => array ( 'country' => 'Peru', 'capital' => 'Lima', 'code' => 'PE' ), 'PH' => array ( 'country' => 'Philippines', 'capital' => 'Manila', 'code' => 'PH' ), 'PL' => array ( 'country' => 'Poland', 'capital' => 'Warsaw', 'code' => 'PL' ), 'PT' => array ( 'country' => 'Portugal', 'capital' => 'Lisbon', 'code' => 'PT' ), 'QA' => array ( 'country' => 'Qatar', 'capital' => 'Doha', 'code' => 'QA' ), 'RO' => array ( 'country' => 'Romania', 'capital' => 'Bucharest', 'code' => 'RO' ), 'RU' => array ( 'country' => 'Russia', 'capital' => 'Moscow', 'code' => 'RU' ), 'RW' => array ( 'country' => 'Rwanda', 'capital' => 'Kigali', 'code' => 'RW' ), 'KN' => array ( 'country' => 'Saint Kitts and Nevis', 'capital' => 'Basseterre', 'code' => 'KN' ), 'LC' => array ( 'country' => 'Saint Lucia', 'capital' => 'Castries', 'code' => 'LC' ), 'VC' => array ( 'country' => 'Saint Vincent and the Grenadines', 'capital' => 'Kingstown', 'code' => 'VC' ), 'WS' => array ( 'country' => 'Samoa', 'capital' => 'Apia', 'code' => 'WS' ), 'SM' => array ( 'country' => 'San Marino', 'capital' => 'San Marino', 'code' => 'SM' ), 'ST' => array ( 'country' => 'Sao Tome and Principe', 'capital' => 'Sao Tome', 'code' => 'ST' ), 'SA' => array ( 'country' => 'Saudi Arabia', 'capital' => 'Riyadh', 'code' => 'SA' ), 'SN' => array ( 'country' => 'Senegal', 'capital' => 'Dakar', 'code' => 'SN' ), 'RS' => array ( 'country' => 'Serbia', 'capital' => 'Belgrade', 'code' => 'RS' ), 'SC' => array ( 'country' => 'Seychelles', 'capital' => 'Victoria', 'code' => 'SC' ), 'SL' => array ( 'country' => 'Sierra Leone', 'capital' => 'Freetown', 'code' => 'SL' ), 'SG' => array ( 'country' => 'Singapore', 'capital' => 'Singapore', 'code' => 'SG' ), 'SK' => array ( 'country' => 'Slovakia', 'capital' => 'Bratislava', 'code' => 'SK' ), 'SI' => array ( 'country' => 'Slovenia', 'capital' => 'Ljubljana', 'code' => 'SI' ), 'SB' => array ( 'country' => 'Solomon Islands', 'capital' => 'Honiara', 'code' => 'SB' ), 'SO' => array ( 'country' => 'Somalia', 'capital' => 'Mogadishu', 'code' => 'SO' ), 'ZA' => array ( 'country' => 'South Africa', 'capital' => 'Pretoria (administrative); Cape Town (legislative); Bloemfontein (judiciary)', 'code' => 'ZA' ), 'SS' => array ( 'country' => 'South Sudan', 'capital' => 'Juba (Relocating to Ramciel)', 'code' => 'SS' ), 'ES' => array ( 'country' => 'Spain', 'capital' => 'Madrid', 'code' => 'ES' ), 'LK' => array ( 'country' => 'Sri Lanka', 'capital' => 'Colombo; Sri Jayewardenepura Kotte (legislative)', 'code' => 'LK' ), 'SD' => array ( 'country' => 'Sudan', 'capital' => 'Khartoum', 'code' => 'SD' ), 'SR' => array ( 'country' => 'Suriname', 'capital' => 'Paramaribo', 'code' => 'SR' ), 'SZ' => array ( 'country' => 'Swaziland', 'capital' => 'Mbabane', 'code' => 'SZ' ), 'SE' => array ( 'country' => 'Sweden', 'capital' => 'Stockholm', 'code' => 'SE' ), 'CH' => array ( 'country' => 'Switzerland', 'capital' => 'Bern', 'code' => 'CH' ), 'SY' => array ( 'country' => 'Syria', 'capital' => 'Damascus', 'code' => 'SY' ), 'TW' => array ( 'country' => 'Taiwan', 'capital' => 'Taipei', 'code' => 'TW' ), 'TJ' => array ( 'country' => 'Tajikistan', 'capital' => 'Dushanbe', 'code' => 'TJ' ), 'TZ' => array ( 'country' => 'Tanzania', 'capital' => 'Dar es Salaam; Dodoma (legislative)', 'code' => 'TZ' ), 'TH' => array ( 'country' => 'Thailand', 'capital' => 'Bangkok', 'code' => 'TH' ), 'TG' => array ( 'country' => 'Togo', 'capital' => 'Lome', 'code' => 'TG' ), 'TO' => array ( 'country' => 'Tonga', 'capital' => 'Nuku\'alofa', 'code' => 'TO' ), 'TT' => array ( 'country' => 'Trinidad and Tobago', 'capital' => 'Port', 'code' => 'TT' ), 'TN' => array ( 'country' => 'Tunisia', 'capital' => 'Tunis', 'code' => 'TN' ), 'TR' => array ( 'country' => 'Turkey', 'capital' => 'Ankara', 'code' => 'TR' ), 'TM' => array ( 'country' => 'Turkmenistan', 'capital' => 'Ashgabat', 'code' => 'TM' ), 'TV' => array ( 'country' => 'Tuvalu', 'capital' => 'Vaiaku village, Funafuti province', 'code' => 'TV' ), 'UG' => array ( 'country' => 'Uganda', 'capital' => 'Kampala', 'code' => 'UG' ), 'UA' => array ( 'country' => 'Ukraine', 'capital' => 'Kyiv', 'code' => 'UA' ), 'AE' => array ( 'country' => 'United Arab Emirates', 'capital' => 'Abu Dhabi', 'code' => 'AE' ), 'GB' => array ( 'country' => 'United Kingdom', 'capital' => 'London', 'code' => 'GB' ), 'US' => array ( 'country' => 'United States of America', 'capital' => 'Washington D.C.', 'code' => 'US' ), 'UY' => array ( 'country' => 'Uruguay', 'capital' => 'Montevideo', 'code' => 'UY' ), 'UZ' => array ( 'country' => 'Uzbekistan', 'capital' => 'Tashkent', 'code' => 'UZ' ), 'VU' => array ( 'country' => 'Vanuatu', 'capital' => 'Port', 'code' => 'VU' ), 'VA' => array ( 'country' => 'Vatican City (Holy See)', 'capital' => 'Vatican City', 'code' => 'VA' ), 'VE' => array ( 'country' => 'Venezuela', 'capital' => 'Caracas', 'code' => 'VE' ), 'VN' => array ( 'country' => 'Vietnam', 'capital' => 'Hanoi', 'code' => 'VN' ), 'YE' => array ( 'country' => 'Yemen', 'capital' => 'Sanaa', 'code' => 'YE' ), 'ZM' => array ( 'country' => 'Zambia', 'capital' => 'Lusaka', 'code' => 'ZM' ), 'ZW' => array ( 'country' => 'Zimbabwe', 'capital' => 'Harare', 'code' => 'ZW' ));
		
	if (isset($countries[$iso]["capital"])) {
		return $countries[$iso]["capital"];
	} else {
		return false;
	}
}

function get_country_by_iso($iso) {
	$countries = array(
		'AD' => 'Andorra',
		'AE' => 'United Arab Emirates',
		'AF' => 'Afghanistan',
		'AG' => 'Antigua &amp; Barbuda',
		'AI' => 'Anguilla',
		'AL' => 'Albania',
		'AM' => 'Armenia',
		'AN' => 'Netherlands Antilles',
		'AO' => 'Angola',
		'AQ' => 'Antarctica',
		'AR' => 'Argentina',
		'AS' => 'American Samoa',
		'AT' => 'Austria',
		'AU' => 'Australia',
		'AW' => 'Aruba',
		'AZ' => 'Azerbaijan',
		'BA' => 'Bosnia and Herzegovina',
		'BB' => 'Barbados',
		'BD' => 'Bangladesh',
		'BE' => 'Belgium',
		'BF' => 'Burkina Faso',
		'BG' => 'Bulgaria',
		'BH' => 'Bahrain',
		'BI' => 'Burundi',
		'BJ' => 'Benin',
		'BM' => 'Bermuda',
		'BN' => 'Brunei Darussalam',
		'BO' => 'Bolivia',
		'BR' => 'Brazil',
		'BS' => 'Bahama',
		'BT' => 'Bhutan',
		'BU' => 'Burma (no longer exists)',
		'BV' => 'Bouvet Island',
		'BW' => 'Botswana',
		'BY' => 'Belarus',
		'BZ' => 'Belize',
		'CA' => 'Canada',
		'CC' => 'Cocos (Keeling) Islands',
		'CF' => 'Central African Republic',
		'CG' => 'Congo',
		'CH' => 'Switzerland',
		'CI' => 'Côte D\'ivoire (Ivory Coast)',
		'CK' => 'Cook Iislands',
		'CL' => 'Chile',
		'CM' => 'Cameroon',
		'CN' => 'China',
		'CO' => 'Colombia',
		'CR' => 'Costa Rica',
		'CS' => 'Czechoslovakia (no longer exists)',
		'CU' => 'Cuba',
		'CV' => 'Cape Verde',
		'CX' => 'Christmas Island',
		'CY' => 'Cyprus',
		'CZ' => 'Czech Republic',
		'DD' => 'German Democratic Republic (no longer exists)',
		'DE' => 'Germany',
		'DJ' => 'Djibouti',
		'DK' => 'Denmark',
		'DM' => 'Dominica',
		'DO' => 'Dominican Republic',
		'DZ' => 'Algeria',
		'EC' => 'Ecuador',
		'EE' => 'Estonia',
		'EG' => 'Egypt',
		'EH' => 'Western Sahara',
		'ER' => 'Eritrea',
		'ES' => 'Spain',
		'ET' => 'Ethiopia',
		'FI' => 'Finland',
		'FJ' => 'Fiji',
		'FK' => 'Falkland Islands (Malvinas)',
		'FM' => 'Micronesia',
		'FO' => 'Faroe Islands',
		'FR' => 'France',
		'FX' => 'France, Metropolitan',
		'GA' => 'Gabon',
		'GB' => 'United Kingdom (Great Britain)',
		'GD' => 'Grenada',
		'GE' => 'Georgia',
		'GF' => 'French Guiana',
		'GH' => 'Ghana',
		'GI' => 'Gibraltar',
		'GL' => 'Greenland',
		'GM' => 'Gambia',
		'GN' => 'Guinea',
		'GP' => 'Guadeloupe',
		'GQ' => 'Equatorial Guinea',
		'GR' => 'Greece',
		'GS' => 'South Georgia and the South Sandwich Islands',
		'GT' => 'Guatemala',
		'GU' => 'Guam',
		'GW' => 'Guinea-Bissau',
		'GY' => 'Guyana',
		'HK' => 'Hong Kong',
		'HM' => 'Heard &amp; McDonald Islands',
		'HN' => 'Honduras',
		'HR' => 'Croatia',
		'HT' => 'Haiti',
		'HU' => 'Hungary',
		'ID' => 'Indonesia',
		'IE' => 'Ireland',
		'IL' => 'Israel',
		'IN' => 'India',
		'IO' => 'British Indian Ocean Territory',
		'IQ' => 'Iraq',
		'IR' => 'Islamic Republic of Iran',
		'IS' => 'Iceland',
		'IT' => 'Italy',
		'JM' => 'Jamaica',
		'JO' => 'Jordan',
		'JP' => 'Japan',
		'KE' => 'Kenya',
		'KG' => 'Kyrgyzstan',
		'KH' => 'Cambodia',
		'KI' => 'Kiribati',
		'KM' => 'Comoros',
		'KN' => 'St. Kitts and Nevis',
		'KP' => 'Korea, Democratic People\'s Republic of',
		'KR' => 'Korea, Republic of',
		'KW' => 'Kuwait',
		'KY' => 'Cayman Islands',
		'KZ' => 'Kazakhstan',
		'LA' => 'Lao People\'s Democratic Republic',
		'LB' => 'Lebanon',
		'LC' => 'Saint Lucia',
		'LI' => 'Liechtenstein',
		'LK' => 'Sri Lanka',
		'LR' => 'Liberia',
		'LS' => 'Lesotho',
		'LT' => 'Lithuania',
		'LU' => 'Luxembourg',
		'LV' => 'Latvia',
		'LY' => 'Libyan Arab Jamahiriya',
		'MA' => 'Morocco',
		'MC' => 'Monaco',
		'MD' => 'Moldova, Republic of',
		'MG' => 'Madagascar',
		'MH' => 'Marshall Islands',
		'ML' => 'Mali',
		'MN' => 'Mongolia',
		'MM' => 'Myanmar',
		'MO' => 'Macau',
		'MP' => 'Northern Mariana Islands',
		'MQ' => 'Martinique',
		'MR' => 'Mauritania',
		'MS' => 'Monserrat',
		'MT' => 'Malta',
		'MU' => 'Mauritius',
		'MV' => 'Maldives',
		'MW' => 'Malawi',
		'MX' => 'Mexico',
		'MY' => 'Malaysia',
		'MZ' => 'Mozambique',
		'NA' => 'Namibia',
		'NC' => 'New Caledonia',
		'NE' => 'Niger',
		'NF' => 'Norfolk Island',
		'NG' => 'Nigeria',
		'NI' => 'Nicaragua',
		'NL' => 'Netherlands',
		'NO' => 'Norway',
		'NP' => 'Nepal',
		'NR' => 'Nauru',
		'NT' => 'Neutral Zone (no longer exists)',
		'NU' => 'Niue',
		'NZ' => 'New Zealand',
		'OM' => 'Oman',
		'PA' => 'Panama',
		'PE' => 'Peru',
		'PF' => 'French Polynesia',
		'PG' => 'Papua New Guinea',
		'PH' => 'Philippines',
		'PK' => 'Pakistan',
		'PL' => 'Poland',
		'PM' => 'St. Pierre &amp; Miquelon',
		'PN' => 'Pitcairn',
		'PR' => 'Puerto Rico',
		'PT' => 'Portugal',
		'PW' => 'Palau',
		'PY' => 'Paraguay',
		'QA' => 'Qatar',
		'RE' => 'Réunion',
		'RO' => 'Romania',
		'RU' => 'Russian Federation',
		'RW' => 'Rwanda',
		'SA' => 'Saudi Arabia',
		'SB' => 'Solomon Islands',
		'SC' => 'Seychelles',
		'SD' => 'Sudan',
		'SE' => 'Sweden',
		'SG' => 'Singapore',
		'SH' => 'St. Helena',
		'SI' => 'Slovenia',
		'SJ' => 'Svalbard &amp; Jan Mayen Islands',
		'SK' => 'Slovakia',
		'SL' => 'Sierra Leone',
		'SM' => 'San Marino',
		'SN' => 'Senegal',
		'SO' => 'Somalia',
		'SR' => 'Suriname',
		'ST' => 'Sao Tome &amp; Principe',
		'SU' => 'Union of Soviet Socialist Republics (no longer exists)',
		'SV' => 'El Salvador',
		'SY' => 'Syrian Arab Republic',
		'SZ' => 'Swaziland',
		'TC' => 'Turks &amp; Caicos Islands',
		'TD' => 'Chad',
		'TF' => 'French Southern Territories',
		'TG' => 'Togo',
		'TH' => 'Thailand',
		'TJ' => 'Tajikistan',
		'TK' => 'Tokelau',
		'TM' => 'Turkmenistan',
		'TN' => 'Tunisia',
		'TO' => 'Tonga',
		'TP' => 'East Timor',
		'TR' => 'Turkey',
		'TT' => 'Trinidad &amp; Tobago',
		'TV' => 'Tuvalu',
		'TW' => 'Taiwan, Province of China',
		'TZ' => 'Tanzania, United Republic of',
		'UA' => 'Ukraine',
		'UG' => 'Uganda',
		'UM' => 'United States Minor Outlying Islands',
		'US' => 'United States of America',
		'UY' => 'Uruguay',
		'UZ' => 'Uzbekistan',
		'VA' => 'Vatican City State (Holy See)',
		'VC' => 'St. Vincent &amp; the Grenadines',
		'VE' => 'Venezuela',
		'VG' => 'British Virgin Islands',
		'VI' => 'United States Virgin Islands',
		'VN' => 'Viet Nam',
		'VU' => 'Vanuatu',
		'WF' => 'Wallis &amp; Futuna Islands',
		'WS' => 'Samoa',
		'YD' => 'Democratic Yemen (no longer exists)',
		'YE' => 'Yemen',
		'YT' => 'Mayotte',
		'YU' => 'Yugoslavia',
		'ZA' => 'South Africa',
		'ZM' => 'Zambia',
		'ZR' => 'Zaire',
		'ZW' => 'Zimbabwe'
	);
	if (isset($countries[$iso])) {
		return $countries[$iso];
	}

	return false;
}

?>