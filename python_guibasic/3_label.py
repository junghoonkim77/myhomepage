from tkinter import *
from random import *

root =Tk()

root.title('나도  GUI')
root.geometry("640x480") #소문자 X

label1 = Label(root,text="안녕하세요~!")
label1.pack()

photo = PhotoImage(file="myhomepage\python_guibasic\무기머리.png")
label2 = Label(root,image=photo)
label2.pack()

def change():
    label1.config(text="또만나요")
    global photo2 #전역변수로 선언하지 않으면 메모리가 청소되기 때문에 적용이 안된다.
    photo2 = PhotoImage(file="myhomepage\python_guibasic\엑스.png")
    label2.config(image=photo2) # config라는건 기존에 내용을 변경할때 사용하는것 
    
btn = Button(root,text="클릭",command=change)
btn.pack()

root.mainloop()
