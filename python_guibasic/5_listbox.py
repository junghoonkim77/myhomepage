from tkinter import *
from random import *

root =Tk()

root.title('나도  GUI')
root.geometry("640x480") #소문자 X

listbox =Listbox(root,selectmode="extended",height=0)
listbox.insert(0,"사과")
listbox.insert(1,"딸기")
listbox.insert(2,"바나나")
listbox.insert(END,"수박")#END를 넣어주면 순서의 맨 마지막에 값을 넣어준다는 의미가 됨
listbox.insert(END,"포도")
listbox.pack()


def btncmd():
    pass

btn = Button(root,text="클릭",command=btncmd)
btn.pack()

root.mainloop()
