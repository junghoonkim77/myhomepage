print('pythos','java','javascript',sep="vs") #sep는 세퍼레이터의 약자
print('pythos','java','javascript',sep="vs",end="?") 
#end가 붙는건 뒤에 문장을 한줄에 표현해 주는 방법
print('무엇이 더 재미있을까요?')

# import sys

# print('pythos','java','javascript',file=sys.stdout ) 
# print('pythos','java','javascript',file=sys.stderr )

scores ={'수학':0,'영어':50,'코딩':100}

for subje,score in scores.items():  #튜플형태로 전달됨 앞에 subje와 score에
    print(subje , score)
   # print(subje.ljust(8) ,str(score).rjust(4),sep=":")

#은행 대기순번표 
#001,002,003으로 
# for num in range(1,21):
#     print("대기번호 :  {0}".format(num) )
#     print('대기번호 :'+ str(num).zfill(3)) #zfill 함수 0으로 채워주는 함수 

# answer = input('값을 입력하시오')
# print ('입력하신 값은 :'+ answer +'입니다.')




