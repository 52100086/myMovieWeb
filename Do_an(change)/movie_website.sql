CREATE DATABASE movie_website;

CREATE TABLE users (
  id INT(11) NOT NULL AUTO_INCREMENT,
  username VARCHAR(50) NOT NULL,
  password VARCHAR(255) NOT NULL,
  email VARCHAR(100) NOT NULL,
  avatar VARCHAR(255) DEFAULT NULL,
  created_at DATETIME NOT NULL,
  updated_at DATETIME NOT NULL,
  PRIMARY KEY (id),
  UNIQUE KEY username (username),
  UNIQUE KEY email (email)
);

CREATE TABLE movies (
  id INT(11) NOT NULL AUTO_INCREMENT,
  title VARCHAR(255) NOT NULL,
  description TEXT DEFAULT NULL,
  thumbnail VARCHAR(255) DEFAULT NULL,
  video_url VARCHAR(255) NOT NULL,
  created_at DATETIME NOT NULL,
  updated_at DATETIME NOT NULL,
  PRIMARY KEY (id)
);

CREATE TABLE genres (
  id INT(11) NOT NULL AUTO_INCREMENT,
  name VARCHAR(50) NOT NULL,
  PRIMARY KEY (id),
  UNIQUE KEY name (name)
);

CREATE TABLE movie_genres (
  id INT(11) NOT NULL AUTO_INCREMENT,
  movie_id INT(11) NOT NULL,
  genre_id INT(11) NOT NULL,
  PRIMARY KEY (id),
  KEY movie_id (movie_id),
  KEY genre_id (genre_id),
  CONSTRAINT movie_genres_ibfk_1 FOREIGN KEY (movie_id) REFERENCES movies (id) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT movie_genres_ibfk_2 FOREIGN KEY (genre_id) REFERENCES genres (id) ON DELETE CASCADE ON UPDATE CASCADE
);

INSERT INTO users (username, password, email, avatar, created_at, updated_at) 
VALUES ('john_doe', 'my_password', 'john_doe@example.com', NULL, NOW(), NOW());