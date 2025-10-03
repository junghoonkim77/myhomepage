import tkinter as tk
win = tk.Tk()
win.geometry("600x300")
hello = tk.Label(win,text="테스트 임",relief='ridge')
hello.pack(side="left",anchor="n",padx="20",pady="30",ipadx="10",ipady="10")
win.mainloop()