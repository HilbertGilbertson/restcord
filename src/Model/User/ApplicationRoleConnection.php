<?php

/*
 * Copyright 2017 Aaron Scherer
 *
 * This source file is subject to the license that is bundled
 * with this source code in the file LICENSE
 *
 * @package     restcord/restcord
 * @copyright   Aaron Scherer 2017
 * @license     MIT
 */

namespace RestCord\Model\User;

/**
 * ApplicationRoleConnection Model
 */
class ApplicationRoleConnection {

	/**
	 * access tokens of users that have granted your app the gdm.join scope
	 *
	 * @var array
	 */
	public $access_tokens;

	/**
	 * get guilds after this guild ID
	 *
	 * @var int
	 */
	public $after;

	/**
	 * if passed, modifies the user's avatar
	 *
	 * @var image data
	 */
	public $avatar;

	/**
	 * get guilds before this guild ID
	 *
	 * @var int
	 */
	public $before;

	/**
	 * max number of guilds to return (1-200)
	 *
	 * @var int
	 */
	public $limit = 200;

	/**
	 * object mapping application role connection metadata keys to their string-ified value (max 100 characters) for the user on the platform a bot has connected
	 *
	 * @var array|null
	 */
	public $metadata;

	/**
	 * a dictionary of user ids to their respective nicknames
	 *
	 * @var dict
	 */
	public $nicks;

	/**
	 * the vanity name of the platform a bot has connected (max 50 characters)
	 *
	 * @var string|null
	 */
	public $platform_name;

	/**
	 * the username on the platform a bot has connected (max 100 characters)
	 *
	 * @var string|null
	 */
	public $platform_username;

	/**
	 * the recipient to open a DM channel with
	 *
	 * @var int
	 */
	public $recipient_id;

	/**
	 * user's username, if changed may cause the user's discriminator to be randomized.
	 *
	 * @var string
	 */
	public $username;

	/**
	 * @param array $content
	 */
	public function __construct(array $content = null) {
		if (null === $content) {
		    return;
		}
		                    
		foreach ($content as $key => $value) {
		    $key = lcfirst(str_replace(' ', '', ucwords(str_replace('_', ' ', $key))));
		    if (property_exists($this, $key)) {
		        $this->{$key} = $value;
		    }
		}
	}
}