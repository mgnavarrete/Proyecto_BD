import random
num = range (5000)
file = open("datos/ruts.csv", 'w')
for i in num:
    a = random.randint(1,2)
    b = random.randint(0,5)
    c = random.randint(0,9)
    d = random.randint(0,9)
    e = random.randint(0,9)
    f = random.randint(0,9)
    g = random.randint(0,9)
    h = random.randint(0,9)
    i = random.randint(0,9)

    file.write(f"{a}{b}.{c}{d}{e}.{f}{g}{h}-{i}\n")