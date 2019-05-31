create database calendar;
create table events (
						id int(11) unsigned auto_increment,
						event_name varchar(128),
						event_description text,
						event_instructor varchar(128),
						primary key (id)
);
create table sessions (
						  id int(11) unsigned auto_increment,
						  event_id int(11) unsigned,
						  start_time timestamp,
						  end_time timestamp,
						  primary key (id),
						  foreign key f_event_id (event_id) references events(id)
);

insert into events (event_name, event_instructor, event_description) values
('H.I.I.T', 'Alana', 'High Intensity Interval Training utilizes a series of short, highintensity intervals, followed up by longer, low-intensity intervals.'),
('Cycle', 'Jessica' , 'You will experience an aerobic exercise on a stationary bike while an instructor motivates you through visualization with motivational music'),
('Pilates', 'Stacia' , 'A progressive series of exercises designed to increase the strength of your body’s core (abdominals, back, gluteus and hips) while lengthening the muscles. Classes are “multi–level” unless noted'),
('Tabata', 'Laurie' , 'High-intense, interval training; 20 seconds of cardio followed by a 10-second rest period (eight times). Increases endurance and metabolism, while decreasing body fat. Suitable for all fitness levels.'),
('Mindful Meditation', 'Lesley' , 'This class combines guided meditation with Restorative Yoga.  Restorative teaches you to feel. Rather than rushing through asanas from breath to breath, it cultivates a powerful inner awareness. On the superficial level, you learn to feel how the slightest, most subtle movement changes the asana completely. On a deeper level, emotions surface that you usually suppress. You learn how to sit with difficult or painful emotions that arise and work through them - the same way you physically work with a difficult posture — adjust as needed, sit with it, breathe through it, send it Prana, and smile. Anywhere from 5-10 postures.');
insert into sessions (event_id, start_time, end_time) values
(1, '2019-05-26 06:30', '2019-05-26 07:30'),
(2, '2019-05-26 08:30', '2019-05-26 09:30'),
(3, '2019-05-26 11:00', '2019-05-26 12:30'),
(4, '2019-05-26 02:30', '2019-05-26 16:30'),

(1, '2019-05-27 07:30', '2019-05-27 08:30'),
(2, '2019-05-27 11:30', '2019-05-27 16:00'),

(1, '2019-05-28 06:30', '2019-05-28 07:30'),
(2, '2019-05-28 08:30', '2019-05-28 09:30'),
(3, '2019-05-28 11:00', '2019-05-28 12:30'),
(4, '2019-05-28 02:30', '2019-05-28 16:30'),

(4, '2019-05-29 07:30', '2019-05-29 09:30'),
(2, '2019-05-29 11:30', '2019-05-29 16:00'),

(1, '2019-05-30 06:30', '2019-05-30 07:30'),
(2, '2019-05-30 08:30', '2019-05-30 09:30'),
(3, '2019-05-30 11:00', '2019-05-30 12:30'),
(4, '2019-05-30 02:30', '2019-05-30 16:30'),

(4, '2019-05-31 07:30', '2019-05-31 09:30'),
(2, '2019-05-31 11:30', '2019-05-31 16:00'),

(1, '2019-06-01 06:30', '2019-06-01 07:30'),
(2, '2019-06-01 08:30', '2019-06-01 09:30'),
(3, '2019-06-01 11:00', '2019-06-01 12:30'),
(4, '2019-06-01 02:30', '2019-06-01 16:30'),

(1, '2019-06-02 06:30', '2019-06-02 07:30'),
(2, '2019-06-02 08:30', '2019-06-02 09:30'),
(3, '2019-06-02 11:00', '2019-06-02 12:30'),
(4, '2019-06-02 02:30', '2019-06-02 16:30'),

(1, '2019-06-03 06:30', '2019-06-03 07:30'),
(2, '2019-06-03 08:30', '2019-06-03 09:30'),
(3, '2019-06-03 11:00', '2019-06-03 12:30'),
(4, '2019-06-03 02:30', '2019-06-03 16:30');
