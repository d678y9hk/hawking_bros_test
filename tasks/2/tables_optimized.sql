DROP TABLE IF EXISTS `info`;
DROP TABLE IF EXISTS `data`;
DROP TABLE IF EXISTS `link`;

CREATE TABLE `info` (
    `id` int(11) NOT NULL auto_increment,
    `name` varchar(255) default NULL,
    `desc` text default NULL,
    PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

CREATE TABLE `data` (
    `id` int(11) NOT NULL auto_increment,
    `date` date default NULL,
    `value` INT(11) default NULL,
    PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

CREATE TABLE `link` (
    `data_id` int(11) NOT NULL,
    `info_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

ALTER TABLE `link` ADD INDEX `linx_data_id_index` (`data_id`);
ALTER TABLE `link` ADD INDEX `linx_info_id_index` (`info_id`);

INSERT INTO `info` (`name`, `desc`) VALUES ("name1", "desc1"), ("name2", "desc2"), ("name3", "desc3"), ("name4", "desc4"), ("name5", "desc5"), ("name6", "desc6"), ("name7", "desc7"), ("name8", "desc8"), ("name9", "desc9"), ("name10", "desc10");
INSERT INTO `data` (`date`, `value`) VALUES ('2024-04-17', 15), ('2024-04-16', 14), ('2024-04-15', 13), ('2024-04-14', 12), ('2024-04-13', 11), ('2024-04-12', 10); 
INSERT INTO `link` (`data_id`, `info_id`) VALUES (1, 1), (1, 2), (2, 2), (2, 3), (3, 4), (6, 5), (6, 6), (7, 4), (8, 3), (9, 2);

