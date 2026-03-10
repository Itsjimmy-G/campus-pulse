<?php
// Database Schema Updates for New Features

// Event Categories Table
CREATE TABLE event_categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

// Capacity Limits Table
CREATE TABLE capacity_limits (
    id INT AUTO_INCREMENT PRIMARY KEY,
    event_id INT NOT NULL,
    limit INT NOT NULL,
    FOREIGN KEY (event_id) REFERENCES events(id) ON DELETE CASCADE
);

// Ratings/Reviews Table
CREATE TABLE event_reviews (
    id INT AUTO_INCREMENT PRIMARY KEY,
    event_id INT NOT NULL,
    user_id INT NOT NULL,
    rating INT NOT NULL CHECK (rating >= 1 AND rating <= 5),
    review TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (event_id) REFERENCES events(id) ON DELETE CASCADE,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

// Admin Functionality Table
CREATE TABLE admin_functionality (
    id INT AUTO_INCREMENT PRIMARY KEY,
    admin_id INT NOT NULL,
    functionality VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (admin_id) REFERENCES admins(id) ON DELETE CASCADE
);
?>