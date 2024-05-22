SELECT mt.name as type_name, COUNT(m.id) as moto_count_not_discontinued
FROM motorbike_types mt 
LEFT JOIN motorbikes m ON (m.motorbike_types_id = mt.id AND m.discontinued = 0)
GROUP BY mt.name;
