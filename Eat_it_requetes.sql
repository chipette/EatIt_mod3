USE eatit_bdd;

SELECT *
FROM restaurant;

SELECT *
FROM restaurant
WHERE specialite_id = 1;

SELECT *
FROM plat
WHERE restaurant_id = 1;

SELECT *
FROM plat
WHERE restaurant_id = 1 AND type_plat_id = 2;

SELECT * FROM plat WHERE 1 = 1 AND restaurant_id = 3 AND type_plat_id = 1;

SELECT *
FROM plat
WHERE restaurant_id = 3;