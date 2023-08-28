print('김정훈은 %d살입니다.' %47) # % 여기서 d는 정수를 반환한다 . 어색하다 포맷이
print('나는 %s를 좋아해요' %"파이썬") # s는 문자열을 의미한다.
print('Apple은 %c로 시작해요' %'a') #% c는 캐릭터라서 한글자만 받는다
print('나는 %s 와 %s 그리고 %s를 사랑한다' %('주남','기준','기은'))

#방법2

print('나는 {}살입니다.'.format(20))
print('나는 {}살이며 {}입니다.'.format(47,'병신'))
print('나는 {1}이며 {0}살입니다.'.format(47,'병신')) #format이 배열이되네 

#방법3
print('나는 {age}살이며 {charac}입니다.'.format(age=47,charac='병신'))

#방법4
age = 47
color = "빨간"
print("나는 "+str(age) +"살이며  "+ color +"색을 좋아해요 ")