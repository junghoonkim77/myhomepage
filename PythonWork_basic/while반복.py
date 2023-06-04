#while
# customer = "토르"
# index =5
# while index >=1 :
#     print('{0},커피가 준비 되었습니다. {1}번 남았어요.'.format(customer,index))
#     index -= 1
#     if index ==0 :
#         print('커피는 폐기처분 되었습니다.')

# customer = "토르"
# person ="Unknown"

# while person != customer :
#     print('{0},커피가 준비 되었습니다.'.format(customer))
#     person = input('이름이 어떻게 되세요?')
#     if person =='토르' :
#       print('맛있게 드세요')
    
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
