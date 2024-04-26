CREATE TABLE book( 
book_id int AUTO_INCREMENT, 
title varchar(32) NOT null, 
author varchar(62) NOT null UNIQUE,
year_publication date not null, 
genre varchar(32) not null, 
PRIMARY KEY(book_id) );

CREATE TABLE Reader(
	reader_id int AUTO_INCREMENT,
    first_name varchar(32) NOT NULL,
    last_name varchar(32) NOT NULL,
    patronymic varchar(32),
    birthday date NOT null,
    adress varchar(255) NOT null,
    PRIMARY KEY (reader_id)
);

CREATE TABLE rent(
	rent_id int AUTO_INCREMENT,
    book_id int NOT null,
    reader_id int NOT null,
    date_rent date not null,
    return_date date not null,
    FOREIGN KEY (book_id) REFERENCES book(book_id),
    FOREIGN KEY (reader_id) REFERENCES reader(reader_id),
    PRIMARY KEY (rent_id)
);

INSERT INTO `book`(`title`, `author`, `year_publication`, `genre`)
VALUES 
('����� ������ � ����� ��������','����� �������','2019','��������, �������, �����������'),
('������������� �����������. ��� 3','����� �����','2022','��������� �������'),
('��������� ������','�������� �������','2023','��������� �����, ������������ �����'),
('����� ������','���� �������','2021','����� ��� ����������, ���������� ����������, ���������� ����'),
('������ ����','������ ����','2022',' �����');

INSERT INTO `reader`(`first_name`, `last_name`, `patronymic`, `birthday`, `adress`) 
VALUES 
('����','��������','��������','2004-06-21','������, �. ����, �������� ���., �. 21 ��.160'),
('�����','����������','�����������','19971-04-03','������, �. �������, ������� ���., �. 23 ��.163'),
('�������','������','����������','2004-02-06','������, �. ��������, ��������� ��., �. 12 ��.148'),
('�����','�������','���������','1982-07-0','������, �. ��������, �������� ���., �. 17 ��.71'),
('���������','�������','���������','1986-04-23','������, �. ���������, ������� ���., �. 11 ��.108');

INSERT INTO `rent`(`book_id`, `reader_id`, `date_rent`, `return_date`) 
VALUES 
(1, 3, '2024-04-24', '2024-05-23'),
(2, 5, '2024-04-26', '2024-04-30'),
(4, 2, '2024-04-14', '2024-05-05'),
(3, 4, '2024-04-20', '2024-05-14'),
(5, 1, '2024-04-11', '2024-05-03');

