from tkinter import *
from random import *

root =Tk()

root.title('나도  GUI')
root.geometry("640x480") #소문자 X

listbox =Listbox(root,selectmode="extended",height=0)
#exten드는 다중선택 #single은 한개씩만 선택 height는 갯수대로 보여주는거고 0은 전체를 다 보여주는것
listbox.insert(0,"사과")
listbox.insert(1,"딸기")
listbox.insert(2,"바나나")
listbox.insert(END,"수박")#END를 넣어주면 순서의 맨 마지막에 값을 넣어준다는 의미가 됨
listbox.insert(END,"포도")
listbox.pack()


def btncmd():
    #삭제 listbox.delete(END) 
    #END는맨뒤에 항목을 삭제
    #0은 맨 앞에 항목을 삭제
    #print('리스트에는',listbox.size(),"개가 있어요")
    #항목확인 (시작idx , 끝idx)
    #print('1번째부터 3번째까지의 항목은: ',listbox.get(0,2))
    #선택된 항목 확인 (위치로 반환 ex 1,2,3)
    print('선택된 항목 :',listbox.curselection())    

btn = Button(root,text="클릭",command=btncmd)
btn.pack()

root.mainloop()
