-- Entregadas
UPDATE `list_products` 
SET `reestock_date` = DATE_ADD(reestock_date, INTERVAL 30 DAY), 
active = 1 
WHERE users_id = 5 AND `reestock_concurrence` = 30 AND date(reestock_date) = '2018-02-06'