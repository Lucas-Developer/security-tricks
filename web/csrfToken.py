import random
import sys

alfabC = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"
alfabU = "ABCDEFGHIJKLMNOPQRSTUVWXYZ"
alfabL = "abcdefghijklmnopqrstuvwxyz"

def generator(tam, quant):
	i = 0
	k = 0
	newCrsf = ""
	
	while ((i != tam) and (k != int(quant))):
		if i != tam:
			newCrsf+= random.choice(alfabC)
			i+=1
		if i == tam:
			print newCrsf
			k+=1
			if k < int(quant):
				newCrsf = ""
				i = 0
		
	k = 0
	i = 0
	newCrsf = ""
	print "second"
	
	while ((i != tam) and (k != int(quant))):
		if i < 4:
			newCrsf += random.choice(alfabU)
			i+=1
		if i > 3:
			newCrsf += random.choice(alfabL)
			i+=1
		if i == tam:
			print newCrsf
			k+=1
			if k < int(quant):
				newCrsf = ""
				i = 0
	
def main():
	crsfToken = sys.argv[1]
	quantidade = int(sys.argv[2])
	generator(len(crsfToken), quantidade)

main()
