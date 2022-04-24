
--------------------------------------------------------
--  DDL for Package CHANGE_MONEY
--------------------------------------------------------

  CREATE OR REPLACE PACKAGE "ZHAN"."CHANGE_MONEY" IS
     PROCEDURE TRANSFER_MONEY(art_id IN NUMBER, NEW_MONEY IN arts.price%TYPE, old_money IN arts.old_price%TYPE);
     FUNCTION SHOW_DISCOUNT(NEW_MONEY IN arts.price%TYPE, old_money IN arts.old_price%TYPE) RETURN NUMBER;
END CHANGE_MONEY;

/
