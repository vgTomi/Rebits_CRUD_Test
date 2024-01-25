# Rebits_CRUD_Test

Este proyecto es parte de la prueba de postulación para Rebits y se centra en el desarrollo de un sistema CRUD (Create, Read, Update, Delete) utilizando diversas tecnologías. No se hace uso de DELETE (opcional), dado que las consultas mediante QueryBuilder, por temas de tiempo no se utilizaron modelos y migracion por lo que no se opto utilizar DELETE (soft deleting)

## Tecnologías Utilizadas

- **Laravel 10** 

- **Bootstrap 5** 

- **PostgreSQL** 

## Instrucciones de Instalación

1. **Instalación de Dependencias:**
   ```bash
   composer install
   ```

2. **Configuración de la Base de Datos:**
   - Copiar el archivo `.env.example` a `.env` y configurar las credenciales de la base de datos.

3. **Inicio del Servidor:**
   ```bash
   php artisan serve
   ```
   El servidor estará disponible en `http://localhost:8000`.

## Importantes Consideraciones en PostgreSQL

Se hizo uso de un PostgreSQL en donde se genero la base de datos de manera local, a continuacion se mostrara como se crearon estas tablas y sus relaciones.
Para la base de datos se crearon las siguientes tablas

```sql
CREATE TABLE usuarios (
    id serial4 NOT NULL,
    nombre varchar(100) NULL,
    apellidos varchar(100) NULL,
    correo varchar(100) NULL,
    CONSTRAINT usuarios_pkey PRIMARY KEY (id)
);

CREATE TABLE vehiculos (
	id serial4 NOT NULL,
	marca varchar(100) NULL,
	modelo varchar(100) NULL,
	anio int4 NULL,
	dueno_actual_id int4 NULL,
	precio int4 NULL,
	CONSTRAINT vehiculos_pkey PRIMARY KEY (id)
);

CREATE TABLE historico_duenos (
	id serial4 NOT NULL,
	vehiculo_id int4 NULL,
	dueno_id int4 NULL,
	fecha_cambio timestamp NULL DEFAULT CURRENT_TIMESTAMP,
	CONSTRAINT historico_duenos_pkey PRIMARY KEY (id)
);


ALTER TABLE public.historico_duenos ADD CONSTRAINT historico_duenos_antiguo_dueno_id_fkey FOREIGN KEY (dueno_id) REFERENCES usuarios(id);
ALTER TABLE public.historico_duenos ADD CONSTRAINT historico_duenos_vehiculo_id_fkey FOREIGN KEY (vehiculo_id) REFERENCES vehiculos(id);

```
