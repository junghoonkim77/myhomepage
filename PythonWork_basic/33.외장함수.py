#구글에서 list of python modules를 검색

#glob : 경로내의 폴더 / 파일 목록조회 (윈도우로 치면 dir)
import glob  

print(glob.glob("*.py")) #확장자가 py인 모든 파일
#os : 운영체제에서 제공하는 기본 기능

import os  #막 파일을 만들고 그래버림 신기 
print(os.getcwd()) #현재 디렉토리를 표시해달라는 코드

folder = 'sample_dir'

#개신기 pc에 폴더를 막 만들어버려 대박 
# if os.path.exists(folder):
#     print('이미 존재하는 폴더입니다.')
#     os.rmdir(folder)
#     print(folder ,"폴더를 삭제하였습니다.")
# else:
#     os.makedirs(folder) #폴더생성
#     print('{0} <-폴더를 생성하였습니다.'.format(folder))
# print(os.listdir())

import time  #시간 관련 함수
print(time.localtime())
print(time.strftime('%Y-%m-%d %H:%M:%S'))

import datetime
print('오늘 날짜는 ',datetime.date.today())

#timeelta : 두 날짜 사이의 간격
today = datetime.date.today()
td = datetime.timedelta(days=100)
print('우리가 만난지 100일은 {0} 이네요'.format(today+td)) #오늘부터 100일
print(td)
