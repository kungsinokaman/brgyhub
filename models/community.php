<?php
/**
 * 
 */
class Community
{
	private string $image;
	private string $description;

	function __construct(string $image, string $description)
	{
		$this->image = $image;
		$this->description = $description;
	}

	public function getImage(): string
	{
		return $this->image;
	}

	public function getDescription(): string
	{
		return $this->description;
	}
}