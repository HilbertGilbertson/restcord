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

namespace RestCord\Model\AuditLog;

/**
 * AuditLog Model
 */
class AuditLog {

	/**
	 * List of application commands referenced in the audit log
	 *
	 * @var array
	 */
	public $application_commands;

	/**
	 * List of audit log entries, sorted from most to least recent
	 *
	 * @var array
	 */
	public $audit_log_entries;

	/**
	 * List of auto moderation rules referenced in the audit log
	 *
	 * @var array
	 */
	public $auto_moderation_rules;

	/**
	 * List of guild scheduled events referenced in the audit log
	 *
	 * @var array
	 */
	public $guild_scheduled_events;

	/**
	 * List of partial integration objects
	 *
	 * @var array
	 */
	public $integrations;

	/**
	 * List of threads referenced in the audit log*
	 *
	 * @var array
	 */
	public $threads;

	/**
	 * List of users referenced in the audit log
	 *
	 * @var array
	 */
	public $users;

	/**
	 * List of webhooks referenced in the audit log
	 *
	 * @var array
	 */
	public $webhooks;

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