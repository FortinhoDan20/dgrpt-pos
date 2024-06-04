CREATE TABLE role_user (
id_role INT AUTO_INCREMENT,
name VARCHAR(50),
slug VARCHAR(50),

PRIMARY KEY (id_role)

);

CREATE TABLE user_T (
id_user INT AUTO_INCREMENT,
firstname VARCHAR(50),
lastname VARCHAR(50),
sexe VARCHAR(2),
roleUser INT,
mdps TEXT,
status VARCHAR(30),
createdAt date NOT NULL DEFAULT current_timestamp(),
updatedAt date NOT NULL DEFAULT current_timestamp(),
PRIMARY KEY (id_user),
FOREIGN KEY (roleUser) REFERENCES role_user (id_role)
);

CREATE TABLE site (
id_site INT AUTO_INCREMENT,
name VARCHAR(50),
ticket int,
headOfCollector INT,
status VARCHAR(30),
createdAt date NOT NULL DEFAULT current_timestamp(),
updatedAt TIMESTAMP DEFAULT NOW(),
PRIMARY KEY (id_site),
FOREIGN KEY (headOfCollector) REFERENCES user_T (id_user)

);

CREATE TABLE post (
id_post INT AUTO_INCREMENT,
name VARCHAR(50),
site INT,
headOfPost INT,
orderer INT,
taxCollector INT,
status VARCHAR(30),
createdAt date NOT NULL DEFAULT current_timestamp(),
updatedAt TIMESTAMP DEFAULT NOW(),
PRIMARY KEY (id_post),
FOREIGN KEY (site) REFERENCES site (id_site),
FOREIGN KEY (headOfPost) REFERENCES user_T (id_user),
FOREIGN KEY (orderer) REFERENCES user_T (id_user),
FOREIGN KEY (taxCollector) REFERENCES user_T (id_user)

);

CREATE TABLE assujettissement (
id INT AUTO_INCREMENT,
num_quitt INT ,
assujett VARCHAR(50),
generatingAct TEXT,
numberAct VARCHAR(50),
amountInLetter TEXT,
treasure INT,
partner INT,
amount INT,
taxCollector INT,
post INT,
site INT,
month VARCHAR(30),
year INT,
statusQT VARCHAR(30),
createdAt TIMESTAMP DEFAULT NOW(),
updatedAt TIMESTAMP DEFAULT NOW(),
PRIMARY KEY (id),
FOREIGN KEY (taxCollector) REFERENCES user_T (id_user),
FOREIGN KEY (post) REFERENCES post (id_post),
FOREIGN KEY (site) REFERENCES site (id_site)
);