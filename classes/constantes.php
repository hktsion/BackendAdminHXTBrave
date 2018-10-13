<?php
/** 
* @global Conexiones con DB 
**/
define('DSN', 'mysql:host=localhost;dbname=introwor_dashboard;charset=utf8mb4');
define('USERNAME', 'introwor_dash');
define('PASSWORD', 'dashboard888;');
/** 
* @global Base de datos usuario
**/
define('USER_INSERT', 'INSERT INTO usuarios VALUES ( null, ');
define('CRUD__SELECT_MAIL', 'SELECT * FROM usuarios WHERE email');
define('CRUD__SELECT_IMEI', 'SELECT * FROM imeis WHERE imei');
define('UPDATE_IMEI', 'UPDATE imeis SET id_usuario=:id_usuario, estado=:estado WHERE imei=:imei');
define('IMEI_NO_INDB', 'El IMEI no se encuentra en base de datos');
define('ERR_MODE_REGS__GET_USER_IF_EXITS_AUX', 'SELECT * FROM usuarios USU, registros REG WHERE USU.id = (SELECT REG.idusuario FROM registros WHERE REG.imei=:imei');
define('USER_SELECT_BY_MAIL', 'SELECT * FROM usuarios WHERE email=:email');
define('SELECT_ERRORES_BY_ID', 'SELECT * FROM registros WHERE idusuario=:idusuario');
define('UPDATE_NUMERO_ERRORES', 'UPDATE registros SET num_intentos=:num_intentos WHERE idusuario=:idusuario');
define('UPDATE_USER__SET_IMEI', 'UPDATE usuarios SET imei=:imei WHERE id=:id');
define('SELECT_IMEI_BY_EMAIL', 'SELECT imei FROM usuarios WHERE email=:email');
/**
* @global UPDATE PARA LA PROMOCIÓN
**/
define('UPDATE_PROMO', "UPDATE promocion SET nombre=:nombre, promo=:promo, descripcion=:descripcion, fecha_inicio=:fecha_inicio, fecha_fin=:fecha_fin, unidades_disponibles=:unidades_disponibles WHERE id=:id");

/**
* @global Panel de administración
**/
define('ADMIN_SELECT', 'SELECT * FROM administracion WHERE ');
define('SELECT_ALL_USERS', 'SELECT * FROM usuarios');
define('TOTAL_REGS', 'SELECT COUNT(*) FROM usuarios');
define('TOTAL_FAIL_REGS', 'SELECT COUNT(*) FROM `registros` WHERE estado_registro = 0');
define('NEW_REGS', 'SELECT COUNT(*) FROM registros WHERE fecha_registro > ');
define('UPDATE_COOKIE', 'UPDATE administracion SET cookie=:cookie WHERE id=:id');
define('SELECT_BY_COOKIE', 'SELECT * FROM administracion WHERE cookie=:cookie AND id=:id');
/**
* @global Errores formulario de administración
**/
define('EMPTY_USER', 'Introduce nombre de usuario');
define('EMPTY_PASS', 'Introduce password');
define('EMPTY_USER_PASS', 'Introduce usuario y password');
/**
* @global Selección de IMEIS
**/
define('SELECT_IMEIS_FROM_USER', 'SELECT imei FROM imeis WHERE id_usuario=:id_usuario');
/**
* @global Datos de la promoción :: cámara deportiva;
**/
define('PROMO', 'camara_deportiva');
define('SELECT_PROMO', "SELECT * FROM promocion WHERE id = 1");
/**
* @global Facturas usuario
**/
define('__ROOT__', '../facturas/');
define('ERROR_UPLOAD', 'Error en la subida del fichero al servidor,<br>Por favor, inténtalo más tarde.');
define('ERROR_FOLDER', 'La carpeta de destino no existe.');
define('ERROR_LOADING', 'Error al cargar la factura.');
/**
* @global Errores formulario de usuario
**/
define('MAIL_NEEDED', 'EMAIL NO VÁLIDO. Por favor, introduce un correo de contacto válido. Si fueses ganador de la promoción, nos pondríamos en contacto contigo a través de esta dirección de correo.');
define('ERROR_LEGAL_BASE', 'Para poder participar debes leer y aceptar las bases legales.');
define('ERROR_LEGAL_AGE', 'Para poder participar debes ser mayor de 18 años.');
define('IMEI_NO_INDB_MESSAGE', '<p>EL IMEI NO SE ENCUENTRA EN LA BASE DE DATOS. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit, repellat, molestiae illo quae consectetur provident sunt nemo ipsam dolorum qui, nostrum obcaecati pariatur ab, enim quaerat eveniet ipsum reiciendis molestias!</p>');
define('IMEI_INDB_USED_MESSAGE', '<p>EL IMEI EXISTE EN BASE DE DATOS, PERO YA HAY UN USUARIO QUE LO ESTÁ USANDO. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit, repellat, molestiae illo quae consectetur provident sunt nemo ipsam dolorum qui, nostrum obcaecati pariatur ab, enim quaerat eveniet ipsum reiciendis molestias!</p>');
define('IMEI_INDB_SAME_MESSAGE', '<p>YA ESTÁS REGISTRADO CON ESE IMEI. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit, repellat, molestiae illo quae consectetur provident sunt nemo ipsam dolorum qui, nostrum obcaecati pariatur ab, enim quaerat eveniet ipsum reiciendis molestias!</p>');
define('ERROR_INSERT_MESSAGE', '<p>HA OCURRIDO UN ERROR INTERNO. TU SOLICITUD NO HA PODIDO SER PROCESADA. Por favor inténtalo más tarde y si el problema persiste ponte en contacto con el administrador. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit, repellat, molestiae illo quae consectetur provident sunt nemo ipsam dolorum qui, nostrum obcaecati pariatur ab, enim quaerat eveniet ipsum reiciendis molestias!</p>');
define('IMEI_SUPERADO_NUM_INTENTOS', '<p>SE HAN SUPERADO EL NÚMERO DE INTENTOS</p>');
?>