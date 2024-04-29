import pyautogui
import time

# 반복 횟수
repeat_count = 357

# 첫 번째 클릭할 좌표
x1, y1 = 1870, 802

# 두 번째 클릭할 좌표
x2, y2 = 1830, 851

# 세 번째 클릭할 좌표
x3, y3 = 1076, 241

try:
    # 반복 실행
    for _ in range(repeat_count):
        # 첫 번째 좌표로 이동 및 클릭
        pyautogui.moveTo(x1, y1)
        pyautogui.click()

        # 1초 대기
        time.sleep(1)

        # 두 번째 좌표로 이동 및 클릭
        pyautogui.moveTo(x2, y2)
        pyautogui.click()

        # 1초 대기
        time.sleep(1)

        # 세 번째 좌표로 이동 및 클릭
        pyautogui.moveTo(x3, y3)
        pyautogui.click()

        # 1초 대기
        time.sleep(3)

except KeyboardInterrupt:
    print("중단되었습니다.")

