# #while
# customer = "토르"
# index =5
# while index >=1 :
#     print('{0},커피가 준비 되었습니다. {1}번 남았어요.'.format(customer,index))
#     index -= 1
#     if index ==0 :
#         print('커피는 폐기처분 되었습니다.')


customer = "토르"
person =''
while person != customer :
    print('커피가 준비 되었습니다. 손님 이름이 어떻게 되세요?')
    person = input('여기에 적어주세요')
    if person =='토르' :
      print('맛있게 드세요')
    else :
      print('돈내고 드세요')
    
i = 0
condition = True
while condition :
   j = int(input('숫자를 입력하시오~!'))
   i+=j
   if i < 50 :
      print('더 입력해 버려~! 현재는 : {0}'.format(i))
   else :
      print('너무 많이 입력했음 ㅠㅠ')
      condition = False
#무한 loof 오류를 해결하게 위해선 ctrl + c 를 입력하면 된다.
