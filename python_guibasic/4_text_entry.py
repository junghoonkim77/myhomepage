from tkinter import *
from random import *

root =Tk()

root.title('나도  GUI')
root.geometry("640x480") #소문자 X

txt = Text(root,width=30,height=5) #textarea태그와 비슷함
txt.pack()

txt.insert(END,"글자를 입력하세요")

e=Entry(root,width=30) #한줄로 짧게 아이디나 비번등을 입력할때 사용
e.pack()
e.insert(0,"한줄만 입력하세요")

def btncmd():
    print(txt.get("1.0",END)) 
     #텍스트안의 내용을 라인1번에 column0 부터
     #get해서 가져온다는 뜻
    print(e.get()) #entry의 내용은 간단하게 가져올수 있다.
    txt.delete('1.0',END)
    e.delete(0,END) #entry의 내용은 간단하게 지울수 있다.

btn = Button(root,text="클릭",command=btncmd)
btn.pack()

root.mainloop()
