
--------------------------------------------------------
--  DDL for Package ARTIST_CRUD
--------------------------------------------------------

  CREATE OR REPLACE PACKAGE "ZHAN"."ARTIST_CRUD" AS
     PROCEDURE  add_artist(username VARCHAR2, email VARCHAR2, password varchar2, phone number, image VARCHAR2);
     FUNCTION delete_artist(artist_id NUMBER) RETURN NUMBER;
     FUNCTION update_artist(artist_id NUMBER, a_username VARCHAR2, a_email VARCHAR2, a_password varchar2, a_phone number, a_image VARCHAR2) RETURN NUMBER;
END artist_crud;

/
