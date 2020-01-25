INSERT INTO yeticave.categories (name, symbol_code)
VALUES ('Доски и лыжи', 'boards'), ('Крепления', 'attachment'), ('Ботинки', 'boots'), ('Одежда', 'clothing'), ('Инструменты', 'tools'), ('Разное', 'other');

INSERT INTO yeticave.users (register_date, email, name, password, contact)
VALUES (CURDATE(), 'test1@test.ru', 'ALEX', '123', '+7999 999 99 99'), (CURDATE(),'test2@test.ru', 'ANNA', '122', '+7988 998 98 98'), (CURDATE(),'test3@test.ru', 'DIMA', '121', '+7977 997 97 97');


INSERT INTO yeticave.lots (create_date, name, description, img, start_price, end_date, step, author_id, winner_id, category_id)
VALUES
(CURDATE(), '2014 Rossignol District Snowboard', 'description dd', 'img/lot-1.jpg', 10999, '2020-01-24', 100, 1, 3, 1),
(CURDATE(), 'DC Ply Mens 2016/2017 Snowboard', 'description description', 'img/lot-2.jpg', 159999, '2020-01-25', 100, 3, 2, 1),
(CURDATE(), 'Крепления Union Contact Pro 2015 года размер L/XL', 'description 989', 'img/lot-3.jpg', 8000, '2020-01-26', 100, 2, 3, 2),
(CURDATE(), 'Ботинки для сноуборда DC Mutiny Charocal', 'description dccc', 'img/lot-4.jpg', 10999, '2020-01-27', 100, 2, 1, 3),
(CURDATE(), 'Куртка для сноуборда DC Mutiny Charocal', 'description dfasd', 'img/lot-5.jpg', 7500, '2020-01-28', 100, 1, 3, 4),
(CURDATE(), 'Маска Oakley Canopy', 'description dsvs', 'img/lot-6.jpg', 5400, '2020-01-29', 100, 1, 2, 6);

INSERT INTO yeticave.bets (date, sum, user_id, lot_id)
VALUES
(CURDATE(), 300, 1, 1),
(CURDATE(), 400, 3, 2),
(CURDATE(), 600, 2, 3),
(CURDATE(), 200, 2, 4);
