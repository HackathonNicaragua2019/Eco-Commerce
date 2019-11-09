create database ecocommerce;
use ecocommerce;

create table categorias(
idcategoria int primary key auto_increment not null,
descripcion varchar (50) not null
)Engine=InnoDB;

create table productos(
idproducto int primary key auto_increment not null,
nombre varchar (50) not null,
caracteristicas text not null,
precioCompra decimal(10,2) not null,
precioVenta decimal(10,2) not null,
estado varchar (10) not null,
foto1 varchar (100) not null,
foto2 varchar (100) not null,
foto3 varchar (100) not null,
observaciones varchar (200) not null,
idcategoria int not null,
foreign key (idcategoria) references categorias(idcategoria)
)Engine=InnoDB;

create table compradores(
idcomprador int primary key auto_increment not null,
nombreCompleto varchar (100) not null,
telefono int (8) not null,
direccion varchar (200) not null,
email varchar (50) not null,
usuario varchar (30) not null,
contrasena varchar (60) not null
)Engine=InnoDB;

create table carrito(
idcarrito int primary key auto_increment not null,
idproducto int not null,
idcomprador int not null,
cantidad int not null,
fecha date not null,
estado varchar(10) not null default 'Activo',
foreign key (idproducto) references productos(idproducto),
foreign key (idcomprador) references compradores(idcomprador)
)Engine=InnoDB;

create table compras(
idcompra int primary key auto_increment not null,
idcarrito int not null,
idcomprador int not null,
fechaCompra datetime null,
total decimal (10,2) not null,
foreign key (idcarrito) references carrito (idcarrito),
foreign key (idcomprador) references compradores (idcomprador)
)Engine=InnoDB;

create table metodosPago(
idMetodo int primary key auto_increment not null,
descripcion varchar (50) not null,
foto  varchar(100) not null,
estado varchar (10) not null
)Engine=InnoDB;

create table usuarios(
idusuario int primary key auto_increment not null,
nombreCompleto varchar (100) not null,
contrasena varchar (60) not null,
alias varchar (20) not null,
nivel varchar (20) not null,
estado varchar (10) not null
)Engine=InnoDB;

create table instituciones(
idinstitucion int primary key auto_increment not null,
nombre varchar (50) not null,
descripcion varchar (100) not null
)Engine=InnoDB;

create table donaciones(
idDonacion int primary key auto_increment not null,
descripcion varchar (100) not null,
idinstitucion int not null,
cantidad int not null,
fechaDonacion datetime null,
foreign key (idinstitucion) references instituciones (idinstitucion)
)Engine=InnoDB;

create table gruposSociales(
idGrupoSocial int primary key auto_increment not null,
nombres varchar (50) not null,
direccion  varchar(100) not null,
cantidadMiembros int not null
)Engine=InnoDB;

create table gastos(
idgastos int primary key auto_increment not null,
motivoGasto varchar (100) not null,
fechaGasto datetime null,
monto decimal (10,2) not null,
observaciones varchar (100),
idGrupoSocial int not null,
foreign key (idGrupoSocial) references gruposSociales (idGrupoSocial)
)Engine=InnoDB;

create table reforestaciones(
idreforestacion int primary key auto_increment not null,
descripcion varchar (100) not null,
fechareforestacion datetime null,
longitud decimal (10,2) not null,
latitud decimal (10,2) not null,
areaReforestada decimal (10,2) not null,
idGrupoSocial int not null,
foreign key (idGrupoSocial) references gruposSociales (idGrupoSocial)
)Engine=InnoDB;

create table Logs(
idLog int primary key auto_increment not null,
accion varchar (50) not null,
tablaAfectada varchar (20) not null,
fecha datetime null,
idusuario int not null,
foreign key (idusuario) references usuarios (idusuario)
)Engine=InnoDB;

create table vendedores(
idvendedor int primary key auto_increment not null,
nombreCompleto varchar (50) not null,
direccion varchar (200) not null,
correo varchar (50) not null,
telefono int (8) not null,
user varchar (30) not null,
contrasena varchar (60) not null
)Engine=InnoDB;

create table reputacioneVendedor(
idreputacionV int primary key auto_increment not null,
calificacion int  not null,
idvendedor int not null,
fechacalificacion datetime null,
foreign key (idvendedor) references vendedores (idvendedor)
)Engine=InnoDB;

create table reputacionCliente(
idreputacionC int primary key auto_increment not null,
calificacion int  not null,
idcliente int not null,
fechacalificacion datetime null,
foreign key (idcliente) references compradores (idcomprador)
)Engine=InnoDB;

create table zonasReforetadas(
idZona int primary key auto_increment not null,
descripcion varchar (50) not null,
direccion varchar (100) not null,
longitud decimal (10,2) not null,
latitud decimal (10,2) not null
)Engine=InnoDB;

create table comisiones(
idComision int primary key auto_increment not null,
idvendedor int not null,
cantidad decimal (10,2) not null,
fecha datetime null,
foreign key (idvendedor) references vendedores (idvendedor)
)Engine=InnoDB;

create table pagos(
idpago int primary key auto_increment not null,
idCompra int not null,
idMetodo int not null,
idComision int not null,
totalPago decimal (10,2),
foreign key (idCompra) references compras (idCompra),
foreign key (idMetodo) references metodosPago (idMetodo),
foreign key (idComision) references comisiones (idComision)
)Engine=InnoDB;

create table costoEnvios(
idCostoE int primary key auto_increment not null,
desde varchar(100) not null,
hasta varchar(100) not null,
costo decimal(10,2) not null
)Engine=InnoDB;

create table envios(
idenvio int primary key auto_increment not null,
idCompra int not null,
idcostoEnvio int not null,
estado varchar(50) not null,
hasta varchar(100) not null,
costo decimal(10,2) not null
foreign key (idcompra) references compras(idCompra),
foreign key (idcostoEnvio) references costoEnvios(idCostoE)
)Engine=InnoDB;





