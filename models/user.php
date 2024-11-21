<?php

/**
 * 
 */
class User
{
	private string $profileImage;
	private string $name;

	function __construct(string $profileImage, string $name)
	{
		$this->profileImage = $profileImage;
		$this->name = $name;
	}

	public function getProfileImage(): string
	{
		return $this->profileImage;
	}

	public function getName(): string
	{
		return $this->name;
	}
}