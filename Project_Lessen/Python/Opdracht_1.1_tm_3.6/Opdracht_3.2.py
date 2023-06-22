# Function: Calculates the faculteit of a given number.
# Author: 

# Function that calculates the faculteit.
def bereken_faculteit(n):
    if n == 0:
        return 1
    else:
        resultaat = 1
        for i in range(1, n + 1):
            resultaat *= i
        return resultaat

# The number that the user wants to know the faculteit of.
getal = int(input("Voer een getal in: "))

# Calls the function to calculate the faculteit.
faculteit = bereken_faculteit(getal)

# Prints the faculteit of the given number.
print("De faculteit van", getal, "is:", faculteit)