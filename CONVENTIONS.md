# 1. Bestands- en Klassenamen
Gebruik CamelCase voor klassenamen (bijv. UserController, OrderService).
Bestanden moeten dezelfde naam hebben als de klasse die ze bevatten (bijv. de klasse UserController zit in UserController.php).
Gebruik enkelvoudige naamgevingen voor modellen (User in plaats van Users).

# 2. Methode- en Functienamen
Gebruik camelCase voor methode- en functienamen (bijv. getUserOrders(), sendEmailNotification()).
Methoden in controllers moeten acties beschrijven zoals index(), store(), update(), destroy().

# 3. Route- en URL-namen
Gebruik kebab-case voor route-namen (bijv. /user-profile, /order-history).
Definieer expliciete route-namen waar mogelijk en vermijd generieke namen.

# 4. Commentaar
Schrijf commentaar boven functies en methoden om te beschrijven wat ze doen, indien de logica niet direct duidelijk is.
Gebruik PHPDoc-commentaar voor methoden, vooral als ze parameters en retourwaarden hebben.