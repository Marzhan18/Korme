
--  DDL for Package Body FIND_ID
--------------------------------------------------------

  CREATE OR REPLACE PACKAGE BODY "ZHAN"."FIND_ID" AS

    FUNCTION findById(artist_email IN artists.email%TYPE, artist_password IN artists.password%TYPE) 
    RETURN NUMBER AS
        result_id NUMBER := -1;
    BEGIN
        FOR rec IN find LOOP
            IF rec.email = artist_email and rec.password = artist_password THEN
                result_id:= rec.artists_id;
            END IF;
        END LOOP;
        RETURN result_id;
    END findById;


    FUNCTION validiateEmail(artist_email IN artists.email%TYPE) 
     RETURN BOOLEAN AS
        is_email_correct BOOLEAN := false;
        temp_email artists.email%TYPE;
    begin
         FOR rec IN find LOOP
            IF rec.email = artist_email THEN
                is_email_correct := true;
            END IF;
        END LOOP;
        return is_email_correct;
    end;

     FUNCTION validiatePassword(artist_email IN artists.email%TYPE, artist_password IN artists.password%TYPE)
     RETURN VARCHAR2 AS
        temp_str artists.email%TYPE := 'NO_PASSWORD';
    begin
        IF validiateemail(artist_email) = false THEN
                return 'NO_EMAIL';
        END IF;
        FOR rec IN find LOOP
            IF rec.password = artist_password THEN
                temp_str := 'YES_PASSWORD';
            END IF;
        END LOOP;
        return temp_str;
    end;
END find_id;

/
