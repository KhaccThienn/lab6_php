-- Active: 1666944182105@@127.0.0.1@3306@bookonline

CREATE DATABASE bookonline
    DEFAULT CHARACTER SET = 'utf8mb4';

CREATE TABLE IF NOT EXISTS author (
  id int PRIMARY KEY AUTO_INCREMENT,
  name varchar(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS book (
  id INT primary key AUTO_INCREMENT,
  name varchar(255) NOT NULL,
  price FLOAT,
  image VARCHAR(255),
  author_id int,
  FOREIGN KEY (author_id) REFERENCES author(id)
)
INSERT INTO author(name) VALUES
("Nam Cao"),
("Ngô Tất Tố"),
("Tố Hữu"),
("Xuân Quỳnh"),
("Hồ Chí Minh");

INSERT INTO book(name, price, image, author_id) VALUES
("Lão Hạc", 250000, "https://isach.info/images/story/cover/lao_hac__nam_cao.jpg", 1),
("Chị Dậu", 250000, "https://vcdn.tikicdn.com/media/catalog/product/i/m/img843_7.jpg", 2),
("Lượm", 150000, "https://o.rada.vn/data/image/2020/08/19/luom.jpg", 3),
("Bánh Trôi Nước", 250000, "https://lessonopoly.org/wp-content/uploads/2020/11/soan_bai_banh_troi_nuoc_1.jpg", 4),
("Không có gì quý hơn độc lập tự do", 22250000, "https://salt.tikicdn.com/cache/w1200/media/catalog/product/i/m/img573_4.jpg", 5);