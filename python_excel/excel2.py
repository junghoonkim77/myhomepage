# tkinter 모듈 임포트
import tkinter as tk
from tkinter import filedialog

# root 윈도우 생성
root = tk.Tk()

# root 윈도우 숨기기
root.withdraw()

# 파일 선택 대화상자 띄우기
file_path = filedialog.askopenfilename(filetypes=[("Excel files", "*.xlsx")])

# 선택된 파일 경로 출력
print(file_path)

# openpyxl 모듈을 임포트합니다.
import openpyxl

# 엑셀 파일을 불러옵니다. 파일 이름은 원하는 대로 바꿀 수 있습니다.
wb = openpyxl.load_workbook(file_path)

# "테스트"라는 이름의 시트를 선택합니다.
ws = wb["Sheet1"]

# A1셀에서 G10셀의 범위를 반복문으로 순회합니다.
for row in ws["A1:G10"]:
    for cell in row:
        # 셀 안에 값이 "연"이나 "반"이 아닌 경우
        if cell.value not in ["연", "반"]:
            # 셀 값을 지웁니다.
            cell.value = None

# 변경된 내용을 저장합니다. 파일 이름은 원하는 대로 바꿀 수 있습니다.
wb.save("test_result1.xlsx")