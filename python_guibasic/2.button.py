from tkinter import *
from random import *

root =Tk()

root.title('나도  GUI')

btn1 = Button(root,text="버튼1") #버튼 위젯을 통해 만든 버튼을 
btn1.pack() #pack메소드를 통해 메인에 포함 시키는  거다 

btn2 = Button(root,padx=5,pady=10, text="버튼2") #버튼 위젯을 통해 만든 버튼을 
btn2.pack()  #padx 와 pady를 통해 버튼의 크기를 조절해준다.

btn3 = Button(root,padx=10,pady=5,text="버튼3") #버튼 위젯을 통해 만든 버튼을 
btn3.pack()  #pack메소드를 통해 메인에 포함 시키는  거다 

btn4 = Button(root,width=10,height=3,text ="버튼4") # 
btn4.pack()#pack메소드를 통해 메인에 포함 시키는  거다 

btn5 =Button(root,fg="red",bg="yellow", text="button5")
btn5.pack()

photo = PhotoImage(file="myhomepage\python_guibasic\무기머리.png")
btn6 = Button(root,image=photo)
btn6.pack()

def btnprint():
    print('우와 동작한다 무언가~!')
    
btn7 = Button(root,text="동작하는 버튼",command=btnprint)
btn7.pack()





root.mainloop()
