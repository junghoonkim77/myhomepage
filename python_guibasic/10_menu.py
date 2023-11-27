from tkinter import *


root =Tk()

root.title('나도  GUI')
root.geometry("640x480") #가로 세로


def create_new_file():
    print('새 파일을 만듭니다.')
menu=Menu(root)

menu_file = Menu(menu,tearoff=0) #root에 추가하는게 아니라 menu에 추가하는것 
menu_file.add_command(label='New File',command=create_new_file)
menu_file.add_command(label='New Window')
menu_file.add_separator() #구분자 
menu_file.add_command(label='Open file...')
menu.add_cascade(label='File',menu=menu_file)

menu2=Menu(root)

menu_file1=Menu(menu2,tearoff=0)
menu_file1.add_command(label='편집')
menu_file1.add_command(label='잘라내기')
menu_file1.add_separator()
menu_file1.add_command(label='모두지우기')
menu2.add_cascade(label='에디터',menu2=menu_file1)


root.config(menu=menu) #메뉴를 root에 포함시키기 위해선 menu=menu를 해주면 된다.중요함
root.config(menu=menu2)
root.mainloop()