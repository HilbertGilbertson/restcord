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
 * ThreadMetadata Model
 */
class ThreadMetadata {

	/**
	 * timestamp when the thread's archive status was last changed, used for calculating recent activity
	 *
	 * @var \DateTimeImmutable
	 */
	public $archive_timestamp;

	/**
	 * whether the thread is archived
	 *
	 * @var bool
	 */
	public $archived = false;

	/**
	 * the thread will stop showing in the channel list after auto_archive_duration minutes of inactivity, can be set to: 60, 1440, 4320, 10080
	 *
	 * @var int
	 */
	public $auto_archive_duration;

	/**
	 * timestamp when the thread was created; only populated for threads created after 2022-01-09
	 *
	 * @var \DateTimeImmutable|null
	 */
	public $create_timestamp;

	/**
	 * whether non-moderators can add other non-moderators to a thread; only available on private threads
	 *
	 * @var bool|null
	 */
	public $invitable = false;

	/**
	 * whether the thread is locked; when a thread is locked, only users with MANAGE_THREADS can unarchive it
	 *
	 * @var bool
	 */
	public $locked = false;

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