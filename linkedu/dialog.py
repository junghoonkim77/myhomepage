import tkinter as tk
win = tk.Tk()
lbl =tk.Message(win, text="아빠는 왜이리 병신 같을까? ㅠㅠ", relief='ridge')
lbl['font'] = ('맑은 고딕', 20, 'bold')
lbl.pack()
win.mainloop()