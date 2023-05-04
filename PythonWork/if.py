# weather = input("오늘 날씨는 어때요?") #자바스크립트의 prompt와 비슷한 역할을 함
# if weather == '비' or weather =='눈':
#     print ('우산을 챙기세요')
# elif weather =='미세먼지':   # 파이선은 elif 되게 짧다.
#     print ('마스크를 챙기세요')
# else :
#     print('준비물이 필요없어요')

temp = int(input('기온은 어떄요?'))
if 30 <= temp :
    print('너무 더워요')
elif 10<=temp and temp< 30:
    print('괜찮은 날씨에요')
elif 0<=temp and temp<10 :
    print('외투를 챙기세요')
else:
    print('너무 추워 나가지마~!')
    

