# Function: Roulette game in Python. (Using random import)
# Author: 

# Imports
import random

# Variables
saldo = 10
inzet = {}

# Functions
while saldo > 0:
    print("Je hebt", saldo, "chips.")

    chip_inzet = input("Op welk getal wil je inzetten? (1-36) Typ 'STOP' om te spelen: ")

    if chip_inzet == 'STOP':
        print("Rien ne va plus!")
        break

    if chip_inzet.isdigit():
        chip_inzet = int(chip_inzet)
        if 1 <= chip_inzet <= 36:
            saldo -= 1
            if chip_inzet in inzet:
                inzet[chip_inzet] += 1
            else:
                inzet[chip_inzet] = 1
            print("Je hebt 1 chip ingezet op", chip_inzet)
        else:
            print("Ongeldige inzet! Kies een getal tussen 1 en 36.")
    else:
        print("Ongeldige inzet! Voer een getal in of typ 'STOP'.")

if saldo == 0:
    print("GAME OVER!")
else:
    print("Het wiel draait...")

    winnend_getal = random.randint(1, 36)
    print("Het winnende getal is:", winnend_getal)

    totaal_winst = 0

    for getal, aantal in inzet.items():
        if getal == winnend_getal:
            winst = aantal * 35
            saldo += winst
            totaal_winst += winst
            print("Gefeliciteerd! Je hebt", aantal, "chip(s) ingezet op", getal, "en wint", winst, "chip(s).")
        else:
            saldo -= aantal
            print("Helaas! Je hebt", aantal, "chip(s) ingezet op", getal, "en verliest ze.")

    print("Totaal winst/verlies:", totaal_winst)
