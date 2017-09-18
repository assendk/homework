SELECT 
lower.first_name,
lower.salary, 
lower.salary - ROUND((select AVG(salary) FROM employees)) as difference,
coalesce(sup.first_name, 'No manager') as manager_name, 
dep.department_name as dep_name,
loc.city as city 
FROM employees as lower
LEFT JOIN employees as sup
ON (lower.manager_id = sup.employee_id)
JOIN departments as dep
ON (lower.department_id = dep.department_id)
JOIN locations as loc
ON (dep.location_id = loc.location_id)
WHERE lower.salary > (select AVG(salary) FROM employees)
order by difference