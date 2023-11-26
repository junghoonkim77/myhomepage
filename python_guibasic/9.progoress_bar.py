import tkinter.ttk as ttk  #combobox와 progress바는 꼭 ttk에서 import 해줘야 한다.
#combobox는 이런식으로 하나를 import해와야 하며 
import time

from tkinter import *


root =Tk()

root.title('나도  GUI')
root.geometry("640x480") #가로 세로

#progressbar = ttk.Progressbar(root,maximum=100,mode='indeterminate') #indeterminate는 값이 결정되지 않은것 
# progressbar = ttk.Progressbar(root,maximum=100,mode='determinate') #indeterminate는 값이 결정되지 않은것
# progressbar.start(10) #10ms마다 움직임
# progressbar.pack()


# def btncmd():
#     progressbar.stop()  # 프로그래스 바를 중지시키는 명령어 

# btn = Button(root,text="중지",command=btncmd)
# btn.pack()

p_bar2 = DoubleVar()
prograssbar2 = ttk.Progressbar(root,maximum=100,length=150,variable=p_bar2)
prograssbar2.pack()

def btncmd2():
    for i in range(1,101):
        time.sleep(0.01)
       
        p_bar2.set(i) #여기까지만 하면 과정업데이트가 안되기 때문에 한번에 쫙 끝난다.
        prograssbar2.update() #UI를 업데이트 하는 과정 
        print(p_bar2.get())
        
        

btn = Button(root,text="시작",command=btncmd2)
btn.pack()

root.mainloop()
