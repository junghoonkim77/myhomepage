#내장 함수는 이미 내장된 상태여서 import할 필요 없이 사용가능한 함수이다.

#input : 사용자 입력을 받는 함수
language = input('무슨 언어를 좋아하세요?')
print('{0}은 아주 좋은 언어입니다.'.format(language))

#dir : 어떤 객체를 넘겨줬을때 그 객체가 어떤 변수와 함수를 갖고 있는지 표시
# print(dir())
# import random
# print(dir())

lst =[1,2,3]
print(dir(lst))
#파이선 내장함수 홈피를 통해 확인해볼수 있다.
print(type(lst))

#list of python builtins 구글에서 검색해보면 나옴

