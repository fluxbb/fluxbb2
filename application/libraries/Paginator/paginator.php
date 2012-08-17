<?php namespace Paginator;

class Paginator extends \Laravel\Paginator
{

	/**
	 * The url of the page
	 *
	 * @var string
	 */
	public $url;

	/**
	 * Create a new Paginator instance.
	 *
	 * @param  array  $results
	 * @param  int    $page
	 * @param  int    $total
	 * @param  int    $per_page
	 * @param  int    $last
	 * @param  string $url
	 * @return void
	 */
	protected function __construct($results, $page, $total, $per_page, $last, $url)
	{
		parent::__construct($results, $page, $total, $per_page, $last);
		$this->url = $url;
	}

	/**
	 * Create a new Paginator instance.
	 *
	 * @param  array      $results
	 * @param  int        $total
	 * @param  int        $per_page
	 * @param  int        $page
	 * @param  string     $url
	 * @return Paginator
	 */
	public static function make($results, $total, $per_page, $page = null, $url = null)
	{
		if (is_null($page))
		{
			$page = static::page($total, $per_page);
		}

		$last = ceil($total / $per_page);

		return new static($results, $page, $total, $per_page, $last, $url);
	}

	/**
	 * Create a HTML page link.
	 *
	 * @param  int     $page
	 * @param  string  $text
	 * @param  string  $class
	 * @return string
	 */
	protected function link($page, $text, $class)
	{
		$query = '?page='.$page.$this->appendage($this->appends);

		return \HTML::link(($this->url ?: \URI::current()).$query, $text, compact('class'), \Request::secure());
	}

}
