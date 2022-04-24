--------------------------------------------------------
--  DDL for Trigger STYLES_TRIGGER
--------------------------------------------------------

  CREATE OR REPLACE TRIGGER "ZHAN"."STYLES_TRIGGER" BEFORE
  INSERT ON styles
  FOR EACH ROW
DECLARE
  v_count NUMBER;
BEGIN
  SELECT
    COUNT(*)
  INTO v_count
  FROM
    styles
  WHERE
    style_name = :new.style_name;

  IF v_count > 0 THEN
    raise_application_error(-20500, 'Duplicate style');
  END IF;
END;
/
ALTER TRIGGER "ZHAN"."STYLES_TRIGGER" ENABLE;
