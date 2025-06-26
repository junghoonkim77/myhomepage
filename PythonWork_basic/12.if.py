weather = input("오늘 날씨는 어때요?") #자바스크립트의 prompt와 비슷한 역할을 함
if weather == '비' or weather =='눈':
    print ('우산을 챙기세요')
elif weather =='미세먼지':   # 파이선은 elif 되게 짧다.
    print ('마스크를 챙기세요')
else :
    print('준비물이 필요없어요')

temp = int(input('기온은 어떄요?')) #int는 입력 받은 값을 숫자로 받는것 
if 30 <= temp :
    print('너무 더워요')
elif 10<=temp and temp< 30:
    print('괜찮은 날씨에요')
elif 0<=temp and temp<10 :
    print('외투를 챙기세요')
else:
    print('너무 추워 나가지마~!')
    

name = input('식구 이름이 뭐죠?')
if name == '김주남':
    print('너무 착하고 좋은 남자 만날수 있었는데 미안해요 ㅠㅠ')
elif name == '김기준':
    print('사랑하고 아빠의 아들로 태어나줘서 고맙다 ㅠㅠ 그리고 미안하다')
elif name == '김기은':
    print('사랑하고 너무 이쁘고 말 그대로 천사인 우리 딸 아빠 딸로 태어나줘서 고마워 그리고 미안해 ㅠㅠ')
else:
    print('넌 누구냐?')


