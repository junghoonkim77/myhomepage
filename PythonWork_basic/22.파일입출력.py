#3:17:51초 강의 
#--------------------------  파일 쓰기 
# score_file = open('score.txt','w',encoding='utf8') #w는 쓰겠다는 의미의 wright
# print ('수학:0',file=score_file)
# print ('영어:50',file=score_file)
# score_file.close()  #파일을 열었으면 반드시 닫아줘야 한다.
# #위와 같이 하면 파일이 생성되고 print 안에 내용이 파일안에 생성된다.

# score_file = open('score.txt','a',encoding='utf8') # a는 append라는 뜻으로 기존파일에 이어서 쓴다는 뜻
# score_file.write('과학: 80')
# score_file.write('\n코딩 : 100점')
# score_file.close()
# #--------------------------  파일 읽어오기
   
score_file =open('study.txt','r',encoding='utf8')
print(score_file.read())
score_file.close()

# poem_file =open('poem.hwp','w',encoding='utf8')
# print('동해물과 백두산이',file=poem_file)
# print('마르고 닳도록',file=poem_file)
# print('하느님이 보우하사 우리나라 만세',file=poem_file)
# print('무궁화 삼천리 화려강산',file=poem_file)
# print('대한사람 대한으로 길이 보전하세',file=poem_file)
# poem_file.close()
# #--------------------------  파일 한줄씩 읽어보기

# # score_file =open('poem.hwp','r',encoding='utf8')
# # print(score_file.readline())
# # score_file.close()

# #--------------------------  파일 이 몇줄인지 모를때 
# poem_file =open('poem.hwp','r',encoding='utf8')

# while True :
#     line = poem_file.readline()
#     if not line:
#         break
#     print(line)

# poem_file.close()

# #-------------------------- 파일을 읽어와 리스트에 저장하는 방법
# poem_file =open('poem.hwp','r',encoding='utf8')
# lines = poem_file.readlines() #list형태로 저장
# for  i in lines :
#     print(i,end=" ")

# poem_file.close()
