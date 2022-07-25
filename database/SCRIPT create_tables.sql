CREATE TABLE kgb.types (
  id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(50) NOT NULL
) ;

CREATE TABLE kgb.particularities (
  id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(50) NOT NULL
) ;

CREATE TABLE kgb.rights (
  id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(50) NOT NULL
) ;

CREATE TABLE kgb.status (
  id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(50) NOT NULL,
  color VARCHAR(50) NOT NULL
) ;

CREATE TABLE kgb.contacts (
  id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  firstname VARCHAR(50) NOT NULL,
  lastname VARCHAR(50) NOT NULL,
  birthday DATE NOT NULL,
  code_name VARCHAR(50) NOT NULL,
  nationality VARCHAR(50) NOT NULL
) ;

CREATE TABLE kgb.hideouts (
  id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  code_name VARCHAR(50) NOT NULL,
  adress VARCHAR(50) NOT NULL,
  postcode INT(11) NOT NULL,
  city VARCHAR(50) NOT NULL,
  country VARCHAR(50) NOT NULL,
  type VARCHAR(50) NOT NULL
) ;

CREATE TABLE kgb.missions (
  id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(50) NOT NULL,
  description VARCHAR(500) NOT NULL,
  code_name VARCHAR(50) NOT NULL,
  country VARCHAR(50) NOT NULL,
  start_date DATE NOT NULL,
  end_date DATE NOT NULL,
  type_id INT(11),
    FOREIGN KEY (type_id) 
	  REFERENCES status(id),
  particularity_id INT(11),
    FOREIGN KEY (particularity_id) 
	  REFERENCES particularities(id),
  status_id INT(11),
    FOREIGN KEY (status_id) 
	  REFERENCES types(id)
) ;

CREATE TABLE kgb.mission_contact (
  mission_id INT(11) NOT NULL,
    FOREIGN KEY (mission_id) 
	  REFERENCES missions (id),
  contact_id INT(11) NOT NULL,
    FOREIGN KEY (contact_id) 
	  REFERENCES contacts (id)
) ;

CREATE TABLE kgb.mission_hideout (
  mission_id INT(11) NOT NULL,
    FOREIGN KEY (mission_id) 
	  REFERENCES missions (id),
  hideout_id INT(11) NOT NULL,
    FOREIGN KEY (hideout_id) 
	  REFERENCES hideouts (id)
) ;

CREATE TABLE kgb.targets (
  id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  firstname VARCHAR(50) NOT NULL,
  lastname VARCHAR(50) NOT NULL,
  birthday DATE NOT NULL,
  code_name VARCHAR(50) NOT NULL,
  nationality VARCHAR(50) NOT NULL,
  mission_id INT(11) NOT NULL,
    FOREIGN KEY (mission_id) 
	  REFERENCES missions (id)
);

CREATE TABLE kgb.agents (
  id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  mission_id INT(11),
    FOREIGN KEY (mission_id) 
	  REFERENCES missions (id),
  firstname VARCHAR(50) NOT NULL,
  lastname VARCHAR(50) NOT NULL,
  birthday DATE NOT NULL,
  identification_code VARCHAR(11) NOT NULL,
  nationality VARCHAR(50) NOT NULL
) ;

CREATE TABLE kgb.agent_particularity (
	agent_id INT(11) NOT NULL,
    FOREIGN KEY (agent_id) 
	  REFERENCES agents(id),
  particularity_id INT(11) NOT NULL,
    FOREIGN KEY (particularity_id) 
	  REFERENCES particularities(id)
) ;

CREATE TABLE kgb.users (
  id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  firstname VARCHAR(50) NOT NULL,
  lastname VARCHAR(50) NOT NULL,
  email VARCHAR(50) NOT NULL,
  password VARCHAR(50) NOT NULL,
  creation_DATE DATE NOT NULL,
  right_id INT(11),
    FOREIGN KEY (right_id) 
	  REFERENCES rights(id)
);