
--------------------------------------------------------
--  DDL for Trigger ARTISTS_TRIGGER
--------------------------------------------------------

  CREATE OR REPLACE TRIGGER "ZHAN"."ARTISTS_TRIGGER" BEFORE
  INSERT ON artists
  FOR EACH ROW
DECLARE
  v_count NUMBER;
BEGIN
  SELECT
    COUNT(*)
  INTO v_count
  FROM
    artists
  WHERE
    email = :new.email;

  IF v_count > 0 THEN
    raise_application_error(-20500, 'Duplicate email');
  END IF;
END;
/
ALTER TRIGGER "ZHAN"."ARTISTS_TRIGGER" ENABLE;
