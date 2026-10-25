CREATE TABLE chefs (
    chef_id          INT AUTO_INCREMENT PRIMARY KEY,
    first_name       VARCHAR(50)  NOT NULL,
    last_name        VARCHAR(50)  NOT NULL,
    specialty        VARCHAR(100) NOT NULL,
    years_experience INT          NOT NULL DEFAULT 0,
    email            VARCHAR(100) NOT NULL,
    date_added       TIMESTAMP    DEFAULT CURRENT_TIMESTAMP
);
 
CREATE TABLE clients (
    client_id        INT AUTO_INCREMENT PRIMARY KEY,
    client_name      VARCHAR(100) NOT NULL,
    contact_number   VARCHAR(20)  NOT NULL,
    service_date     DATE         NOT NULL,
    number_of_guests INT          NOT NULL DEFAULT 1,
    chef_id          INT          NOT NULL,
    date_added       TIMESTAMP    DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_clients_chef
        FOREIGN KEY (chef_id) REFERENCES chefs(chef_id)
);