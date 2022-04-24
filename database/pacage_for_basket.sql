
--------------------------------------------------------
--  DDL for Package BASKET_CRUD
--------------------------------------------------------

  CREATE OR REPLACE PACKAGE "ZHAN"."BASKET_CRUD" AS
     PROCEDURE  add_basket(artists_id number, arts_id number);
     PROCEDURE  delete_basket(p_artists_id number, p_arts_id number);
     function  count_basket(p_artists_id number) return number;
     function  count_price_basket(p_artists_id number) return number;
END basket_crud;

/
