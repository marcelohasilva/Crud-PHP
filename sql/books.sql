-- Banco: books_db
CREATE DATABASE IF NOT EXISTS books_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE books_db;
CREATE TABLE IF NOT EXISTS books (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  author VARCHAR(255) NOT NULL,
  year INT DEFAULT NULL,
  genre VARCHAR(100) DEFAULT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

INSERT INTO books (title, author, year, genre) VALUES
('Dom Casmurro', 'Machado de Assis', 1899, 'Romance'),
('O Pequeno Príncipe', 'Antoine de Saint-Exupéry', 1943, 'Infantil'),
('Clean Code', 'Robert C. Martin', 2008, 'Programação');
