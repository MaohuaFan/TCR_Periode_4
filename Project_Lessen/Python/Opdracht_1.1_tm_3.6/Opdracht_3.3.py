# Function: Voting system.
# Author: 

stemmen = {}

while True:
    stem = input("Typ de naam van de persoon waarop je wilt stemmen (of typ 'UITSLAG' om te stoppen): ")

    if stem == "UITSLAG":
        break

    if stem in stemmen:
        stemmen[stem] += 1
    else:
        stemmen[stem] = 1

winnaar = max(stemmen, key=stemmen.get)
verliezer = min(stemmen, key=stemmen.get)

aantal_stemmen_winnaar = stemmen[winnaar]
aantal_stemmen_verliezer = stemmen[verliezer]

print("De verkiezingen zijn afgelopen!")
print("De winnaar van de verkiezingen is:", winnaar)
print("Aantal stemmen voor de winnaar:", aantal_stemmen_winnaar)
print("De verliezer van de verkiezingen is:", verliezer)
print("Aantal stemmen voor de verliezer:", aantal_stemmen_verliezer)