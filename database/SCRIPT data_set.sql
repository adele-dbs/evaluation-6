INSERT INTO kgb.types (name) VALUES
('Surveillance'),
('Assassinat'),
('Infiltration');

INSERT INTO kgb.status (name) VALUES
('En préparation'),
('En cours'),
('Echec'),
('Terminée');

INSERT INTO kgb.rights (name) VALUES
('ADMIN'),
('USER');

INSERT INTO kgb.particularities (name) VALUES
('Espionnage'),
('Sabotage'),
('Enlèvement'),
('Assassinat'),
('Infiltration'),
('Exfiltration');

INSERT INTO kgb.users (right_id, firstname, lastname, email, creation_date) VALUE
('1', 'Paul', 'JOO', 'paul.joo@kgb.com', '2000-10-21'),
('1', 'Marie', 'LUUN', 'marie.luun@kgb.com', '2000-10-21');

INSERT INTO kgb.missions (type_id, particularity_id, status_id, name, description, code_name, country, start_date, end_date) VALUE
('1', '1', '1', 'Surveillance à Paris', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'Paris sous la pluie', 'France', '2022-03-09', '2022-04-09'),
('2', '4', '2', 'Assassinat à Dublin', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'Un pub à Dublin', 'Irlande', '2022-02-09', '2022-03-09');

INSERT INTO kgb.hideouts (code_name, adress, postcode, city, country, type) VALUE
('Pub', '1 street Pink ', '00000', 'Dublin', 'Irlande', 'maison'),
('Mirador', '1 rue Rouge ', '00000', 'Paris', 'France', 'appartement'),
('El Piso', '1 calle Verde ', '00000', 'Madrid', 'Espagne', 'maison');

INSERT INTO kgb.contacts (firstname, lastname, birthday, code_name, nationality) VALUE
('Kévin', 'STRICH', '2000-10-21', 'le loup', 'irlandaise'),
('Marco', 'Ruiz', '2000-10-22', 'la souris', 'espagole'),
('Louise', 'MAOUSE', '2000-10-23', 'la loutre', 'française');

INSERT INTO kgb.targets (mission_id, firstname, lastname, birthday, code_name, nationality) VALUE
('1', 'Raoul', 'TROUP', '2001-10-21', 'Boss', 'irlandaise'),
('2', 'Jeanne', 'LAC', '2002-10-21', 'Limama', 'française');

INSERT INTO kgb.agents (mission_id, firstname, lastname, birthday, identification_code, nationality) VALUE
('1', 'Inaya', 'DELIS', '2001-10-21', '006', 'norvégienne'),
('2', 'Mars', 'LAAN', '2002-10-21', '004', 'italienne');

INSERT INTO kgb.agent_particularity (agent_id, particularity_id) VALUE
('3', '1'),
('4', '4');

INSERT INTO kgb.mission_contact (mission_id, contact_id) VALUE
('1', '3'),
('2', '1');

INSERT INTO kgb.mission_hideout (mission_id, hideout_id) VALUE
('1', '2'),
('2', '1');