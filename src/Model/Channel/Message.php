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
 * Message Model
 */
class Message {

	/**
	 * any attached files
	 * 
	 * @var array
	 */
	public $attachments;

	/**
	 * the author of this message (not guaranteed to be a valid user, see below)
	 * 
	 * @var array
	 */
	public $author;

	/**
	 * id of the channel the message was sent in
	 * 
	 * @var int
	 */
	public $channel_id;

	/**
	 * contents of the message
	 * 
	 * @var string
	 */
	public $content;

	/**
	 * when this message was edited (or null if never)
	 * 
	 * @var ISO8601 timestamp
	 */
	public $edited_timestamp;

	/**
	 * any embedded content
	 * 
	 * @var array
	 */
	public $embeds;

	/**
	 * id of the message
	 * 
	 * @var int
	 */
	public $id;

	/**
	 * whether this message mentions everyone
	 * 
	 * @var bool
	 */
	public $mention_everyone = false;

	/**
	 * roles specifically mentioned in this message
	 * 
	 * @var array
	 */
	public $mention_roles;

	/**
	 * users specifically mentioned in the message
	 * 
	 * @var array
	 */
	public $mentions;

	/**
	 * used for validating a message was sent
	 * 
	 * @var int|null
	 */
	public $nonce;

	/**
	 * whether this message is pinned
	 * 
	 * @var bool
	 */
	public $pinned = false;

	/**
	 * reactions to the message
	 * 
	 * @var array|null
	 */
	public $reactions;

	/**
	 * when this message was sent
	 * 
	 * @var ISO8601 timestamp
	 */
	public $timestamp;

	/**
	 * whether this was a TTS message
	 * 
	 * @var bool
	 */
	public $tts = false;

	/**
	 * type of message
	 * 
	 * @var int
	 */
	public $type;

	/**
	 * if the message is generated by a webhook, this is the webhook's id
	 * 
	 * @var int|null
	 */
	public $webhook_id;

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