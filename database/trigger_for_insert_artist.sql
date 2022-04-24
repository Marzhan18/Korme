
--------------------------------------------------------
--  DDL for Trigger ADD_ARTIST
--------------------------------------------------------

  CREATE OR REPLACE TRIGGER "ZHAN"."ADD_ARTIST" 
   before insert on "ZHAN"."ARTISTS" 
   for each row 
begin  
   if inserting then 
      if :NEW."ARTISTS_ID" is null then 
         select SEQUENCE1.nextval into :NEW."ARTISTS_ID" from dual; 
      end if; 
   end if; 
end;

/
ALTER TRIGGER "ZHAN"."ADD_ARTIST" ENABLE;
