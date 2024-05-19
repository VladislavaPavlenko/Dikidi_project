SELECT mt.name as type_name, COUNT(m.id) as moto_count_not_discontinued
FROM motorbikes m
JOIN motorbike_types mt ON (mt.id = m.motorbike_types_id)
WHERE m.discontinued = 0
GROUP BY mt.name;
