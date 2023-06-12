# Function: Asks the user for three hobbies and prints them.
# Author: Cornelis Zoutewelle

# Empty list for the hobbies.
hobbies = []

# The range method ensures that the program asks three times.
# The append method puts the hobbies in the empty list.
for i in range(3):
    hobby = input("Wat is je hobby? ")
    hobbies.append(hobby)

# Print the hobbies.
print("Je hobby's zijn:")
for hobby in hobbies:
    print(hobby)