
-- tables
-- Table advertise
CREATE TABLE advertise (
    id int    NOT NULL  AUTO_INCREMENT,
    `desc` text    NULL ,
    users_id int    NOT NULL ,
    foto1 varchar(100)    NOT NULL ,
    CONSTRAINT advertise_pk PRIMARY KEY (id)
);

-- Table sessions
CREATE TABLE sessions (
    id int    NOT NULL  AUTO_INCREMENT,
    users_id int    NOT NULL ,
    created timestamp    NOT NULL ,
    CONSTRAINT sessions_pk PRIMARY KEY (id)
);

-- Table users
CREATE TABLE users (
    id int    NOT NULL  AUTO_INCREMENT,
    name varchar(30)    NULL ,
    password varchar(64)    NULL ,
    CONSTRAINT users_pk PRIMARY KEY (id)
);





-- foreign keys
-- Reference:  advertise_users (table: advertise)


ALTER TABLE advertise ADD CONSTRAINT advertise_users FOREIGN KEY advertise_users (users_id)
    REFERENCES users (id)
    ON DELETE CASCADE;
-- Reference:  sessions_users (table: sessions)


ALTER TABLE sessions ADD CONSTRAINT sessions_users FOREIGN KEY sessions_users (users_id)
    REFERENCES users (id);



-- End of file.

