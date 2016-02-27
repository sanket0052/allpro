<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class User_info_model extends CI_Model
{
	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
	}

	/**
	 * Get the user information from the user_id which is pass as argument. 
	 * Fetch the data line which id is passed in argument.
	 * Accept only one argument. 1. id.
	 * Return the object of matched id.
	*/
	function get_user_info($user_id)
	{   
		$this->db->select('*');
		$this->db->from('registration');
		$this->db->where('id', $user_id);
		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return FALSE;
		}
	}
	
	/**
	 * Update the User profile information
	 * Update the user profile's information like first name, last name, email, password, profile pic.
	 * Accept Two argument. 
	 *     1. array of the updated filed (key name as table column name and value as the input field value).
	 *     2. id of the user which record is update.   
	 * Return TRUE or FALUE.
	*/
	function update_user_info($data, $id)
	{
		// Update time
		$data['updated_at'] = date('Y-m-d H:i:s');

		$this->db->where('id', $id);
		return $this->db->update('registration', $data);
	}
 
	/**
	 * Return the all country list in array()
	 * Return array().
	*/
	function get_country(){
		$country = array(
			'' => 'Select Country',
			'AF' => 'Afghanistan',
			'AX' => 'Aland Islands',
			'AL' => 'Albania',
			'DZ' => 'Algeria',
			'AS' => 'American Samoa',
			'AD' => 'Andorra',
			'AO' => 'Angola',
			'AI' => 'Anguilla',
			'AQ' => 'Antarctica',
			'AG' => 'Antigua and Barbuda',
			'AR' => 'Argentina',
			'AM' => 'Armenia',
			'AW' => 'Aruba',
			'AU' => 'Australia',
			'AT' => 'Austria',
			'AZ' => 'Azerbaijan',
			'BS' => 'Bahamas the',
			'BH' => 'Bahrain',
			'BD' => 'Bangladesh',
			'BB' => 'Barbados',
			'BY' => 'Belarus',
			'BE' => 'Belgium',
			'BZ' => 'Belize',
			'BJ' => 'Benin',
			'BM' => 'Bermuda',
			'BT' => 'Bhutan',
			'BO' => 'Bolivia',
			'BA' => 'Bosnia and Herzegovina',
			'BW' => 'Botswana',
			'BV' => 'Bouvet Island (Bouvetoya)',
			'BR' => 'Brazil',
			'IO' => 'British Indian Ocean Territory (Chagos Archipelago)',
			'VG' => 'British Virgin Islands',
			'BN' => 'Brunei Darussalam',
			'BG' => 'Bulgaria',
			'BF' => 'Burkina Faso',
			'BI' => 'Burundi',
			'KH' => 'Cambodia',
			'CM' => 'Cameroon',
			'CA' => 'Canada',
			'CV' => 'Cape Verde',
			'KY' => 'Cayman Islands',
			'CF' => 'Central African Republic',
			'TD' => 'Chad',
			'CL' => 'Chile',
			'CN' => 'China',
			'CX' => 'Christmas Island',
			'CC' => 'Cocos (Keeling) Islands',
			'CO' => 'Colombia',
			'KM' => 'Comoros the',
			'CD' => 'Congo',
			'CG' => 'Congo the',
			'CK' => 'Cook Islands',
			'CR' => 'Costa Rica',
			'CI' => 'Cote d\'Ivoire',
			'HR' => 'Croatia',
			'CU' => 'Cuba',
			'CY' => 'Cyprus',
			'CZ' => 'Czech Republic',
			'DK' => 'Denmark',
			'DJ' => 'Djibouti',
			'DM' => 'Dominica',
			'DO' => 'Dominican Republic',
			'EC' => 'Ecuador',
			'EG' => 'Egypt',
			'SV' => 'El Salvador',
			'GQ' => 'Equatorial Guinea',
			'ER' => 'Eritrea',
			'EE' => 'Estonia',
			'ET' => 'Ethiopia',
			'FO' => 'Faroe Islands',
			'FK' => 'Falkland Islands (Malvinas)',
			'FJ' => 'Fiji the Fiji Islands',
			'FI' => 'Finland',
			'FR' => 'France, French Republic',
			'GF' => 'French Guiana',
			'PF' => 'French Polynesia',
			'TF' => 'French Southern Territories',
			'GA' => 'Gabon',
			'GM' => 'Gambia the',
			'GE' => 'Georgia',
			'DE' => 'Germany',
			'GH' => 'Ghana',
			'GI' => 'Gibraltar',
			'GR' => 'Greece',
			'GL' => 'Greenland',
			'GD' => 'Grenada',
			'GP' => 'Guadeloupe',
			'GU' => 'Guam',
			'GT' => 'Guatemala',
			'GG' => 'Guernsey',
			'GN' => 'Guinea',
			'GW' => 'Guinea-Bissau',
			'GY' => 'Guyana',
			'HT' => 'Haiti',
			'HM' => 'Heard Island and McDonald Islands',
			'VA' => 'Holy See (Vatican City State)',
			'HN' => 'Honduras',
			'HK' => 'Hong Kong',
			'HU' => 'Hungary',
			'IS' => 'Iceland',
			'IN' => 'India',
			'ID' => 'Indonesia',
			'IR' => 'Iran',
			'IQ' => 'Iraq',
			'IE' => 'Ireland',
			'IM' => 'Isle of Man',
			'IL' => 'Israel',
			'IT' => 'Italy',
			'JM' => 'Jamaica',
			'JP' => 'Japan',
			'JE' => 'Jersey',
			'JO' => 'Jordan',
			'KZ' => 'Kazakhstan',
			'KE' => 'Kenya',
			'KI' => 'Kiribati',
			'KP' => 'Korea',
			'KR' => 'Korea',
			'KW' => 'Kuwait',
			'KG' => 'Kyrgyz Republic',
			'LA' => 'Lao',
			'LV' => 'Latvia',
			'LB' => 'Lebanon',
			'LS' => 'Lesotho',
			'LR' => 'Liberia',
			'LY' => 'Libyan Arab Jamahiriya',
			'LI' => 'Liechtenstein',
			'LT' => 'Lithuania',
			'LU' => 'Luxembourg',
			'MO' => 'Macao',
			'MK' => 'Macedonia',
			'MG' => 'Madagascar',
			'MW' => 'Malawi',
			'MY' => 'Malaysia',
			'MV' => 'Maldives',
			'ML' => 'Mali',
			'MT' => 'Malta',
			'MH' => 'Marshall Islands',
			'MQ' => 'Martinique',
			'MR' => 'Mauritania',
			'MU' => 'Mauritius',
			'YT' => 'Mayotte',
			'MX' => 'Mexico',
			'FM' => 'Micronesia',
			'MD' => 'Moldova',
			'MC' => 'Monaco',
			'MN' => 'Mongolia',
			'ME' => 'Montenegro',
			'MS' => 'Montserrat',
			'MA' => 'Morocco',
			'MZ' => 'Mozambique',
			'MM' => 'Myanmar',
			'NA' => 'Namibia',
			'NR' => 'Nauru',
			'NP' => 'Nepal',
			'AN' => 'Netherlands Antilles',
			'NL' => 'Netherlands the',
			'NC' => 'New Caledonia',
			'NZ' => 'New Zealand',
			'NI' => 'Nicaragua',
			'NE' => 'Niger',
			'NG' => 'Nigeria',
			'NU' => 'Niue',
			'NF' => 'Norfolk Island',
			'MP' => 'Northern Mariana Islands',
			'NO' => 'Norway',
			'OM' => 'Oman',
			'PK' => 'Pakistan',
			'PW' => 'Palau',
			'PS' => 'Palestinian Territory',
			'PA' => 'Panama',
			'PG' => 'Papua New Guinea',
			'PY' => 'Paraguay',
			'PE' => 'Peru',
			'PH' => 'Philippines',
			'PN' => 'Pitcairn Islands',
			'PL' => 'Poland',
			'PT' => 'Portugal, Portuguese Republic',
			'PR' => 'Puerto Rico',
			'QA' => 'Qatar',
			'RE' => 'Reunion',
			'RO' => 'Romania',
			'RU' => 'Russian Federation',
			'RW' => 'Rwanda',
			'BL' => 'Saint Barthelemy',
			'SH' => 'Saint Helena',
			'KN' => 'Saint Kitts and Nevis',
			'LC' => 'Saint Lucia',
			'MF' => 'Saint Martin',
			'PM' => 'Saint Pierre and Miquelon',
			'VC' => 'Saint Vincent and the Grenadines',
			'WS' => 'Samoa',
			'SM' => 'San Marino',
			'ST' => 'Sao Tome and Principe',
			'SA' => 'Saudi Arabia',
			'SN' => 'Senegal',
			'RS' => 'Serbia',
			'SC' => 'Seychelles',
			'SL' => 'Sierra Leone',
			'SG' => 'Singapore',
			'SK' => 'Slovakia (Slovak Republic)',
			'SI' => 'Slovenia',
			'SB' => 'Solomon Islands',
			'SO' => 'Somalia, Somali Republic',
			'ZA' => 'South Africa',
			'GS' => 'South Georgia and the South Sandwich Islands',
			'ES' => 'Spain',
			'LK' => 'Sri Lanka',
			'SD' => 'Sudan',
			'SR' => 'Suriname',
			'SJ' => 'Svalbard & Jan Mayen Islands',
			'SZ' => 'Swaziland',
			'SE' => 'Sweden',
			'CH' => 'Switzerland, Swiss Confederation',
			'SY' => 'Syrian Arab Republic',
			'TW' => 'Taiwan',
			'TJ' => 'Tajikistan',
			'TZ' => 'Tanzania',
			'TH' => 'Thailand',
			'TL' => 'Timor-Leste',
			'TG' => 'Togo',
			'TK' => 'Tokelau',
			'TO' => 'Tonga',
			'TT' => 'Trinidad and Tobago',
			'TN' => 'Tunisia',
			'TR' => 'Turkey',
			'TM' => 'Turkmenistan',
			'TC' => 'Turks and Caicos Islands',
			'TV' => 'Tuvalu',
			'UG' => 'Uganda',
			'UA' => 'Ukraine',
			'AE' => 'United Arab Emirates',
			'GB' => 'United Kingdom',
			'US' => 'United States of America',
			'UM' => 'United States Minor Outlying Islands',
			'VI' => 'United States Virgin Islands',
			'UY' => 'Uruguay, Eastern Republic of',
			'UZ' => 'Uzbekistan',
			'VU' => 'Vanuatu',
			'VE' => 'Venezuela',
			'VN' => 'Vietnam',
			'WF' => 'Wallis and Futuna',
			'EH' => 'Western Sahara',
			'YE' => 'Yemen',
			'ZM' => 'Zambia',
			'ZW' => 'Zimbabwe'
		);
		return $country;
	}

	/**
	 * Return the country title.
	 * Accept 1 argument.
	 *     1. Country code.
	 * Return Title.
	*/
	function get_country_title($code){
		$country_title = '';
			if($code == 'ZW') { $country_title = 'Trainee'; }
			if($code == 'AF') { $country_title = 'Afghanistan'; }
			if($code == 'AX') { $country_title = 'Aland Islands'; }
			if($code == 'AL') { $country_title = 'Albania'; }
			if($code == 'DZ') { $country_title = 'Algeria'; }
			if($code == 'AS') { $country_title = 'American Samoa'; }
			if($code == 'AD') { $country_title = 'Andorra'; }
			if($code == 'AO') { $country_title = 'Angola'; }
			if($code == 'AI') { $country_title = 'Anguilla'; }
			if($code == 'AQ') { $country_title = 'Antarctica'; }
			if($code == 'AG') { $country_title = 'Antigua and Barbuda'; }
			if($code == 'AR') { $country_title = 'Argentina'; }
			if($code == 'AM') { $country_title = 'Armenia'; }
			if($code == 'AW') { $country_title = 'Aruba'; }
			if($code == 'AU') { $country_title = 'Australia'; }
			if($code == 'AT') { $country_title = 'Austria'; }
			if($code == 'AZ') { $country_title = 'Azerbaijan'; }
			if($code == 'BS') { $country_title = 'Bahamas the'; }
			if($code == 'BH') { $country_title = 'Bahrain'; }
			if($code == 'BD') { $country_title = 'Bangladesh'; }
			if($code == 'BB') { $country_title = 'Barbados'; }
			if($code == 'BY') { $country_title = 'Belarus'; }
			if($code == 'BE') { $country_title = 'Belgium'; }
			if($code == 'BZ') { $country_title = 'Belize'; }
			if($code == 'BJ') { $country_title = 'Benin'; }
			if($code == 'BM') { $country_title = 'Bermuda'; }
			if($code == 'BT') { $country_title = 'Bhutan'; }
			if($code == 'BO') { $country_title = 'Bolivia'; }
			if($code == 'BA') { $country_title = 'Bosnia and Herzegovina'; }
			if($code == 'BW') { $country_title = 'Botswana'; }
			if($code == 'BV') { $country_title = 'Bouvet Island (Bouvetoya)'; }
			if($code == 'BR') { $country_title = 'Brazil'; }
			if($code == 'IO') { $country_title = 'British Indian Ocean Territory (Chagos Archipelago)'; }
			if($code == 'VG') { $country_title = 'British Virgin Islands'; }
			if($code == 'BN') { $country_title = 'Brunei Darussalam'; }
			if($code == 'BG') { $country_title = 'Bulgaria'; }
			if($code == 'BF') { $country_title = 'Burkina Faso'; }
			if($code == 'BI') { $country_title = 'Burundi'; }
			if($code == 'KH') { $country_title = 'Cambodia'; }
			if($code == 'CM') { $country_title = 'Cameroon'; }
			if($code == 'CA') { $country_title = 'Canada'; }
			if($code == 'CV') { $country_title = 'Cape Verde'; }
			if($code == 'KY') { $country_title = 'Cayman Islands'; }
			if($code == 'CF') { $country_title = 'Central African Republic'; }
			if($code == 'TD') { $country_title = 'Chad'; }
			if($code == 'CL') { $country_title = 'Chile'; }
			if($code == 'CN') { $country_title = 'China'; }
			if($code == 'CX') { $country_title = 'Christmas Island'; }
			if($code == 'CC') { $country_title = 'Cocos (Keeling) Islands'; }
			if($code == 'CO') { $country_title = 'Colombia'; }
			if($code == 'KM') { $country_title = 'Comoros the'; }
			if($code == 'CD') { $country_title = 'Congo'; }
			if($code == 'CG') { $country_title = 'Congo the'; }
			if($code == 'CK') { $country_title = 'Cook Islands'; }
			if($code == 'CR') { $country_title = 'Costa Rica'; }
			if($code == 'CI') { $country_title = 'Cote d\'Ivoire'; }
			if($code == 'HR') { $country_title = 'Croatia'; }
			if($code == 'CU') { $country_title = 'Cuba'; }
			if($code == 'CY') { $country_title = 'Cyprus'; }
			if($code == 'CZ') { $country_title = 'Czech Republic'; }
			if($code == 'DK') { $country_title = 'Denmark'; }
			if($code == 'DJ') { $country_title = 'Djibouti'; }
			if($code == 'DM') { $country_title = 'Dominica'; }
			if($code == 'DO') { $country_title = 'Dominican Republic'; }
			if($code == 'EC') { $country_title = 'Ecuador'; }
			if($code == 'EG') { $country_title = 'Egypt'; }
			if($code == 'SV') { $country_title = 'El Salvador'; }
			if($code == 'GQ') { $country_title = 'Equatorial Guinea'; }
			if($code == 'ER') { $country_title = 'Eritrea'; }
			if($code == 'EE') { $country_title = 'Estonia'; }
			if($code == 'ET') { $country_title = 'Ethiopia'; }
			if($code == 'FO') { $country_title = 'Faroe Islands'; }
			if($code == 'FK') { $country_title = 'Falkland Islands (Malvinas)'; }
			if($code == 'FJ') { $country_title = 'Fiji the Fiji Islands'; }
			if($code == 'FI') { $country_title = 'Finland'; }
			if($code == 'FR') { $country_title = 'France, French Republic'; }
			if($code == 'GF') { $country_title = 'French Guiana'; }
			if($code == 'PF') { $country_title = 'French Polynesia'; }
			if($code == 'TF') { $country_title = 'French Southern Territories'; }
			if($code == 'GA') { $country_title = 'Gabon'; }
			if($code == 'GM') { $country_title = 'Gambia the'; }
			if($code == 'GE') { $country_title = 'Georgia'; }
			if($code == 'DE') { $country_title = 'Germany'; }
			if($code == 'GH') { $country_title = 'Ghana'; }
			if($code == 'GI') { $country_title = 'Gibraltar'; }
			if($code == 'GR') { $country_title = 'Greece'; }
			if($code == 'GL') { $country_title = 'Greenland'; }
			if($code == 'GD') { $country_title = 'Grenada'; }
			if($code == 'GP') { $country_title = 'Guadeloupe'; }
			if($code == 'GU') { $country_title = 'Guam'; }
			if($code == 'GT') { $country_title = 'Guatemala'; }
			if($code == 'GG') { $country_title = 'Guernsey'; }
			if($code == 'GN') { $country_title = 'Guinea'; }
			if($code == 'GW') { $country_title = 'Guinea-Bissau'; }
			if($code == 'GY') { $country_title = 'Guyana'; }
			if($code == 'HT') { $country_title = 'Haiti'; }
			if($code == 'HM') { $country_title = 'Heard Island and McDonald Islands'; }
			if($code == 'VA') { $country_title = 'Holy See (Vatican City State)'; }
			if($code == 'HN') { $country_title = 'Honduras'; }
			if($code == 'HK') { $country_title = 'Hong Kong'; }
			if($code == 'HU') { $country_title = 'Hungary'; }
			if($code == 'IS') { $country_title = 'Iceland'; }
			if($code == 'IN') { $country_title = 'India'; }
			if($code == 'ID') { $country_title = 'Indonesia'; }
			if($code == 'IR') { $country_title = 'Iran'; }
			if($code == 'IQ') { $country_title = 'Iraq'; }
			if($code == 'IE') { $country_title = 'Ireland'; }
			if($code == 'IM') { $country_title = 'Isle of Man'; }
			if($code == 'IL') { $country_title = 'Israel'; }
			if($code == 'IT') { $country_title = 'Italy'; }
			if($code == 'JM') { $country_title = 'Jamaica'; }
			if($code == 'JP') { $country_title = 'Japan'; }
			if($code == 'JE') { $country_title = 'Jersey'; }
			if($code == 'JO') { $country_title = 'Jordan'; }
			if($code == 'KZ') { $country_title = 'Kazakhstan'; }
			if($code == 'KE') { $country_title = 'Kenya'; }
			if($code == 'KI') { $country_title = 'Kiribati'; }
			if($code == 'KP') { $country_title = 'Korea'; }
			if($code == 'KR') { $country_title = 'Korea'; }
			if($code == 'KW') { $country_title = 'Kuwait'; }
			if($code == 'KG') { $country_title = 'Kyrgyz Republic'; }
			if($code == 'LA') { $country_title = 'Lao'; }
			if($code == 'LV') { $country_title = 'Latvia'; }
			if($code == 'LB') { $country_title = 'Lebanon'; }
			if($code == 'LS') { $country_title = 'Lesotho'; }
			if($code == 'LR') { $country_title = 'Liberia'; }
			if($code == 'LY') { $country_title = 'Libyan Arab Jamahiriya'; }
			if($code == 'LI') { $country_title = 'Liechtenstein'; }
			if($code == 'LT') { $country_title = 'Lithuania'; }
			if($code == 'LU') { $country_title = 'Luxembourg'; }
			if($code == 'MO') { $country_title = 'Macao'; }
			if($code == 'MK') { $country_title = 'Macedonia'; }
			if($code == 'MG') { $country_title = 'Madagascar'; }
			if($code == 'MW') { $country_title = 'Malawi'; }
			if($code == 'MY') { $country_title = 'Malaysia'; }
			if($code == 'MV') { $country_title = 'Maldives'; }
			if($code == 'ML') { $country_title = 'Mali'; }
			if($code == 'MT') { $country_title = 'Malta'; }
			if($code == 'MH') { $country_title = 'Marshall Islands'; }
			if($code == 'MQ') { $country_title = 'Martinique'; }
			if($code == 'MR') { $country_title = 'Mauritania'; }
			if($code == 'MU') { $country_title = 'Mauritius'; }
			if($code == 'YT') { $country_title = 'Mayotte'; }
			if($code == 'MX') { $country_title = 'Mexico'; }
			if($code == 'FM') { $country_title = 'Micronesia'; }
			if($code == 'MD') { $country_title = 'Moldova'; }
			if($code == 'MC') { $country_title = 'Monaco'; }
			if($code == 'MN') { $country_title = 'Mongolia'; }
			if($code == 'ME') { $country_title = 'Montenegro'; }
			if($code == 'MS') { $country_title = 'Montserrat'; }
			if($code == 'MA') { $country_title = 'Morocco'; }
			if($code == 'MZ') { $country_title = 'Mozambique'; }
			if($code == 'MM') { $country_title = 'Myanmar'; }
			if($code == 'NA') { $country_title = 'Namibia'; }
			if($code == 'NR') { $country_title = 'Nauru'; }
			if($code == 'NP') { $country_title = 'Nepal'; }
			if($code == 'AN') { $country_title = 'Netherlands Antilles'; }
			if($code == 'NL') { $country_title = 'Netherlands the'; }
			if($code == 'NC') { $country_title = 'New Caledonia'; }
			if($code == 'NZ') { $country_title = 'New Zealand'; }
			if($code == 'NI') { $country_title = 'Nicaragua'; }
			if($code == 'NE') { $country_title = 'Niger'; }
			if($code == 'NG') { $country_title = 'Nigeria'; }
			if($code == 'NU') { $country_title = 'Niue'; }
			if($code == 'NF') { $country_title = 'Norfolk Island'; }
			if($code == 'MP') { $country_title = 'Northern Mariana Islands'; }
			if($code == 'NO') { $country_title = 'Norway'; }
			if($code == 'OM') { $country_title = 'Oman'; }
			if($code == 'PK') { $country_title = 'Pakistan'; }
			if($code == 'PW') { $country_title = 'Palau'; }
			if($code == 'PS') { $country_title = 'Palestinian Territory'; }
			if($code == 'PA') { $country_title = 'Panama'; }
			if($code == 'PG') { $country_title = 'Papua New Guinea'; }
			if($code == 'PY') { $country_title = 'Paraguay'; }
			if($code == 'PE') { $country_title = 'Peru'; }
			if($code == 'PH') { $country_title = 'Philippines'; }
			if($code == 'PN') { $country_title = 'Pitcairn Islands'; }
			if($code == 'PL') { $country_title = 'Poland'; }
			if($code == 'PT') { $country_title = 'Portugal, Portuguese Republic'; }
			if($code == 'PR') { $country_title = 'Puerto Rico'; }
			if($code == 'QA') { $country_title = 'Qatar'; }
			if($code == 'RE') { $country_title = 'Reunion'; }
			if($code == 'RO') { $country_title = 'Romania'; }
			if($code == 'RU') { $country_title = 'Russian Federation'; }
			if($code == 'RW') { $country_title = 'Rwanda'; }
			if($code == 'BL') { $country_title = 'Saint Barthelemy'; }
			if($code == 'SH') { $country_title = 'Saint Helena'; }
			if($code == 'KN') { $country_title = 'Saint Kitts and Nevis'; }
			if($code == 'LC') { $country_title = 'Saint Lucia'; }
			if($code == 'MF') { $country_title = 'Saint Martin'; }
			if($code == 'PM') { $country_title = 'Saint Pierre and Miquelon'; }
			if($code == 'VC') { $country_title = 'Saint Vincent and the Grenadines'; }
			if($code == 'WS') { $country_title = 'Samoa'; }
			if($code == 'SM') { $country_title = 'San Marino'; }
			if($code == 'ST') { $country_title = 'Sao Tome and Principe'; }
			if($code == 'SA') { $country_title = 'Saudi Arabia'; }
			if($code == 'SN') { $country_title = 'Senegal'; }
			if($code == 'RS') { $country_title = 'Serbia'; }
			if($code == 'SC') { $country_title = 'Seychelles'; }
			if($code == 'SL') { $country_title = 'Sierra Leone'; }
			if($code == 'SG') { $country_title = 'Singapore'; }
			if($code == 'SK') { $country_title = 'Slovakia (Slovak Republic)'; }
			if($code == 'SI') { $country_title = 'Slovenia'; }
			if($code == 'SB') { $country_title = 'Solomon Islands'; }
			if($code == 'SO') { $country_title = 'Somalia, Somali Republic'; }
			if($code == 'ZA') { $country_title = 'South Africa'; }
			if($code == 'GS') { $country_title = 'South Georgia and the South Sandwich Islands'; }
			if($code == 'ES') { $country_title = 'Spain'; }
			if($code == 'LK') { $country_title = 'Sri Lanka'; }
			if($code == 'SD') { $country_title = 'Sudan'; }
			if($code == 'SR') { $country_title = 'Suriname'; }
			if($code == 'SJ') { $country_title = 'Svalbard & Jan Mayen Islands'; }
			if($code == 'SZ') { $country_title = 'Swaziland'; }
			if($code == 'SE') { $country_title = 'Sweden'; }
			if($code == 'CH') { $country_title = 'Switzerland, Swiss Confederation'; }
			if($code == 'SY') { $country_title = 'Syrian Arab Republic'; }
			if($code == 'TW') { $country_title = 'Taiwan'; }
			if($code == 'TJ') { $country_title = 'Tajikistan'; }
			if($code == 'TZ') { $country_title = 'Tanzania'; }
			if($code == 'TH') { $country_title = 'Thailand'; }
			if($code == 'TL') { $country_title = 'Timor-Leste'; }
			if($code == 'TG') { $country_title = 'Togo'; }
			if($code == 'TK') { $country_title = 'Tokelau'; }
			if($code == 'TO') { $country_title = 'Tonga'; }
			if($code == 'TT') { $country_title = 'Trinidad and Tobago'; }
			if($code == 'TN') { $country_title = 'Tunisia'; }
			if($code == 'TR') { $country_title = 'Turkey'; }
			if($code == 'TM') { $country_title = 'Turkmenistan'; }
			if($code == 'TC') { $country_title = 'Turks and Caicos Islands'; }
			if($code == 'TV') { $country_title = 'Tuvalu'; }
			if($code == 'UG') { $country_title = 'Uganda'; }
			if($code == 'UA') { $country_title = 'Ukraine'; }
			if($code == 'AE') { $country_title = 'United Arab Emirates'; }
			if($code == 'GB') { $country_title = 'United Kingdom'; }
			if($code == 'US') { $country_title = 'United States of America'; }
			if($code == 'UM') { $country_title = 'United States Minor Outlying Islands'; }
			if($code == 'VI') { $country_title = 'United States Virgin Islands'; }
			if($code == 'UY') { $country_title = 'Uruguay, Eastern Republic of'; }
			if($code == 'UZ') { $country_title = 'Uzbekistan'; }
			if($code == 'VU') { $country_title = 'Vanuatu'; }
			if($code == 'VE') { $country_title = 'Venezuela'; }
			if($code == 'VN') { $country_title = 'Vietnam'; }
			if($code == 'WF') { $country_title = 'Wallis and Futuna'; }
			if($code == 'EH') { $country_title = 'Western Sahara'; }
			if($code == 'YE') { $country_title = 'Yemen'; }
			if($code == 'ZM') { $country_title = 'Zambia'; }
			if($code == 'ZW') { $country_title = 'Zimbabwe'; }
		return $country_title;
	}

	/**
	 * Return the all designation list in array()
	 * Return array().
	*/
	function get_designation(){
		$designation_type = array(
			'' => 'Select Designation', 
			'TR' => 'Trainee', 
			'JW' => 'Junior Web Developer', 
			'SD' => 'Senior Web Developer', 
			'PM' => 'Project Manager', 
			'TS' => 'Tester'
			);
		return $designation_type;
	}

	/**
	 * Get designation title.
	 * Return the designation title.
	 * Accept 1 argument.
	 *     1. Designation code.
	 * Return Title.
	*/
	function get_designation_title($code){
		$designation_title = '';
			if($code == 'TR') { $designation_title = 'Trainee'; }
			if($code == 'JW') { $designation_title = 'Junior Web Developer'; }
			if($code == 'SD') { $designation_title = 'Senior Web Developer'; }
			if($code == 'PM') { $designation_title = 'Project Manager'; }
			if($code == 'TS') { $designation_title = 'Tester'; }
		return $designation_title;
	}

	/**
	 * Get all register user data.
	 * Accept 1 Perameter.
	 *    1. Type of JOIN Query.
	 * Return all register user list.
	 * Return array().
	*/
	function get_all_user($type=NULL, $column_array='*'){


		// Fetch The data as per type
		$this->db->select($column_array);
		$this->db->from('registration');
		$this->db->join('bank_detail', 'registration.id = bank_detail.uid', $type);
		$query = $this->db->get();
		return $query->result();
	}

	/**
	 * Get user's bank detail.
	 * Return all register user list.
	 * Return array().
	*/
	function get_user_bnk_detail($id){
		$this->db->select('*');
		$this->db->from('bank_detail');
		$this->db->where('uid', $id);
		$query = $this->db->get();
		return $query->row();
	} 

	/**
	 * Update user's bank detail.
	 * Accept 1 perameter. 
	 *     1. Array() of the bank detail info with user id.
	 * If record exist of specifying id than it will update otherwise enter new record.
	 * Return Update status or Insert ID.
	*/
	function update_user_bank_info($data)
	{
		$this->db->select('*');
		$this->db->from('bank_detail');
		$this->db->where('uid', $data['uid']);
		$query = $this->db->get();

		if($query->num_rows() > 0){

			$data['update_at'] = date('Y-m-d H:i:s');
			// Update that record
			$this->db->where('uid', $data['uid']);
			return $this->db->update('bank_detail', $data);

		}else{

			// Insert query builder. Build the insert query.
			$result = $this->db->insert('bank_detail', $data);

			// Get Last Inserted id
			$insert_id = $this->db->insert_id();

			// Return that id to the controller from here
			return $insert_id;
		}
	}  

	/**
	 * Delete the user info by passing id.
	 * Accept 1 perameter.
	 *     1. User Id.
	 * @param  [int] $user_id [description]
	 * @return [bool]          [description]
	 */
	function delete_user($user_id)
	{
		$this->db->where('id', $user_id);
		$this->db->delete('registration');

		$this->db->where('uid', $user_id);
		return  $this->db->delete('bank_detail');
	}	
}
?>

