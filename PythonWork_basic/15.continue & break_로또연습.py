# absent =[2,5]
# no_book = [7]
# for student in range(1,10) :
#     if student in absent :
#         continue #continue를 만나면 다음 단계로 건너뛴다.
#     elif student in no_book :
#         print('오늘수업은 여기까지.{0}는 교무실로 따라와'.format(student))
#         break # break를 만나면 반복 구문을 끝내 버림
#     print('{0},이책을 읽어봐'.format(student))

family ={"김정훈":"케안습","김주남":"사랑하는 마눌이",
         "김기준":"소중한 아들","김기은":"소중한 딸",
         "고츠미":"아들의 소중한 장난감","고스미":"딸의 소중한 장난감"}
print(family["김정훈"])

condition = True
while condition:
  arrname =str(input('성격조회를 원하는 가족의 이름은?') ) 
  if arrname in family:
     print('{0}의 캐릭터는 :{1} 입니다.'.format(arrname,family[arrname]))
  else :
     print('너 우리 가족 아니지? 당장 나가')
     condition =False 

        
    
        

#문제

from random import *

# time = list(range(5,51))
# shuffle(time)
# time2 = list(range(5,16))
# shuffle(time2)

# cnt=0
# for i in range(1,51) :
#     time = randrange(5,51)
#     if 5<= time <=15 :
#         print('[0] {0}번째 손님 (소요시간 : {1}분)'.format(i,time))
#         cnt+=1
#     else:
#         print('[]{0}번째 손님(소요시간 :{1}분)'.format(i,time))

# print('총 탐승 승객 : {}'.format(cnt))



lottorange = range(1,51)
lottoList = list(lottorange)
shuffle(lottoList)

for index,lottoNum in enumerate(lottoList) :
    if index <6 :
        print('오늘의 롯또 넘버는 {0}입니다'.format(lottoList[index]))
    else :
        print('그리고 행운의 숫자는{0}'.format(lottoList[7]))
        break

print(sample(lottorange,6))
