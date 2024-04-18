create table if not exists `test` (
    `id` int(11) not null auto_increment,
    `script_name` varchar(25) default "",
    `start_time` int(11) default null,
    `end_time` int(11) default null,
    `result` enum("normal", "illegal", "failed", "success") default null,
    primary key (`id`)
);

