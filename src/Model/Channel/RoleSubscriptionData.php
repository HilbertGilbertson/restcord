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
 * RoleSubscriptionData Model
 */
class RoleSubscriptionData {

	/**
	 * access token of a user that has granted your app the gdm.join scope
	 *
	 * @var string
	 */
	public $access_token;

	/**
	 * Get thread members after this user ID
	 *
	 * @var int|null
	 */
	public $after;

	/**
	 * the bitwise value of all allowed permissions (default "0")
	 *
	 * @var string|null
	 */
	public $allow;

	/**
	 * Allowed mentions for the message
	 *
	 * @var array
	 */
	public $allowed_mentions;

	/**
	 * the IDs of the set of tags that have been applied to a thread in a GUILD_FORUM channel
	 *
	 * @var array|null
	 */
	public $applied_tags;

	/**
	 * Get messages around this message ID
	 *
	 * @var int|null
	 */
	public $around;

	/**
	 * Attached files to keep and possible descriptions for new files. See Uploading Files
	 *
	 * @var array
	 */
	public $attachments;

	/**
	 * duration in minutes to automatically archive the thread after recent activity, can be set to: 60, 1440, 4320, 10080
	 *
	 * @var int|null
	 */
	public $auto_archive_duration;

	/**
	 * returns threads before this id
	 *
	 * @var int|null
	 */
	public $before;

	/**
	 * Components to include with the message
	 *
	 * @var array
	 */
	public $components;

	/**
	 * Message contents (up to 2000 characters)
	 *
	 * @var string
	 */
	public $content;

	/**
	 * the bitwise value of all disallowed permissions (default "0")
	 *
	 * @var string|null
	 */
	public $deny;

	/**
	 * Embedded rich content (up to 6000 characters)
	 *
	 * @var array
	 */
	public $embeds;

	/**
	 * Contents of the file being sent/edited. See Uploading Files
	 *
	 * @var file contents
	 */
	public $files;

	/**
	 * Edit the flags of a message (only SUPPRESS_EMBEDS can currently be set/unset)
	 *
	 * @var int
	 */
	public $flags;

	/**
	 * whether non-moderators can add other non-moderators to a thread; only available when creating a private thread
	 *
	 * @var bool|null
	 */
	public $invitable = false;

	/**
	 * whether this notification is for a renewal rather than a new purchase
	 *
	 * @var bool
	 */
	public $is_renewal = false;

	/**
	 * optional maximum number of threads to return
	 *
	 * @var int|null
	 */
	public $limit;

	/**
	 * duration of invite in seconds before expiry, or 0 for never. between 0 and 604800 (7 days)
	 *
	 * @var int
	 */
	public $max_age = 86400;

	/**
	 * max number of uses or 0 for unlimited. between 0 and 100
	 *
	 * @var int
	 */
	public $max_uses = 0;

	/**
	 * contents of the first message in the forum thread
	 *
	 * @var array
	 */
	public $message;

	/**
	 * an array of message ids to delete (2-100)
	 *
	 * @var int[]
	 */
	public $messages;

	/**
	 * 1-100 character channel name
	 *
	 * @var string
	 */
	public $name;

	/**
	 * nickname of the user being added
	 *
	 * @var string
	 */
	public $nick;

	/**
	 * JSON-encoded body of non-file params (multipart/form-data only). See Uploading Files
	 *
	 * @var string
	 */
	public $payload_json;

	/**
	 * amount of seconds a user has to wait before sending another message (0-21600)
	 *
	 * @var int|null
	 */
	public $rate_limit_per_user;

	/**
	 * the id of the sku and listing that the user is subscribed to
	 *
	 * @var int
	 */
	public $role_subscription_listing_id;

	/**
	 * the id of the embedded application to open for this invite, required if target_type is 2, the application must have the EMBEDDED flag
	 *
	 * @var int
	 */
	public $target_application_id;

	/**
	 * the type of target for this voice channel invite
	 *
	 * @var int
	 */
	public $target_type;

	/**
	 * the id of the user whose stream to display for this invite, required if target_type is 1, the user must be streaming in the channel
	 *
	 * @var int
	 */
	public $target_user_id;

	/**
	 * whether this invite only grants temporary membership
	 *
	 * @var bool
	 */
	public $temporary = false;

	/**
	 * the name of the tier that the user is subscribed to
	 *
	 * @var string
	 */
	public $tier_name;

	/**
	 * the cumulative number of months that the user has been subscribed for
	 *
	 * @var int
	 */
	public $total_months_subscribed;

	/**
	 * the type of thread to create
	 *
	 * @var int|null
	 */
	public $type;

	/**
	 * if true, don't try to reuse a similar invite (useful for creating many unique one time use invites)
	 *
	 * @var bool
	 */
	public $unique = false;

	/**
	 * id of target channel
	 *
	 * @var int
	 */
	public $webhook_channel_id;

	/**
	 * Whether to include a guild member object for each thread member
	 *
	 * @var bool|null
	 */
	public $with_member = false;

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