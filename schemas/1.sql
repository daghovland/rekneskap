CREATE TABLE versions (number UNSIGNED INT NOT NULL, name VARCHAR(100), PRIMARY KEY(name)) DEFAULT CHARSET = utf8;
INSERT INTO versions VALUES (1, 'db_schema');
