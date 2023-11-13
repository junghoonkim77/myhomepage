from tkinter import *
from random import *

root =Tk()

root.title('나도  GUI')
root.geometry("640x480") #소문자 X

checkvar = IntVar() #chkvar에 int형으로 값을 저장한다.
checkbox =Checkbutton(root,text="오늘 하루 보지 않기",variable=checkvar)
# checkbox.select()#자동선택 처리   자바스크립트 select박스와 배우 비슷하다.
# checkbox.deselect() #선택 해제 처리
checkbox.pack()

checkvar2 = IntVar()
checkbox2 = Checkbutton(root,text="일주일동안 보지 않기 ",variable=checkvar2)
checkbox2.pack() #반드시 버튼을 만들고 pack()로 감싸줘야 한다.


def btncmd():
    print(checkvar.get()) #0은 체크해제 1은 체크상태 true false와 비슷    
    print(checkvar2.get())
btn = Button(root,text="클릭",command=btncmd)
btn.pack()

root.mainloop()
