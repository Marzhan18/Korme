
--------------------------------------------------------
--  DDL for Trigger ADD_ARTS
--------------------------------------------------------

  CREATE OR REPLACE TRIGGER "ZHAN"."ADD_ARTS" 
   before insert on "ZHAN"."ARTS" 
   for each row 
begin  
   if inserting then 
      if :NEW."ARTS_ID" is null then 
         select SEQUENCE2.nextval into :NEW."ARTS_ID" from dual; 
      end if; 
   end if; 
end;

/
ALTER TRIGGER "ZHAN"."ADD_ARTS" ENABLE;
