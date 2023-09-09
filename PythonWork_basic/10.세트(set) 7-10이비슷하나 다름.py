#집합(set) { }로 표현하지만 키값이 없이 밸류만 갖고 사용한다 . 독특하네 아주 그냥 
#중복안됨 , 순서없음
my_set ={1,2,3,3,3}
print(my_set) #중복해 입력한 3이라는 중복값은 출력되지 않음

java = {'유재석','김태호','양세형'}
python =set(['유재석','박명수']) # 이거는 중괄호로 묶어서 표현하는 방식외에 새로운 방식임
print (java , python)
print (java & python) # 자바와 파이썬이라는 각자의 셋트에서 교집합을 뽑아 내는 방법임
print(java.intersection(python)) #교집합을 뽑아 내는 방법 / 위아래가 같은 내용


#합집합( 자바도 할수 있꼬 파이선도 할수 있는 개발자)
print(java | python) 
print(java.union(python))
#위 두가지는 결과가 같다.


#차집합 ( 자바는 할수 있지만 파이선은 못하는 개발자)
print(java-python) #쉬운방법
print(java.difference(python)) #함수를 이용한 방법

#파이선을 할줄 아는 사람이 늘어남
python.add('김태호') # 여기서 add는 셋트에 값을 추가하는 방법임
print(python)
java.remove('김태호')
print(java)


