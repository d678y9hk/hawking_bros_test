select info.name, info.desc, data.date, data.value from data, link, info where link.info_id = info.id and link.data_id = data.id;
