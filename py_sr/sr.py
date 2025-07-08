import tkinter as tk

def show_form(form_name):
    form_label.config(text=f"{form_name} 작성양식:")
    if form_name == "통화품질 기본상담":
        form_text.delete(1.0, tk.END)
        form_text.insert(tk.END, """★통품SR양식★\n■서비스 번호 :\n■민원인 :\n■연락처 :\n■증상 :\n■발생 시기 :\n■확인 및 안내사항 :\n
    드라이나""")
    elif form_name == "중계기 설치":
        form_text.delete(1.0, tk.END)
        form_text.insert(tk.END, "중계기 설치 작성양식을 여기에 입력하세요.")
    elif form_name == "신호개선 요청":
        form_text.delete(1.0, tk.END)
        form_text.insert(tk.END, "신호개선 요청 작성양식을 여기에 입력하세요.")
    elif form_name == "중계기 이설요청":
        form_text.delete(1.0, tk.END)
        form_text.insert(tk.END, "중계기 이설요청 작성양식을 여기에 입력하세요.")
    elif form_name == "중계기 점검요청":
        form_text.delete(1.0, tk.END)
        form_text.insert(tk.END, "중계기 점검요청 작성양식을 여기에 입력하세요.")

# tkinter 창 생성 및 기본 설정
root = tk.Tk()
root.title("작성양식 선택")

# 좌측 프레임 (버튼 목록)
left_frame = tk.Frame(root)
left_frame.pack(side=tk.LEFT, padx=10, pady=10)

buttons = [
    "통화품질 기본상담",
    "중계기 설치요청",
    "신호개선 요청",
    "중계기 이설요청",
    "중계기 점검요청"
]

for btn_name in buttons:
    btn = tk.Button(left_frame, text=btn_name, width=20, command=lambda b=btn_name: show_form(b))
    btn.pack(pady=5)

# 우측 프레임 (작성 양식)
right_frame = tk.Frame(root)
right_frame.pack(side=tk.RIGHT, padx=10, pady=10)

form_label = tk.Label(right_frame, text="작성양식:")
form_label.pack()

form_text = tk.Text(right_frame, height=10, width=50)
form_text.pack()

root.mainloop()

print("프로그램이 종료되었습니다.")
