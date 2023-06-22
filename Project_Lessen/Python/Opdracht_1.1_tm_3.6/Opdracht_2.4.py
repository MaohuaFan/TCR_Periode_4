# Function: Shows the score of the player who has won.
# Author: 

# Input for the score of the two players.
score_speler1 = int(input("Score speler 1: "))
score_speler2 = int(input("Score speler 2: "))

# Looks wich score is higher. The person with the higher score will show up at the end.
# If the score is the same, then it prints the message: "Het is gelijkspel!".
if score_speler1 > score_speler2:
    print("Speler 1 heeft gewonnen!")
elif score_speler2 > score_speler1:
    print("Speler 2 heeft gewonnen!")
else:
    print("Het is gelijkspel!")