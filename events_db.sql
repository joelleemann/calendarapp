create table events (
	id int(11) unsigned auto_increment,
	event_name varchar(128),
	event_start timestamp,
	event_end timestamp,
	event_instructor varchar(128)
);
