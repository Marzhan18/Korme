
--------------------------------------------------------
--  DDL for Package Body ARTIST_CRUD
--------------------------------------------------------

  CREATE OR REPLACE PACKAGE BODY "ZHAN"."ARTIST_CRUD" AS
    PROCEDURE  add_artist(username VARCHAR2, email VARCHAR2, password varchar2, phone number, image VARCHAR2) IS    
    BEGIN
        INSERT INTO artists(username, email, password, phone, image, last_in) VALUES(username, email ,password, phone, image, sysdate);
    END;


    FUNCTION delete_artist(artist_id NUMBER) RETURN NUMBER AS
        TYPE t_artist_array IS TABLE OF artists%ROWTYPE
        INDEX BY BINARY_INTEGER;
        artist_array t_artist_array;
        result Number(11) := 0;
    BEGIN
        FOR rec IN (SELECT * FROM artists) LOOP
            artist_array(rec.artists_id) := rec;
            IF artist_array(rec.artists_id).artists_id = artist_id THEN
                DELETE FROM artists WHERE artists_id = artist_id;
                result:= 1;           
            END IF;
        END LOOP;
        RETURN result;
    END;

    FUNCTION update_artist(artist_id NUMBER, a_username VARCHAR2, a_email VARCHAR2, a_password varchar2, a_phone number, a_image VARCHAR2) RETURN NUMBER AS
        TYPE t_artist_array IS TABLE OF artists%ROWTYPE
        INDEX BY BINARY_INTEGER;
        artist_array t_artist_array;
        result Number(11) := 0;
    BEGIN
        FOR rec IN (SELECT * FROM artists) LOOP
            artist_array(rec.artists_id) := rec;
            IF artist_array(rec.artists_id).artists_id = artist_id THEN
                update artists set username = a_username, email = a_email, password = a_password, phone = a_phone, image = a_image where artists_id = artist_id;
                result:= 1;           
            END IF;
        END LOOP;
        RETURN result;
    END;

END artist_crud;

/
