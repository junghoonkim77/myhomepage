import tkinter as tk
win = tk.Tk()
win.geometry("600x300")
hello = tk.Label(win,text="아빠는 왜이리 병신 같을까? ㅠㅠ",relief='ridge')
hello.pack(side="left",anchor="n",padx="20",pady="30",ipadx="10",ipady="10")
win.mainloop()