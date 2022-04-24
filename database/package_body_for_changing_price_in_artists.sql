
--------------------------------------------------------
--  DDL for Package Body CHANGE_MONEY
--------------------------------------------------------

  CREATE OR REPLACE PACKAGE BODY "ZHAN"."CHANGE_MONEY" AS
    PROCEDURE TRANSFER_MONEY(art_id IN NUMBER, NEW_MONEY IN arts.price%TYPE, old_money IN arts.old_price%TYPE) IS
    begin
        update arts set price = NEW_MONEY, old_price = old_money where arts_id = art_id;
    end;

    FUNCTION SHOW_DISCOUNT(NEW_MONEY IN arts.price%TYPE, old_money IN arts.old_price%TYPE) RETURN NUMBER AS
    temp_price number;
    begin
        select round( NEW_MONEY/old_money * 100) into temp_price from dual;
        return temp_price;
    end;


end CHANGE_MONEY;

/
