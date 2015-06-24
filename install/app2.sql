DROP DATABASE IF EXISTS AGENCY;
CREATE DATABASE IF NOT EXISTS AGENCY;
USE AGENCY;

CREATE TABLE rols(
	id int NOT NULL AUTO_INCREMENT, 
	descrip varchar(15), 
	PRIMARY KEY(id))engine=InnoDB;

CREATE TABLE usuaris (
	id int NOT NULL AUTO_INCREMENT, 
	nom varchar(20) NOT NULL, 
	cognoms varchar(50) NOT NULL, 
	email varchar(40) NOT NULL, 
	password varchar(100), 
	idrol int, 
	PRIMARY KEY(id),
	FOREIGN KEY(idrol) REFERENCES rols (id));

CREATE TABLE serveis (
	id INT NOT NULL AUTO_INCREMENT, 
	nplaces int NOT NULL, 
	preu decimal(8,2), 
	PRIMARY KEY(id));

CREATE TABLE reserves (
	id int NOT NULL  AUTO_INCREMENT, 
	data date NOT NULL, 
	idusuari int, 
	status varchar(15) NOT NULL, 
	preu decimal(8,2), 
	PRIMARY KEY(id),
	FOREIGN KEY(idusuari) REFERENCES usuaris (id));

CREATE TABLE serveis_reservats (
	idservei int, 
	idreserva int, 
	data_inicial date, 
	data_final date, 
	PRIMARY KEY(idservei, idreserva),
	FOREIGN KEY(idservei) REFERENCES serveis (id),
	FOREIGN KEY(idreserva) REFERENCES reserves (id));

CREATE TABLE tipus_pagament(
	id INT NOT NULL AUTO_INCREMENT,
	tipus VARCHAR(15),
	PRIMARY KEY(id));

CREATE TABLE pagaments (
	id int NOT NULL AUTO_INCREMENT, 
	idreserva int, 
	pagament_quant decimal(8,2), 
	pagament_data date, 
	tipus int,
	PRIMARY KEY(id),
	FOREIGN KEY(idreserva) REFERENCES reserves(id),
	FOREIGN KEY(tipus) REFERENCES tipus_pagament(id)
);


CREATE TABLE categories (
	id int NOT NULL, 
	tipo char(2) NOT NULL, 
	PRIMARY KEY(id));


CREATE TABLE hotels (
	id int NOT NULL, 
	nom varchar(20), 
	ciutat varchar(25), 
	categoria INT,
	PRIMARY KEY(id),
	FOREIGN KEY(id) REFERENCES serveis (id),
	FOREIGN KEY(categoria) REFERENCES categories(id));


CREATE TABLE vols (
	id int NOT NULL, 
	dest varchar(25) NOT NULL, 
	aeroport varchar(25), 
	codi_aeri char(6), 
	PRIMARY KEY(id),
	FOREIGN KEY(id) REFERENCES serveis (id));


CREATE TABLE plans (
	id int NOT NULL, 
	descrip varchar(200), 
	PRIMARY KEY(id),
	FOREIGN KEY(id) REFERENCES serveis (id));

