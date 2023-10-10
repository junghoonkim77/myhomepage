# tkinter 모듈을 임포트합니다.
import tkinter as tk
from tkinter import filedialog, messagebox

# 메모장 앱 클래스를 정의합니다.
class NotepadApp(tk.Tk):
    # 초기화 메서드를 정의합니다.
    def __init__(self):
        # 부모 클래스의 초기화 메서드를 호출합니다.
        super().__init__()
        # 윈도우 타이틀을 설정합니다.
        self.title("메모장")
        # 텍스트 위젯을 생성하고 배치합니다.
        self.text = tk.Text(self, undo=True)
        self.text.pack(expand=True, fill=tk.BOTH)
        # 메뉴 바를 생성하고 배치합니다.
        self.menu_bar = tk.Menu(self)
        self.config(menu=self.menu_bar)
        # 파일 메뉴를 생성하고 배치합니다.
        self.file_menu = tk.Menu(self.menu_bar, tearoff=False)
        self.menu_bar.add_cascade(label="파일", menu=self.file_menu)
        # 파일 메뉴에 명령을 추가합니다.
        self.file_menu.add_command(label="새로 만들기", command=self.new_file)
        self.file_menu.add_command(label="열기...", command=self.open_file)
        self.file_menu.add_command(label="저장", command=self.save_file)
        self.file_menu.add_command(label="다른 이름으로 저장...", command=self.save_as_file)
        self.file_menu.add_separator()
        self.file_menu.add_command(label="종료", command=self.quit)
        # 편집 메뉴를 생성하고 배치합니다.
        self.edit_menu = tk.Menu(self.menu_bar, tearoff=False)
        self.menu_bar.add_cascade(label="편집", menu=self.edit_menu)
        # 편집 메뉴에 명령을 추가합니다.
        self.edit_menu.add_command(label="실행 취소", command=self.text.edit_undo)
        self.edit_menu.add_command(label="다시 실행", command=self.text.edit_redo)
        self.edit_menu.add_separator()
        self.edit_menu.add_command(label="잘라내기", command=self.cut_text)
        self.edit_menu.add_command(label="복사", command=self.copy_text)
        self.edit_menu.add_command(label="붙여넣기", command=self.paste_text)
        self.edit_menu.add_separator()
        self.edit_menu.add_command(label="모두 선택", command=self.select_all_text)
        # 현재 파일 이름을 None으로 초기화합니다.
        self.filename = None

    # 새로 만들기 명령을 정의합니다.
    def new_file(self):
        # 텍스트 위젯의 내용을 지웁니다.
        self.text.delete(1.0, tk.END)
        # 현재 파일 이름을 None으로 설정합니다.
        self.filename = None
        # 윈도우 타이틀을 "메모장"으로 설정합니다.
        self.title("메모장")

    # 열기 명령을 정의합니다.
    def open_file(self):
        # 파일 선택 대화상자를 엽니다.
        filename = filedialog.askopenfilename(filetypes=[("텍스트 파일", "*.txt")])
        # 파일 이름이 유효하면
        if filename:
            # 텍스트 위젯의 내용을 지웁니다.
            self.text.delete(1.0, tk.END)
            # 선택한 파일을 엽니다.
            with open(filename, "r") as file:
                # 파일의 내용을 읽어서 텍스트 위젯에 삽입합니다.
                self.text.insert(1.0, file.read())
            # 현재 파일 이름을 선택한 파일 이름으로 설정합니다.
            self.filename = filename
            # 윈도우 타이틀을 "메모장 - 파일 이름"으로 설정합니다.
            self.title(f"메모장 - {filename}")

    # 저장 명령을 정의합니다.
    def save_file(self):
        # 현재 파일 이름이 None이면
        if not self.filename:
            # 다른 이름으로 저장 명령을 호출합니다.
            self.save_as_file()
            return
        # 텍스트 위젯의 내용을 가져옵니다.
        content = self.text.get(1.0, tk.END)
        # 현재 파일 이름으로 파일을 엽니다.
        with open(self.filename, "w") as file:
            # 파일에 텍스트 위젯의 내용을 씁니다.
            file.write(content)
        # 메시지 박스에 저장 완료 메시지를 표시합니다.
        messagebox.showinfo("메모장", "파일이 저장되었습니다.")

    # 다른 이름으로 저장 명령을 정의합니다.
    def save_as_file(self):
        # 파일 저장 대화상자를 엽니다.
        filename = filedialog.asksaveasfilename(filetypes=[("텍스트 파일", "*.txt")], defaultextension=".txt")
        # 파일 이름이 유효하면
        if filename:
            # 텍스트 위젯의 내용을 가져옵니다.
            content = self.text.get(1.0, tk.END)
            # 선택한 파일 이름으로 파일을 엽니다.
            with open(filename, "w") as file:
                # 파일에 텍스트 위젯의 내용을 씁니다.
                file.write(content)
            # 현재 파일 이름을 선택한 파일 이름으로 설정합니다.
            self.filename = filename
            # 윈도우 타이틀을 "메모장 - 파일 이름"으로 설정합니다.
            self.title(f"메모장 - {filename}")
            # 메시지 박스에 저장 완료 메시지를 표시합니다.
            messagebox.showinfo("메모장", "파일이 저장되었습니다.")

    # 잘라내기 명령을 정의합니다.
    def cut_text(self):
        # 텍스트 위젯에서 선택된 텍스트를 클립보드에 복사하고 삭제합니다.
        self.text.event_generate("<<Cut>>")

    # 복사 명령을 정의합니다.
    def copy_text(self):
        # 텍스트 위젯에서 선택된 텍스트를 클립보드에 복사합니다.
        self.text.event_generate("<<Copy>>")

    # 붙여넣기 명령을 정의합니다.
    def paste_text(self):
        # 클립보드의 내용을 텍스트 위젯에 삽입합니다.
        self.text.event_generate("<<Paste>>")

    # 모두 선택 명령을 정의합니다.
    def select_all_text(self):
        # 텍스트 위젯의 모든 텍스트를 선택합니다.
        self.text.tag_add(tk.SEL, 1.0, tk.END)

# 메모장 앱 객체를 생성하고 실행합니다.
app = NotepadApp()
app.mainloop()
