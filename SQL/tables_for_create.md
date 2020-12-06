
### para criar a tabela products em sua base de dados
```
CREATE TABLE products (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
description TEXT(30) NOT NULL,
price DECIMAL(10,2)
);
```