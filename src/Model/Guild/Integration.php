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
 * Integration Model
 */
class Integration {

	/**
	 * integration account information
	 *
	 * @var array
	 */
	public $account;

	/**
	 * The bot/OAuth2 application for discord integrations
	 *
	 * @var array|null
	 */
	public $application;

	/**
	 * whether emoticons should be synced for this integration (twitch only currently)
	 *
	 * @var bool|null
	 */
	public $enable_emoticons = false;

	/**
	 * is this integration enabled
	 *
	 * @var bool
	 */
	public $enabled = false;

	/**
	 * the behavior of expiring subscribers
	 *
	 * @var integration expire behavior|null
	 */
	public $expire_behavior;

	/**
	 * the grace period (in days) before expiring subscribers
	 *
	 * @var int|null
	 */
	public $expire_grace_period;

	/**
	 * integration id
	 *
	 * @var int
	 */
	public $id;

	/**
	 * integration name
	 *
	 * @var string
	 */
	public $name;

	/**
	 * has this integration been revoked
	 *
	 * @var bool|null
	 */
	public $revoked = false;

	/**
	 * id that this integration uses for "subscribers"
	 *
	 * @var int|null
	 */
	public $role_id;

	/**
	 * the scopes the application has been authorized for
	 *
	 * @var array|null
	 */
	public $scopes;

	/**
	 * how many subscribers this integration has
	 *
	 * @var int|null
	 */
	public $subscriber_count;

	/**
	 * when this integration was last synced
	 *
	 * @var \DateTimeImmutable|null
	 */
	public $synced_at;

	/**
	 * is this integration syncing
	 *
	 * @var bool|null
	 */
	public $syncing = false;

	/**
	 * integration type (twitch, youtube, discord, or guild_subscription)
	 *
	 * @var string
	 */
	public $type;

	/**
	 * user for this integration
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