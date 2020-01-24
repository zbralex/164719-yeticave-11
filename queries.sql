INSERT INTO yeticave.categories (name, symbol_code)
VALUES ('Доски и лыжи', 'boards_and_skis'), ('Крепления', 'bindings'), ('Ботинки', 'boots'), ('Одежда', 'clothes'), ('Инструменты', 'tools'), ('Разное', 'other');

INSERT INTO yeticave.users (register_date, email, name, password, contact)
VALUES (CURDATE(), 'test1@test.ru', 'ALEX', '123', '+7999 999 99 99'), (CURDATE(),'test2@test.ru', 'ANNA', '122', '+7988 998 98 98'), (CURDATE(),'test3@test.ru', 'DIMA', '121', '+7977 997 97 97');
