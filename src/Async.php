<?php
namespace Jolharg;

class Async
{
    // TODO clearTimeout
	public static function setTimeout(Closure $closure, $intTime)
	{
        $intSec = $intTime / 1000;
		switch(pcntl_fork()) {
			case -1:
				throw new Exception('Error forking');
			case 0:
				sleep($intSec);
				$closure();
				self::setTimeout($closure, $intSec);
			default:
		}
	}

    // TODO clearInterval
    public static function setInterval(Closure $closure, $intTime)
	{
        $intSec = $intTime / 1000;
		switch(pcntl_fork()) {
			case -1:
				throw new Exception('Error forking');
			case 0:
				sleep($intSec);
				$closure();
				self::setInterval($closure, $intSec);
			default:
		}
	}

	public static function async(Closure $closure)
	{
		$pid = pcntl_fork();
		switch(pcntl_fork()) {
			case -1:
				throw new Exception('Error forking');
			case 0:
				return $closure();
			default:
		}
	}
}
