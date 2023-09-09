cabinet ={3:'유재석',100:'김태호'}
print(cabinet)
print(cabinet[100])
print(cabinet.get(3)) # 밸류값을 가져오는 방법

#대괄호로 가져오면 키값이 없을 경우 중단 시키고 get으로 가져오면 none값을 출력하고 중단됨

print(cabinet.get(5,'값이 없어요')) #값이 있으면 가져오고 없으면 콤마 뒤에 값이 출력됨
print(3 in cabinet) # 객체안에 키 값이 있느냐 True 혹은 False를 반환

cabinet = {'a-3':'김정훈','a-5':'김주남'}

print(cabinet['a-3']) # 스트링 값을 키값으로 입력할수도 있다.

#새값을 넣는 방법
cabinet["a-7"] ="김기준,김기은"
print(cabinet)

#값을 제거하기
del cabinet['a-3']
print(cabinet)
print(cabinet.keys()) #키값만 가져오기
print(cabinet.values()) #밸류만 가져오기
print(cabinet.items()) # 키 밸류 둘다 가져오기
print(cabinet.clear())

