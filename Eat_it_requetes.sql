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
WHERE restaurant_id = 1 AND type_plat_id = 1;
