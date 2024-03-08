import tkinter as tk
import pyperclip

def copy_to_clipboard(content):
    pyperclip.copy(content)

def create_button(root, text, content):
    button = tk.Button(root, text=text, command=lambda: copy_to_clipboard(content))
    button.pack()

root = tk.Tk()
root.title("통품_말머리모음")
root.geometry('300x300')
# 버튼 텍스트와 클립보드에 복사될 내용 설정
button_data = {
    "감성": "[감성]",
    "멀": "[멀]",
    "여성고객안심케어": "[여성고객안심케어]",
    "공동망": "[공동망]",
    "대외/언론언급": "[대외/언론언급]",
    "반": "[반]",
    "벌":"[벌]",
    "테스트":"테스트\n입니다?"

}

# 버튼 생성
for button_text, button_content in button_data.items():
    create_button(root, button_text, button_content)

root.mainloop()
