<?php
class memcached {
	var $memcache;
	public function __construct() {
		$this->memcache = new Memcache;
		$this->memcache->connect('localhost', 11211);
		log_message('debug','Created Memcache connection.');
	}
	/**
	 *
	 * @param unknown_type $key
	 * @param unknown_type $data
	 * @param unknown_type $flag if data compressed; usually be 0 but can be set to MEMCACHE_COMPRESSED,
	 * @param unknown_type $expires seconds of expire
	 */
	function set($key, $data, $flag, $expires)
	{
		$this->memcache->set($key, $data, $flag, $expires);
	}

	function replace($key, $data, $flag, $expires)
	{
		$this->memcache->replace($key, $data, $flag, $expires);
	}

	function get($key, $flag)
	{
		return $this->memcache->get($key, $flag);
	}

	function delete($key, $timeout = 0)
	{
		$this->memcache->delete($key, $timeout);
	}

	//marks all memcache items as expired,
	function flush()
	{
		$this->memcache->flush();
		sleep(1);
	}

	function close()
	{
		$this->memcache->close();
		log_message('debug','Closed Memcache connection.');
	}
}