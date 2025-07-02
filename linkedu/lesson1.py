import tkinter as tk
win = tk.Tk()
emt1 = tk.Entry(win,
                     relief="ridge",
                     borderwidth=3,
                     highlightcolor="red",
                     takefocus=True,)

emt1.insert(0, "Hello, world!")
emt1.pack()

leb= tk.Label(win,text="아빠가 병신이라 너무 미안해ㅠㅠ")
leb.pack()
win.mainloop()