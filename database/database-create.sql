CREATE TABLE site (
id INT AUTO_INCREMENT,
name VARCHAR(50) UPPER(),
ticket int,
status VARCHAR(30),
createdAt TIMESTAMP DEFAULT NOW(),
updatedAt TIMESTAMP DEFAULT NOW()

PRIMARY KEY (id),

);

CREATE TABLE user (
id INT AUTO_INCREMENT,
firstname VARCHAR(50),
lastname VARCHAR(50),
sexe VARCHAR(2),
idSite INT,
roleUser VARCHAR(50),
mdps TEXT,
status VARCHAR(30),
createdAt TIMESTAMP DEFAULT NOW(),
updatedAt TIMESTAMP DEFAULT NOW()
PRIMARY KEY (id),
FOREIGN KEY (idSite) REFERENCES site (id)
);


CREATE TABLE assujetti (
num_quitt INT AUTO_INCREMENT,
assujett VARCHAR(50),
generatingAct TEXT
numberAct VARCHAR(50),
amount INT,
amountInLetter TEXT
idAgent INT,
site_id: INT,
month: VARCHAR(30),
year: INT,
statusQT VARCHAR(30),
createdAt TIMESTAMP DEFAULT NOW(),
updatedAt TIMESTAMP DEFAULT NOW()
PRIMARY KEY (id),
FOREIGN KEY (idAgent) REFERENCES user (id)
FOREIGN KEY (site_id) REFERENCES site (id)
);

CREATE TABLE log (
id INT AUTO_INCREMENT,
user_id INT,
logMessage VARCHAR(50),
status VARCHAR(30),
createdAt TIMESTAMP DEFAULT NOW()
PRIMARY KEY (id),
FOREIGN KEY (user_id) REFERENCES site (id)
);

CREATE TABLE logSite (
id INT AUTO_INCREMENT,
site_id INT,
user_id INT,
logMessage VARCHAR(50),
ticket int,
status VARCHAR(30),
createdAt TIMESTAMP DEFAULT NOW(),
PRIMARY KEY (id),
FOREIGN KEY (idSite) REFERENCES site (id)
FOREIGN KEY (user_id) REFERENCES user (id)
);






                                         