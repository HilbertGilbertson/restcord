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
 * GuildWidget Model
 */
class GuildWidget {

	/**
	 * voice and stage channels which are accessible by @everyone
	 *
	 * @var array
	 */
	public $channels;

	/**
	 * guild id
	 *
	 * @var int
	 */
	public $id;

	/**
	 * instant invite for the guilds specified widget invite channel
	 *
	 * @var string
	 */
	public $instant_invite;

	/**
	 * special widget user objects that includes users presence (Limit 100)
	 *
	 * @var array
	 */
	public $members;

	/**
	 * guild name (2-100 characters)
	 *
	 * @var string
	 */
	public $name;

	/**
	 * number of online members in this guild
	 *
	 * @var int
	 */
	public $presence_count;

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