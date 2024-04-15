CREATE DATABASE iglesia_php;
USE iglesia_php;

CREATE TABLE ministerios(
    id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(30) NOT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY(id)
);

INSERT INTO ministerios(nombre) VALUES('Ministerio de Música');
INSERT INTO ministerios(nombre) VALUES('Ministerio de Enseñanza');
INSERT INTO ministerios(nombre) VALUES('Ministerio de Consejería');
INSERT INTO ministerios(nombre) VALUES('Ministerio de Jóvenes');
INSERT INTO ministerios(nombre) VALUES('Ministerio de Servicio');

CREATE TABLE cargos(
    id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(30) NOT NULL,
    descripcion VARCHAR(100) NOT NULL,
    ministerio_id INT(11) UNSIGNED NOT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY(id),
    FOREIGN KEY(ministerio_id) REFERENCES ministerios(id) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE estados_civil(
    id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    descripcion VARCHAR(10) NOT NULL,
    PRIMARY KEY(id)
);

INSERT INTO estados_civil(descripcion) VALUES('Soltero');
INSERT INTO estados_civil(descripcion) VALUES('Casado');
INSERT INTO estados_civil(descripcion) VALUES('Divorciado');
INSERT INTO estados_civil(descripcion) VALUES('Viudo');

CREATE TABLE miembros(
    id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(30) NOT NULL,
    apellido_paterno VARCHAR(30) NOT NULL,
    apellido_materno VARCHAR(30) NOT NULL,
    fecha_nacimiento DATE NOT NULL,
    estado_civil_id INT(10) UNSIGNED NOT NULL,
    sexo VARCHAR(30) NOT NULL,
    email VARCHAR(30) NOT NULL,
    numero_celular VARCHAR(30) NOT NULL,
    cargo_id INT(11) UNSIGNED,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (estado_civil_id) REFERENCES estados_civil(id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (cargo_id) REFERENCES cargos(id) ON DELETE CASCADE ON UPDATE CASCADE,
    PRIMARY KEY(id)
);

CREATE TABLE bautismos(
    id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    miembro_id INT(11) UNSIGNED NOT NULL,
    pastor_id INT(11) UNSIGNED NOT NULL,
    fecha_bautizo DATE NOT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY(id),
    FOREIGN KEY (miembro_id) REFERENCES miembros(id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (pastor_id) REFERENCES miembros(id) ON DELETE CASCADE ON UPDATE CASCADE
);
