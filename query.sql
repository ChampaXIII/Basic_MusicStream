CREATE DATABASE nl;

USE nl;

CREATE TABLE RecordLabel (
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

CREATE TABLE album (
    id INT PRIMARY KEY AUTO_INCREMENT,
    artist_id INT,
    title VARCHAR(255) NOT NULL,
    FOREIGN KEY (artist_id) REFERENCES artist(id)
);

CREATE TABLE artist_albums (
    artist_id INT,
    album_id INT,
    PRIMARY KEY (artist_id, album_id),
    FOREIGN KEY (artist_id) REFERENCES artist(id),
    FOREIGN KEY (album_id) REFERENCES album(id)
);

CREATE TABLE songs (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    artist VARCHAR(255) NOT NULL,
    genre VARCHAR(50) NOT NULL
);

CREATE TABLE album_songs (
    album_id INT,
    song_id INT,
    PRIMARY KEY (album_id, song_id),
    FOREIGN KEY (album_id) REFERENCES album(id),
    FOREIGN KEY (song_id) REFERENCES songs(id)
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
