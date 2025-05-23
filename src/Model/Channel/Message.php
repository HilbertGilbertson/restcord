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
class Message
{
    /** @var string */
    public $id;

    /** @var string */
    public $channel_id;

    /** @var \RestCord\Model\User\User */
    public $author;

    /** @var string */
    public $content;

    /** @var string */
    public $timestamp;

    /** @var Embed[] */
    public $embeds;

    /** @var Attachment[] */
    public $attachments;

    /** @var bool */
    public $tts;

    /** @var bool */
    public $mention_everyone;

    /** @var string[] */
    public $mention_roles;

    /** @var ChannelMention[]|null */
    public $mention_channels;

    /** @var string|null */
    public $edited_timestamp;

    /** @var Reaction[]|null */
    public $reactions;

    /** @var int|string|null */
    public $nonce;

    /** @var bool */
    public $pinned;

    /** @var string|null */
    public $webhook_id;

    /** @var string|null */
    public $application_id;

    /** @var int|null */
    public $flags;

    /** @var MessageReference|null */
    public $message_reference;

    /** @var array|null */
    public $message_snapshots;

    /** @var Message|null */
    public $referenced_message;

    /** @var array|null */
    public $interaction_metadata;

    /** @var Channel */
    public $thread;

    /** @var array|null */
    public $components;

    /** @var array|null */
    public $sticker_items;

    /** @var array|null */
    public $stickers;

    /** @var int|null */
    public $position;

    /** @var array|null */
    public $poll;

    /** @var array|null */
    public $call;

    /**
     * party_id from a Rich Presence event
     *
     * @var string|null
     */
    public $party_id;

    /**
     * type of message activity
     *
     * @var int
     */
    public $type;

    /**
     * @param array $content
     */
    public function __construct(array $content = null)
    {
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