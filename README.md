OnlineShop – Datenbank- & Webanwendung

Dieses Projekt ist die Umsetzung eines OnlineShop-Systems als Kombination aus einer relationalen Datenbank, einer Java-basierten Datenbefüllung und einer webbasierten Benutzeroberfläche mit PHP & Bootstrap.

Projektübersicht


Der OnlineShop erlaubt es registrierten Kunden, sich über ihre einzigartige E-Mail-Adresse zu identifizieren.Nach dem Login können Kunden aus verschiedenen Kategorien (z.B. Kleidung, Elektronik, Möbel) Produkte auswählen und in den Warenkorb legen.
Beim Hinzufügen schlägt das System automatisch ähnliche Produkte vor.Kunden können danach aus dem Warenkorb einzelne Produkte bestellen und ihre bevorzugte Zahlungsmethode sowie Lieferadresse angeben.

Java (Backend / Datenbankbefüllung)

Die Datenbank wird über Java befüllt.Dies erfolgt über die Klasse JavaSqlExample, die automatisiert Datenbankverbindungen aufbaut und SQL-Befehle ausführt.

PHP (Frontend / Benutzeroberfläche)

Die Weboberfläche ist mit PHP und Bootstrap umgesetzt.
Features:
- Responsives Design dank Bootstrap
- CRUD-Operationen (Create, Read, Update, Delete) via PHP
- Navigierbare Seitenstruktur über die Shop-Navigation („Zola“ verlinkt zur index.php)

Zentrale PHP-Dateien:
- DatabaseHelper.php – Allgemeine DB-Operationen
- DatabaseHelpKunde.php – Kundenspezifische Operationen
- DatabaseHelperEmpfehlen.php – Produktempfehlungen

