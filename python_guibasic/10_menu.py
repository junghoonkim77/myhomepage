from tkinter import *


root =Tk()

root.title('나도  GUI')
root.geometry("640x480") #가로 세로


def create_new_file():
    print('새 파일을 만듭니다.')
menu=Menu(root)

#File 메뉴
menu_file = Menu(menu,tearoff=0) #root에 추가하는게 아니라 menu에 추가하는것 
menu_file.add_command(label='New File',command=create_new_file)
menu_file.add_command(label='New Window')
menu_file.add_separator() #구분자 
menu_file.add_command(label='Open file...')
menu_file.add_separator() #구분자 
menu_file.add_command(label='Save All',state='disable')#비활성화
menu_file.add_separator() #구분자 
menu_file.add_command(label='Exit',command=root.quit)
menu.add_cascade(label='File',menu=menu_file)

#Edit 메뉴 (빈값)
menu.add_cascade(label='Edit')

#Language메뉴 추가 ( radio 버튼을 통해 택1)
menu_lang = Menu(menu,tearoff=0)
menu_lang.add_radiobutton(label='Python')
menu_lang.add_radiobutton(label='Java')
menu_lang.add_radiobutton(label='C++')


root.config(menu=menu) #메뉴를 root에 포함시키기 위해선 menu=menu를 해주면 된다.중요함

root.mainloop()
