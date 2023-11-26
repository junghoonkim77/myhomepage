import tkinter.ttk as ttk 
#combobox는 이런식으로 하나를 import해와야 하며 

from tkinter import *


root =Tk()

root.title('나도  GUI')
root.geometry("640x480") #가로 세로

values=[str(i)+'일' for i in range(1,32)]
combobox = ttk.Combobox(root,height=5,values=values)
combobox.pack()
combobox.set('카드 결제일')# 최초 목록의 제목을 설정할수 있다.

readonly_combobox = ttk.Combobox(root,height=10,values=values,state="readonly")#읽기 전용
readonly_combobox.current(0) #0번째 인덱스 값 선택 
readonly_combobox.pack()

#readonly_combobox.set('카드 결제일')# 최초 목록의 제목을 설정할수 있다.

def btncmd():
    print(combobox.get())
    print(readonly_combobox.get())




btn = Button(root,text="선택",command=btncmd)
btn.pack()

root.mainloop()
