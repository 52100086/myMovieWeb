DROP DATABASE IF EXISTS Quan_ly_phim;

CREATE DATABASE IF NOT EXISTS Quan_ly_phim;

USE Quan_ly_phim;

CREATE TABLE Film
(
  ID_Film INT AUTO_INCREMENT NOT NULL ,
  Name VARCHAR(100) NOT NULL,
  Nam_phat_hanh DATE NOT NULL,
  Dao_dien VARCHAR(50) NOT NULL,
  Dienvien VARCHAR(100) NOT NULL,
  Quoc_gia VARCHAR(30) NOT NULL,
  Mo_ta VARCHAR(255) NOT NULL,
  Anh_nen VARCHAR(255) NOT NULL,
  PRIMARY KEY (ID_Film)
);

CREATE TABLE Phim_tap
(
  So_tap INT NOT NULL,
  ID_Film INT NOT NULL,
  PRIMARY KEY (ID_Film),
  FOREIGN KEY (ID_Film) REFERENCES Film(ID_Film)
);

CREATE TABLE Phim_bo
(
  Thoi_luong INT NOT NULL,
  ID_Film INT NOT NULL,
  PRIMARY KEY (ID_Film),
  FOREIGN KEY (ID_Film) REFERENCES Film(ID_Film)
);

CREATE TABLE Nguoi_dung
(
  ID_user  INT AUTO_INCREMENT NOT  NULL ,
  Name VARCHAR(100) NOT NULL,
  User_name VARCHAR(35) NOT NULL,
  Email VARCHAR(100) NOT NULL,
  Password VARCHAR(50) NOT NULL,
  Avatar VARCHAR(255) NOT NULL,
  PRIMARY KEY (ID_user)
);

CREATE TABLE The_loai
(
  ID_Theloai INT AUTO_INCREMENT NOT NULL ,
  Ten_the_loai VARCHAR(100) NOT NULL,
  PRIMARY KEY (ID_Theloai)
);

CREATE TABLE Danh_gia
(
  Binh_luan VARCHAR(255) NOT NULL,
  Rating INT NOT NULL,
  Ngay_binh_luan DATE NOT NULL,
  ID INT NOT NULL AUTO_INCREMENT,
  ID_Film INT NOT NULL,
  ID_user INT NOT NULL,
  PRIMARY KEY (ID),
  FOREIGN KEY (ID_Film) REFERENCES Film(ID_Film),
  FOREIGN KEY (ID_user) REFERENCES Nguoi_dung(ID_user),
  UNIQUE (ID_Film, ID_user)
);

CREATE TABLE The_loai_Phim
(
  ID_Film INT NOT NULL,
  ID_Theloai INT NOT NULL,
  PRIMARY KEY (ID_Film, ID_Theloai),
  FOREIGN KEY (ID_Film) REFERENCES Film(ID_Film),
  FOREIGN KEY (ID_Theloai) REFERENCES The_loai(ID_Theloai)
);