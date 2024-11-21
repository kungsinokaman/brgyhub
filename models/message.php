<?php

/**
 * 
 */
class Message
{
	private string $message;

	function __construct(string $message)
	{
		$this->message = $message;
	}

	public function getMessage()
	{
		return $this->message;
	}
}