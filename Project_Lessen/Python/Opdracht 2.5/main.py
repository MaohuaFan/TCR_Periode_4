# Function: Allows the user to multiply two given numbers.
# Author: Cornelis Zoutewelle

# Function that allows for multiplication of two numbers.
def vermenigvuldig_getallen(a, b):
    resultaat = a * b
    return resultaat

# Asking the user for two numbers.
getal1 = float(input("Voer het eerste getal in: "))
getal2 = float(input("Voer het tweede getal in: "))

# Calls for the function to multiply the two numbers.
product = vermenigvuldig_getallen(getal1, getal2)

# Prints the result of the multiplication.
print("Het product van", getal1, "en", getal2, "is:", product)