<?php namespace Softservlet\FileManager\Deliver;

use Exception;

/**
 * @author Marius Leustean <marius@softservlet.com>
 *
 * @version 1.0
 */

class UriParser
{
	/**
	 * @brief the uri to be parsed
	 *
	 * @var string
	 */
	protected $uri;

	/**
	 * @brief the uri schema
	 *
	 * @var string
	 */
	protected $schema;

	/**
	 * @brief the uri location
	 *
	 * @var string
	 */
	protected $location;

	/**
	 * @brief the uri query (after ?)
	 *
	 * @var string
	 */
	protected $query;

	/**
	 * @brief uri fragment (after #)
	 *
	 * @var fragment
	 */
	protected $fragment;
		
	/**
	 * @brief class constructor
	 *
	 * @param string $uri to be parsed
	 */
	public function __construct($uri)
	{
		$this->parseUri($uri);
	}
	
	/**
	 * @brief get the uri schema
	 *
	 * @return string
	 */
	public function getSchema()
	{
		return $this->schema;
	}

	/**
	 * @brief get the uri location part
	 *
	 * @return string
	 */
	public function getLocation()
	{
		return $this->location;
	}

	/**
	 * @brief get the uri query string 
	 *
	 * @return string
	 */
	public function getQuery()
	{
		return $this->query;
	}

	/**
	 * @brief get the uri fragment part
	 *
	 * @return string
	 */
	public function getFragment()
	{
		return $this->fragment;
	}
	/**
	 * @brief parse the uri into variables
	 *
	 * @param uri to be parsed
	 *
	 * @return void
	 */
	protected function parseUri($uri) 
	{
		$split = preg_split('/\:\/{2}|\?|\#/i', $uri);

		if(count($split) < 2) {
			throw new Exception(sprintf("The uri [%s] is not valid", $uri));
		}

		$this->uri = $uri;
		$this->schema = $split[0];
		$this->location = $split[1];
		
		if(isset($split[2])) {
			$this->query = $split[2];
		}

		if(isset($split[3])) {
			$this->fragment = $split[3];
		}
	}
}

