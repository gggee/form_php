<?php 
'
CREATE TABLE messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(32),
    email VARCHAR(32),
    message TEXT,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

'
?>