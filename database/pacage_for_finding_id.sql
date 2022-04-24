
--------------------------------------------------------
--  DDL for Package FIND_ID
--------------------------------------------------------

  CREATE OR REPLACE PACKAGE "ZHAN"."FIND_ID" AS
    CURSOR find IS SELECT artists_id, username, email, password FROM artists;
    FUNCTION findById(artist_email IN artists.email%TYPE, artist_password IN artists.password%TYPE) RETURN NUMBER;
    FUNCTION validiateEmail(artist_email IN artists.email%TYPE) RETURN BOOLEAN;
    FUNCTION validiatePassword(artist_email IN artists.email%TYPE, artist_password IN artists.password%TYPE) RETURN VARCHAR2;
END find_id;

/
