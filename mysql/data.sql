INSERT INTO tipo_usuario(nombre, descripcion, activo) VALUES("Administrador", "Usuario administrador que puede estadisticas",true);
INSERT INTO tipo_usuario(nombre, descripcion, activo) VALUES("Asistente", "Usuario que marca asistencia",true);
INSERT INTO tipo_usuario(nombre, descripcion, activo) VALUES("Docente", "Usuario que imparte materias",true);
INSERT INTO usuario(nombre_usuario,apellido_usuario,user,pass,email,direccion,id_tipo_usuario) VALUES("Roberto Carlos","Castro","rcarlos","ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f","rcarlos@gmail.com","Santa Ana, Santa Ana",1);
INSERT INTO usuario(nombre_usuario,apellido_usuario,user,pass,email,direccion,id_tipo_usuario) VALUES("Nelson
Humbero","Gochez","ngochez","ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f","ngochez@gmail.com","Santa Ana, Santa Ana",2);
INSERT INTO usuario(nombre_usuario,apellido_usuario,user,pass,email,direccion,id_tipo_usuario) VALUES("William","Zamora","wzamora","ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f","wzamora@gmail.com","Santa Ana, Santa Ana",3);
INSERT INTO usuario(nombre_usuario,apellido_usuario,user,pass,email,direccion,id_tipo_usuario) VALUES("Stanley","Linares","stanley","ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f","stanley@gmail.com","Santa Ana, Santa Ana",3);
INSERT INTO departamento(nombre_departamento, codigo_departamento,facultad) VALUES ("Ingenieria", "1234","Facultad de occidente");
INSERT INTO departamento(nombre_departamento, codigo_departamento,facultad) VALUES ("Matematicas", "1235","Facultad de occidente");
INSERT INTO departamento(nombre_departamento, codigo_departamento,facultad) VALUES ("Psicologia", "1236","Facultad de occidente");
INSERT INTO carrera(nombre_carrera,codigo_carrera,activo,id_departamento) VALUES("Ingenieria de sistemas","I30515-1998", true, 1);
INSERT INTO carrera(nombre_carrera,codigo_carrera,activo,id_departamento) VALUES("Ingenieria industrial","I30513-2015", true, 1);
INSERT INTO carrera(nombre_carrera,codigo_carrera,activo,id_departamento) VALUES("Ingenieria electrica","I30510-1998", true, 1);
INSERT INTO materia(nombre_materia,codigo,activo,id_carrera,id_usuario) VALUES("Intro a la informatica","IAI135",true,1,4);
INSERT INTO usuario_materia(id_usuario,id_materia) VALUES(1,1);
INSERT INTO usuario_materia(id_usuario,id_materia) VALUES(2,1);