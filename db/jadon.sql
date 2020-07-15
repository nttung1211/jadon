DROP DATABASE jadon_db;
CREATE DATABASE jadon_db;
USE jadon_db;

CREATE TABLE service_categories(
	id INT PRIMARY KEY	AUTO_INCREMENT,
    name VARCHAR(100)
);

CREATE TABLE services(
	id INT PRIMARY KEY AUTO_INCREMENT,
    service_categories_id INT,
    title VARCHAR(100),
    subtitle TEXT,
    description TEXT,
    img_url TEXT,
    FOREIGN KEY (service_categories_id) REFERENCES service_categories(id),
    created_at TIMESTAMP DEFAULT NOW()
);


CREATE table service_photos(
	id INT PRIMARY KEY AUTO_INCREMENT, 
    img_url TEXT,
    services_id INT,
    FOREIGN KEY(services_id) REFERENCES services(id)
);

CREATE table latest_work(
	id INT PRIMARY KEY AUTO_INCREMENT, 
	name VARCHAR(100),
	description TEXT,
	event_date DATE
);

CREATE table users(
	id INT PRIMARY KEY AUTO_INCREMENT, 
	username VARCHAR(100),
    email VARCHAR(100),
	password VARCHAR(100),
    created_at TIMESTAMP DEFAULT NOW()
);

CREATE table comments(
	id INT PRIMARY KEY AUTO_INCREMENT, 
	content TEXT,
    users_id INT,
    latest_work_id INT,
    created_at TIMESTAMP DEFAULT NOW(),
	FOREIGN KEY(users_id) REFERENCES users(id),
    FOREIGN KEY(latest_work_id) REFERENCES latest_work(id)
);

CREATE table likes(
	id INT PRIMARY KEY AUTO_INCREMENT, 
    users_id INT,
    latest_work_id INT,
    created_at TIMESTAMP DEFAULT NOW(),
	FOREIGN KEY(users_id) REFERENCES users(id),
    FOREIGN KEY(latest_work_id) REFERENCES latest_work(id)
);

CREATE table latest_work_photos(
	id INT PRIMARY KEY AUTO_INCREMENT, 
    img_url TEXT,
    latest_work_id INT,
    FOREIGN KEY(latest_work_id) REFERENCES latest_work(id)
);

CREATE table clients(
	id INT PRIMARY KEY AUTO_INCREMENT, 
	first_name VARCHAR(100),
    last_name VARCHAR(100),
	email VARCHAR(100),
    phone VARCHAR(100),
    interested_service VARCHAR(100),
    event_date DATE,
    event_location VARCHAR(100),
    submitted_at TIMESTAMP DEFAULT NOW(),
    additional_info TEXT
);

CREATE TABLE home_slideshow(
    id INT PRIMARY KEY AUTO_INCREMENT, 
    img_url TEXT,
    title VARCHAR(100),
    caption TEXT,
    img_order INT,
    created_at TIMESTAMP DEFAULT NOW()
);

CREATE TABLE managers(
    id INT PRIMARY KEY AUTO_INCREMENT, 
    fullname VARCHAR(50),
	username VARCHAR(50),
    email VARCHAR(50),
	password VARCHAR(50),
    level VARCHAR(50),
    img_url TEXT,
    last_activity_time TIMESTAMP, 
    created_at TIMESTAMP DEFAULT NOW()
)







