CREATE TABLE
    Project(
        Id_Project INT AUTO_INCREMENT,
        name VARCHAR(50) NOT NULL,
        description VARCHAR(100),
        PRIMARY KEY(Id_Project)
    );

CREATE TABLE
    Task(
        Id_Task INT AUTO_INCREMENT,
        name VARCHAR(50) NOT NULL,
        description VARCHAR(100),
        Id_Project INT NOT NULL,
        PRIMARY KEY(Id_Task),
        FOREIGN KEY(Id_Project) REFERENCES Project(Id_Project)
    );