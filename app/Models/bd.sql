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

INSERT INTO cargos(nombre, descripcion, ministerio_id) VALUES('Director', 'Encargado de dirigir el ministerio', 1);
INSERT INTO cargos(nombre, descripcion, ministerio_id) VALUES('Subdirector', 'Encargado de apoyar al director el ministerio', 1);
INSERT INTO cargos(nombre, descripcion, ministerio_id) VALUES('Maestro', 'Encargado de enseñar', 2);
INSERT INTO cargos(nombre, descripcion, ministerio_id) VALUES('Auxiliar de Maestro', 'Encargado de ayudar en la enseñanzas', 2);
INSERT INTO cargos(nombre, descripcion, ministerio_id) VALUES('Consejero Mayor', 'Encargado de aconsejar', 3);
INSERT INTO cargos(nombre, descripcion, ministerio_id) VALUES('Consejero Adolecente', 'Encargado de aconsejar adolecentes', 3);
INSERT INTO cargos(nombre, descripcion, ministerio_id) VALUES('Líder Juvenil', 'Encargado de dirigir el grupo', 4);
INSERT INTO cargos(nombre, descripcion, ministerio_id) VALUES('Director', 'Encargado de dirigir el ministerio de servicio', 5);
INSERT INTO cargos(nombre, descripcion, ministerio_id) VALUES('Servidor', 'Encargado de servir', 5);


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
    casado BOOLEAN NOT NULL DEFAULT 0,
    bautizado BOOLEAN NOT NULL DEFAULT 0,
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


CREATE TABLE matrimonios(
    id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    esposo_id INT(11) UNSIGNED NOT NULL,
    esposa_id INT(11) UNSIGNED NOT NULL,
    fecha_matrimonio DATE NOT NULL,
    pastor_id INT(11) UNSIGNED NOT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY(id),
    FOREIGN KEY (esposo_id) REFERENCES miembros(id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (esposa_id) REFERENCES miembros(id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (pastor_id) REFERENCES miembros(id) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE tipos_relacion(
    id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    descripcion VARCHAR(30) NOT NULL,
    PRIMARY KEY(id)
);

INSERT INTO tipos_relacion(descripcion)VALUES('PADRE');
INSERT INTO tipos_relacion(descripcion)VALUES('MADRE');
INSERT INTO tipos_relacion(descripcion)VALUES('HERMANO/A');
INSERT INTO tipos_relacion(descripcion)VALUES('TIO/A');
INSERT INTO tipos_relacion(descripcion)VALUES('ABUELO/A');
INSERT INTO tipos_relacion(descripcion)VALUES('PRIMO/A');

CREATE TABLE relaciones(
    id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    miembro_id INT(11) UNSIGNED NOT NULL,
    miembro_relacionado_id INT(11) UNSIGNED NOT NULL, 
    tipo_relacion_id INT(11) UNSIGNED NOT NULL, 
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY(id),
    FOREIGN KEY (miembro_id) REFERENCES miembros(id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (miembro_relacionado_id) REFERENCES miembros(id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (tipo_relacion_id) REFERENCES tipos_relacion(id) ON DELETE CASCADE ON UPDATE CASCADE
);