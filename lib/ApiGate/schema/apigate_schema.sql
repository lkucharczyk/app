
-- Creates table for API Key information.  This includes information about the app itself, contact info related to the app,
-- and any rate-limiting rules.
--
DROP TABLE IF EXISTS apiGate_keys;
CREATE TABLE apiGate_keys (
	user_id INT(11) NOT NULL, -- foreign key to apiGate_users.id (which may be the id of whatever external system you are using for users)
	apiKey VARCHAR(255) NOT NULL, -- the actual API key. If generated by API Gate (as opposed to being imported from a legacy system) this will be a somewhat random hex string.
	nickName VARCHAR(255) DEFAULT NULL, -- nickname for the API key. If null, the app will use the apiKey as the visual name of the key.

	enabled TINYINT(1) DEFAULT 1, -- will be flipped when the key is disabled
	
	-- Contact info
	email TINYTEXT NOT NULL, -- required so that someone can be contacted in emergencies (their app has an obvious bug, has gone over the rate-limit, etc.)
	firstName VARCHAR(255) NOT NULL,
	lastName VARCHAR(255) NOT NULL
);

-- Creates table for users this can be tied directly
-- to the user id of another system if you just want to grant API keys to existing users.
-- TODO: DO WE NEED THIS TABLE FOR ANYTHING IF WE'RE USING ANOTHER SYSTEM FOR USER_IDs?
DROP TABLE IF EXISTS apiGate_users;
CREATE TABLE apiGate_users (
	id INT(11) NOT NULL AUTOINCREMENT, -- If you are using a separate system for the auth (and just trying API Gate to those accounts, then force-set this id.

	PRIMARY KEY(id),
);

---- ----
-- Table for recording a log of when API keys were banned and un-banned so that the accidental or temporary bans can be
-- easily reverted as needed and aren't confused with intentional and/or permanent bans.
---- ----
DROP TABLE IF EXISTS apiGate_banLog;
CREATE TABLE apiGate_banLog (
	apiKey VARCHAR(255) NOT NULL,
	action VARCHAR(255) NOT NULL, -- what was done to the key (disabled/enabled/banned/rate-limited/etc.)
	createdOn TIMESTAMP, -- creation time of this log entry, not of anything else
	username VARCHAR(255) DEFAULT NULL, -- the person (or null if automated) who did the action

	reason TEXT -- a human-readable explanation of the reasoning of the ban/unban/whatever. this should make sure to mention whether it was manual or automatic.
);

----
-- STATS
-- These won't all be kept indefinitely, for example the hourly stats will probably be rolled up into daily numbers
-- and deleted every week or so.
----

DROP TABLE IF EXISTS apiGate_stats_hourly;
CREATE TABLE apiGate_stats_hourly (
	apiKey VARCHAR(255) NOT NULL,
	startOfPeriod DATETIME,
	hits BIGINT DEFAULT 0,

	UNIQUE KEY (apiKey, startOfPeriod)
);

DROP TABLE IF EXISTS apiGate_stats_daily;
CREATE TABLE apiGate_stats_daily (
	apiKey VARCHAR(255) NOT NULL,
	startOfPeriod DATETIME,
	hits BIGINT DEFAULT 0,

	UNIQUE KEY (apiKey, startOfPeriod)
);

-- Seems like overkill when we have daily & monthly.
-- TODO: REMOVE THIS IF WE END UP NOT USING WEEKLY ANYWHERE.
--DROP TABLE IF EXISTS apiGate_stats_weekly;
--CREATE TABLE apiGate_stats_weekly (
--	apiKey VARCHAR(255) NOT NULL,
--	startOfPeriod DATETIME,
--	hits BIGINT DEFAULT 0,
--	
--	UNIQUE KEY (apiKey, startOfPeriod)
--);

DROP TABLE IF EXISTS apiGate_stats_monthly;
CREATE TABLE apiGate_stats_monthly (
	apiKey VARCHAR(255) NOT NULL,
	startOfPeriod DATETIME,
	hits BIGINT DEFAULT 0,
	
	UNIQUE KEY (apiKey, startOfPeriod)
);
