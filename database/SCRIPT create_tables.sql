CREATE TABLE kgb.types (
  id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL
);


CREATE TABLE particularities (
  id int(11) NOT NULL AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE rights (
  id int(11) NOT NULL AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE status (
  id int(11) NOT NULL AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE kgb.agent_particularity (
	agent_id INT(11) NOT NULL,
    FOREIGN KEY (agent_id) 
	  REFERENCES agents(id),
  particularity_id INT(11) NOT NULL,
    FOREIGN KEY (particularity_id) 
	  REFERENCES particularities(id)
);

CREATE TABLE kgb2.agents (
  id int(11) NOT NULL AUTO_INCREMENT,
  mission_id int(11) DEFAULT NULL,
    FOREIGN KEY (particularity_id) 
	  REFERENCES particularities(id)

  firstname VARCHAR(50) NOT NULL,
  lastname VARCHAR(50) NOT NULL,
  birthday date NOT NULL,
  identification_code VARCHAR(11) NOT NULL,
  nationality VARCHAR(25055) NOT NULL,

) 

CREATE TABLE agents (
  id int(11) NOT NULL AUTO_INCREMENT,
  mission_id int(11) DEFAULT NULL,
  firstname VARCHAR(255) NOT NULL,
  lastname VARCHAR(255) NOT NULL,
  birthday date NOT NULL,
  identification_code VARCHAR(11) NOT NULL,
  nationality VARCHAR(255) NOT NULL,
  PRIMARY KEY (id),
  KEY IDX_9596AB6EBE6CAE90 (mission_id),
  CONSTRAINT FK_9596AB6EBE6CAE90 FOREIGN KEY (mission_id) REFERENCES missions (id)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE contacts (
  id int(11) NOT NULL AUTO_INCREMENT,
  firstname VARCHAR(255) NOT NULL,
  lastname VARCHAR(255) NOT NULL,
  birthday date NOT NULL,
  code_name VARCHAR(255) NOT NULL,
  nationality VARCHAR(255) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE hideouts (
  id int(11) NOT NULL AUTO_INCREMENT,
  code_name VARCHAR(255) NOT NULL,
  adress VARCHAR(255) NOT NULL,
  postcode int(11) NOT NULL,
  city VARCHAR(255) NOT NULL,
  country VARCHAR(255) NOT NULL,
  type VARCHAR(255) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



CREATE TABLE mission_contact (
  mission_id int(11) NOT NULL,
  contact_id int(11) NOT NULL,
  PRIMARY KEY (mission_id,contact_id),
  KEY IDX_DD5E7275BE6CAE90 (mission_id),
  KEY IDX_DD5E7275E7A1254A (contact_id),
  CONSTRAINT FK_DD5E7275BE6CAE90 FOREIGN KEY (mission_id) REFERENCES missions (id) ON DELETE CASCADE,
  CONSTRAINT FK_DD5E7275E7A1254A FOREIGN KEY (contact_id) REFERENCES contacts (id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



CREATE TABLE mission_hideout (
  mission_id int(11) NOT NULL,
  hideout_id int(11) NOT NULL,
  PRIMARY KEY (mission_id,hideout_id),
  KEY IDX_BD137514BE6CAE90 (mission_id),
  KEY IDX_BD137514E9982FD7 (hideout_id),
  CONSTRAINT FK_BD137514BE6CAE90 FOREIGN KEY (mission_id) REFERENCES missions (id) ON DELETE CASCADE,
  CONSTRAINT FK_BD137514E9982FD7 FOREIGN KEY (hideout_id) REFERENCES hideouts (id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE missions (
  id int(11) NOT NULL AUTO_INCREMENT,
  type_id int(11) DEFAULT NULL,
  particularity_id int(11) DEFAULT NULL,
  status_id int(11) DEFAULT NULL,
  name VARCHAR(255) NOT NULL,
  description VARCHAR(255) NOT NULL,
  code_name VARCHAR(255) NOT NULL,
  country VARCHAR(255) NOT NULL,
  start_date date NOT NULL,
  end_date date NOT NULL,
  PRIMARY KEY (id),
  KEY IDX_34F1D47EC54C8C93 (type_id),
  KEY IDX_34F1D47EA48617FF (particularity_id),
  KEY IDX_34F1D47E6BF700BD (status_id),
  CONSTRAINT FK_34F1D47E6BF700BD FOREIGN KEY (status_id) REFERENCES status (id),
  CONSTRAINT FK_34F1D47EA48617FF FOREIGN KEY (particularity_id) REFERENCES particularities (id),
  CONSTRAINT FK_34F1D47EC54C8C93 FOREIGN KEY (type_id) REFERENCES types (id)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;




CREATE TABLE targets (
  id int(11) NOT NULL AUTO_INCREMENT,
  mission_id int(11) DEFAULT NULL,
  firstname VARCHAR(255) NOT NULL,
  lastname VARCHAR(255) NOT NULL,
  birthday date NOT NULL,
  code_name VARCHAR(255) NOT NULL,
  nationality VARCHAR(255) NOT NULL,
  PRIMARY KEY (id),
  KEY IDX_AF431E13BE6CAE90 (mission_id),
  CONSTRAINT FK_AF431E13BE6CAE90 FOREIGN KEY (mission_id) REFERENCES missions (id)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



CREATE TABLE users (
  id int(11) NOT NULL AUTO_INCREMENT,
  right_id int(11) DEFAULT NULL,
  firstname VARCHAR(255) NOT NULL,
  lastname VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  password VARCHAR(255) NOT NULL,
  creation_date date NOT NULL,
  PRIMARY KEY (id),
  KEY IDX_1483A5E954976835 (right_id),
  CONSTRAINT FK_1483A5E954976835 FOREIGN KEY (right_id) REFERENCES rights (id)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



