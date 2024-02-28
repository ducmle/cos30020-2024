use test;

drop table if exists inventory;

CREATE TABLE inventory (
  item_number int NOT NULL AUTO_INCREMENT,
  make varchar(30) NOT NULL,
  model varchar(30) NOT NULL,
  price double NOT NULL,
  quantity int NOT NULL,
  PRIMARY KEY (item_number)
);

insert into inventory values (1, 'Yamaha', 'FG7205', 279.99, 12);
insert into inventory values (2, 'Toyato', 'TG', 3000.66, 3);
insert into inventory values(3,"Toyato", "AL", 40000, 15);

select * from inventory order by make, model;

update inventory set make='Holden' where item_number=3;