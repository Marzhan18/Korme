
--------------------------------------------------------
--  DDL for Table ARTS
--------------------------------------------------------

  CREATE TABLE "ZHAN"."ARTS" 
   (	"ARTS_ID" NUMBER(11,0), 
	"TITLE" VARCHAR2(255 BYTE), 
	"PRICE" NUMBER(11,0) DEFAULT null, 
	"STYLE_ID" NUMBER(11,0), 
	"IMAGE" VARCHAR2(255 BYTE) DEFAULT NULL, 
	"CREATED_AT" DATE, 
	"ARTISTS_ID" NUMBER(11,0), 
	"OLD_PRICE" NUMBER(11,0) DEFAULT null
   ) SEGMENT CREATION IMMEDIATE 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Index PK_ARTS
--------------------------------------------------------

  CREATE UNIQUE INDEX "ZHAN"."PK_ARTS" ON "ZHAN"."ARTS" ("ARTS_ID") 
  PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS" ;
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
--------------------------------------------------------
--  Constraints for Table ARTS
--------------------------------------------------------

  ALTER TABLE "ZHAN"."ARTS" ADD CONSTRAINT "PK_ARTS" PRIMARY KEY ("ARTS_ID")
  USING INDEX PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS"  ENABLE;
 
  ALTER TABLE "ZHAN"."ARTS" MODIFY ("TITLE" NOT NULL ENABLE);
 
  ALTER TABLE "ZHAN"."ARTS" MODIFY ("PRICE" NOT NULL ENABLE);
 
  ALTER TABLE "ZHAN"."ARTS" MODIFY ("STYLE_ID" NOT NULL ENABLE);
 
  ALTER TABLE "ZHAN"."ARTS" MODIFY ("CREATED_AT" NOT NULL ENABLE);
 
  ALTER TABLE "ZHAN"."ARTS" ADD CHECK (OLD_PRICE >= 0) ENABLE;
 
  ALTER TABLE "ZHAN"."ARTS" ADD CHECK (OLD_PRICE >= 0) ENABLE;
--------------------------------------------------------
--  Ref Constraints for Table ARTS
--------------------------------------------------------

  ALTER TABLE "ZHAN"."ARTS" ADD CONSTRAINT "FK_ARTISTS" FOREIGN KEY ("ARTISTS_ID")
	  REFERENCES "ZHAN"."ARTISTS" ("ARTISTS_ID") ON DELETE SET NULL ENABLE;
 
  ALTER TABLE "ZHAN"."ARTS" ADD CONSTRAINT "FK_STYLES" FOREIGN KEY ("STYLE_ID")
	  REFERENCES "ZHAN"."STYLES" ("STYLE_ID") ON DELETE SET NULL ENABLE;
