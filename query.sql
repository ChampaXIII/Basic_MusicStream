CREATE DATABASE nnl;

USE nnl;

CREATE TABLE recordLabel (
    name VARCHAR(50) PRIMARY KEY NOT NULL,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE artist (
    id INT PRIMARY KEY AUTO_INCREMENT,
    recordlabel_name VARCHAR(50),
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    FOREIGN KEY (recordlabel_name) REFERENCES RecordLabel(name)
);

CREATE TABLE songs (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    id_artist INT NOT NULL,
    genre VARCHAR(50) NOT NULL,
    FOREIGN KEY (id_artist) REFERENCES artist(id)
);

CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE playlist (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    user_id INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE playlist_songs (
    playlist_id INT,
    song_id INT,
    PRIMARY KEY (playlist_id, song_id),
    FOREIGN KEY (playlist_id) REFERENCES playlist(id),
    FOREIGN KEY (song_id) REFERENCES songs(id)
);

INSERT INTO recordlabel (name, password)
VALUES ('Indipendent', 'pasword'),
    ('mllMiusic', 'password'),
    ('fancescoMiusic', 'password'),
    ('fanceschinoMiusic', 'password');