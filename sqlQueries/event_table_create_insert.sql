use event;

CREATE TABLE Event
(
  id INT PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(200) NOT NULL,
  date TIMESTAMP NOT NULL,
  `description` VARCHAR(1000) NOT NULL,
  creator_user_id INT,
  constraint event_user_id_fk FOREIGN KEY (creator_user_id) REFERENCES user (id) ON DELETE NULL ON UPDATE CASCADE
);

INSERT INTO `event`.`event`
(`id`,
`name`,
`date`,
`description`,
`creator_user_id`)
VALUES
(null,
'Jakub Grabowski - Żukówko',
'2022-05-31 18:00:00',
'Yoyoyoyo',
1);