import pyautogui
import time
import tkinter as tk
from threading import Thread
from pynput.mouse import Listener

# 클릭할 좌표를 저장할 리스트
click_positions = []

# 각 클릭 사이의 딜레이 시간을 저장할 리스트
click_delays = []

# 반복 실행을 관리할 변수
running = False

# 마우스 클릭 이벤트 핸들러
def on_click(x, y, button, pressed):
    if pressed:
        # 클릭된 좌표를 리스트에 추가
        click_positions.append((x, y))
        # 기본 딜레이 시간을 리스트에 추가
        click_delays.append(1)  # 기본값은 1초
        positions_var.set(click_positions)  # 화면에 표시

def start_clicking():
    global running
    running = True
    repeat_count = int(repeat_var.get())
    try:
        for _ in range(repeat_count):
            if not running:
                break
            for pos, delay in zip(click_positions, click_delays):
                if not running:
                    break
                pyautogui.moveTo(pos[0], pos[1])
                pyautogui.click()
                time.sleep(delay)
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

# 시작 및 중지 버튼
tk.Button(root, text="시작", command=lambda: Thread(target=start_clicking).start()).pack()
tk.Button(root, text="중지", command=stop_clicking).pack()

# 스페이스바를 눌러 중지
root.bind('<space>', lambda event: stop_clicking())

# 마우스 클릭 이벤트 리스너 등록
listener_thread = Thread(target=lambda: Listener(on_click=on_click).start())
listener_thread.start()

root.mainloop()
