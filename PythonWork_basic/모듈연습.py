# import theater_module   
# theater_module.price(3) #3명이 영화 보러 갔을때
# theater_module.price_morning(4)
# theater_module.price_soldier(5)

# import theater_module as mv #시어터 모듈 명이 길때 as구문을 이용해 mv에 담는것
# mv.price(2)

# from theater_module import *
# #ex from random import *
# price(3) # . 없이도 막 갖다 쓸수 있는 방법 
# price_morning(4)


from theater_module import price,price_morning

price(2)
price_morning(2)
# 가져 오고 싶은 함수만 호출할수 있다.



