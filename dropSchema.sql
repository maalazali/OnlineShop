--Tabellen löschen
DROP TABLE CartX CASCADE CONSTRAINTS;

DROP TABLE KundeX CASCADE CONSTRAINTS;

DROP TABLE KategorieX CASCADE CONSTRAINTS;

DROP TABLE ProduktX CASCADE CONSTRAINTS;

DROP TABLE BestellungX;

DROP TABLE waehlenX;

DROP TABLE empfehlenX;

-- Trigger löschen

DROP TRIGGER Check_Email_Before_Insert;

-- Prozedur löschen

DROP PROCEDURE GetTotalCartPrice;

DROP PROCEDURE p_delete_person;





