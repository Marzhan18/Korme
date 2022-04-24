--------------------------------------------------------
--  File created - Sunday-December-13-2020   
--------------------------------------------------------
--------------------------------------------------------
--  DDL for Package ARTS_CRUD
--------------------------------------------------------

  CREATE OR REPLACE PACKAGE "ZHAN"."ARTS_CRUD" AS
     PROCEDURE  add_arts(title VARCHAR2, price number, style_id number, image VARCHAR2, artists_id number);
     FUNCTION delete_arts(arts_id NUMBER) RETURN NUMBER;
     FUNCTION update_arts(arts_id NUMBER, a_title VARCHAR2, a_style_id VARCHAR2, a_image varchar2) RETURN NUMBER;
END arts_crud;

create or replace PACKAGE BODY arts_crud AS

    PROCEDURE  add_arts (title VARCHAR2, price number, style_id number, image VARCHAR2, artists_id number)IS    
    BEGIN
        INSERT INTO arts(title, price, style_id, image, created_at, artists_id, old_price) VALUES (title, price, style_id ,image, sysdate, artists_id, price);
    END;


    FUNCTION delete_arts(arts_id NUMBER) RETURN NUMBER AS
        TYPE t_artist_array IS TABLE OF arts%ROWTYPE
        INDEX BY BINARY_INTEGER;
        artist_array t_artist_array;
        result Number(11) := 0;
    BEGIN
        FOR rec IN (SELECT * FROM arts) LOOP
            artist_array(rec.arts_id) := rec;
            IF artist_array(rec.arts_id).arts_id = arts_id THEN
                DELETE FROM arts WHERE arts_id = arts_id;
                result:= 1;           
            END IF;
        END LOOP;
        RETURN result;
    END;

     FUNCTION update_arts(arts_id NUMBER, a_title VARCHAR2, a_style_id VARCHAR2, a_image varchar2) RETURN NUMBER AS
        TYPE t_artist_array IS TABLE OF arts%ROWTYPE
        INDEX BY BINARY_INTEGER;
        artist_array t_artist_array;
        result Number(11) := 0;
    BEGIN
        FOR rec IN (SELECT * FROM arts) LOOP
            artist_array(rec.arts_id) := rec;
            IF artist_array(rec.arts_id).arts_id = arts_id THEN
                update arts set title = a_title, style_id = a_style_id, image = a_image where arts_id = arts_id;
                result:= 1;           
            END IF;
        END LOOP;
        RETURN result;
    END;

END arts_crud;

/
