import pyautogui
import time
import tkinter as tk
from threading import Thread

# 클릭할 좌표를 저장할 리스트
click_positions = []

# 반복 실행을 관리할 변수
running = False

def update_positions(event):
    # 마우스 위치를 가져와서 리스트에 추가
    pos = pyautogui.position()
    click_positions.append(pos)
    positions_var.set(click_positions)  # 화면에 표시

def start_clicking():
    global running
    running = True
    repeat_count = int(repeat_var.get())
    try:
        for _ in range(repeat_count):
            if not running:
                break
            for pos in click_positions:
                if not running:
                    break
                pyautogui.moveTo(pos.x, pos.y)
                pyautogui.click()
                time.sleep(1)
    except Exception as e:
        print(f"오류가 발생했습니다: {e}")
    finally:
        running = False

def stop_clicking():
    global running
    running = False

# tkinter 윈도우 설정
root = tk.Tk()
root.title("Auto Clicker")

# 반복 횟수 입력
repeat_var = tk.StringVar()
tk.Label(root, text="반복 횟수:").pack()
tk.Entry(root, textvariable=repeat_var).pack()

# 좌표 리스트 표시
positions_var = tk.StringVar()
tk.Label(root, text="클릭할 좌표:").pack()
tk.Label(root, textvariable=positions_var).pack()

# 마우스 위치 추가 버튼
tk.Button(root, text="마우스 위치 추가", command=lambda: update_positions(None)).pack()

# 시작 및 중지 버튼
tk.Button(root, text="시작", command=lambda: Thread(target=start_clicking).start()).pack()
tk.Button(root, text="중지", command=stop_clicking).pack()

# 스페이스바를 눌러 중지
root.bind('<space>', lambda event: stop_clicking())

root.mainloop()
