use events;

CREATE TABLE user
(
  id INT PRIMARY KEY AUTO_INCREMENT,
  login VARCHAR(50) NOT NULL UNIQUE,
  email VARCHAR(100) NOT NULL UNIQUE,
  is_admin bit NOT NULL,
  password VARCHAR(50) NOT NULL,
  is_active bit NOT NULL,
  allow_notifications bit NOT NULL
);
