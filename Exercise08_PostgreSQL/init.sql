-- init.sql
-- Tạo database
CREATE DATABASE mydb;

-- Kết nối đến database 'mydb' để thực hiện các lệnh tiếp theo
\c mydb;

-- Tạo bảng 'users'
CREATE TABLE users (
    id SERIAL PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    created_at TIMESTAMP WITH TIME ZONE DEFAULT CURRENT_TIMESTAMP
);

-- Thêm dữ liệu mẫu vào bảng 'users'
INSERT INTO users (username, email) VALUES
    ('john_doe', 'john.doe@example.com'),
    ('jane_smith', 'jane.smith@example.com'),
    ('peter_jones', 'peter.jones@example.com');
