<?php
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2014 - 2015, British Columbia Institute of Technology
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package	CodeIgniter
 * @author	EllisLab Dev Team
 * @copyright	Copyright (c) 2008 - 2014, EllisLab, Inc. (http://ellislab.com/)
 * @copyright	Copyright (c) 2014 - 2015, British Columbia Institute of Technology (http://bcit.ca/)
 * @license	http://opensource.org/licenses/MIT	MIT License
 * @link	http://codeigniter.com
 * @since	Version 1.0.0
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Breadcrumb Class
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Breadcrumb
 * @author		EllisLab Dev Team
 * @link		http://codeigniter.com/user_guide/libraries/cart.html
 * @deprecated	3.0.0	This class is too specific for CI.
 */
 
class CI_Breadcrumb
{
	private $_include_home = 'Home';
	private $_breadcrumb = array();
	private $_container_open = '<ol class="breadcrumb">';
	private $_container_close = '</ol>';
 
	public function __construct()
	{
		$CI =& get_instance();

		$CI->load->helper('url');

		if(isset($this->_include_home) && (sizeof($this->_include_home) > 0))
		{
			$this->_breadcrumb[] = array('title'=>$this->_include_home, 'href'=>rtrim(base_url(),'/'));
		}
	}
 
  	public function add($title = NULL, $href = '', $segment = FALSE)
  	{	
		// if the method won't receive the $title parameter, it won't do anything to the $_breadcrumb
		if (is_null($title)) return;

		// first let's find out if we have a $href
		if(isset($href) && strlen($href)>0)
		{
	  		// if $segment is not FALSE we will build the URL from the previous crumb
	  		if ($segment)
	  		{
				$previous = $this->_breadcrumb[sizeof($this->_breadcrumb) - 1]['href'];
				$href = $previous . '/' . $href;
	  		}
	  		// else if the $href is not an absolute path we compose the URL from our site's URL
	  		elseif (!filter_var($href, FILTER_VALIDATE_URL))
	  		{
				$href = site_url($href);
	  		}
		}
		// add crumb to the end of the breadcrumb
		$this->_breadcrumb[] = array('title' => $title, 'href' => $href);
  	}

  	public function output()
  	{
		// Open the breadcrumb container
		$output = $this->_container_open;
		
		if(sizeof($this->_breadcrumb) > 0)
		{
	  		foreach($this->_breadcrumb as $key=>$crumb)
	  		{
				// Add the crumb 
				if(strlen($crumb['href'])>0)
				{
					$output .= '<li>';
		  			$output .= anchor($crumb['href'],$crumb['title']);
					$output .= '</li>';
				}
				else
				{
					$output .= '<li class="active">';
		  			$output .= $crumb['title'];
					$output .= '</li>';
				}
	  		}
		}
		// Close the breadcrumb container
		$output .= $this->_container_close;
		return $output;
  	}
}