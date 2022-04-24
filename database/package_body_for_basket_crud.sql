
--------------------------------------------------------
--  DDL for Package Body BASKET_CRUD
--------------------------------------------------------

  CREATE OR REPLACE PACKAGE BODY "ZHAN"."BASKET_CRUD" AS
    
    PROCEDURE  add_basket (artists_id number, arts_id number) AS
        CURSOR c_sales IS SELECT  *  FROM basket;
        r_sales c_sales%ROWTYPE;
        is_unique Number(11) := 0;
    BEGIN
      OPEN c_sales;
      LOOP
        FETCH  c_sales  INTO r_sales;
        EXIT WHEN c_sales%NOTFOUND;
        if r_sales.artists_id = artists_id and r_sales.arts_id = arts_id THEN
            is_unique := 1;
        end if;
        EXIT WHEN  is_unique = 1;
      END LOOP;
      CLOSE c_sales;
      if is_unique = 0 then
        insert into basket values(artists_id, arts_id);
      end if;
    END;

     PROCEDURE  delete_basket(p_artists_id number, p_arts_id number) AS
        CURSOR c_sales IS SELECT  *  FROM basket;
        r_sales c_sales%ROWTYPE;
        is_unique Number(11) := 0;
    BEGIN
      OPEN c_sales;
      LOOP
        FETCH  c_sales  INTO r_sales;
        EXIT WHEN c_sales%NOTFOUND;
        if r_sales.artists_id = p_artists_id and r_sales.arts_id = p_arts_id THEN
            is_unique := 1;
        end if;
        EXIT WHEN  is_unique = 1;
      END LOOP;
      CLOSE c_sales;
      if is_unique = 1 then
        DELETE FROM basket WHERE (artists_id = p_artists_id AND arts_id = p_arts_id);
      end if;
     END;

     function  count_basket(p_artists_id number) return number AS
        CURSOR c_sales IS SELECT  *  FROM basket where artists_id = p_artists_id;
        count_basket number(11) := 0;
     BEGIN
        FOR rec IN c_sales LOOP
            count_basket := count_basket + 1;
        END LOOP;
        return count_basket;
     END;

    function  count_price_basket(p_artists_id number) return number AS
        CURSOR c_sales IS SELECT  *  FROM basket b INNER JOIN arts a ON b.arts_id = a.arts_id where b.artists_id = 3;
        count_basket number(11) := 0;
     BEGIN
        FOR rec IN c_sales LOOP
            count_basket := count_basket + rec.price;
        END LOOP;
        return count_basket;
     END;



END basket_crud;

/
