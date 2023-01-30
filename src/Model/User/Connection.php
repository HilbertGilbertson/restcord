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
 * Connection Model
 */
class Connection {

	/**
	 * whether friend sync is enabled for this connection
	 *
	 * @var bool
	 */
	public $friend_sync = false;

	/**
	 * id of the connection account
	 *
	 * @var string
	 */
	public $id;

	/**
	 * an array of partial server integrations
	 *
	 * @var array|null
	 */
	public $integrations;

	/**
	 * the username of the connection account
	 *
	 * @var string
	 */
	public $name;

	/**
	 * whether the connection is revoked
	 *
	 * @var bool|null
	 */
	public $revoked = false;

	/**
	 * whether activities related to this connection will be shown in presence updates
	 *
	 * @var bool
	 */
	public $show_activity = false;

	/**
	 * whether this connection has a corresponding third party OAuth2 token
	 *
	 * @var bool
	 */
	public $two_way_link = false;

	/**
	 * the service of this connection
	 *
	 * @var string
	 */
	public $type;

	/**
	 * whether the connection is verified
	 *
	 * @var bool
	 */
	public $verified = false;

	/**
	 * visibility of this connection
	 *
	 * @var int
	 */
	public $visibility;

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