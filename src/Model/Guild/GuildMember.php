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

namespace RestCord\Model\Guild;

/**
 * GuildMember Model
 */
class GuildMember {

	/**
	 * the member's guild avatar hash
	 *
	 * @var string|null
	 */
	public $avatar;

	/**
	 * when the user's timeout will expire and the user will be able to communicate in the guild again, null or a time in the past if the user is not timed out
	 *
	 * @var \DateTimeImmutable|null
	 */
	public $communication_disabled_until;

	/**
	 * whether the user is deafened in voice channels
	 *
	 * @var bool
	 */
	public $deaf = false;

	/**
	 * guild member flags represented as a bit set, defaults to 0
	 *
	 * @var int
	 */
	public $flags;

	/**
	 * when the user joined the guild
	 *
	 * @var \DateTimeImmutable
	 */
	public $joined_at;

	/**
	 * whether the user is muted in voice channels
	 *
	 * @var bool
	 */
	public $mute = false;

	/**
	 * this user's guild nickname
	 *
	 * @var string|null
	 */
	public $nick;

	/**
	 * whether the user has not yet passed the guild's Membership Screening requirements
	 *
	 * @var bool|null
	 */
	public $pending = false;

	/**
	 * total permissions of the member in the channel, including overwrites, returned when in the interaction object
	 *
	 * @var string|null
	 */
	public $permissions;

	/**
	 * when the user started boosting the guild
	 *
	 * @var \DateTimeImmutable|null
	 */
	public $premium_since;

	/**
	 * array of role object ids
	 *
	 * @var int[]
	 */
	public $roles;

	/**
	 * the user this guild member represents
	 *
	 * @var \RestCord\Model\User\User|null
	 */
	public $user;

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