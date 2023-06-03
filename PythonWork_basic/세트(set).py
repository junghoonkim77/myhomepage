#집합(set)
#중복안됨 , 순서없음
my_set ={1,2,3,3,3}
print(my_set) #중복값은 출력되지 않음

java = {'유재석','김태호','양세형'}
python =set(['유재석','박명수'])
print (java , python)
print (java & python)
print(java.intersection(python)) #교집합을 뽑아 내는 방법

#합집합( 자바도 할수 있꼬 파이선도 할수 있는 개발자)

print(java | python) 
print(java.union(python))
#위 두가지는 결과가 같다.

#차집합 ( 자바는 할수 있지만 파이선은 못하는 개발자)
print(java-python)
print(java.difference(python))

#파이선을 할줄 아는 사람이 늘어남
python.add('김태호')
print(python)
java.remove('김태호')
print(java)


