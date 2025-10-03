import tkinter as tk
win = tk.Tk()
emt1 = tk.Entry(win,
                     relief="ridge",
                     borderwidth=3,
                     highlightcolor="red",
                     takefocus=True,)

emt1.insert(0, "Hello, world!")
emt1.pack()

leb= tk.Label(win,text="테스트 임")
leb.pack()
win.mainloop()