SELECT `customers`.first_name,`customers`.last_name,`cars`.make,`cars`.model,`cars`.`year`,`sales`.time_sales,`sales`.amount
FROM `sales`,`cars`,`customers`
WHERE `sales`.car_id = `cars`.car_id
AND `sales`.customer_id = customers.id 