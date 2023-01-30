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

namespace RestCord\Model\Channel;

/**
 * MessageReference Model
 */
class MessageReference {

	/**
	 * id of the originating message's channel
	 *
	 * @var int|null
	 */
	public $channel_id;

	/**
	 * when sending, whether to error if the referenced message doesn't exist instead of sending as a normal (non-reply) message, default true
	 *
	 * @var bool|null
	 */
	public $fail_if_not_exists = false;

	/**
	 * id of the originating message's guild
	 *
	 * @var int|null
	 */
	public $guild_id;

	/**
	 * id of the originating message
	 *
	 * @var int|null
	 */
	public $message_id;

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